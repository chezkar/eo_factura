<?php

namespace OE\FacturaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WebServiceController extends Controller
{
    public function indexAction()
    {
        return $this->render('webservice/index.html.twig');
    }

    public function getFacturaAction()
    {
        
    }

}