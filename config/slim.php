<?php
session_start();

use App\Controllers\ViewsController;
use App\Controllers\ApiController;
use App\Controllers\LoginController;
use App\Controllers\VideoPrincipalController;
use App\Controllers\VideoTestimoniosController;
use Slim\Views\TwigExtension;
use LoveCoding\TwigAsset\TwigAssetManagement;
use Slim\App;

$app = new App([
     'settings' => [
          'displayErrorDetails' => true,
     ],
]);
$container = $app->getContainer();

$container['upload_directory'] = __DIR__ . '/../public/uploads';

$container['flash'] = function () {
     return new \Slim\Flash\Messages();
};

$container['view'] = function ($container) {
     $view = new \Slim\Views\Twig(__DIR__ . '/../src/views/', [
          'cache' => false
     ]);
     $view->addExtension(new TwigExtension(
          $container->router,
          $container->request->getUri()
     ));
     $assetManager = new TwigAssetManagement([
          'version' => '1'
     ]);
     $assetManager->addPath('css', '/css');
     $assetManager->addPath('icons', '/icons');
     $assetManager->addPath('js', '/js');
     $assetManager->addPath('video', '/video');
     $assetManager->addPath('img', '/img');
     $view->addExtension($assetManager->getAssetExtension());

     return $view;
};

$container['notFoundHandler'] = function ($container) {
     return function ($request, $response) use ($container) {
          return $container->view->render($response, '404.twig')->withStatus(404);
     };
};

$container['ViewsController'] = function ($container) {
     return new ViewsController($container);
};
$container['ApiController'] = function ($container) {
     return new ApiController($container);
};
$container['LoginController'] = function ($container) {
     return new LoginController($container);
};
$container['VideoPrincipalController'] = function ($container) {
     return new VideoPrincipalController($container);
};
$container['VideoTestimoniosController'] = function ($container) {
     return new VideoTestimoniosController($container);
};

$app->add(new \App\Middleware\OldDataMiddleware($container));
$app->add(function ($req, $res, $next) {
     $response = $next($req, $res);
     return $response
          ->withHeader('Access-Control-Allow-Origin', 'http://vidarenal.org/')
          ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
          ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});
