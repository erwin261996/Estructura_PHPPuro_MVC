<?php 

class Main extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function render() {

		$this->view->render('gestion');

	}

	public function listaGestion() {
		$datos = $this->model->getGestion();
		echo json_encode($datos);
	}

	public function listaGestionCliente() {
		$datos = $this->model->getGestionCliente();
		echo json_encode($datos);
	}

	public function registrarGestion() {

		$opc = array(
			0 => trim(strip_tags($_POST['codgestion']))
		);
		
		$datos = $this->model->reggest($opc[0]);
		echo json_encode($datos);
	}

	public function addtickets() {
			$opc = array(
				0 => trim(strip_tags($_POST['codid'])),
				1 => trim(strip_tags($_POST['strnombre'])),
				2 => trim(strip_tags($_POST['strapellido'])),
				3 => trim(strip_tags($_POST['atrdireccion'])),
				4 => trim(strip_tags($_POST['telefono'])),
				5 => trim(strip_tags($_POST['cb_gestion'])),
				6 => trim(strip_tags($_POST['problemaexpusto'])),
				7 => trim(strip_tags($_POST['solucionbrindada']))
			);

			$datos = $this->model->regaddticket($opc[0],$opc[1],$opc[2],$opc[3],$opc[4],$opc[5],$opc[6],$opc[7]);
			echo json_encode($datos);
	
		
		// $this->render();

	}



}

?>