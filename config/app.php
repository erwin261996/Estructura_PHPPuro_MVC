<?php 
	// Controlador Global por si no encuentra los
	// controladores que llamamos
	require_once 'controllers/ciError.php';
	class App
	{
		
		function __construct()
		{
			$url = isset($_GET['url']) ? $_GET['url'] : null;
			$url = rtrim($url, '/');
			$url = explode('/', $url);

			// Si no existe controlador, entonces tomar el Default :: Home
			if (empty($url[0])) {
				$controladores = 'controllers/home.php';
				require_once $controladores;
				$controller = new Home();
				// Especificando la llamada al model
				$controller->loadModel('home');
				$controller->render();
				return false;

			}

			// Composicion del controlador
			$controladores = 'controllers/'. $url[0].'.php';
			// Manejamos la URL con Controladores
			if(file_exists($controladores)) {
				require_once $controladores;

				// inicializar controlador
				$controller = new $url[0];
				// Especificando la llamada al model
				$controller->loadModel($url[0]);
				// Se necesita saber si en el controlador
				// ocuparemos una funcion
				if (isset($url[1])) {
					// Manera de interpretar una funcion / objeto
					// en el ccontrolador
					$controller->{$url[1]}();
				} else {
					$controller->render();
				}
			}else {
				// Si no se enccontro, se muestra Error 404
				$controller = new ciError();
			}
			

		}
	}
?>