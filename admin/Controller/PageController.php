<?php

namespace Admin\Controller;

class PageController extends AdminController
{
    /**
     * Список страниц
     * @return void
     */
    public function listing()
    {
        $this->load->model('page');
        // print_r($this->load->model('Page')); exit;

        $this->data['pages'] = $this->model->page->getPages();
        // $this->data['pages'] = $this->di->get('model')->page->getPages();
        $this->view->render('pages/list', $this->data);
    }

    public function create()
    {
        $this->load->model('page');
        $this->view->render('pages/create');
    }

    public function add()
    {
        $this->load->model('page');
        $params = $this->request->post;

        if (isset($params['title'])) {
            $pageId = $this->model->page->createPage($params);
            echo $pageId;
        }
    }

    public function edit($id)
    {
        $this->load->model('page');
        $this->data['page'] = $this->model->page->getPageData($id);

        $this->view->render('pages/edit', $this->data);
    }

    public function update()
    {
        $this->load->model('page');
        $params = $this->request->post;

        if (isset($params['title'])) {
            $this->model->page->updatePage($params);
        }
    }
}