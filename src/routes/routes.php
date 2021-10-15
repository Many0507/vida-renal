<?php
defined('BASEPATH') or exit('No se permite el acceso directo');

// Public Views Routes //
$app->get('/', 'PublicViewsController:index');
$app->get('/quienes-somos', 'PublicViewsController:quienesSomos');
$app->get('/que-hacemos', 'PublicViewsController:queHacemos');
$app->get('/donar', 'PublicViewsController:donar');
$app->get('/transparencia', 'PublicViewsController:transparencia');
$app->get('/testimonios', 'PublicViewsController:testimonios');
$app->get('/conoce', 'PublicViewsController:conoce');
$app->get('/aliados', 'PublicViewsController:aliados');
$app->get('/blog', 'PublicViewsController:blog');
$app->get('/preguntas', 'PublicViewsController:preguntas');
$app->get('/talleres', 'PublicViewsController:talleres');
$app->get('/actividades', 'PublicViewsController:actividades');
$app->get('/eventos', 'PublicViewsController:eventos');
$app->get('/taller-ver/{id}', 'PublicViewsController:tallerVer');
$app->get('/actividad-ver/{id}', 'PublicViewsController:actividadVer');
$app->get('/evento-ver/{id}', 'PublicViewsController:eventoVer');
$app->get('/blog/ver/{id}', 'PublicViewsController:blogVer');

// Admin Views Routes //
$app->get('/admin', 'AdminViewsController:index');
$app->get('/admin/actividades', 'AdminViewsController:actividades');
$app->get('/admin/eventos', 'AdminViewsController:eventos');
$app->get('/admin/talleres', 'AdminViewsController:talleres');
$app->get('/admin/testimonios', 'AdminViewsController:testimonios');
$app->get('/admin/servicios', 'AdminViewsController:servicios');
$app->get('/admin/transparencia', 'AdminViewsController:transparencia');
$app->get('/admin/blog', 'AdminViewsController:blog');
$app->get('/admin/blog-content', 'AdminViewsController:blogContent');
$app->get('/admin/login', 'AdminViewsController:login');

// Static Info Routes //
$app->get('/que-hacen-nuestros-rinones', 'StaticInfoViewsController:queHacenNR');
$app->get('/costo-de-enfermo', 'StaticInfoViewsController:costoEnfermo');
$app->get('/irc', 'StaticInfoViewsController:irc');
$app->get('/causas-principales', 'StaticInfoViewsController:causasPrincipales');
$app->get('/sintomas', 'StaticInfoViewsController:sintomas');
$app->get('/tratamientos', 'StaticInfoViewsController:tratamientos');
$app->get('/trastorno', 'StaticInfoViewsController:trastorno');

// Api Routes //
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

$app->post('/admin/transparencia', 'ApiController:crearIngreso');

$app->post('/admin/verifyUser', 'LoginController:verifyUser');
$app->get('/admin/logoutUser', 'LoginController:logoutUser');

$app->post('/voluntariado/registro', 'ApiController:voluntariado');

// video routes //
$app->post('/video-principal', 'VideoPrincipalController:Agregar');
$app->post('/video-testimonios', 'VideoTestimoniosController:Agregar');



$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
	$handler = $this->notFoundHandler; // handle using the default Slim page not found handler
	return $handler($req, $res);
});
