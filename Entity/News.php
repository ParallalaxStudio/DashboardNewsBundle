<?php

namespace Parallalax\DashboardNewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Parallalax\DashboardNewsBundle\Model\News as BaseNews;

/**
 * @ORM\MappedSuperclass
 */
abstract class News extends BaseNews
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

     /**
      * @ORM\ManyToOne(targetEntity="NewsType")
      * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
      */
    protected $type;

    /**
     * @ORM\Column(type="user_id", length=100)
     */
    protected $user;

    /**
     * @ORM\Column(type="string", length=100, name="title")
     */
    protected $title;

    /**
     * @ORM\Column(type="text", name="content")
     */
    protected $content;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $dateinsert;
}
