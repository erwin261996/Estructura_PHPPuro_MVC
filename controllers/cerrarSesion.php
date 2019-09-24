<?php


	class CerrarSesion extends controller
	{
		
		function __construct()
		{
			parent::__construct();

			  // Eliminamos la sesion
			  session_start();
			  session_destroy();

			  header('location: '.constant('URL'));
		}
	}

?>