<?php
define('DS', DIRECTORY_SEPARATOR);
define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('CORE',ROOT.DS.'core');
define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));
require_once(CORE.DS.'includes.php');
$query='SELECT title FROM posts WHERE title LIKE "%'.htmlspecialchars($_GET["term"],ENT_QUOTES,'UTF-8').'%"';
$results=mysql_query($query);
$i=0;
while($row = mysql_fetch_assoc($results)){
	$datas[$i]=toUtfHtml($row["title"],true);
	$i++;
}
echo json_encode($datas);
?>

