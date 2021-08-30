<?php
define('BASEPATH', true);
date_default_timezone_set('America/Mexico_City');
session_start();

require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/config/config.php';

require __DIR__ . '/config/slim.php';

require __DIR__ . '/src/routes/routes.php';

$app->run();