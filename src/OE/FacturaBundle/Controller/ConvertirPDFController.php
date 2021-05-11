<?php

namespace OE\FacturaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Bundle\SnappyBundle\Snappy\Response\JpegResponse;

class ConvertirPDFController extends Controller
{
    public function getPDFAction($idfactura)
    {
        $filename = date('dmHi');
        $em = $this->getDoctrine()->getManager();
        $factura = $em->getRepository('FacturaBundle:Factura')->find($idfactura);
        
        $snappy = $this->get('knp_snappy.pdf');
        $snappy->setOption('page-size','A4');
        $snappy->setOption('encoding', 'UTF-8');
        $snappy->setOption('enable-javascript', true);
        $snappy->setOption('background', true);
        $snappy->setOption('enable-external-links', true);
        $snappy->setOption('images', true);
        
        $html = $this->renderView('@Factura/Default/pdf.html.twig', array(
            'factura' => $factura,
            'dt' => $filename
        ));

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );
    }

}