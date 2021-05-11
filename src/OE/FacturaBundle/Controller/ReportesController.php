<?php

namespace OE\FacturaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReportesController extends Controller
{
    public function indexAction()
    {
        return $this->render('factura/reportes/index.html.twig');
    }

    public function getFacturaAction()
    {
        
    }

}