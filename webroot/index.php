<?php

$start = microtime(true);

define('DS', DIRECTORY_SEPARATOR);
define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('CORE',ROOT.DS.'core');
define('BASE_URL','http://'.$_SERVER['HTTP_HOST'].str_replace('/webroot/index.php','',$_SERVER['SCRIPT_NAME']));
require_once(CORE.DS.'includes.php');
$dispatcher = new dispatcher();

if(config::$debug > 0){
	echo 'Page generated in '.round((microtime(true) - $start), 5).' seconds.';
}
?>

