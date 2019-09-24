<?php 

/**
 * 
 */
class main_Model extends Model {
	
	function __construct()
	{
		parent::__construct();
	}

	// Consulta la lista de Gestion
	public function getGestion() {

		try {
			$query = $this->db->connect()->prepare("SELECT t3.id, t3.nombre, t3.visitatecnica, t3.idusuario FROM tb03_gestion t3");
			$query->execute();
			$row = $query->fetchAll(PDO::FETCH_ASSOC);
			return $row;
		} catch (Exception $e) {
			return false;
		}
		
	}
	// Consulta la lista de Gestion Cliente
	public function getGestionCliente() {

		try {
			$query = $this->db->connect()->prepare("call spyota(3, 0, 0, '', '', '', 0, 0, '', '', 0)");
			$query->execute();
			$row = $query->fetchAll(PDO::FETCH_ASSOC);
			return $row;
		} catch (Exception $e) {
			return false;
		}
		
	}
	// Agrega a la Gestion Cliente como NO ATENDIDO
	public function reggest ($id) {
		try {
			$query = $this->db->connect()->prepare("call spyota(1, $id, 3, '', '', '', 0, 0, '', '', 0)");
			$query->execute();
			$row = $query->fetchAll(PDO::FETCH_ASSOC);
			return $row;
		} catch (Exception $e) {
			return false;
		}
	}

	public function regaddticket($rdcodid, $rdstrnombre, $rdstrapellido, $rdatrdireccion, $rdtelefono, $rdcb_gestion, $rdproblemaexpusto, $rdsolucionbrindada) {
		try {
			$query = $this->db->connect()->prepare("call spyota(2, $rdcodid, 0, '$rdstrnombre', '$rdstrapellido', '$rdatrdireccion', $rdtelefono, $rdcb_gestion, '$rdproblemaexpusto', '$rdsolucionbrindada', 0)");
			$query->execute();
			$row = $query->fetchAll(PDO::FETCH_ASSOC);
			return $row;
		} catch (Exception $e) {
			return false;
		}
	}


}


?>