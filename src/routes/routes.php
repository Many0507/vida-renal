<?php

// view routes
$app->get('/', 'ViewsController:index');
$app->get('/quienes-somos', 'ViewsController:quienesSomos');
$app->get('/aliados', 'ViewsController:aliados');
$app->get('/blog', 'ViewsController:blog');
$app->get('/blog/ver/{id}', 'ViewsController:blogVer');
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
$app->post('/admin/actividades', 'ApiController:crearActividad');
$app->put('/admin/actividades/{id}', 'ApiController:actualizarActividad');
$app->delete('/admin/actividades/{id}', 'ApiController:eliminarActividad');

$app->post('/admin/eventos', 'ApiController:crearEvento');
$app->put('/admin/eventos/{id}', 'ApiController:actualizarEvento');
$app->delete('/admin/eventos/{id}', 'ApiController:eliminarEvento');

$app->post('/admin/talleres', 'ApiController:crearTaller');
$app->put('/admin/talleres/{id}', 'ApiController:actualizarTaller');
$app->delete('/admin/talleres/{id}', 'ApiController:eliminarTaller');

$app->post('/admin/blog', 'ApiController:crearBlog');
$app->put('/admin/blog/{id}', 'ApiController:actualizarBlog');
$app->delete('/admin/blog/{id}', 'ApiController:eliminarBlog');

// admin routes
$app->get('/admin', 'ViewsController:admin');
$app->get('/admin/actividades', 'ViewsController:adminActividades');
$app->get('/admin/eventos', 'ViewsController:adminEventos');
$app->get('/admin/talleres', 'ViewsController:adminTalleres');
$app->get('/admin/blog', 'ViewsController:adminBlog');

