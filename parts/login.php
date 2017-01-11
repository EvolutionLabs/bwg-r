<?php

if ( ! isset( $_POST['logout'] ) ) {
	$user = isset( $_SESSION['username'] ) ? $_SESSION['username'] : false;
	$pass = isset( $_SESSION['password'] ) ? $_SESSION['password'] : false;
	if ( isset( $_POST['login'] ) && ! empty( $_POST['username'] ) && ! empty( $_POST['password'] ) ) {
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $_POST['password'];
		$_SESSION['code']     = md5( $user . $pass );

		return true;
	}

	if ( $user && $pass ) {
		return isset( $_SESSION['code'] ) && ( $_SESSION['code'] == md5( $user . $pass ) );
	}
} else {
	session_destroy();
}

return false;