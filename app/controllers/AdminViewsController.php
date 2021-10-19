<?php

namespace App\Controllers;

use App\Models\Actividad;
use App\Models\Evento;
use App\Models\Taller;
use App\Models\Blog;
use App\Models\Testimonio;
use App\Models\Servicio;
use App\Models\Ingreso;
use App\Models\TipoDonador;
use App\Helpers\PaginationHelper;
use Illuminate\Database\Capsule\Manager as DB;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AdminViewsController extends Controller
{
    public function index(Request $request, Response $response, array $args)
    {
        if ($_SESSION['user']) {
            $messages = $this->container->flash->getMessages();

            return $this->container->view->render($response, 'admin.twig', [
                'mensajes' => $messages
            ]);
        } else return $response->withHeader('Location', '/admin/login');
    }

    public function actividades(Request $request, Response $response, array $args)
    {
        if ($_SESSION['user']) {
            $page = $request->getParam('page');
            if (!$page) $page = 1;

            $total_rows = Actividad::count();
            $pagination = new PaginationHelper($page, $total_rows);

            $actividades = Actividad::orderBy('id', 'desc')
                ->take($pagination->n_per_page)
                ->skip($pagination->offset)
                ->get();

            $messages = $this->container->flash->getMessages();

            return $this->container->view->render($response, 'admin-actividades.twig', [
                'page' => $page,
                'mensajes' => $messages,
                'next' => $pagination->next,
                'prev' => $pagination->prev,
                'actividades' => $actividades,
                'totalPages' => $pagination->total_pages
            ]);
        } else return $response->withHeader('Location', '/admin/login');
    }

    public function eventos(Request $request, Response $response, array $args)
    {
        if ($_SESSION['user']) {
            $page = $request->getParam('page');
            if (!$page) $page = 1;

            $total_rows = Evento::count();
            $pagination = new PaginationHelper($page, $total_rows);

            $eventos = Evento::orderBy('id', 'desc')
                ->take($pagination->n_per_page)
                ->skip($pagination->offset)
                ->get();

            $messages = $this->container->flash->getMessages();

            return $this->container->view->render($response, 'admin-eventos.twig', [
                'page' => $page,
                'eventos' => $eventos,
                'mensajes' => $messages,
                'next' => $pagination->next,
                'prev' => $pagination->prev,
                'totalPages' => $pagination->total_pages
            ]);
        } else return $response->withHeader('Location', '/admin/login');
    }

    public function talleres(Request $request, Response $response, array $args)
    {
        if ($_SESSION['user']) {
            $page = $request->getParam('page');
            if (!$page) $page = 1;

            $total_rows = Taller::count();
            $pagination = new PaginationHelper($page, $total_rows);

            $talleres = Taller::orderBy('id', 'desc')
                ->take($pagination->n_per_page)
                ->skip($pagination->offset)
                ->get();

            $messages = $this->container->flash->getMessages();

            return $this->container->view->render($response, 'admin-talleres.twig', [
                'page' => $page,
                'mensajes' => $messages,
                'talleres' => $talleres,
                'next' => $pagination->next,
                'prev' => $pagination->prev,
                'totalPages' => $pagination->total_pages
            ]);
        } else return $response->withHeader('Location', '/admin/login');
    }

    public function testimonios(Request $request, Response $response, array $args)
    {
        if ($_SESSION['user']) {
            $page = $request->getParam('page');
            if (!$page) $page = 1;

            $total_rows = Testimonio::count();
            $pagination = new PaginationHelper($page, $total_rows);

            $testimonios = Testimonio::orderBy('id', 'desc')
                ->take($pagination->n_per_page)
                ->skip($pagination->offset)
                ->get();

            $messages = $this->container->flash->getMessages();

            return $this->container->view->render($response, 'admin-testimonios.twig', [
                'page' => $page,
                'mensajes' => $messages,
                'next' => $pagination->next,
                'prev' => $pagination->prev,
                'testimonios' => $testimonios,
                'totalPages' => $pagination->total_pages
            ]);
        } else return $response->withHeader('Location', '/admin/login');
    }

    public function servicios(Request $request, Response $response, array $args)
    {
        if ($_SESSION['user']) {
            $page = $request->getParam('page');
            if (!$page) $page = 1;

            $total_rows = Servicio::count();
            $pagination = new PaginationHelper($page, $total_rows);

            $servicios = Servicio::orderBy('id', 'desc')
                ->take($pagination->n_per_page)
                ->skip($pagination->offset)
                ->get();

            $messages = $this->container->flash->getMessages();

            return $this->container->view->render($response, 'admin-servicios.twig', [
                'page' => $page,
                'mensajes' => $messages,
                'servicios' => $servicios,
                'next' => $pagination->next,
                'prev' => $pagination->prev,
                'totalPages' => $pagination->total_pages
            ]);
        } else return $response->withHeader('Location', '/admin/login');
    }

    public function transparencia(Request $request, Response $response, array $args)
    {
        if ($_SESSION['user']) {
            $actual_year = date("Y");
            $ingresos = Ingreso::join('vr_tipo_donador', 'vr_ingresos.tipo_donador', '=', 'vr_tipo_donador.id')
                ->whereYear('vr_ingresos.created_at', '=', $actual_year)
                ->orderBy('vr_ingresos.created_at', 'desc')->take(10)->get();

            $years_list = Ingreso::select(DB::raw('YEAR(created_at) as year'))
                ->distinct()
                ->orderBy('year', 'desc')
                ->get();

            $tipos_donadores = TipoDonador::all();
            var_dump($years_list);

            $messages = $this->container->flash->getMessages();

            return $this->container->view->render($response, 'admin-transparencia.twig', [
                'tipo_donadores' => $tipos_donadores,
                'lista_años' => $years_list,
                'mensajes' => $messages,
                'ingresos' => $ingresos,
            ]);
        } else return $response->withHeader('Location', '/admin/login');
    }

    public function blog(Request $request, Response $response, array $args)
    {
        if ($_SESSION['user']) {
            $page = $request->getParam('page');
            if (!$page) $page = 1;

            $total_rows = Blog::count();
            $pagination = new PaginationHelper($page, $total_rows);

            $blogs = Blog::orderBy('id', 'desc')
                ->take($pagination->n_per_page)
                ->skip($pagination->offset)
                ->get();

            $messages = $this->container->flash->getMessages();

            return $this->container->view->render($response, 'admin-blog.twig', [
                'page' => $page,
                'blogs' => $blogs,
                'mensajes' => $messages,
                'next' => $pagination->next,
                'prev' => $pagination->prev,
                'totalPages' => $pagination->total_pages
            ]);
        } else return $response->withHeader('Location', '/admin/login');
    }

    public function blogContent(Request $request, Response $response, array $args)
    {
        if ($_SESSION['user']) {
            $blogId = $request->getParam('id');
            $messages = $this->container->flash->getMessages();

            if (!$blogId || $blogId < 0) return $response->withHeader('Location', '/admin/blog');

            $blog = Blog::find($blogId);

            return $this->container->view->render($response, 'admin-blogContent.twig', [
                'blog' => $blog,
                'mensajes' => $messages
            ]);
        } else return $response->withHeader('Location', '/admin/login');
    }

    public function login(Request $request, Response $response, array $args)
    {
        $messages = $this->container->flash->getMessages();

        return $this->container->view->render($response, 'admin-login.twig', [
            'mensajes' => $messages
        ]);
    }
}
