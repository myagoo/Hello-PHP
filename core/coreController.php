<?php

class coreController {

	private $vars;
	//Variables à faire passer à la vue
	private $rendered = false;
	//Permet de savoir si la vue a déjà été rendu
	public $layout = 'default';
	public $request;

	public function __construct($request = null) {
		$this->vars = array();
		if(isset($request)) {
			$this->request = $request;
		}
		if(!empty($this->models)) {
			$this->loadModel($this->models);
		}
		if(!empty($this->helpers)) {
			$this->loadHelper($this->helpers);
		}
	}

	/**
	 * Affiche la vue correspondante au controller  à l'écran, renvoie false en cas d'erreur
	 * @param type $view
	 * @return boolean
	 */
	public function render($view) {
		# On ne peut rendre une vue qu'une seule fois
		if($this->rendered) {
			return false;
		}
		if(strpos($view, '/') === 0) {
			$view = ROOT . DS . 'views' . $view . '.view.php';
		} else {
			$view = ROOT . DS . 'views' . DS . get_class($this) . DS . $view . '.view.php';
		}
		extract($this->vars);
		ob_start();
		require($view);
		$content_for_layout = ob_get_clean();
		if($this->layout == false) {
			echo $content_for_layout;
		} else {
			require(ROOT . DS . 'views' . DS . 'layout' . DS . $this->layout . '.php');
		}
		$this->rendered = true;
	}

	/**
	 * Concatène les variables passées en paramêtre avec les variables déjà présentes dans le controller
	 * @param mixed $key
	 * @param mixed $value
	 */
	public function set($key, $value = null) {
		if(isset($this))
			if(is_array($key)) {
				$this->vars = array_merge($this->vars, $key);
			} else {
				$this->vars[$key] = $value;
			}
	}

	/**
	 * Permet de charger un model dans un controller
	 * Cette méthode est appelée à la construction du controller mais peut aussi être appelée de manière ponctuelle
	 * @param mixed $model
	 */
	public function loadModel($model) {
		if(is_array($model)) {
			foreach ($model as $m) {
				require_once(ROOT . DS . 'models' . DS . $m . '.model.php');
				if(!isset($this->$m)) {
					$this->$m = new $m();
				}
			}
		} else {
			require_once(ROOT . DS . 'models' . DS . $model . '.model.php');
			if(!isset($this->$model)) {
				$this->$model = new $model();
			}
		}
	}

	/**
	 * Permet de charger un helper dans un controller
	 * Cette méthode est appelée à la construction du controller mais peut aussi être appelée de manière ponctuelle
	 * @param mixed $helper
	 */
	public function loadHelper($helper) {
		if(is_array($helper)) {
			foreach ($helper as $h) {
				require_once(ROOT . DS . 'helpers' . DS . $h . '.helper.php');
				if(!isset($this->$h)) {
					$this->$h = new $h($this->request);
				}
			}
		} else {
			require_once(ROOT . DS . 'helpers' . DS . $helper . '.helper.php');
			if(!isset($this->$helper)) {
				$this->$helper = new $helper();
			}
		}
	}

}

?>
