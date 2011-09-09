<?php
define('WEBROOT',str_replace('autocomplete.php','',$_SERVER['SCRIPT_NAME']));
define('ROOT',str_replace('autocomplete.php','',$_SERVER['SCRIPT_FILENAME']));
require_once(ROOT.'database.php');
require_once(ROOT.'util.php');
$query='SELECT title FROM posts WHERE title LIKE "%'.htmlspecialchars($_GET["term"],ENT_QUOTES,'UTF-8').'%"';
$results=mysql_query($query);
$i=0;
while($row = mysql_fetch_assoc($results)){
	$datas[$i]=toUtfHtml($row["title"],true);
	$i++;
}
echo json_encode($datas);
?>
