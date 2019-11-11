<?php
namespace App\Controllers;

use App\Models\Actividad;
use App\Models\Evento;
use App\Models\Taller;
use App\Models\Blog;
use Slim\Http\UploadedFile;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ApiController extends Controller {

     // Actividades //

     public function crearActividad (Request $request, Response $response, array $args) {
          $this->Create($request, 'Actividad', new Actividad);
          return $response->withHeader('Location', '/admin/actividades');
     }

     public function verUnaActividad (Request $request, Response $response, array $args) {
          $target = $this->Read($request, 'Actividad', new Actividad);
          return json_encode($target);
     }

     public function actualizarActividad (Request $request, Response $response, array $args) {
          $this->Update($request, 'Actividad', new Actividad);
          return $response->withHeader('Location', '/admin/actividades');
     }

     public function eliminarActividad (Request $request, Response $response, array $args) {
          $this->Delete($request, 'Actividad', new Actividad);
     }

     // Eventos //

     public function crearEvento (Request $request, Response $response, array $args) {
          $this->Create($request, 'Evento', new Evento);
          return $response->withHeader('Location', '/admin/eventos');
     }

     public function verUnEvento (Request $request, Response $response, array $args) {
          $target = $this->Read($request, 'Evento', new Evento);
          return json_encode($target);
     }

     public function actualizarEvento (Request $request, Response $response, array $args) {
          $this->Update($request, 'Evento', new Evento);
          return $response->withHeader('Location', '/admin/eventos');
     }

     public function eliminarEvento (Request $request, Response $response, array $args) {
          $this->Delete($request, 'Evento', new Evento);
     }

     // Talleres //

     public function crearTaller (Request $request, Response $response, array $args) {
          $this->Create($request, 'Taller', new Taller);
          return $response->withHeader('Location', '/admin/talleres');
     }

     public function verUnTaller (Request $request, Response $response, array $args) {
          $target = $this->Read($request, 'Taller', new Taller);
          return json_encode($target);
     }

     public function actualizarTaller (Request $request, Response $response, array $args) {
          $this->Update($request, 'Taller', new Taller);
          return $response->withHeader('Location', '/admin/talleres');
     }

     public function eliminarTaller (Request $request, Response $response, array $args) {
          $this->Delete($request, 'Taller', new Taller);
     }

     // Blogs //

     public function crearBlog (Request $request, Response $response, array $args) {
          $this->Create($request, 'Blog', new Blog);
          return $response->withHeader('Location', '/admin/blog');
     }

     public function verUnBlog (Request $request, Response $response, array $args) {
          $target = $this->Read($request, 'Blog', new Blog);
          return json_encode($target);
     }

     public function actualizarBlog (Request $request, Response $response, array $args) {
          $this->Update($request, 'Blog', new Blog);
          return $response->withHeader('Location', '/admin/blog');
     }

     public function eliminarBlog (Request $request, Response $response, array $args) {
          $this->Delete($request, 'Blog', new Blog);
     }

     // CRUD //

     public function Create ($request, $section, $model) {
          $titulo = $request->getParam('titulo');
          $texto = $request->getParam('texto');

          $message = empty($titulo) || $titulo === '' || empty($texto) || $texto === '' 
          ? 'favor de llenar todos los campos' 
          : null;

          if (is_null($message)) {
               $filename = $this->getFileName($request);

               if (is_array($filename)) {
                    $this->container->flash->addMessage('error', $filename['error']);
               }
               
               try {
                    $target = $model;
                    $target->titulo = $titulo;
                    $target->texto = $texto;
                    $target->imagen = $filename;
                    $target->save();

                    $this->container->flash->addMessage('done', '!'.$section.' creado con exito!');
               } catch (Exception $e) {
                    $this->container->flash->addMessage('error', 'No se lograron enviar todos los datos, favor de intentarlo más tarde');
               }
          } else {
               $this->container->flash->addMessage('error', $message);
          }
     }

     public function Read ($request, $section, $model) {
          $id = intval($request->getAttribute('id'));

          if ($id > 0) {
               $target = $model::find($id);

               if ($target == null || empty($target)) {
                    $this->container->flash->addMessage('errorNoform', 'El elemento no existe');
               } else {
                    return $target;
               }
          }
          else {
               $this->container->flash->addMessage('errorNoform', 'El elemento no existe');
          }
     }

     public function Update ($request, $section, $model) {
          $titulo = $request->getParam('titulo');
          $texto = $request->getParam('texto');

          $message = empty($titulo) || $titulo === '' || empty($texto) || $texto === '' ? 'favor de llenar todos los campos' : null;

          if (is_null($message)) {
               $filename = $this->getFileName($request);

               if (is_array($filename)) {
                    $this->container->flash->addMessage('error_update', $filename['error']);
               }
               
               $id = intval($request->getAttribute('id'));

               if ($id > 0) {
                    $target = $model::find($id);
                    
                    if ($target == null || empty($target)) {
                         $this->container->flash->addMessage('error_update', 'hay un error');
                    }
                    
                    try {
                         $target->titulo = $titulo;
                         $target->texto = $texto;
                         $target->imagen = $filename;
                         $target->save();
     
                         $this->container->flash->addMessage('done', '!'.$section.' actualizado con exito!');
                    } catch (Exception $e) {
                         $this->container->flash->addMessage('error', 'No se lograron enviar todos los datos, favor de intentarlo más tarde');
                    }                    
               }
          } else {
               $this->container->flash->addMessage('error_update', $message);
          }
     }

     public function Delete ($request, $section, $model) {
          $directory = $this->container->get('upload_directory');
          $id = intval($request->getAttribute('id'));

          if ($id > 0) {
               $target = $model::find($id);

               if ($target == null || empty($target)) {
                    $this->container->flash->addMessage('errorNoform', 'El elemento no existe');
               } else {
                    try {
                         $target->delete();
                         unlink($directory . '/' . $target->imagen);
                         
                         $this->container->flash->addMessage('done', '¡'.$section.' Eliminado!');
                    } catch (Exception $e) {
                         $this->container->flash->addMessage('error', 'No se lograron enviar todos los datos, favor de intentarlo más tarde');
                    }
               }
          }
          else {
               $this->container->flash->addMessage('errorNoform', 'El elemento no existe');
          }
     }

     // Helpers //

     public function getFileName($request) {
          $directory = $this->container->get('upload_directory');

          $uploadedFiles = $request->getUploadedFiles();
          $uploadedFile = $uploadedFiles['imagen'];

          if (strlen($uploadedFile->file) <= 0) {
               return array('error' => 'Favor de agregar una imagen');
          }

          function moveUploadedFile ($directory, UploadedFile $uploadedFile) {
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
