<?php

namespace OE\FacturaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Factura/Default/index.html.twig');
    }
}
