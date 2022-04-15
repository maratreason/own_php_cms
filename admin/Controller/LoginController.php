<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;
use Engine\Core\Database\QueryBuilder;

class LoginController extends Controller
{
    /**
     * @var Auth $auth
     */
    protected $auth;

    /**
     * LoginController constructor
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if ($this->auth->hashUser() !== null) {
            header('Location: /admin/');
            exit;
        }
    }

    /**
     * @return void
     */
    public function form()
    {
        $this->view->render('login');
    }

    /**
     * @return void
     */
    public function authAdmin()
    {
        $params = $this->request->post;
        $queryBuilder = new QueryBuilder();

        $sql = $queryBuilder
            ->select()
            ->from('user')
            ->where('email', $params['email'])
            ->where('password', md5($params['password']))
            ->limit(1)
            ->sql();

        $query = $this->db->query($sql, $queryBuilder->values);

        if (!empty($query)) {
            $user = $query[0];

            if ($user['role'] == 'admin') {
                $hash = md5($user['id'] . $user['email'] . $user['password'] . $this->auth->salt());

                // Добавляем временный хэш после авторизации
                $sql = $queryBuilder
                    ->update('user')
                    ->set(['hash' => $hash])
                    ->where('id', $user['id'])->sql();

                $this->db->execute($sql, $queryBuilder->values);

                $this->auth->authorize($hash);

                header('Location: /admin/login/');
                exit;
            }
        }

        echo 'Такого пользователя не существует';
    }
}
