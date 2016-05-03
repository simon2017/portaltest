<?php
Class DBHandler{
	
	private $dbUser;
	private $dbPsswd;
	private $dbAlias;
	private $dbHost;
	private $dbPort;
	
	function __construct($dbUser,$dbPsswd,$dbAlias,$dbHost,$dbPort){
		$this->dbAlias=$dbAlias;
		$this->dbUser=$dbUser;
		$this->dbPsswd=$dbPsswd;
		$this->dbHost=$dbHost;
		$this->dbPort=$dbPort;
	}
	
	function connect(){
		
		$mysqli = new mysqli($this->dbHost, $this->dbUser,$this->dbPsswd, $this->dbAlias);
		
		// ¡Oh, no! Existe un error 'connect_errno', fallando así el intento de conexión
		if ($mysqli->connect_errno) {
			return null;
		}
		else 
			return $mysqli;
	}
	
	
}
?>