<?php
include 'data/util/dbconnector/DBHandler.php';
include 'data/login/LoginService.php';
function is_session_started() {
	if (php_sapi_name () !== 'cli') {
		if (version_compare ( phpversion (), '5.4.0', '>=' )) {
			return session_status () === PHP_SESSION_ACTIVE ? TRUE : FALSE;
		} else {
			return session_id () === '' ? FALSE : TRUE;
		}
	}
	return FALSE;
}
function isNotNullEmpty($value) {
	if ($value == null)
		return false;
	if ($value == '')
		return false;
	return true;
}
function redirect($url, $permanent = false) {
	if (headers_sent () === false) {
		header ( 'Location: ' . $url, true, ($permanent === true) ? 301 : 302 );
	}
	
	exit ();
}

// comienza codigo

if (is_session_started () == false) {
	try{
	$user = $_POST ["user"];
	$password = $_POST ["password"];
	
	if (isNotNullEmpty ( $user ) && isNotNullEmpty ( $password )) {
		
		$dbHandler = new DBHandler ( "portal", "portal", "test", "localhost", 3306 );
		$dbConnector = $dbHandler->getConnection ();
		
		if ($dbConnector == null)
			echo "Error en conexion";
		else {
			echo "conexion exitosa";
			
			$loginService = new LoginService ( $dbConnector );
			$validated = $loginService->validateLogin ( $user, $password );
			if ($validated == true) {
				session_start ();
				$_SESSION ["user"] = $user;
				$_SESSION ["password"] = $password;
				redirect("home.php",false);
				die();
			}
		}
	}
	}catch(Exception $e){
		
	}
}
?>
<html>
<head>
</head>
<body>
<div class="Login">

<form action="" method="post">

<label for="user">Usuario:</label><input type="text" name="user" id="user" value="" />
<label for="password">Clave:</label><input type="password" name="password" id="password" value="">

<input class="submit" type="submit" value="Login" />
</form>
</div>
</body>


</html>
