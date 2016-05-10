<?php
include 'data/util/dbconnector/DefaultConnector.php';
include 'data/util/dbconnector/DBConnector.php';
include 'data/login/LoginService.php';
include 'util/SessionUtil.php';
include 'util/Utilities.php';

$MAIN_REDIRECT = "home.php";

// comienza codigo
//destruyo session actual
destroySession();

$user = getPost ( "user" );
$password = getPost ( "password" );

if (isNotNullEmpty ( $user ) && isNotNullEmpty ( $password )) {
	
	$dbHandler = defaultDBConnector ();
	$dbConnector = $dbHandler->getConnection ();
	
	if ($dbConnector != null) {
		$loginService = new LoginService ( $dbConnector );
		$validated = $loginService->validateLogin ( $user, $password );
		if ($validated == true) {
			session_start ();
			$_SESSION ["user"] = $user;
			$_SESSION ["password"] = $password;
			redirect ( $MAIN_REDIRECT, false );
			die ();
		}
	}
}

?>
<html>
<head>
</head>
<body>
	<div class="Login">

		<form action="" method="post">

			<label for="user">Usuario:</label><input type="text" name="user"
				id="user" value="" /> <label for="password">Clave:</label><input
				type="password" name="password" id="password" value=""> <input
				class="submit" type="submit" value="Login" />
		</form>
	</div>
</body>


</html>
