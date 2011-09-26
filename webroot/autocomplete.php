<?php
define('DS', DIRECTORY_SEPARATOR);
define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('CORE',ROOT.DS.'core');
define('BASE_URL','http://'.$_SERVER['HTTP_HOST'].str_replace('/webroot/index.php','',$_SERVER['SCRIPT_NAME']));
require_once(CORE.DS.'includes.php');

//Initialisation d'une connexion à MySQL
model::connect();


header('Content-type: text/html; charset=UTF-8');

$query='SELECT title FROM posts WHERE title LIKE "%'.mysql_real_escape_string($_GET["term"]).'%"';
$results=mysql_query($query);
$i=0;
$datas = array();
while($row = mysql_fetch_assoc($results)){
	$datas[$i]=$row["title"];
	$i++;
}
echo json_encode($datas);
?>

