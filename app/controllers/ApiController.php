<?php

namespace App\Controllers;

use App\Models\Actividad;
use App\Models\Evento;
use App\Models\Taller;
use App\Models\Blog;
use App\Models\Conferencias;
use App\Models\Egreso;
use App\Models\Gastos_fijos;
use App\Models\Servicio;
use App\Models\Testimonio;
use App\Models\Ingreso;
use App\Models\Insumos;
use App\Models\Laboratorios;
use App\Models\Medicamentos;
use App\Models\Sueldo;
use App\Models\TipoConsulta;
use Exception;
use Slim\Http\UploadedFile;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ApiController extends Controller
{
     // Actividades //
     public function crearActividad(Request $request, Response $response, array $args)
     {
          $this->Create($request, 'Actividad', new Actividad);
          return $response->withHeader('Location', '/admin/actividades');
     }

     public function verUnaActividad(Request $request, Response $response, array $args)
     {
          $target = $this->Read($request, 'Actividad', new Actividad);
          return json_encode($target);
     }

     public function actualizarActividad(Request $request, Response $response, array $args)
     {
          $this->Update($request, 'Actividad', new Actividad);
          return $response->withHeader('Location', '/admin/actividades');
     }

     public function eliminarActividad(Request $request, Response $response, array $args)
     {
          $this->Delete($request, 'Actividad', new Actividad);
     }

     // Eventos //
     public function crearEvento(Request $request, Response $response, array $args)
     {
          $this->Create($request, 'Evento', new Evento);
          return $response->withHeader('Location', '/admin/eventos');
     }

     public function verUnEvento(Request $request, Response $response, array $args)
     {
          $target = $this->Read($request, 'Evento', new Evento);
          return json_encode($target);
     }

     public function actualizarEvento(Request $request, Response $response, array $args)
     {
          $this->Update($request, 'Evento', new Evento);
          return $response->withHeader('Location', '/admin/eventos');
     }

     public function eliminarEvento(Request $request, Response $response, array $args)
     {
          $this->Delete($request, 'Evento', new Evento);
     }

     // Talleres //
     public function crearTaller(Request $request, Response $response, array $args)
     {
          $this->Create($request, 'Taller', new Taller);
          return $response->withHeader('Location', '/admin/talleres');
     }

     public function verUnTaller(Request $request, Response $response, array $args)
     {
          $target = $this->Read($request, 'Taller', new Taller);
          return json_encode($target);
     }

     public function actualizarTaller(Request $request, Response $response, array $args)
     {
          $this->Update($request, 'Taller', new Taller);
          return $response->withHeader('Location', '/admin/talleres');
     }

     public function eliminarTaller(Request $request, Response $response, array $args)
     {
          $this->Delete($request, 'Taller', new Taller);
     }

     // Blogs //
     public function crearBlog(Request $request, Response $response, array $args)
     {
          $this->Create($request, 'Blog', new Blog);
          return $response->withHeader('Location', '/admin/blog');
     }

     public function verUnBlog(Request $request, Response $response, array $args)
     {
          $target = $this->Read($request, 'Blog', new Blog);
          return json_encode($target);
     }

     public function actualizarBlog(Request $request, Response $response, array $args)
     {
          $this->Update($request, 'Blog', new Blog);
          return $response->withHeader('Location', '/admin/blog');
     }

     public function eliminarBlog(Request $request, Response $response, array $args)
     {
          $this->Delete($request, 'Blog', new Blog);
     }

     // Testimonios // 
     public function crearTestimonio(Request $request, Response $response, array $args)
     {
          $this->Create($request, 'Testimonio', new Testimonio);
          return $response->withHeader('Location', '/admin/testimonios');
     }

     public function verUnTestimonio(Request $request, Response $response, array $args)
     {
          $target = $this->Read($request, 'Testimonio', new Testimonio);
          return json_encode($target);
     }

     public function actualizarTestimonio(Request $request, Response $response, array $args)
     {
          $this->Update($request, 'Testimonio', new Testimonio);
          return $response->withHeader('Location', '/admin/testimonios');
     }

     public function eliminarTestimonio(Request $request, Response $response, array $args)
     {
          $this->Delete($request, 'Testimonio', new Testimonio);
     }

     // Servicios //
     public function crearServicio(Request $request, Response $response, array $args)
     {
          $this->Create($request, 'Servicio', new Servicio);
          return $response->withHeader('Location', '/admin/servicios');
     }

     public function verUnServicio(Request $request, Response $response, array $args)
     {
          $target = $this->Read($request, 'Servicio', new Servicio);
          return json_encode($target);
     }

     public function actualizarServicio(Request $request, Response $response, array $args)
     {
          $this->Update($request, 'Servicio', new Servicio);
          return $response->withHeader('Location', '/admin/servicios');
     }

     public function eliminarServicio(Request $request, Response $response, array $args)
     {
          $this->Delete($request, 'Servicio', new Servicio);
     }

     // Transparencia //
     public function crearIngreso(Request $request, Response $response, array $args)
     {
          $nombre = $request->getParam('nombre');
          $tipo_donador = $request->getParam('tipo_donador');
          $cantidad = $request->getParam('cantidad');
          $especie = $request->getParam('especie');
          $especie_cantidad = $request->getParam('monto_especie');

          $message = ((empty($nombre) || $nombre === '') || (empty($tipo_donador) || $tipo_donador === ''))
               ? 'favor de llenar todos los campos requeridos'
               : null;

          if ($tipo_donador == 4) {
               $message = ((empty($especie) || $especie === '') || (empty($especie_cantidad) || $especie_cantidad === ''))
                    ? 'favor de llenar todos los campos requeridos'
                    : null;
          } else {
               $message = ((empty($cantidad) || $cantidad === '') || (empty($cantidad) || $cantidad === ''))
                    ? 'favor de llenar todos los campos requeridos'
                    : null;
          }

          if (is_null($message)) {
               $tryError = 'No se lograron enviar todos los datos, favor de intentarlo más tarde';               
               try {
                    $target = new Ingreso;
                    $target->nombre = $nombre;
                    $target->tipo_donador = $tipo_donador;
                    if ($tipo_donador == 4) {
                         $target->especie = $especie;
                         $target->especie_cantidad = $especie_cantidad;
                    } else $target->cantidad = $cantidad;
                    $target->save();

                    $this->container->flash->addMessage('done', '¡Ingreso agregado con exito!');
               } catch (Exception $e) {
                    $this->container->flash->addMessage('error', $tryError);
               }
          } else $this->container->flash->addMessage('error', $message);

          return $response->withHeader('Location', '/admin/transparencia');
     }

     public function crearEgreso(Request $request, Response $response, array $args)
     {
          $nombre = $request->getParam('nombre_egreso');
          $tipo_consulta = $request->getParam('tipo_consulta_egreso');
          $cantidad_consulta = $request->getParam('cantidad_consulta_egreso');
          $tipo_taller = $request->getParam('tipo_taller_egreso');
          $cantidad_taller = $request->getParam('cantidad_taller_egreso');
          $tipo_insumo = $request->getParam('tipo_insumo_egreso');
          $cantidad_insumo = $request->getParam('cantidad_insumo_egreso');
          $tipo_medicamento = $request->getParam('tipo_medicamento_egreso');
          $cantidad_medicamento = $request->getParam('cantidad_medicamento_egreso');
          $tipo_laboratorio = $request->getParam('tipo_laboratorio_egreso');
          $cantidad_laboratorio = $request->getParam('cantidad_laboratorio_egreso');
          $tipo_conferencia = $request->getParam('tipo_conferencia_egreso');
          $cantidad_conferencia = $request->getParam('cantidad_conferencia_egreso');

          $message = ((empty($nombre) || $nombre === ''))
               ? 'favor de llenar todos los campos requeridos'
               : null;

          if (is_null($message)) {
               $tryError = 'No se lograron enviar todos los datos, favor de intentarlo más tarde';
               try {
                    $target = new Egreso;
                    $target->nombre = $nombre;
                    if (!empty($tipo_consulta) || $tipo_consulta != '') $target->tipo_consulta = $tipo_consulta;
                    if (!empty($cantidad_consulta) || $cantidad_consulta != '') $target->consulta_costo = $cantidad_consulta;
                    if (!empty($tipo_taller) || $tipo_taller != '') $target->taller = $tipo_taller;
                    if (!empty($cantidad_taller) || $cantidad_taller != '') $target->costo_taller = $cantidad_taller;
                    if (!empty($tipo_insumo) || $tipo_insumo != '') $target->insumos = $tipo_insumo;
                    if (!empty($cantidad_insumo) || $cantidad_insumo != '') $target->costo_insumos = $cantidad_insumo;
                    if (!empty($tipo_medicamento) || $tipo_medicamento != '') $target->medicamentos = $tipo_medicamento;
                    if (!empty($cantidad_medicamento) || $cantidad_medicamento != '') $target->costo_medicamentos = $cantidad_medicamento;
                    if (!empty($tipo_laboratorio) || $tipo_laboratorio != '') $target->laboratorios = $tipo_laboratorio;
                    if (!empty($cantidad_laboratorio) || $cantidad_laboratorio != '') $target->costo_laboratorios = $cantidad_laboratorio;
                    if (!empty($tipo_conferencia) || $tipo_conferencia != '') $target->conferencias = $tipo_conferencia;
                    if (!empty($cantidad_conferencia) || $cantidad_conferencia != '') $target->costo_conferencias = $cantidad_conferencia;
                    $target->save();

                    $this->container->flash->addMessage('done', '¡Egreso agregado con exito!');
               } catch (Exception $e) {
                    $this->container->flash->addMessage('error_egreso', $tryError);
               }
          } else $this->container->flash->addMessage('error_egreso', $message);

          return $response->withHeader('Location', '/admin/transparencia');
     }

     public function crearGastoFijo(Request $request, Response $response, array $args)
     {
          $nombre = $request->getParam('titulo');
          $costo = $request->getParam('costo_gasto_fijo');
          $month = $request->getParam('month');
          $year = $request->getParam('year');

          $message = ((empty($nombre) || $nombre === '') || (empty($costo) || $costo === ''))
               ? 'favor de llenar todos los campos requeridos'
               : null;

          if (is_null($message)) {
               $tryError = 'No se lograron enviar todos los datos, favor de intentarlo más tarde';
               try {
                    $target = new Gastos_fijos;
                    $target->titulo = $nombre;
                    $target->costo = $costo;                    
                    $target->save();

                    $this->container->flash->addMessage('done', '¡Gasto fijo agregado con exito!');
               } catch (Exception $e) {
                    $this->container->flash->addMessage('error', $tryError);
               }
          } else $this->container->flash->addMessage('error', $message);

          return $response->withHeader('Location', '/admin/gastos-fijos/' . $month . '/' . $year);
     }

     public function crearSueldo(Request $request, Response $response, array $args)
     {
          $nombre = $request->getParam('titulo');
          $costo = $request->getParam('costo_sueldo');
          $month = $request->getParam('month');
          $year = $request->getParam('year');

          $message = ((empty($nombre) || $nombre === '') || (empty($costo) || $costo === ''))
               ? 'favor de llenar todos los campos requeridos'
               : null;

          if (is_null($message)) {
               $tryError = 'No se lograron enviar todos los datos, favor de intentarlo más tarde';
               try {
                    $target = new Sueldo;
                    $target->titulo = $nombre;
                    $target->costo = $costo;                    
                    $target->save();

                    $this->container->flash->addMessage('done', '¡Sueldo agregado con exito!');
               } catch (Exception $e) {
                    $this->container->flash->addMessage('error', $tryError);
               }
          } else $this->container->flash->addMessage('error', $message);

          return $response->withHeader('Location', '/admin/sueldos/' . $month . '/' . $year);
     }

     public function busquedaIngreso(Request $request, Response $response, array $args)
     {
          $ingreso_anio = $request->getParam('ingreso_anio');
          $ingreso_mes = $request->getParam('ingreso_mes');

          $message = ((empty($ingreso_mes) || $ingreso_mes === '') || (empty($ingreso_anio) || $ingreso_anio === ''))
               ? 'favor de llenar todos los campos requeridos'
               : null;

          if (is_null($message)) {
               $ingresos = Ingreso::join('vr_tipo_donador', 'vr_ingresos.tipo_donador', '=', 'vr_tipo_donador.id_tipo_donador')
                    ->whereYear('vr_ingresos.created_at', '=', $ingreso_anio)
                    ->whereMonth('vr_ingresos.created_at', '=', $ingreso_mes)
                    ->orderBy('vr_ingresos.created_at', 'desc')->take(7)->get();

               $sum_tipo_1 = Ingreso::where('tipo_donador', '=', 1)
                    ->whereYear('vr_ingresos.created_at', '=', $ingreso_anio)
                    ->whereMonth('vr_ingresos.created_at', '=', $ingreso_mes)
                    ->sum('cantidad');
               $sum_tipo_2 = Ingreso::where('tipo_donador', '=', 2)
                    ->whereYear('vr_ingresos.created_at', '=', $ingreso_anio)
                    ->whereMonth('vr_ingresos.created_at', '=', $ingreso_mes)
                    ->sum('cantidad');
               $sum_tipo_3 = Ingreso::where('tipo_donador', '=', 3)
                    ->whereYear('vr_ingresos.created_at', '=', $ingreso_anio)
                    ->whereMonth('vr_ingresos.created_at', '=', $ingreso_mes)
                    ->sum('cantidad');
               $sum_tipo_4 = Ingreso::where('tipo_donador', '=', 4)
                    ->whereYear('vr_ingresos.created_at', '=', $ingreso_anio)
                    ->whereMonth('vr_ingresos.created_at', '=', $ingreso_mes)
                    ->sum('especie_cantidad');

               $total = $sum_tipo_1 + $sum_tipo_2 + $sum_tipo_3 + $sum_tipo_4;

               $porcentaje_tipo_1 = round(($sum_tipo_1 * 100) / ($total > 0 ? $total : 1));
               $porcentaje_tipo_2 = round(($sum_tipo_2 * 100) / ($total > 0 ? $total : 1));
               $porcentaje_tipo_3 = round(($sum_tipo_3 * 100) / ($total > 0 ? $total : 1));
               $porcentaje_tipo_4 = round(($sum_tipo_4 * 100) / ($total > 0 ? $total : 1));

               if (count($ingresos) <= 0) return json_encode(array(
                    'success' => false, 
                    'data' => null, 
                    'message' => $message, 
                    'porcentajes' => null
               ));
               
               return json_encode(array(
                    'success' => true, 
                    'data' => $ingresos, 
                    'message' => $message, 
                    'porcentajes' => array(
                         'tipo_1' => $porcentaje_tipo_1,
                         'tipo_2' => $porcentaje_tipo_2,
                         'tipo_3' => $porcentaje_tipo_3,
                         'tipo_4' => $porcentaje_tipo_4
                    )
               ));
          } else return json_encode(array(
               'success' => false, 
               'data' => null, 
               'message' => $message, 
               'porcentajes' => null
          ));
     }

     public function busquedaEgreso(Request $request, Response $response, array $args)
     {
          $egreso_anio = $request->getParam('egreso_anio');
          $egreso_mes = $request->getParam('egreso_mes');

          $message = ((empty($egreso_mes) || $egreso_mes === '') || (empty($egreso_anio) || $egreso_anio === ''))
               ? 'favor de llenar todos los campos requeridos'
               : null;

          if (is_null($message)) {
               $egresos = Egreso::whereYear('created_at', '=', $egreso_anio)
                    ->whereMonth('created_at', '=', $egreso_mes)
                    ->orderBy('created_at', 'desc')->take(7)->get();

               $sum_consulta = Egreso::whereYear('created_at', '=', $egreso_anio)
                    ->whereMonth('created_at', '=', $egreso_mes)
                    ->sum('consulta_costo');

               $sum_taller = Egreso::whereYear('created_at', '=', $egreso_anio)
                    ->whereMonth('created_at', '=', $egreso_mes)
                    ->sum('costo_taller');

               $sum_insumo = Egreso::whereYear('created_at', '=', $egreso_anio)
                    ->whereMonth('created_at', '=', $egreso_mes)
                    ->sum('costo_insumos');

               $sum_medicamento = Egreso::whereYear('created_at', '=', $egreso_anio)
                    ->whereMonth('created_at', '=', $egreso_mes)
                    ->sum('costo_medicamentos');

               $sum_laboratorios = Egreso::whereYear('created_at', '=', $egreso_anio)
                    ->whereMonth('created_at', '=', $egreso_mes)
                    ->sum('costo_laboratorios');

               $sum_conferencias = Egreso::whereYear('created_at', '=', $egreso_anio)
                    ->whereMonth('created_at', '=', $egreso_mes)
                    ->sum('costo_conferencias');

               $sum_gastos_fijos = Gastos_fijos::whereYear('created_at', '=', $egreso_anio)
                    ->whereMonth('created_at', '=', $egreso_mes)
                    ->sum('costo');

               $sum_sueldos = Sueldo::whereYear('created_at', '=', $egreso_anio)
                    ->whereMonth('created_at', '=', $egreso_mes)
                    ->sum('costo');

               $total = $sum_consulta + $sum_taller + $sum_insumo + $sum_medicamento + $sum_laboratorios + $sum_conferencias + $sum_gastos_fijos + $sum_sueldos;

               $porcentaje_consulta = round(($sum_consulta * 100) / ($total > 0 ? $total : 1));
               $porcentaje_taller = round(($sum_taller * 100) / ($total > 0 ? $total : 1));
               $porcentaje_insumo = round(($sum_insumo * 100) / ($total > 0 ? $total : 1));
               $porcentaje_medicamento = round(($sum_medicamento * 100) / ($total > 0 ? $total : 1));
               $porcentaje_laboratorios = round(($sum_laboratorios * 100) / ($total > 0 ? $total : 1));
               $porcentaje_conferencias = round(($sum_conferencias * 100) / ($total > 0 ? $total : 1));
               $porcentaje_gastos_fijos = round(($sum_gastos_fijos * 100) / ($total > 0 ? $total : 1));
               $porcentaje_sueldos = round(($sum_sueldos * 100) / ($total > 0 ? $total : 1));

               if (count($egresos) <= 0) return json_encode(array(
                    'success' => false, 
                    'data' => null, 
                    'message' => $message, 
                    'porcentajes' => null,
               ));
               
               return json_encode(array(
                    'success' => true, 
                    'data' => $egresos, 
                    'message' => $message,
                    'porcentajes' => array(
                         'porcentaje_consulta' => $porcentaje_consulta,
                         'porcentaje_taller' => $porcentaje_taller,
                         'porcentaje_insumo' => $porcentaje_insumo,
                         'porcentaje_medicamento' => $porcentaje_medicamento,
                         'porcentaje_laboratorios' => $porcentaje_laboratorios,
                         'porcentaje_conferencias' => $porcentaje_conferencias,
                         'porcentaje_gastos_fijos' => $porcentaje_gastos_fijos,
                         'porcentaje_sueldos' => $porcentaje_sueldos
                    ),
                    'sum_gastos_fijos' => $sum_gastos_fijos,
                    'sum_sueldos' => $sum_sueldos
               ));
          } else return json_encode(array(
               'success' => false, 
               'data' => null, 
               'message' => $message, 
               'porcentajes' => null
          ));
     }

     public function tipoEgreso(Request $request, Response $response, array $args)
     {
          $tipo_egreso = $request->getParam('tipo_egreso');
          $nombre = $request->getParam('nombre_tipo_egreso');
          $costo = $request->getParam('costo_tipo_egreso');

          $message = ((empty($tipo_egreso) || $tipo_egreso === '') || (empty($nombre) || $nombre === ''))
               ? 'favor de llenar todos los campos requeridos'
               : null;
          
          if (is_null($message)) {
               $tryError = 'No se lograron enviar todos los datos, favor de intentarlo más tarde';               
               try {
                    $target = null;
                    if ($tipo_egreso == 'consulta') $target = new TipoConsulta;
                    if ($tipo_egreso == 'insumo') $target = new Insumos;
                    if ($tipo_egreso == 'medicamento') $target = new Medicamentos;
                    if ($tipo_egreso == 'laboratorio') $target = new Laboratorios;
                    if ($tipo_egreso == 'conferencia') $target = new Conferencias;
                    if (!is_null($target)) {
                         $target->nombre = $nombre;
                         if (!empty($costo) || $costo != '') $target->costo = $costo;
                         $target->save();

                         $this->container->flash->addMessage('done', '¡Tipo de egreso agregado con exito!');
                    } else $this->container->flash->addMessage('error_tipo_egreso', $tryError);
               } catch (Exception $e) {
                    $this->container->flash->addMessage('error_tipo_egreso', $tryError);
               }
          } else $this->container->flash->addMessage('error_tipo_egreso', $message);
          return $response->withHeader('Location', '/admin/transparencia');
     }

     public function actualizar(Request $request, Response $response, array $args)
     {
          $tipo = $request->getAttribute('tipo');
          $id = intval($request->getAttribute('id'));
          $year = intval($request->getAttribute('year'));
          $month = intval($request->getAttribute('month'));
          
          if ($tipo == 'ingresos') {
               $nombre = $request->getParam('nombre');
               $tipo_donador = $request->getParam('tipo_donador');
               $cantidad = $request->getParam('cantidad');
               $especie = $request->getParam('especie');
               $especie_cantidad = $request->getParam('monto_especie');

               $message = ((empty($nombre) || $nombre === '') || (empty($tipo_donador) || $tipo_donador === ''))
               ? 'favor de llenar todos los campos requeridos'
               : null;

               if ($tipo_donador == 4) {
                    $message = ((empty($especie) || $especie === '') || (empty($especie_cantidad) || $especie_cantidad === ''))
                         ? 'favor de llenar todos los campos requeridos'
                         : null;
               } else {
                    $message = ((empty($cantidad) || $cantidad === '') || (empty($cantidad) || $cantidad === ''))
                         ? 'favor de llenar todos los campos requeridos'
                         : null;
               }
          } else if ($tipo == 'egresos') {
               $nombre = $request->getParam('nombre_egreso');
               $tipo_consulta = $request->getParam('tipo_consulta_egreso');
               $cantidad_consulta = $request->getParam('cantidad_consulta_egreso');
               $tipo_taller = $request->getParam('tipo_taller_egreso');
               $cantidad_taller = $request->getParam('cantidad_taller_egreso');
               $tipo_insumo = $request->getParam('tipo_insumo_egreso');
               $cantidad_insumo = $request->getParam('cantidad_insumo_egreso');
               $tipo_medicamento = $request->getParam('tipo_medicamento_egreso');
               $cantidad_medicamento = $request->getParam('cantidad_medicamento_egreso');
               $tipo_laboratorio = $request->getParam('tipo_laboratorio_egreso');
               $cantidad_laboratorio = $request->getParam('cantidad_laboratorio_egreso');
               $tipo_conferencia = $request->getParam('tipo_conferencia_egreso');
               $cantidad_conferencia = $request->getParam('cantidad_conferencia_egreso');

               $message = ((empty($nombre) || $nombre === ''))
                    ? 'favor de llenar todos los campos requeridos'
                    : null;
          }

          $message_fatal = ((empty($tipo) || $tipo === '') || (empty($id) || $id === 0))
               ? 'Ha ocurrido un error'
               : null;

          if (is_null($message) && is_null($message_fatal)) {
               if ($tipo == 'ingresos') $target = Ingreso::find($id);
               else if ($tipo == 'egresos') $target = Egreso::find($id);
               else return $response->withHeader('Location', '/admin/transparencia');

               if ($target == null || empty($target)) {
                    $this->container->flash->addMessage('error_update', 'hay un error');
               } else {
                    $tryError = 'No se lograron enviar todos los datos, favor de intentarlo más tarde';
                    try {
                         if ($tipo == 'ingresos') {
                              $target->nombre = $nombre;
                              $target->tipo_donador = $tipo_donador;
                              if ($tipo_donador == 4) {
                                   $target->cantidad = 0;
                                   $target->especie = $especie;
                                   $target->especie_cantidad = $especie_cantidad;
                              } else {
                                   $target->cantidad = $cantidad;
                                   $target->especie = '';
                                   $target->especie_cantidad = 0;
                              }
                              $target->save();
                         } else if ($tipo == 'egresos') {
                              $target->nombre = $nombre;
                              if (!empty($tipo_consulta) || $tipo_consulta != '') $target->tipo_consulta = $tipo_consulta;
                              if (!empty($cantidad_consulta) || $cantidad_consulta != '') $target->consulta_costo = $cantidad_consulta;
                              if (!empty($tipo_taller) || $tipo_taller != '') $target->taller = $tipo_taller;
                              if (!empty($cantidad_taller) || $cantidad_taller != '') $target->costo_taller = $cantidad_taller;
                              if (!empty($tipo_insumo) || $tipo_insumo != '') $target->insumos = $tipo_insumo;
                              if (!empty($cantidad_insumo) || $cantidad_insumo != '') $target->costo_insumos = $cantidad_insumo;
                              if (!empty($tipo_medicamento) || $tipo_medicamento != '') $target->medicamentos = $tipo_medicamento;
                              if (!empty($cantidad_medicamento) || $cantidad_medicamento != '') $target->costo_medicamentos = $cantidad_medicamento;
                              if (!empty($tipo_laboratorio) || $tipo_laboratorio != '') $target->laboratorios = $tipo_laboratorio;
                              if (!empty($cantidad_laboratorio) || $cantidad_laboratorio != '') $target->costo_laboratorios = $cantidad_laboratorio;
                              if (!empty($tipo_conferencia) || $tipo_conferencia != '') $target->conferencias = $tipo_conferencia;
                              if (!empty($cantidad_conferencia) || $cantidad_conferencia != '') $target->costo_conferencias = $cantidad_conferencia;
                              $target->save();
                         }
                         $this->container->flash->addMessage('done', '¡actualizado con exito!');
                    } catch(Exception $e) {
                         $this->container->flash->addMessage('error', $tryError);
                    }
               }
          } else {
               if (!is_null($message)) $this->container->flash->addMessage('error', $message);
               else $this->container->flash->addMessage('error', $message_fatal);
          }

          return $response->withHeader('Location', '/admin/actualizar/' . $tipo . '/' . $id . '/' . $month . '/' . $year);
     } 

     // CRUD //
     public function Create($request, $section, $model)
     {
          $titulo = $request->getParam('titulo');
          $texto = $request->getParam('texto');
          $error = null;

          if ($section == 'Blog') {
               $autor = $request->getParam('autor');
               $texto = 'Blog';
               $error = empty($autor) || $autor === '' ? true : false;

               if ($error) $this->container->flash->addMessage('error', 'Favor de llenar todos los campos');
               else $error = null;
          }

          $message = empty($titulo) || $titulo === ''
               ? 'favor de llenar todos los campos'
               : null;

          if ($section != 'Servicio') {
               $message = empty($texto) || $texto === ''
                    ? 'favor de llenar todos los campos'
                    : null;
          }

          if (is_null($message) && is_null($error)) {
               $filename = $this->getFileName($request);

               if (is_array($filename)) {
                    $this->container->flash->addMessage('error', $filename['error']);
               } else {
                    $tryError = 'No se lograron enviar todos los datos, favor de intentarlo más tarde';
                    try {
                         $target = $model;
                         $target->titulo = $titulo;
                         if ($section != 'Servicio') $target->texto = $texto;
                         $target->imagen = $filename;
                         if ($section == 'Blog') $target->autor = $autor;
                         $target->save();

                         $this->container->flash->addMessage('done', '¡' . $section . ' creado con exito!');
                    } catch (Exception $e) {
                         $this->container->flash->addMessage('error', $tryError);
                    }
               }
          } else $this->container->flash->addMessage('error', $message);
     }

     public function Read($request, $section, $model)
     {
          $id = intval($request->getAttribute('id'));

          if ($id > 0) {
               $target = $model::find($id);
               if ($target != null || !empty($target)) return ['success' => true, 'data' => $target];
          }
          return ['success' => false];
     }

     public function Update($request, $section, $model)
     {
          $titulo = $request->getParam('titulo');
          $texto = $request->getParam('texto');
          $error = null;

          if ($section == 'Blog') {
               $autor = $request->getParam('autor');
               $texto = 'Blog';
               $error = empty($autor) || $autor === '' ? true : false;

               if ($error) $this->container->flash->addMessage('error', 'Favor de llenar todos los campos');
               else $error = null;
          }

          $message = empty($titulo) || $titulo === ''
               ? 'favor de llenar todos los campos'
               : null;

          if ($section != 'Servicio') {
               $message = empty($texto) || $texto === ''
                    ? 'favor de llenar todos los campos'
                    : null;
          }

          if (is_null($message) && is_null($error)) {
               $uploadedFile = $request->getUploadedFiles()['imagen'];
               if (strlen($uploadedFile->file) > 0) $filename = $this->getFileName($request);
               else $filename = 'default';

               if (is_array($filename) && $filename['error'])
                    $this->container->flash->addMessage('error_update', $filename['error']);
               else {
                    $id = intval($request->getAttribute('id'));
               
                    if ($id > 0) {
                         $target = $model::find($id);

                         if ($target == null || empty($target))
                              $this->container->flash->addMessage('error_update', 'hay un error');
                         else {
                              try {
                                   $tryError = 'No se lograron enviar todos los datos, favor de intentarlo más tarde';
                                   $directory = $this->container->get('upload_directory');

                                   $target->titulo = $titulo;
                                   if ($section != 'Servicio') $target->texto = $texto;
                                   if ($filename == 'default') $target->imagen = $target->imagen;
                                   if ($section == 'Blog') $target->autor = $autor;
                                   else {
                                        unlink($directory . '/' . $target->imagen);
                                        $target->imagen = $filename;
                                   }
                                   $target->save();

                                   $this->container->flash->addMessage('done', '¡' . $section . ' actualizado con exito!');
                              } catch (Exception $e) {
                                   $this->container->flash->addMessage('error', $tryError);
                              }
                         }
                    } else $this->container->flash->addMessage('error', 'Error al enviar la informacion, favor de intentar mas tarde');
               }
          } else $this->container->flash->addMessage('error_update', $message);
     }

     public function Delete($request, $section, $model)
     {
          $directory = $this->container->get('upload_directory');
          $id = intval($request->getAttribute('id'));

          if ($id > 0) {
               $target = $model::find($id);

               if ($target == null || empty($target))
                    $this->container->flash->addMessage('errorNoform', 'El elemento no existe');
               else {
                    try {
                         $target->delete();
                         unlink($directory . '/' . $target->imagen);

                         $this->container->flash->addMessage('done', '¡' . $section . ' Eliminado!');
                    } catch (Exception $e) {
                         $this->container->flash->addMessage('error', 'No se lograron enviar todos los datos, favor de intentarlo más tarde');
                    }
               }
          } else $this->container->flash->addMessage('errorNoform', 'El elemento no existe');
     }

     // Blog Content //
     public function crearContenidoBlog(Request $request, Response $response, array $args)
     {
          $id = intval($request->getAttribute('id'));
          $texto = $request->getParam('texto');
          $rawTexto = strip_tags($texto);

          if ($id > 0) {
               $message = empty($rawTexto) || $rawTexto === '' || strlen($rawTexto) <= 0
                    ? 'Favor de incluir contenido'
                    : null;

               if (is_null($message)) {
                    $blog = Blog::find($id);

                    if ($blog) {
                         try {
                              $blog->texto = $texto;
                              $blog->texto_corto = substr($rawTexto, 0, 300);
                              $blog->save();

                              return json_encode(['success' => true]);
                         } catch (Exception $e) {
                              return json_encode(['success' => false]);
                         }
                    }
               }
          }
          return json_encode(['success' => false]);
     }

     // Voluntariado Mail //
     public function voluntariado (Request $request, Response $response, array $args)
     {    
          $from = "vidarenal.org";
          $to = "contacto@vidarenal.org";

          $subject = "Solicitud de voluntariado";
          $headers = "From:" . $from . "\r\n";
          $headers .= "MIME-Version: 1.0\r\n";
          $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

          $message = '<html><body>';
          $message .= '<h1 style="color: #85a842;">Solicitud de voluntariado</h1>';
          $message .= '<p><strong style="color: #944689">Nombre: </strong>'. $request->getParam('nombre') .'</p>';
          $message .= '<p><strong style="color: #944689">Edad: </strong>'. $request->getParam('edad') .'</p>';
          $message .= '<p><strong style="color: #944689">Sexo: </strong>'. $request->getParam('sexo') .'</p>';
          $message .= '<p><strong style="color: #944689">Teléfono: </strong>'. $request->getParam('telefono') .'</p>';
          $message .= '<p><strong style="color: #944689">Correo electrónico: </strong>'. $request->getParam('email') .'</p>';
          $message .= '<p><strong style="color: #944689">Red social: </strong>'. $request->getParam('social') .'</p>';
          $message .= '<p><strong style="color: #944689">Mensaje: </strong>'. $request->getParam('mensaje') .'</p>';
          $message .= '</body></html>';

          if (mail($to, $subject, $message, $headers)) return json_encode(['success' => 1]);
          else return json_encode(['success' => 0]);
     }

     // Helpers //
     public function getFileName($request)
     {
          $directory = $this->container->get('upload_directory');

          $uploadedFiles = $request->getUploadedFiles();
          $uploadedFile = $uploadedFiles['imagen'];

          if (strlen($uploadedFile->file) <= 0)
               return array('error' => 'Favor de agregar una imagen');

          function moveUploadedFile($directory, UploadedFile $uploadedFile)
          {
               $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);

               if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
                    $basename = bin2hex(random_bytes(8));
                    $filename = sprintf('%s.%0.8s', $basename, $extension);

                    $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
                    return $filename;
               } else return array('error' => 'Formato invalido: ' . $extension);
          }

          if ($uploadedFile->getSize() > 5000000) return array('error' => 'Tamaño demasiado grande');

          if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
               $filename = moveUploadedFile($directory, $uploadedFile);
               return $filename;
          }
     }
}
