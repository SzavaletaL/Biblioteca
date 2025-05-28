$router->addRoute('/autor', 'AutorController@index');
$router->addRoute('/autor/crear', 'AutorController@crearForm');
$router->addRoute('/autor/guardar', 'AutorController@crear');
$router->addRoute('/autor/editar/(\d+)', 'AutorController@editarForm');
$router->addRoute('/autor/actualizar/(\d+)', 'AutorController@editar');
$router->addRoute('/autor/eliminar/(\d+)', 'AutorController@eliminar');