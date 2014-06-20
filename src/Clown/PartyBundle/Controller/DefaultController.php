<?php

namespace Clown\PartyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ClownPartyBundle:Default:index.html.twig', array('name' => $name));
    }
}
