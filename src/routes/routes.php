<?php

// view routes
$app->get('/', 'ViewsController:index');
$app->get('/quienes-somos', 'ViewsController:quienesSomos');
$app->get('/aliados', 'ViewsController:aliados');
$app->get('/blog', 'ViewsController:blog');
$app->get('/como-apoyarnos', 'ViewsController:comoApoyarnos');
$app->get('/conoce', 'ViewsController:conoce');
$app->get('/donar', 'ViewsController:donar');
$app->get('/preguntas', 'ViewsController:preguntas');
$app->get('/que-hacemos', 'ViewsController:queHacemos');
$app->get('/talleres', 'ViewsController:talleres');
$app->get('/testimonios', 'ViewsController:testimonios');
$app->get('/transparencia', 'ViewsController:transparencia');
$app->get('/actividades', 'ViewsController:actividades');
$app->get('/eventos', 'ViewsController:eventos');
$app->get('/quiero-ayudar', 'ViewsController:Ayudar');

// api routes

// admin routes
$app->get('/admin', 'ViewsController:admin');

