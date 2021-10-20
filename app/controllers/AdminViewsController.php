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
            $actual_month = date("m");

            $ingresos = Ingreso::join('vr_tipo_donador', 'vr_ingresos.tipo_donador', '=', 'vr_tipo_donador.id_tipo_donador')
                ->whereYear('vr_ingresos.created_at', '=', $actual_year)
                ->whereMonth('vr_ingresos.created_at', '=', $actual_month)
                ->orderBy('vr_ingresos.created_at', 'desc')->take(10)->get();

            $years_list = Ingreso::select(DB::raw('YEAR(created_at) as year'))
                ->distinct()
                ->orderBy('year', 'desc')
                ->get();

            $sum_tipo_1 = Ingreso::where('tipo_donador', '=', 1)
                ->whereYear('vr_ingresos.created_at', '=', $actual_year)
                ->whereMonth('vr_ingresos.created_at', '=', $actual_month)
                ->sum('cantidad');
            $sum_tipo_2 = Ingreso::where('tipo_donador', '=', 2)
                ->whereYear('vr_ingresos.created_at', '=', $actual_year)
                ->whereMonth('vr_ingresos.created_at', '=', $actual_month)
                ->sum('cantidad');
            $sum_tipo_3 = Ingreso::where('tipo_donador', '=', 3)
                ->whereYear('vr_ingresos.created_at', '=', $actual_year)
                ->whereMonth('vr_ingresos.created_at', '=', $actual_month)
                ->sum('cantidad');
            $sum_tipo_4 = Ingreso::where('tipo_donador', '=', 4)
                ->whereYear('vr_ingresos.created_at', '=', $actual_year)
                ->whereMonth('vr_ingresos.created_at', '=', $actual_month)
                ->sum('especie_cantidad');

            $total = $sum_tipo_1 + $sum_tipo_2 + $sum_tipo_3 + $sum_tipo_4;

            $porcentaje_tipo_1 = round(($sum_tipo_1 * 100) / $total);
            $porcentaje_tipo_2 = round(($sum_tipo_2 * 100) / $total);
            $porcentaje_tipo_3 = round(($sum_tipo_3 * 100) / $total);
            $porcentaje_tipo_4 = round(($sum_tipo_4 * 100) / $total);

            $tipos_donadores = TipoDonador::all();
                
            $messages = $this->container->flash->getMessages();

            return $this->container->view->render($response, 'admin-transparencia.twig', [
                'porcentaje_1' => $porcentaje_tipo_1,
                'porcentaje_2' => $porcentaje_tipo_2,
                'porcentaje_3' => $porcentaje_tipo_3,
                'porcentaje_4' => $porcentaje_tipo_4,
                'tipo_donadores' => $tipos_donadores,
                'lista_años' => $years_list,
                'mensajes' => $messages,
                'ingresos' => $ingresos
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
