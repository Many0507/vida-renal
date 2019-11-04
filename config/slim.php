<?php
use App\Controllers\Controller;
use App\Controllers\ViewsController;
use App\Controllers\ApiController;

use Slim\Views\TwigExtension;
use LoveCoding\TwigAsset\TwigAssetManagement;
use Slim\app;

$app = new app([
     'settings' => [
          'displayErrorDetails' => true,
     ],
]);
$container = $app->getContainer();

$container['upload_directory'] = __DIR__ . '/../public/uploads';

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

$container['ViewsController'] = function ($container) {
     return new ViewsController($container);
};
$container['ApiController'] = function ($container) {
     return new ApiController($container);
};
