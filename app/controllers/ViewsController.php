<?php
namespace App\Controllers;

// use Statickidz\GoogleTranslate;
use App\Models\Actividad;
use App\Models\Evento;
use App\Models\Taller;
use App\Models\Blog;
use App\Helpers\TimeAgoHelper;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ViewsController extends Controller {
     public function index (Request $request, Response $response, array $args) {
          $actividades = [];
          $eventos = [];
          $blogs = [];
          $actividades = Actividad::orderBy('id', 'desc')->take(3)->get();
          $eventos = Evento::orderBy('id', 'desc')->take(3)->get();
          // $blogs = Blog::orderBy('id', 'desc')->take(3)->get();

          return $this->container->view->render($response, 'index.twig', [
               'actividades' => $actividades,
               'eventos' => $eventos,
               'blogs' => $blogs
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
          // $GLOBALS['blogsTimeAgo'] = [];
          $blogs = [];
          
          // $blogs = Blog::all();

          // for ($i = 0; $i < count($blogs); $i++) {
          //      getTimeAgo($blogs[$i]->created_at);      
          // }

          // var_dump($blogsTimeAgo);
          // $blogsTimeAgo = $GLOBALS['blogsTimeAgo'];
          
          // Google translate 
          // $source = 'es';
          // $target = 'en';
          // $text = 'buenos días';

          // $trans = new GoogleTranslate();
          // $result = $trans->translate($source, $target, $text);

          // var_dump($result);
          // die();

          // -
          // $time = new TimeAgoHelper('2019-10-29 22:00:00');
          // echo $time->timeAgo;
          // 
          return $this->container->view->render($response, 'blog.twig', [
               'blogs' => $blogs
          ]);
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
          $eventos = [];
          $eventos = Evento::all();
          return $this->container->view->render($response, 'eventos.twig', [
               'eventos' => $eventos
          ]);
     }
     
     public function Ayudar (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'ayudar.twig');
     }
     
     // 

     public function admin (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, '/admin.twig');
     }
}
