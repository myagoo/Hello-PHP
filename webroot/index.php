<?php
define('DS', DIRECTORY_SEPARATOR);
define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('CORE',ROOT.DS.'core');
define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));
require_once(CORE.DS.'includes.php');
$dispatcher = new dispatcher();
?>

