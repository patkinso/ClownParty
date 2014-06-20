<?php

namespace Clown\ClownBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ClownClownBundle:Default:index.html.twig', array('name' => $name));
    }
}
