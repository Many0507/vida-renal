<?php
namespace App\Controllers;

use App\Models\Actividad;
use App\Models\Evento;
use App\Models\Taller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ViewsController extends Controller {
     public function index (Request $request, Response $response, array $args) {
          $actividades = [];
          $eventos = [];
          $actividades = Actividad::all();
          $eventos = Evento::all();
          return $this->container->view->render($response, 'index.twig', [
               'actividades' => $actividades,
               'eventos' => $eventos
          ]);
     }

     public function quienesSomos (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'quienes-somos.twig');
     }

     public function queHacemos (Request $request, Response $response, array $args) {
          $talleres = [];
          $talleres = Taller::all();
          return $this->container->view->render($response, 'que-hacemos.twig', [
               'talleres' => $talleres,
          ]);
     }

     public function aliados (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'aliados.twig');
     }
     
     public function blog (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'blog.twig');
     }

     public function comoApoyarnos (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'como-apoyarnos.twig');
     }

     public function conoce (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'conoce.twig');
     }

     public function donar (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'donar.twig');
     }

     public function preguntas (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'preguntas.twig');
     }

     public function talleres (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'talleres.twig');
     }

     public function testimonios (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'testimonios.twig');
     }

     public function transparencia (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'transparencia.twig');
     }

     public function actividades (Request $request, Response $response, array $args) {
          $actividades = [];
          $actividades = Actividad::all();
          return $this->container->view->render($response, 'actividades.twig', [
               'actividades' => $actividades
          ]);
     }
     
     public function eventos (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'eventos.twig');
     }

     public function admin (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'admin.twig');
     }
}
