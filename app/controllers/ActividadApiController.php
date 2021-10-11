<?php

namespace App\Controllers;

use App\Models\Actividad;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ActividadApiController extends Controller
{
    public function index(Request $request, Response $response, array $args)
    {
        
    }

    public function crearActividad(Request $request, Response $response, array $args)
    {
        $this->Create($request, 'Actividad', new Actividad);
        return $response->withHeader('Location', '/admin/actividades');
    }
}