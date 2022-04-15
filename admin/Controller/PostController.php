<?php

namespace Admin\Controller;

class PostController extends AdminController
{
    /**
     * Список постов
     * @return void
     */
    public function listing()
    {
        $this->load->model('post');

        $this->data['posts'] = $this->model->post->getPosts();
        // $this->data['pages'] = $this->di->get('model')->page->getPages();
        $this->view->render('posts/list', $this->data);
    }

    public function create()
    {
        $this->load->model('post');
        $this->view->render('posts/create');
    }

    public function add()
    {
        $this->load->model('post');
        $params = $this->request->post;

        if (isset($params['title'])) {
            $postId = $this->model->post->createPost($params);
            echo $postId;
        }
    }

    public function edit($id)
    {
        $this->load->model('post');
        $this->data['post'] = $this->model->post->getPostData($id);

        $this->view->render('posts/edit', $this->data);
    }

    public function update()
    {
        $this->load->model('post');
        $params = $this->request->post;

        if (isset($params['title'])) {
            $this->model->post->updatePost($params);
        }
    }
}