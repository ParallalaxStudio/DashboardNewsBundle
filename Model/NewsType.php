<?php

namespace Parallalax\DashboardNewsBundle\Model;

class NewsType implements NewsTypeInterface
{

    protected $id;

    protected $name;

    protected $dateinsert;

    public function getId() {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setDateinsert($dateinsert) {
        $this->dateinsert = $dateinsert;
        return $this;
    }

    public function getDateinsert() {
        return $this->dateinsert;
    }
}
