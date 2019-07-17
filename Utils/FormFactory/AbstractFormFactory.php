<?php

namespace Parallalax\DashboardNewsBundle\Utils\FormFactory;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormFactoryInterface;

abstract class AbstractFormFactory
{

    protected $formFactory;

    protected $formType;

    protected $formName;

    protected $formModelClass;

    /**
     * @param FormFactoryInterface $formFactory
     * @param AbstractType         $formType
     * @param string               $formName
     * @param string               $formModelClass
     */
    public function __construct(FormFactoryInterface $formFactory, $formType, $formName, $formModelClass)
    {

        $this->formFactory = $formFactory;
        $this->formType = $formType;
        $this->formName = $formName;
        $this->formModelClass = $formModelClass;
    }

    /**
     * @return AbstractFormFactory
     */
    protected function createModelInstance()
    {
        $class = $this->formModelClass;
        return new $class();
    }

    public function createForm()
    {
        //return $this->formFactory->createNamed($this->formName, $this->formType, $this->createModelInstance());
        $builder = $this->formFactory->createNamedBuilder($this->formName, $this->formType);
        return $builder->getForm();
    }

    /*public function createForm()
    {
        $builder = $this->formFactory->createNamedBuilder($this->name, $this->type, null, array('validation_groups' => array('CreateThread')));
        return $builder->getForm();
    }*/
}
