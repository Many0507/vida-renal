<?php

namespace App\Controllers;

use App\Models\VideoPrincipal;
use App\Models\VideoTestimonio;
use App\Models\Actividad;
use App\Models\Evento;
use App\Models\Taller;
use App\Models\Blog;
use App\Models\Testimonio;
use App\Models\Servicio;
use App\Helpers\TimeAgoHelper;
use App\Helpers\PaginationHelper;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PublicViewsController extends Controller
{
    public function index(Request $request, Response $response, array $args)
    {
        $video = VideoPrincipal::get()->first();
        $servicios = Servicio::orderBy('id', 'asc')->get();
        $eventos = Evento::orderBy('id', 'desc')->take(3)->get();
        $blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $actividades = Actividad::orderBy('id', 'desc')->take(3)->get();

        return $this->container->view->render($response, 'index.twig', [               
            'video' => $video,
            'blogs' => $blogs,
            'eventos' => $eventos,
            'servicios' => $servicios,
            'actividades' => $actividades
        ]);
    }

    public function quienesSomos(Request $request, Response $response, array $args)
    {
        return $this->container->view->render($response, 'quienes-somos.twig');
    }

    public function queHacemos(Request $request, Response $response, array $args)
    {
        $talleres = Taller::all();

        return $this->container->view->render($response, 'que-hacemos.twig', [
            'talleres' => $talleres
        ]);
    }

    public function donar(Request $request, Response $response, array $args)
    {
        return $this->container->view->render($response, 'donar.twig');
    }

    public function transparencia(Request $request, Response $response, array $args)
    {
        return $this->container->view->render($response, 'transparencia.twig');
    }

    public function testimonios(Request $request, Response $response, array $args)
    {
        $testimonios = Testimonio::all();
        $video = VideoTestimonio::get()->first();

        return $this->container->view->render($response, 'testimonios.twig', [
            'video' => $video,
            'testimonios' => $testimonios
        ]);
    }

    public function conoce(Request $request, Response $response, array $args)
    {
        return $this->container->view->render($response, 'conoce.twig');
    }

    public function aliados(Request $request, Response $response, array $args)
    {
        return $this->container->view->render($response, 'aliados.twig');
    }

    public function blog(Request $request, Response $response, array $args)
    {
        $timeAgo = array();

        $page = $request->getParam('page');
        if (!$page) $page = 1;

        $total_rows = Blog::count();
        $pagination = new PaginationHelper($page, $total_rows);

        $blogs = Blog::orderBy('created_at', 'desc')
            ->take($pagination->n_per_page)
            ->skip($pagination->offset)
            ->get();

        foreach ($blogs as $blog) {
            $time = new TimeAgoHelper($blog->created_at);
            $timeAgo[$blog->id] = $time;
        }

        return $this->container->view->render($response, 'blog.twig', [
            'page' => $page,
            'blogs' => $blogs,
            'timeAgo' => $timeAgo,
            'next' => $pagination->next,
            'prev' => $pagination->prev,
            'totalPages' => $pagination->total_pages
        ]);
    }

    public function preguntas(Request $request, Response $response, array $args)
    {
        return $this->container->view->render($response, 'preguntas.twig');
    }

    public function talleres(Request $request, Response $response, array $args)
    {
        $talleres = Taller::all();

        return $this->container->view->render($response, 'talleres.twig', [
            'talleres' => $talleres
        ]);
    }

    public function actividades(Request $request, Response $response, array $args)
    {
        $actividades = Actividad::all();

        return $this->container->view->render($response, 'actividades.twig', [
            'actividades' => $actividades
        ]);
    }

    public function eventos(Request $request, Response $response, array $args)
    {
        $eventos = Evento::all();

        return $this->container->view->render($response, 'eventos.twig', [
            'eventos' => $eventos
        ]);
    }

    public function tallerVer(Request $request, Response $response, array $args) 
    {
        $id = intval($request->getAttribute('id'));

        if ($id > 0) {
            $taller = Taller::find($id);

            if ($taller == null || empty($taller)) return $response->withHeader('Location', '/que-hacemos');

            return $this->container->view->render($response, 'taller-ver.twig', [
                'taller' => $taller
            ]);
        } else return $response->withHeader('Location', '/que-hacemos');
    }

    public function actividadVer(Request $request, Response $response, array $args) 
    {
        $id = intval($request->getAttribute('id'));

        if ($id > 0) {
            $actividad = Actividad::find($id);

            if ($actividad == null || empty($actividad)) return $response->withHeader('Location', '/');

            return $this->container->view->render($response, 'actividad-ver.twig', [
                'actividad' => $actividad
            ]);
        } else return $response->withHeader('Location', '/');
    }

    public function eventoVer(Request $request, Response $response, array $args) 
    {
        $id = intval($request->getAttribute('id'));

        if ($id > 0) {
            $evento = Evento::find($id);

            if ($evento == null || empty($evento)) return $response->withHeader('Location', '/');

            return $this->container->view->render($response, 'evento-ver.twig', [
                'evento' => $evento
            ]);
        } else return $response->withHeader('Location', '/');
    }

    public function blogVer(Request $request, Response $response, array $args)
    {
        $id = intval($request->getAttribute('id'));

        if ($id > 0) {
            $blog = Blog::find($id);

            if ($blog == null || empty($blog)) return $response->withHeader('Location', '/');

            return $this->container->view->render($response, 'blog-ver.twig', [
                'blog' => $blog
            ]);
        } else return $response->withHeader('Location', '/');
    }
}
