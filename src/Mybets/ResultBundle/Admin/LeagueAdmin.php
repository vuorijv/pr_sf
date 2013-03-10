<?php

namespace Mybets\ResultBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class LeagueAdmin extends Admin
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
            ->with('tournaments')
            ->add('tournaments', 'sonata_type_collection',
            array('by_reference' => false, 'required' => false),
            array('edit' => 'inline', 'inline' => 'table', 'sortable' => 'position')
        );
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