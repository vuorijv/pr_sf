<?php

namespace Mybets\ResultBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class TeamAdmin extends Admin
{
    protected $translationDomain = 'SonataAdminBundle';

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id')
            ->addIdentifier('name');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name')
            ->add('description')
            ->add('club', 'sonata_type_model', array('label' => 'Club',
                                                                  'by_reference' => false,
                                                                  'multiple' => false,
                                                                  'expanded' => true,
                                                                  'compound' => true,))

            ->add('tournament', 'sonata_type_model', array('label' => 'Tournament',
                                                                  'by_reference' => false,
                                                                  'multiple' => false,
                                                                  'expanded' => true,
                                                                  'compound' => true));
    }


    public function prePersist($category)
    {
        //$this->preUpdate($category);
    }
    public function preUpdate($category)
    {
        /*foreach($category->getCategoryImages() as $image)
        {
            if (null !== $image->getFile()) {
                $image->newImage();
            }
        }*/
    }

    public function postPersist($category)
    {
        //$this->postUpdate($category);
    }
    public function postUpdate($category)
    {
        /*
        foreach($category->getCategoryImages() as $image)
        {
            if (null === $image->getFile()) {
                continue;
            }

            $image->handleNewImage();

            $image->setFile(null);
        }*/
    }
}