<?php
define('WEBROOT',str_replace('index.php','',$_SERVER['SCRIPT_NAME']));
define('ROOT',str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
require_once(ROOT.'database.php');
require_once(ROOT.'util.php');
require_once(ROOT.'core/model.php');
require_once(ROOT.'core/controller.php');
?>
