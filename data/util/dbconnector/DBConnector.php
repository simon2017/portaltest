<?php
Class DBConnector{
		
	private $dbUser;
	private $dbPsswd;
	private $dbAlias;
	private $dbHost;
	private $dbPort;
	private $mysqli;
	
	function __construct($dbUser,$dbPsswd,$dbAlias,$dbHost,$dbPort){
		$this->dbAlias=$dbAlias;
		$this->dbUser=$dbUser;
		$this->dbPsswd=$dbPsswd;
		$this->dbHost=$dbHost;
		$this->dbPort=$dbPort;
	}
	
	private function connect(){
		
		$this->mysqli = new \mysqli($this->dbHost, $this->dbUser,$this->dbPsswd, $this->dbAlias);
		
		// ¡Oh, no! Existe un error 'connect_errno', fallando así el intento de conexión
		if ($this->mysqli->connect_errno) {
			echo("Connect failed: ". $this->mysqli->connect_error);
			$this->mysqli= null;
		}
	}
	
	public function getConnection(){
		if($this->mysqli==null){
			$this->connect();
		}
		
		return $this->mysqli;
	}
	
}
?>