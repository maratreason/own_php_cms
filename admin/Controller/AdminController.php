<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;

class AdminController extends Controller
{
    /**
     * @var \Engine\Core\Auth\Auth $auth
     */
    protected $auth;

    /**
     * @var array
     */
    public $data = [];

    /**
     * AdminController constructor.
     * @param \Engine\Di\DI $di
     */
    public function __construct($di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if ($this->auth->hashUser() == null) {
            header('Location: /admin/login/');
            exit;
        }

        // Load global language
        $this->load->language('dashboard/menu');
    }

    /**
     * @return void
     */
    public function logout()
    {
        $this->auth->unAuthorize();
        header('Location: /admin/login/');
        exit;
    }

    /**
     * Check Auth
     */
    public function checkAuthorization()
    {
        
    }
}
