<?php

// view routes //
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
$app->get('/que-hacen-nuestros-rinones', 'ViewsController:queHacenNR');
$app->get('/tu-salud-tus-rinones', 'ViewsController:tuSalud');
$app->get('/irc', 'ViewsController:irc');
$app->get('/causas-principales', 'ViewsController:causasPrincipales');
$app->get('/sintomas', 'ViewsController:sintomas');
$app->get('/tratamientos', 'ViewsController:tratamientos');

// api routes //
$app->get('/admin/actividades/{id}', 'ApiController:verUnaActividad');
$app->post('/admin/actividades', 'ApiController:crearActividad');
$app->patch('/admin/actividades/{id}', 'ApiController:actualizarActividad');
$app->delete('/admin/actividades/{id}', 'ApiController:eliminarActividad');

$app->get('/admin/eventos/{id}', 'ApiController:verUnEvento');
$app->post('/admin/eventos', 'ApiController:crearEvento');
$app->put('/admin/eventos/{id}', 'ApiController:actualizarEvento');
$app->delete('/admin/eventos/{id}', 'ApiController:eliminarEvento');

$app->get('/admin/talleres/{id}', 'ApiController:verUnTaller');
$app->post('/admin/talleres', 'ApiController:crearTaller');
$app->put('/admin/talleres/{id}', 'ApiController:actualizarTaller');
$app->delete('/admin/talleres/{id}', 'ApiController:eliminarTaller');

$app->get('/admin/testimonios/{id}', 'ApiController:verUnTestimonio');
$app->post('/admin/testimonios', 'ApiController:crearTestimonio');
$app->put('/admin/testimonios/{id}', 'ApiController:actualizarTestimonio');
$app->delete('/admin/testimonios/{id}', 'ApiController:eliminarTestimonio');

$app->get('/admin/servicios/{id}', 'ApiController:verUnServicio');
$app->post('/admin/servicios', 'ApiController:crearServicio');
$app->put('/admin/servicios/{id}', 'ApiController:actualizarServicio');
$app->delete('/admin/servicios/{id}', 'ApiController:eliminarServicio');

$app->get('/admin/blog/{id}', 'ApiController:verUnBlog');
$app->post('/admin/blog', 'ApiController:crearBlog');
$app->put('/admin/blog/{id}', 'ApiController:actualizarBlog');
$app->delete('/admin/blog/{id}', 'ApiController:eliminarBlog');

$app->patch('/admin/blog-content/{id}', 'ApiController:crearContenidoBlog');

$app->post('/admin/verifyUser', 'LoginController:verifyUser');
$app->get('/admin/logoutUser', 'LoginController:logoutUser');

// video routes //
$app->post('/video-principal', 'VideoPrincipalController:Agregar');
$app->post('/video-testimonios', 'VideoTestimoniosController:Agregar');

// admin routes //
$app->get('/admin', 'ViewsController:admin');
$app->get('/admin/login', 'ViewsController:adminLogin');
$app->get('/admin/actividades', 'ViewsController:adminActividades');
$app->get('/admin/eventos', 'ViewsController:adminEventos');
$app->get('/admin/talleres', 'ViewsController:adminTalleres');
$app->get('/admin/testimonios', 'ViewsController:adminTestimonios');
$app->get('/admin/servicios', 'ViewsController:adminServicios');
$app->get('/admin/blog', 'ViewsController:adminBlog');
$app->get('/admin/blog-content', 'ViewsController:adminBlogContent');
