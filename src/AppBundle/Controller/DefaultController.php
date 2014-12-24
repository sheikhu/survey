<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Event;
use AppBundle\Form\EventType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {


        $event = new Event();

        $form = $this->createForm(new EventType(), $event);

    }
}
