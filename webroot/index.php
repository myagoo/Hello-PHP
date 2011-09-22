<?php

$begin = microtime(true);

define('DS', DIRECTORY_SEPARATOR);
define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('CORE',ROOT.DS.'core');
define('BASE_URL','http://'.$_SERVER['HTTP_HOST'].str_replace(DS.'webroot'.DS.'index.php','',$_SERVER['SCRIPT_NAME']));
require_once(CORE.DS.'includes.php');
$dispatcher = new dispatcher();

if(config::$debug > 0){

	echo '<p>&nbsp;</p>';
	echo '<div style="position:fixed; bottom:0; color:#FFF; background:#900; line-height:30px; height:30px; left:0; right:0; paddind-right:10px;">';
	echo 'Page generated in '.round((microtime(true) - $begin), 5).' seconds.';
	echo '</div>';
}
?>
Z

