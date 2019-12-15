<?php
namespace Parallalax\DashboardNewsBundle\Component\Authentication;

use CKSource\Bundle\CKFinderBundle\Authentication\AuthenticationInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class CustomCKFinderAuth implements AuthenticationInterface
{
    use ContainerAwareTrait;

    public function authenticate()
    {
        return true;
    }
}
