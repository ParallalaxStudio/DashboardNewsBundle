<?php

namespace Parallalax\DashboardNewsBundle\Utils\FormModel;

class News
{
    protected $type;
    protected $title;
    protected $content;

    public function setType(NewsType $type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setContent($content){
        $this->content = $content;
        return $this;
    }

    public function getContent() {
        return $this->content;
    }
}
