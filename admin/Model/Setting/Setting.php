<?php

namespace Admin\Model\Setting;

use Engine\Core\Database\ActiveRecord;

class Setting
{
    use ActiveRecord;

    /**
     * @var string
     */
    protected $table = 'setting';

    /**
     * @var $id
     */
    public $id;

    /**
     * @var $name
     */
    public $name;

    /**
     * @var $value
     */
    public $value;

    /**
     * @var $key
     */
    public $key;

    /**
     * @return$id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param$id
     * @return self
     */ 
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return $name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return self
     */ 
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return $value
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     * @return self
     */ 
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return $key
     */ 
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param $key
     * @return self
     */ 
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }
}
