<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:App:index.html.twig', array(
                // ...
            ));    }

    public function subscribeAction()
    {
        return $this->render('AppBundle:App:subscribe.html.twig', array(
                // ...
            ));    }

}
