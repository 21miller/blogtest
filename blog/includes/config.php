//Rod's Blog Template Config


<?php
ob_start();
session_start();

//database credentials

define('DBHOST','Localhost');
define('DBUSER','rodney');
define('DBPASS','Break1987!');
define('DBNAME','blog');

$db = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
$db_>setAttribute(PDO::ATTR_ERRMOD, PDO::ERRMODE_EXCEPTION);

//set timezone
date_default_timezone_set('America/Los_Angeles')

//Load Classes as Needed

function_autoLoad($class) {
	
	$class = strtoLower($class);
	
	//if call from within assets adjust path
	
	$classpath = 'classes/class.'.$class . '.php';
	if ( file_exist($classpath)) {
		require_once $classpath;
		}
		
	}
	//if call from within admin adjust the path
	
	
	
	
	$user = new User($db);
?>
