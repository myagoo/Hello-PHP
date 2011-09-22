<?php
$db_data = config::$databases['default'];
if($connection=mysql_connect($db_data['host'],$db_data['user'],$db_data['password'])){
	if(!mysql_select_db($db_data['database'],$connection)){
		echo "Erreur dans la sélection de la base de données";
	}
}
else{
	echo "Impossible de se connecter à MySQL.";
}
?>

