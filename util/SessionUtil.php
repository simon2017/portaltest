<?php
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

/**
 * Tries to initiate session, return true if was able and false otherwise
 *
 * @return boolean
 */
function validateSession() {
	if (is_session_started () == false) {
		session_start ();
	}
	
	if (isset ( $_SESSION ["user"] ) == true)
		return true;
	else
		return false;
}
/**
 * Calls session_destroy and then unset all variables from $_Session object.
 *
 * Note method handle session_start if it haven't called yet.
 */
function destroySession() {
	if (is_session_started () == false) {
		session_start ();
	}
	session_destroy ();
	$_SESSION = array ();
}

?>