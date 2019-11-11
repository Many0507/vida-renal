<?php
namespace App\Controllers;

use App\Models\Actividad;
use Slim\Http\UploadedFile;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ApiController extends Controller {
     // Actividades
     public function crearActividad (Request $request, Response $response, array $args) {
          $titulo = $request->getParam('titulo');
          $texto = $request->getParam('texto');

          $message = empty($titulo) || $titulo === '' || empty($texto) || $texto === '' ? 'favor de llenar todos los campos' : null;

          if (is_null($message)) {
               $filename = $this->getFileName($request);

               if (is_array($filename)) {
                    $this->container->flash->addMessage('error', $filename['error']);
                    return $response->withHeader('Location', '/admin/actividades');
               }
               
               try {
                    $actividad = new Actividad;
                    $actividad->titulo = $titulo;
                    $actividad->texto = $texto;
                    $actividad->imagen = $filename;
                    $actividad->save();

                    $this->container->flash->addMessage('done', '¡Actividad creada con exito!');
                    return $response->withHeader('Location', '/admin/actividades');
               } catch (Exception $e) {
                    $this->container->flash->addMessage('error', 'No se lograron enviar todos los datos, favor de intentarlo más tarde');
                    return $response->withHeader('Location', '/admin/actividades');
               }
          } else {
               $this->container->flash->addMessage('error', $message);
               return $response->withHeader('Location', '/admin/actividades');
          }
     }

     public function actualizarActividad (Request $request, Response $response, array $args) {
          $titulo = $request->getParam('titulo');
          $texto = $request->getParam('texto');

          $message = empty($titulo) || $titulo === '' || empty($texto) || $texto === '' ? 'favor de llenar todos los campos' : null;

          if (is_null($message)) {
               $filename = $this->getFileName($request);

               if (is_array($filename)) {
                    $this->container->flash->addMessage('error_update', $filename['error']);
                    return $response->withHeader('Location', '/admin/actividades');
               }
               
               $id = intval($request->getAttribute('id'));

               if ($id > 0) {
                    $actividad = Actividad::find($id);
                    
                    if ($actividad == null || empty($actividad)) {
                         $this->container->flash->addMessage('error_update', 'hay un error');
                         return $response->withHeader('Location', '/admin/actividades');
                    }
                    
                    try {
                         $actividad->titulo = $titulo;
                         $actividad->texto = $texto;
                         $actividad->imagen = $filename;
                         $actividad->save();
     
                         $this->container->flash->addMessage('done', '¡Actividad Actualizada con exito!');
                         return $response->withHeader('Location', '/admin/actividades');
                    } catch (Exception $e) {
                         $this->container->flash->addMessage('error', 'No se lograron enviar todos los datos, favor de intentarlo más tarde');
                         return $response->withHeader('Location', '/admin/actividades');
                    }                    
               }
          } else {
               $this->container->flash->addMessage('error_update', $message);
               return $response->withHeader('Location', '/admin/actividades');
          }
     }

     public function eliminarActividad (Request $request, Response $response, array $args) {
          $actividad = [];
          $id = intval($request->getAttribute('id'));
          
          if ($id > 0) {
               $actividad = Actividad::find($id);

               if ($actividad == null || empty($actividad)) {
                    $this->container->flash->addMessage('errorNoform', 'La actividad no existe');
                    return 'error';
               } else {
                    try {
                         $actividad->delete();
                         
                         $this->container->flash->addMessage('done', '¡Actividad Eliminada!');
                         return 'done';
                    } catch (Exception $e) {
                         return 'error: ' . $e;
                    }
               }
          }
          else {
               $this->container->flash->addMessage('errorNoform', 'La actividad no existe');
               return 'error';
          }
     }

     public function verUnaActividad (Request $request, Response $response, array $args) {
          $id = intval($request->getAttribute('id'));

          if ($id > 0) {
               $actividad = Actividad::find($id);

               if ($actividad == null || empty($actividad)) {
                    $this->container->flash->addMessage('errorNoform', 'La actividad no existe');
                    return $response->withHeader('Location', '/admin/actividades');
               } else {
                    return json_encode($actividad);
               }
          }
          else {
               $this->container->flash->addMessage('errorNoform', 'La actividad no existe');
               return $response->withHeader('Location', '/admin/actividades');
          }
     }

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
