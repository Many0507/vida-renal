<?php

namespace App\Controllers;

use App\Models\VideoPrincipal;
use Slim\Http\UploadedFile;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class VideoPrincipalController extends Controller
{
    public function Agregar(Request $request, Response $response, array $args)
    {
        $directory = $this->container->get('upload_directory');
        $filename = $this->getFilename($request);
        if (is_array($filename)) {
            $this->container->flash->addMessage('error', $filename['error']);
            return $response->withHeader('Location', '/admin');
        } else {
            try {
                $video = VideoPrincipal::get()->first();
                unlink($directory . '/' . explode('/', $video->video)[3]);
                $video->video = '/public/uploads/' . $filename;
                $video->save();

                $this->container->flash->addMessage('done', 'Video Guardado');
                return $response->withHeader('Location', '/admin');
            } catch (Exception $e) {
                $this->container->flash->addMessage('error', 'No se lograron enviar todos los datos, favor de intentarlo más tarde');
            }
            return $response->withHeader('Location', '/admin');
        }
    }

    // Helper //
    public function getFilename($request)
    {
        $directory = $this->container->get('upload_directory');

        $uploadedFiles = $request->getUploadedFiles();
        $uploadedFile = $uploadedFiles['video'];

        if (strlen($uploadedFile->file) <= 0)
            return array('error' => 'Favor de agregar un video');

        function moveUploadedFile($directory, UploadedFile $uploadedFile)
        {
            $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);

            if ($extension == 'mp4') {
                var_dump('es mp4');
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
