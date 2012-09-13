<?php

namespace Mybets\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MybetsUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
