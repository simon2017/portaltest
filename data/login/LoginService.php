<?php
class LoginService {
	private $connection;
	function __construct(mysqli $connection) {
		$this->connection = $connection;
	}
	
	/**
	 * Valida un usuario en el sistema, retorna true si es valido y false caso contrario.
	 * 
	 * @param String $nickname        	
	 * @param String $password        	
	 * @return boolean
	 */
	function validateLogin($nickname, $password) {
		$usuarioValido = false;
		
		if ($this->connection == null)
			return false;
		
		$consulta = "select id_usuario,nickname,password from usuario where nickname='$nickname' and password='$password'";
		$result = $this->connection->query ( $consulta );
		if($result )
		while ( $obj = $result->fetch_object () ) {
			$rId = $obj->id_usuario;
			$rNick= $obj->nickname;
			$rPssw= $obj->password;
			$usuarioValido = true;
		}
		else printf("Errormessage: %s\n", $this->connection->error);
		$this->connection->close ();
		return $usuarioValido;
	}
}

?>