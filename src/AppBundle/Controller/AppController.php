<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Event;
use AppBundle\Form\EventType;
use PHPQRCode\QRcode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    public function indexAction()
    {


        $event = new Event();
        $form = $this->createForm(new EventType(), $event);
        return $this->render('AppBundle:App:index.html.twig', array(
                'form'  =>  $form->createView()
            ));
    }

    public function subscribeAction()
    {
        return $this->render('AppBundle:App:subscribe.html.twig', array(
                // ...
            ));
    }

}
