<?php
//Informations de connexion à la base de données
$host = 'localhost';
$database = 'base';
$login = 'root';
$password = 'password';
if($connection=mysql_connect($host,$login,$password)){
	if(!mysql_select_db($database,$connection)){
		echo "Erreur dans la sélection de la base de données";
	}
}
else{
	echo "Impossible de se connecter à MySQL.";
}
?>

