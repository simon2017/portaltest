<?php

function defaultDBConnector() {
	return new DBConnector ( "portal", "portal", "test", "localhost", "3306" );
}

?>