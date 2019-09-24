<?php 

/**
 * Manejador de Vistas
 */
class View
{
	
	function __construct() {}

	function render($nombre){
        require 'views/' . $nombre . '.php';
    }



}

?>