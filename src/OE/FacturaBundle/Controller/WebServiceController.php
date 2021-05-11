<?php

namespace OE\FacturaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
//use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Guzzle\Client;

class WebServiceController extends Controller
{

    public function indexAction()
    {
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://reqres.in/']);
        $res = $client->request('GET', '/api/users');

        $body = $res->getBody();
        $obj = get_object_vars(json_decode($body));

        $currentPage = $obj['page'];
        $ttPage = $obj['total_pages'];
        $content = $obj['data'];


        return $this->render('webservice/index.html.twig', ['content' => $content, 'cps' => $currentPage, 'ttps' => $ttPage]);
    }

    public function getWSPageAction(Request $request)
    {
        $id = $request->request->get('pages');
        $client = $client = new \GuzzleHttp\Client(['base_uri' => 'https://reqres.in/']);
        $res = $client->request('GET', '/api/users?page='.$id);

        $body = $res->getBody();
        $obj = get_object_vars(json_decode($body));

        $content = $obj['data'];

        return $this->render('webservice/page.html.twig', ['content' => $content]);
    }
}