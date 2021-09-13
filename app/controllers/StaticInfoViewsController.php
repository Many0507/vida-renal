<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class StaticInfoViewsController extends Controller
{
    public function queHacenNR(Request $request, Response $response, array $args)
    {
        return $this->container->view->render($response, 'qhnr.twig');
    }
    
    public function costoEnfermo(Request $request, Response $response, array $args)
    {
        return $this->container->view->render($response, 'costo-de-enfermo.twig');
    }

    public function irc(Request $request, Response $response, array $args)
    {
        return $this->container->view->render($response, 'irc.twig');
    }

    public function causasPrincipales(Request $request, Response $response, array $args)
    {
        return $this->container->view->render($response, 'causas-principales.twig');
    }

    public function sintomas(Request $request, Response $response, array $args)
    {
        return $this->container->view->render($response, 'sintomas.twig');
    }

    public function tratamientos(Request $request, Response $response, array $args)
    {
        return $this->container->view->render($response, 'tratamientos.twig');
    }

    public function trastorno(Request $request, Response $response, array $args)
    {
        return $this->container->view->render($response, 'trastorno.twig');
    }
}
