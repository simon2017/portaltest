<?php
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

/**
 * Check if input $name exists and return "$_POST[$name]" value, otherwise return null
 * 
 * @param Var $name containing input value        	
 * @return $_POST[$name]|NULL
 */
function getPost($name) {
	if (isset ( $_POST [$name] ))
		return $_POST [$name];
	else
		return null;
}
?>