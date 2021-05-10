<?php

namespace OE\TemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Tema/Helpers/index.html.twig');
    }
}
