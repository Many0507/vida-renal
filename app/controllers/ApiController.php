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
               if (is_array($filename)) return $filename['error'];

               try {
                    $actividad = new Actividad;
                    $actividad->titulo = $titulo;
                    $actividad->texto = $texto;
                    $actividad->imagen = $filename;
                    $actividad->save();

                    return json_encode($actividad);
               } catch (Exception $e) {
                    return 'error: ' . $e;
               }
          } else return $message;
     }

     public function actualizarActividad (Request $request, Response $response, array $args) {

     }

     public function eliminarActividad (Request $request, Response $response, array $args) {

     }

     public function getFileName($request) {
          $directory = $this->container->get('upload_directory');

          $uploadedFiles = $request->getUploadedFiles();
          $uploadedFile = $uploadedFiles['imagen'];

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
