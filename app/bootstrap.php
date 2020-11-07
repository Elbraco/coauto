<?php 
	// chargement Config
	require_once 'config/config.php';

	// chargement Helpers
	require_once 'helpers/url_helper.php';
	require_once 'helpers/session_helper.php';
	require_once 'helpers/function_helper.php';
	require_once 'classes/UserSession.class.php';

	// Load Libraries
	// require_once 'libraries/Controller.php';
	// require_once 'libraries/Core.php';
	// require_once 'libraries/Database.php';

	// Autoload Core Libraries
	spl_autoload_register(function($className){
		require_once 'libraries/' . $className . '.php';
	});
 ?>