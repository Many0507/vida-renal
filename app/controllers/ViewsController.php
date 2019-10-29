<?php
namespace App\Controllers;

use Statickidz\GoogleTranslate;
use App\Models\Actividad;
use App\Models\Evento;
use App\Models\Taller;
use App\Models\Blog;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ViewsController extends Controller {
     public function index (Request $request, Response $response, array $args) {
          $actividades = [];
          $eventos = [];
          $blogs = [];
          $actividades = Actividad::orderBy('id', 'desc')->take(3)->get();
          $eventos = Evento::orderBy('id', 'desc')->take(3)->get();
          $blogs = Blog::orderBy('id', 'desc')->take(3)->get();

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
          
          $blogs = Blog::all();

          // function getTimeAgo ($date) {
          //      $newDate = explode(" ", $date);

          //      $time = date("g:i a", strtotime($newDate[1]));
          //      $finalDate = $newDate[0] . ' ' . $time;

          //      $timestamp = strtotime($finalDate);
                         
          //      $strTime = array("segundo", "minuto", "hora", "dia", "mes", "año");
          //      $length = array("60","60","24","30","12","10");

          //      $currentTime = time();

          //      if($currentTime >= $timestamp) {
          //           $diff = time() - $timestamp;
          //           for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
          //                $diff = $diff / $length[$i];
          //           }

          //           $diff = round($diff);
          //           $date = $diff . " " . $strTime[$i] . "(s) atras";
          //           array_push($GLOBALS['blogsTimeAgo'], $date); 
          //      }
          // }

          // for ($i = 0; $i < count($blogs); $i++) {
          //      getTimeAgo($blogs[$i]->created_at);      
          // }

          // var_dump($blogsTimeAgo);
          // $blogsTimeAgo = $GLOBALS['blogsTimeAgo'];
          // die();
          // Google translate 
          // $source = 'es';
          // $target = 'en';
          // $text = 'buenos días';

          // $trans = new GoogleTranslate();
          // $result = $trans->translate($source, $target, $text);

          // var_dump($result);
          // die();
          return $this->container->view->render($response, 'blog.twig', [
               'blogs' => $blogs
               // 'blogsTimeAgo' => $blogsTimeAgo
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
