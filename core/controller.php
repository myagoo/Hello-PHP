<?php
class controller{

	private $vars; //Variables à faire passer à la vue
	private $rendered = false; //Permet de savoir si la vue a déjà été rendu
	public $layout = 'default';

	protected function __construct(){
		$this->vars = array();
		if(!empty($this->models)){
			$this->loadModel($this->models);
		}
		if(!empty($this->helpers)){
			$this->loadHelper($this->helpers);
		}
	}

	public function render($view){
		if($this->rendered){
			return false;
		}
		if(strpos($view, '/') === 0){
			$view = ROOT.DS.'views'.$view.'.view.php';
		}else{
			$view = ROOT.DS.'views'.DS.get_class($this).DS.$view.'.view.php';
		}
		extract($this->vars);
		ob_start();
		require($view);
		$content_for_layout = ob_get_clean();
		if($this->layout == false){
			echo $content_for_layout;
		}else{
			require(ROOT.DS.'views'.DS.'layout'.DS.$this->layout.'.php');
		}
		$this->rendered = true;
	}

	protected function set($key, $value = null){
		if(is_array($key)){
			$this->vars = array_merge($this->vars, $key);
		}else{
			$this->vars[$key] = $value;
		}
	}

	/**
	* Permet de charger un controller dans une vue
	**/
	public function request($controller, $action){
		if(file_exists(ROOT.DS.'controllers'.DS.$controller.'.controller.php')){
			require_once(ROOT.DS.'controllers'.DS.$controller.'.controller.php');
			if(method_exists($controller, $action)){
				$controller = new $controller();
				return $controller->$action;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	protected function loadModel($model){
		if(is_array($model)){
			foreach($model as $m){
				require_once(ROOT.DS.'models'.DS.$m.'.model.php');
				if (!isset($this->$m)){
					$this->$m = new $m();
				}
			}
		} else {
			require_once(ROOT.DS.'models'.DS.$model.'.model.php');
			if (!isset($this->$model)){
				$this->$model = new $model();
			}
		}
	}

	protected function loadHelper($helper){
		if(is_array($helper)){
			foreach($helper as $h){
				require_once(ROOT.DS.'helpers'.DS.$h.'.helper.php');
				if (!isset($this->$h)){
					$this->$h = new $h();
				}
			}
		} else {
			require_once(ROOT.DS.'models'.DS.$helper.'.model.php');
			if (!isset($this->$helper)){
				$this->$helper = new $helper();
			}
		}
	}
}
?>

