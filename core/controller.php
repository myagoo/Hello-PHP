<?php
class controller{

	private $vars;	//Variables à faire passer à la vue
	public $layout = 'default';
	public $request;	//Instance de request permettant d'obtenir le controller, l'action et les paramètres de l'url
	private $rendered = false;

	public function __construct($request){
		$this->request = $request;
		$this->vars = array();
		if(!empty($this->models)){
			foreach($this->models as $model){
				$this->loadModel($model);
			}
		}
	}

	public function render($view){
		if($this->rendered){
			return false;
		}
		if(strpos($view, '/') === 0){
			$view = ROOT.DS.'views'.$view.'.view.php';
		}else{
			$view = ROOT.DS.'views'.DS.$this->request->controller.DS.$view.'.view.php';
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

	function set($key, $value = null){
		if(is_array($key)){
			$this->vars = array_merge($this->vars, $key);
		}else{
			$this->vars[$key] = $value;
		}
	}

	function loadModel($name){
		require_once(ROOT.DS.'models'.DS.$name.'.model.php');
		$this->$name = new $name();
	}
}
?>

