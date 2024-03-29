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
use App\Models\Conferencias;
use App\Models\Egreso;
use App\Models\Gastos_fijos;
use App\Models\Insumos;
use App\Models\Laboratorios;
use App\Models\Medicamentos;
use App\Models\Sueldo;
use App\Models\TipoConsulta;
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

            // Ingresos //
            $ingresos = Ingreso::join('vr_tipo_donador', 'vr_ingresos.tipo_donador', '=', 'vr_tipo_donador.id_tipo_donador')
                ->whereYear('vr_ingresos.created_at', '=', $actual_year)
                ->whereMonth('vr_ingresos.created_at', '=', $actual_month)
                ->orderBy('vr_ingresos.created_at', 'desc')->take(7)->get();

            $years_list = Ingreso::select(DB::raw('YEAR(created_at) as year'))
                ->distinct()
                ->orderBy('year', 'desc')
                ->get();

            $years_list_egresos = Egreso::select(DB::raw('YEAR(created_at) as year'))
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

            $porcentaje_tipo_1 = $sum_tipo_1 > 0 ? round(($sum_tipo_1 * 100) / $total) : 0;
            $porcentaje_tipo_2 = $sum_tipo_2 > 0 ? round(($sum_tipo_2 * 100) / $total) : 0;
            $porcentaje_tipo_3 = $sum_tipo_3 > 0 ? round(($sum_tipo_3 * 100) / $total) : 0;
            $porcentaje_tipo_4 = $sum_tipo_4 > 0 ? round(($sum_tipo_4 * 100) / $total) : 0;

            $tipo_laboratorios = Laboratorios::all();
            $tipo_medicamentos = Medicamentos::all();
            $tipo_conferencias = Conferencias::all();
            $tipos_donadores = TipoDonador::all();
            $tipo_consultas = TipoConsulta::all();
            $tipo_talleres = Taller::all();
            $tipo_insumos = Insumos::all();

            $egresos = Egreso::whereYear('created_at', '=', $actual_year)
                ->whereMonth('created_at', '=', $actual_month)
                ->orderBy('created_at', 'desc')->take(7)->get();

            $sum_gastos_fijos = Gastos_fijos::whereYear('created_at', '=', $actual_year)
                ->whereMonth('created_at', '=', $actual_month)
                ->sum('costo');

            $sum_sueldos = Sueldo::whereYear('created_at', '=', $actual_year)
                ->whereMonth('created_at', '=', $actual_month)
                ->sum('costo');
                
            $messages = $this->container->flash->getMessages();

            return $this->container->view->render($response, 'admin-transparencia.twig', [
                'lista_años_egresos' => $years_list_egresos,
                'tipo_laboratorios' => $tipo_laboratorios,
                'tipo_medicamentos' => $tipo_medicamentos,
                'tipo_conferencias' => $tipo_conferencias,
                'sum_gastos_fijos' => $sum_gastos_fijos,
                'porcentaje_1' => $porcentaje_tipo_1,
                'porcentaje_2' => $porcentaje_tipo_2,
                'porcentaje_3' => $porcentaje_tipo_3,
                'porcentaje_4' => $porcentaje_tipo_4,
                'tipo_donadores' => $tipos_donadores,
                'tipo_consultas' => $tipo_consultas,
                'tipo_talleres' => $tipo_talleres,
                'tipo_insumos' => $tipo_insumos,
                'sum_sueldos' => $sum_sueldos,
                'lista_años' => $years_list,
                'mensajes' => $messages,
                'ingresos' => $ingresos,
                'egresos' => $egresos
            ]);
        } else return $response->withHeader('Location', '/admin/login');
    }

    public function ingresos(Request $request, Response $response, array $args)
    {
        if ($_SESSION['user']) {
            $year = intval($request->getAttribute('year'));
            $month = intval($request->getAttribute('month'));

            $page = $request->getParam('page');
            if (!$page) $page = 1;

            $total_rows = Ingreso::join('vr_tipo_donador', 'vr_ingresos.tipo_donador', '=', 'vr_tipo_donador.id_tipo_donador')
                ->whereYear('vr_ingresos.created_at', '=', $year)
                ->whereMonth('vr_ingresos.created_at', '=', $month)
                ->count();
            $pagination = new PaginationHelper($page, $total_rows);

            $sum_ingresos_cantidad = Ingreso::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->sum('cantidad');
            $sum_ingresos_especie = Ingreso::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->sum('especie_cantidad');

            $sum_ingresos = $sum_ingresos_cantidad + $sum_ingresos_especie;
            
            if ($year > 0 && $month > 0) {
                $ingresos = Ingreso::join('vr_tipo_donador', 'vr_ingresos.tipo_donador', '=', 'vr_tipo_donador.id_tipo_donador')
                    ->whereMonth('vr_ingresos.created_at', '=', $month)
                    ->whereYear('vr_ingresos.created_at', '=', $year)
                    ->orderBy('vr_ingresos.created_at', 'desc')
                    ->take($pagination->n_per_page)
                    ->skip($pagination->offset)
                    ->get();
                    
                $messages = $this->container->flash->getMessages();

                return $this->container->view->render($response, 'admin-ingresos.twig', [
                    'page' => $page,
                    'year' => $year,
                    'month' => $month,
                    'messages' => $messages,
                    'ingresos' => $ingresos,
                    'total_rows' => $total_rows,
                    'prev' => $pagination->prev,
                    'next' => $pagination->next,
                    'sum_ingresos' => $sum_ingresos,
                    'totalPages' => $pagination->total_pages
                ]);
            } else return $response->withHeader('Location', '/admin/transparencia');
        } else return $response->withHeader('Location', '/admin/login');
    }

    public function egresos(Request $request, Response $response, array $args)
    {
        if ($_SESSION['user']) {
            $year = intval($request->getAttribute('year'));
            $month = intval($request->getAttribute('month'));

            $page = $request->getParam('page');
            if (!$page) $page = 1;

            $total_rows = Egreso::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->count();
            $pagination = new PaginationHelper($page, $total_rows);

            $sum_egresos_consulta = Egreso::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->sum('consulta_costo');
            $sum_egresos_taller = Egreso::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->sum('costo_taller');
            $sum_egresos_insumo = Egreso::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->sum('costo_insumos');
            $sum_egresos_medicamento = Egreso::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->sum('costo_medicamentos');
            $sum_egresos_laboratorio = Egreso::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->sum('costo_laboratorios');
            $sum_egresos_conferencia = Egreso::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->sum('costo_conferencias');

            $sum_egresos = $sum_egresos_consulta + $sum_egresos_taller + $sum_egresos_insumo + $sum_egresos_medicamento + $sum_egresos_laboratorio + $sum_egresos_conferencia;

            $sum_ingresos_cantidad = Ingreso::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->sum('cantidad');
            $sum_ingresos_especie = Ingreso::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->sum('especie_cantidad');

            $sum_ingresos = $sum_ingresos_cantidad + $sum_ingresos_especie;
            
            if ($year > 0 && $month > 0) {
                $egresos = Egreso::whereYear('created_at', '=', $year)
                    ->whereMonth('created_at', '=', $month)
                    ->orderBy('created_at', 'desc')
                    ->take($pagination->n_per_page)
                    ->skip($pagination->offset)
                    ->get();
                    
                $messages = $this->container->flash->getMessages();

                return $this->container->view->render($response, 'admin-egresos.twig', [
                    'page' => $page,
                    'year' => $year,
                    'month' => $month,
                    'messages' => $messages,
                    'egresos' => $egresos,
                    'total_rows' => $total_rows,
                    'prev' => $pagination->prev,
                    'next' => $pagination->next,
                    'sum_egresos' => $sum_egresos,
                    'sum_ingresos' => $sum_ingresos,
                    'totalPages' => $pagination->total_pages
                ]);
            } else return $response->withHeader('Location', '/admin/transparencia');
        } else return $response->withHeader('Location', '/admin/login');
    }

    public function gastosFijos(Request $request, Response $response, array $args)
    {
        if ($_SESSION['user']) {
            $year = intval($request->getAttribute('year'));
            $month = intval($request->getAttribute('month'));

            $page = $request->getParam('page');
            if (!$page) $page = 1;

            $total_rows = Gastos_fijos::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->count();
            $pagination = new PaginationHelper($page, $total_rows);

            if ($year > 0 && $month > 0) {
                $gastos_fijos = Gastos_fijos::whereYear('created_at', '=', $year)
                    ->whereMonth('created_at', '=', $month)
                    ->orderBy('created_at', 'desc')
                    ->take($pagination->n_per_page)
                    ->skip($pagination->offset)
                    ->get();

                $sum_gastos_fijos = Gastos_fijos::whereYear('created_at', '=', $year)
                    ->whereMonth('created_at', '=', $month)
                    ->sum('costo');
                
                $messages = $this->container->flash->getMessages();

                return $this->container->view->render($response, 'admin-gastos-fijos.twig', [
                    'page' => $page,
                    'year' => $year,
                    'month' => $month,
                    'messages' => $messages,
                    'total_rows' => $total_rows,
                    'prev' => $pagination->prev,
                    'next' => $pagination->next,
                    'gastos_fijos' => $gastos_fijos,
                    'sum_gastos_fijos' => $sum_gastos_fijos,
                    'totalPages' => $pagination->total_pages
                ]);
            } else return $response->withHeader('Location', '/admin/transparencia');
        } else return $response->withHeader('Location', '/admin/login');
    }

    public function sueldos(Request $request, Response $response, array $args)
    {
        if ($_SESSION['user']) {
            $year = intval($request->getAttribute('year'));
            $month = intval($request->getAttribute('month'));

            $page = $request->getParam('page');
            if (!$page) $page = 1;

            $total_rows = Sueldo::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->count();
            $pagination = new PaginationHelper($page, $total_rows);

            if ($year > 0 && $month > 0) {
                $sueldos = Sueldo::whereYear('created_at', '=', $year)
                    ->whereMonth('created_at', '=', $month)
                    ->orderBy('created_at', 'desc')
                    ->take($pagination->n_per_page)
                    ->skip($pagination->offset)
                    ->get();

                $sum_sueldos = Sueldo::whereYear('created_at', '=', $year)
                    ->whereMonth('created_at', '=', $month)
                    ->sum('costo');
                
                $messages = $this->container->flash->getMessages();

                return $this->container->view->render($response, 'admin-sueldos.twig', [
                    'page' => $page,
                    'year' => $year,
                    'month' => $month,
                    'messages' => $messages,
                    'total_rows' => $total_rows,
                    'prev' => $pagination->prev,
                    'next' => $pagination->next,
                    'sueldos' => $sueldos,
                    'sum_sueldos' => $sum_sueldos,
                    'totalPages' => $pagination->total_pages
                ]);
            } else return $response->withHeader('Location', '/admin/transparencia');
        } else return $response->withHeader('Location', '/admin/login');
    }

    public function actualizar(Request $request, Response $response, array $args)
    {
        if ($_SESSION['user']) {
            $tipo = $request->getAttribute('tipo');
            $id = intval($request->getAttribute('id'));
            $year = intval($request->getAttribute('year'));
            $month = intval($request->getAttribute('month'));

            $message = ((empty($tipo) || $tipo === '') || (empty($id) || $id === 0))
               ? 'favor de llenar todos los campos requeridos'
               : null;

            if (is_null($message)) {
                if ($tipo == 'ingresos') $data = Ingreso::find($id);
                else if ($tipo == 'egresos') $data = Egreso::find($id);
                else return $response->withHeader('Location', '/admin/transparencia');

                $tipo_laboratorios = Laboratorios::all();
                $tipo_medicamentos = Medicamentos::all();
                $tipo_conferencias = Conferencias::all();
                $tipo_donadores = TipoDonador::all();
                $tipo_consultas = TipoConsulta::all();
                $tipo_talleres = Taller::all();
                $tipo_insumos = Insumos::all();
                $messages = $this->container->flash->getMessages();
    
                return $this->container->view->render($response, 'admin-actualizar.twig', [
                    'tipo_donadores' => $tipo_donadores,
                    'tipo_laboratorios' => $tipo_laboratorios,
                    'tipo_medicamentos' => $tipo_medicamentos,
                    'tipo_conferencias' => $tipo_conferencias,
                    'tipo_consultas' => $tipo_consultas,
                    'tipo_talleres' => $tipo_talleres,
                    'tipo_insumos' => $tipo_insumos,
                    'mensajes' => $messages,
                    'month' => $month,
                    'year' => $year,
                    'tipo' => $tipo,
                    'data' => $data
                ]);
            } else return $response->withHeader('Location', '/admin/transparencia');
        }  else return $response->withHeader('Location', '/admin/login');
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
