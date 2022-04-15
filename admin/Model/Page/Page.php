<?php

namespace Admin\Model\Page;

use Engine\Core\Database\ActiveRecord;

class Page
{
    use ActiveRecord;

    /**
     * @var string
     */
    protected $table = 'page';

    /**
     * @var $id
     */
    public $id;

    /**
     * @var $title
     */
    public $title;

    /**
     * @var $content
     */
    public $content;

    /**
     * @var $date
     */
    public $date;

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
     * @return $title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     * @return self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return $content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param $content
     * @return self
     */ 
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return $date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param $date
     * @return self
     */ 
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
}