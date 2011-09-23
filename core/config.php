<?php

class config{


	//Niveau de déboguage (0 = Prod, >1 = Dev)
	static $debug = 1;

	//Instanciation des données de connexion aux base de données
	static $databases = array(
		'default' => array(
			'host' => 'localhost',
			'database' => 'hellophp',
			'user' => 'root',
			'password' => ''
		)
	);

	//Le controller chargé par défaut si PATH_INFO n'est pas défini
	static $default_controller = 'posts';

	//L'action appelée par défaut si PATH_INFO n'est pas défini
	static $default_action = 'index';

}

?>

