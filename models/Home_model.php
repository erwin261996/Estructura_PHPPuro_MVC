<?php 

/**
 * 
 */
class home_Model extends Model {
	
	function __construct()
	{
		parent::__construct();
	}

	public function VerificandoLogin($usuario, $clave) {

		try {
			$query = $this->db->connect()->prepare("CALL splogin(1, '$usuario', MD5('$clave'))");
			$query->execute();
			$row = $query->fetch(PDO::FETCH_ASSOC);


			if ($row['verificado'] == 1) {
				session_start();
				$_SESSION['id']     = $row['id'];
				$_SESSION['nombre'] = $row['nombre'];
				$_SESSION['apellido']  = $row['apellido'];
				$_SESSION['verificado'] = $row['verificado'];
			}

			return $row;

		} catch (Exception $e) {
			return false;
		}
	}

}


?>