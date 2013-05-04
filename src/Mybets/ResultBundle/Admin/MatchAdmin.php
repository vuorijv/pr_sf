<?php

namespace Mybets\ResultBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class MatchAdmin extends Admin
{
    protected $translationDomain = 'SonataAdminBundle';

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id')
            ->addIdentifier('team_home')
        	->addIdentifier('team_away')
        	->add('begins_at');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('description')
        	->add('begins_at')
            ->add('venue_is_neutral')
            ->add('team_home', 'sonata_type_model', array('label' => 'Team',
                                                                  'multiple' => false,
                                                                  'expanded' => true,
                                                                  'compound' => true,))

            ->add('team_away', 'sonata_type_model', array('label' => 'Team',
                                                                  'multiple' => false,
                                                                  'expanded' => true,
                                                                  'compound' => true,))

            ->add('tournament', 'sonata_type_model', array('label' => 'Tournament',
                                                                  'multiple' => false,
                                                                  'expanded' => true,
                                                                  'compound' => true));
    }


    public function prePersist($match)
    {
        //$this->preUpdate($category);
        $match->setTournamentName($match->getTournament());
        $match->setTeamHomeName($match->getTeamHome());
        $match->setTeamAwayName($match->getTeamAway());
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