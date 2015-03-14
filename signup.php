<?php
	require_once 'db_connect.php';

	$database = new DB_Provider();
	$database -> connect();

	php_info();
?>