<?php 

class Home extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function render() {
		$this->view->render('inicio');
	}

	public function login() {

		$opc = array(
			0 => trim(strip_tags($_POST['formUsuario'])), 
			1 => trim(strip_tags($_POST['formPass']))
		);

		$datos = $this->model->VerificandoLogin($opc[0], $opc[1]);
		echo json_encode($datos);
		
	}

}

?>