<?php
function toUtfHtml($string,$reverse=false){
	if(!$reverse){
		return htmlentities($string,ENT_QUOTES,"UTF-8");
	}else{
		return html_entity_decode($string,ENT_QUOTES,"UTF-8");
	}
}
?>

