<?php

namespace Parallalax\DashboardNewsBundle\Utils\EntityManager;

use Doctrine\ORM\EntityManager;


class NewsManager {

    /**
     * @var EntityManager
     */
    protected $em;
    /**
     * @var NewsRepository
     */
    protected $repository;

    public function __construct(EntityManager $em, $entityClassName) {
        $this->em = $em;
        $this->repository = $this->em->getRepository($entityClassName);
    }

    public function find($id) {
        return $this->repository->find($id);
    }

    public function findBy(array $params) {
        return $this->repository->findBy($params);
    }

    public function findAll() {
        return $this->repository->findAll();
    }

    public function save($entity) {
        $this->em->persist($entity);
        $this->em->flush();
    }
}
