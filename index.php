<?php

require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/config/slim.php';

require __DIR__ . '/src/routes/routes.php';

$app->run();
