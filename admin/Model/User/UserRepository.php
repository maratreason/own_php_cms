<?php

namespace Admin\Model\User;

use Engine\Model;

class UserRepository extends Model
{
    public function getUsers()
    {
        $sql = $this->queryBuilder->select()
            ->from('user')
            ->orderBy('id', 'DESC')
            ->sql();
        
        return $this->db->query($sql);
    }

    public function test()
    {
        $user = new User();
        $user->setEmail('demo@demo.ru');
        $user->setPassword(md5(1111));
        $user->setRole('user');
        $user->setHash('new');
        $user->save();
    }
}
