<?php
session_start();
use App\Controllers\ViewsController;
use App\Controllers\ApiController;

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

$container['view'] = function($container) {
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

$app->add(new \App\Middleware\OldDataMiddleware($container));
