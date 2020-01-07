<?php

namespace Parallalax\DashboardNewsBundle\Model;

class News
{

    protected $id;

    protected $title;

    protected $thumbnail;

    protected $dateinsert;

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
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

    public function setDateinsert($dateinsert) {
        $this->dateinsert = $dateinsert;
        return $this;
    }

    public function getDateinsert() {
        return $this->dateinsert;
    }

    public function setThumbnail($thumbnail) {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function getThumbnail() {
        return $this->thumbnail;
    }
}
