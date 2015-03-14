<?php
	require_once 'db_connect';

	$database = new DB_Provider();
	$database -> connect();

	php_info();
?>