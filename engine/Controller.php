<?php

namespace Engine;

use Engine\Di\DI;

abstract class Controller
{
    /**
     * @var Engine\DI\DI
     */
    protected $di;

    /**
     * @var DB $db
     */
    protected $db;

    /**
     * @var Engine\Core\Template\View $view
     */
    protected $view;

    /**
     * @var Engine\Core\Config\Config $config
     */
    protected $config;

    /**
     * @var Engine\Core\Request\Request $request
     */
    protected $request;

    /**
     * @var Engine\Load $load
     */
    protected $load;

    /**
     * @var $model
     */
    // protected $model;

    /**
     * Controller constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->db = $this->di->get('db');
        $this->view = $this->di->get('view');
        $this->config = $this->di->get('config');
        $this->request = $this->di->get('request');
        $this->load = $this->di->get('load');
        // $this->model = $this->di->get('model');

        $this->initVars();
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->di->get($key);
    }

    /**
     * @return Controller
     */
    public function initVars()
    {
        $vars = array_keys(get_object_vars($this));

        foreach($vars as $var) {
            if ($this->di->has($var)) {
                $this->{$var} = $this->di->get($var);
            }
        }

        return $this;
    }
}
