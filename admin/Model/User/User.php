<?php

namespace Admin\Model\User;

use Engine\Core\Database\ActiveRecord;

class User
{
    use ActiveRecord;

    /**
     * @var string
     */
    protected $table = 'user';

    /**
     * @var $id
     */
    public $id;

    /**
     * @var $email
     */
    public $email;

    /**
     * @var $password
     */
    public $password;

    /**
     * @var $role
     */
    public $role;

    /**
     * @var $hash
     */
    public $hash;

    /**
     * @var $date_reg
     */
    public $date_reg;

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
     * @return $email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     * @return self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return $password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     * @return self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return $role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param $role
     * @return self
     */ 
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return $hash
     */ 
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param $hash
     * @return self
     */ 
    public function setHash($hash)
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @return date_reg
     */ 
    public function getDate_reg()
    {
        return $this->date_reg;
    }

    /**
     * @param $date_reg
     * @return self
     */ 
    public function setDate_reg($date_reg)
    {
        $this->date_reg = $date_reg;
        return $this;
    }
}