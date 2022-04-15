<?php

namespace Engine;

use Engine\Core\Database\QueryBuilder;
use Engine\Di\DI;

abstract class Model
{

    /**
     * @var Engine\DI\DI
     */
    protected $di;

    /**
     * @var Engine\Core\Database\Connection $db
     */
    protected $db;

    /**
     * @var Engine\Core\Config\Config $config
     */
    protected $config;

    /**
     * @var Engine\Core\Database\QueryBuilder $queryBuilder
     */
    protected $queryBuilder;

    /**
     * Model constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->db = $this->di->get('db');
        $this->config = $this->di->get('config');

        $this->queryBuilder = new QueryBuilder();
    }
}
