<?php

namespace App\Controllers;

use App\Models\Admin;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoginController extends Controller
{
     // Verify User Login //
     public function verifyUser(Request $request, Response $response, array $args)
     {
          $user = $request->getParam('user');
          $pass = $request->getParam('pass');

          $message = empty($user) || $user === '' || empty($pass) || $pass === ''
               ? 'favor de llenar todos los campos'
               : null;

          if (is_null($message)) {
               $admin = Admin::where('user', $user)->first();

               if ($admin) {
                    if (password_verify($pass, $admin->pass)) {
                         $_SESSION['user'] = $admin->id;
                         return $response->withHeader('Location', '/admin');
                    }
               }
               $this->container->flash->addMessage('error', 'El usuario o la contraseña son incorrectos');
               return $response->withHeader('Location', '/admin/login');
          } else {
               $this->container->flash->addMessage('error', $message);
               return $response->withHeader('Location', '/admin/login');
          }
     }

     // Logout User //
     public function logoutUser(Request $request, Response $response, array $args)
     {
          session_unset();
          session_destroy();
          return $response->withHeader('Location', '/admin/login');
     }
}
