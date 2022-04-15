<?php

namespace Engine\Core\Database;

use \ReflectionClass;
use \ReflectionProperty;

trait ActiveRecord
{
    /**
     * @var Connection $db
     */
    protected $db;

    /**
     * @var QueryBuilder $queryBuilder
     */
    protected $queryBuilder;

    /**
     * ActiveRecord constructor
     * @param integer $id
     */
    public function __construct($id = 0)
    {
        global $di;

        $this->db = $di->get('db');
        $this->queryBuilder = new QueryBuilder();

        if ($id) {
            $this->setId($id);
        }
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return mixed
     */
    public function findOne()
    {
        $find = $this->db->query(
            $this->queryBuilder
                ->select()
                ->from($this->getTable())
                ->where('id', $this->id)
                ->sql(),
            $this->queryBuilder->values,
            // \PDO::FETCH_ASSOC
        );

        return isset($find[0]) ? $find[0] : null;
    }

    /**
     * Save User
     * @return void
     * @throws \Exception
     */
    public function save()
    {
        $properties = $this->getIssetProperties();

        try {
            if (isset($this->id)) {
                $this->db->execute(
                    $this->queryBuilder->update($this->getTable())
                        ->set($properties)
                        ->where('id', $this->id)
                        ->sql(),
                    $this->queryBuilder->values
                );
            } else {
                $this->db->execute(
                    $this->queryBuilder->insert($this->getTable())
                        ->set($properties)
                        ->sql(),
                    $this->queryBuilder->values
                );
            }

            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return array
     */
    public function getIssetProperties()
    {
        $properties = [];

        foreach ($this->getProperties() as $key => $property) {
            if (isset($this->{$property->getName()})) {
                $properties[$property->getName()] = $this->{$property->getName()};
            }
        }

        return $properties;
    }

    /**
     * @return ReflectionProperty[]
     */
    public function getProperties()
    {
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        return $properties;
    }
}
