<?php

namespace OE\FacturaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

class ReportesController extends Controller
{
    public function indexAction()
    {
        return $this->render('factura/reportes/index.html.twig');
    }

    public function getFacturaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ft = explode('-', $request->request->get('dt'));
        $fecha = $ft[2].'-'.$ft[1].'-'.$ft[0];

        $r = $em->createQuery('
            SELECT r FROM FacturaBundle:Factura AS r
            WHERE r.facturafecha = ?1')->setParameter(1, $fecha);
        $invoices = $r->getResult();

        return $this->render('factura\reportes\facturas.html.twig', ['facturas' => $invoices]);
    }

}