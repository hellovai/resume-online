<?php
session_start();

if (!isset($_SESSION['initiated'])) {
	session_regenerate_id(true);
	$_SESSION['initiated'] = true;
}

if(isset($_SESSION['HTTP_USER_AGENT'])) {
	if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT']) . $config['VAR_STRING']) {
		session_unset();
	}
} else {
	$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT'] . $config['VAR_STRING']);
}

if(isset($_SESSION['site_name'])) {
	if($_SESSION['site_name'] != $config['site_name']) {
		session_unset();
	}
} else {
	$_SESSION['site_name'] = $config['site_name'];
}

?>
