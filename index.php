<?php
	// session_start();
	
	require_once('config.php');
	require_once(LIB_PATH . 'devtools.php');
	require_once(LIB_PATH . 'autoload.php');

	$router = new core\engine\Router;
	$router->run();