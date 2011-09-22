<?php
class controller{

	private $vars; //Variables à faire passer à la vue
	private $rendered = false; //Permet de savoir si la vue a déjà été rendu
	public $layout = 'default';

	public function __construct(){
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

	function set($key, $value = null){
		if(is_array($key)){
			$this->vars = array_merge($this->vars, $key);
		}else{
			$this->vars[$key] = $value;
		}
	}

	function loadModel($name){
		require_once(ROOT.DS.'models'.DS.$name.'.model.php');
		if (!isset($this->$name)){
			$this->$name = new $name();
		}
	}
}
?>

