<?php

namespace Admin\Controller;

class DashboardController extends AdminController
{
    public function index()
    {
        $userModel = $this->load->model('User');

        // Load language
        $this->load->language('dashboard/main');

        $this->view->render('dashboard');
    }
}
