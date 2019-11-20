<?php
namespace App\Controllers;

// use Statickidz\GoogleTranslate;
use App\Models\Actividad;
use App\Models\Evento;
use App\Models\Taller;
use App\Models\Blog;
use App\Helpers\TimeAgoHelper;
use App\Helpers\PaginationHelper;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ViewsController extends Controller {
     public function index (Request $request, Response $response, array $args) {
          $actividades = [];
          $eventos = [];
          $blogs = [];
          $actividades = Actividad::orderBy('id', 'desc')->take(3)->get();
          $eventos = Evento::orderBy('id', 'desc')->take(3)->get();
          $blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();

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
          $timeAgo = [];
          $blogs = [];
          
          $page = $request->getParam('page');
          $total_rows = Blog::count();

          $pagination = new PaginationHelper($page, $total_rows);

          $blogs = Blog::orderBy('created_at', 'desc')->take($pagination->n_per_page)->skip($pagination->offset)->get();

          foreach ($blogs as $blog) {
               $time = new TimeAgoHelper($blog->created_at);
               $timeAgo[$blog->id] = $time;
          }
          
          return $this->container->view->render($response, 'blog.twig', [
               'blogs' => $blogs,
               'timeAgo' => $timeAgo,
               'totalPages' => $pagination->total_pages,
               'page' => $page,
               'next' => $pagination->next,
               'prev' => $pagination->prev
          ]);
     }

     public function blogVer (Request $request, Response $response, array $args) {
          $blog = [];
          $id = intval($request->getAttribute('id'));
          
          if ($id > 0) {
               $blog = Blog::find($id);

               if ($blog == null || empty($blog)) {
                    return $response->withHeader('Location', '/');
               }

               return $this->container->view->render($response, 'blog-ver.twig', [
                    'blog' => $blog
               ]);
          }
          else return $response->withHeader('Location', '/');
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
          $talleres = [];
          $talleres = Taller::all();

          return $this->container->view->render($response, 'talleres.twig', [
               'talleres' => $talleres
          ]);
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

     public function queHacenNR (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'qhnr.twig');
     }
     
     public function tuSalud (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'tu-salud.twig');
     }

     public function irc (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'irc.twig');
     }
     
     public function causasPrincipales (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'causas-principales.twig');
     }

     public function sintomas (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'sintomas.twig');
     }

     public function tratamientos (Request $request, Response $response, array $args) {
          return $this->container->view->render($response, 'tratamientos.twig');
     }

     // Admin views

     public function admin (Request $request, Response $response, array $args) {
          if ($_SESSION['user']) {
               return $this->container->view->render($response, 'admin.twig');
          } else return $response->withHeader('Location', '/admin/login');
     }

     public function adminActividades (Request $request, Response $response, array $args) {
          if ($_SESSION['user']) {
               $actividades = [];
               $actividades = Actividad::orderBy('id', 'desc')->get();
               $messages = $this->container->flash->getMessages();
               
               return $this->container->view->render($response, 'admin-actividades.twig', [
                    'actividades' => $actividades,
                    'mensajes' => $messages
               ]);
          } else return $response->withHeader('Location', '/admin/login');
     }

     public function adminEventos (Request $request, Response $response, array $args) {
          if ($_SESSION['user']) { 
               $eventos = [];
               $eventos = Evento::orderBy('id', 'desc')->get();
               $messages = $this->container->flash->getMessages();
               
               return $this->container->view->render($response, 'admin-eventos.twig', [
                    'eventos' => $eventos,
                    'mensajes' => $messages
               ]);
          } else return $response->withHeader('Location', '/admin/login');
     }

     public function adminTalleres (Request $request, Response $response, array $args) {
          if ($_SESSION['user']) { 
               $talleres = [];
               $talleres = Taller::orderBy('id', 'desc')->get();
               $messages = $this->container->flash->getMessages();
               
               return $this->container->view->render($response, 'admin-talleres.twig', [
                    'talleres' => $talleres,
                    'mensajes' => $messages
               ]);
          } else return $response->withHeader('Location', '/admin/login');
     }

     public function adminBlog (Request $request, Response $response, array $args) {
          if ($_SESSION['user']) {
               $blogs = [];
               $blogs = Blog::orderBy('id', 'desc')->get();
               $messages = $this->container->flash->getMessages();
               
               return $this->container->view->render($response, 'admin-blog.twig', [
                    'blogs' => $blogs,
                    'mensajes' => $messages
               ]);
          } else return $response->withHeader('Location', '/admin/login');
     }

     public function adminBlogContent (Request $request, Response $response, array $args) {
          if ($_SESSION['user']) {
               $messages = $this->container->flash->getMessages();
               $blogId = $request->getParam('id');

               if (!$blogId || $blogId < 0) return $response->withHeader('Location', '/admin/blog');

               $blog = Blog::find($blogId);
          
               return $this->container->view->render($response, 'admin-blogContent.twig', [
                    'mensajes' => $messages,
                    'blog' => $blog
               ]);
          } else return $response->withHeader('Location', '/admin/login');
     }

     public function adminLogin (Request $request, Response $response, array $args) {
          $messages = $this->container->flash->getMessages();

          return $this->container->view->render($response, 'admin-login.twig', [
               'mensajes' => $messages
          ]);
     }
}
