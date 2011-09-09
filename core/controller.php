<?php
class controller{

	public $vars;
	public $layout;
	
	public function __construct(){
		$this->vars = array();
		$this->layout = 'default';
		if(!empty($this->models)){
			foreach($this->models as $model){
				$this->loadModel($model);
			}
		}
	}
	
	public function render($filename){
		extract($this->vars);
		ob_start();
		require(ROOT.'views/'.get_Class($this).'/'.$filename.'.view.php');
		$content_for_layout = ob_get_clean();
		if($this->layout == false){
			echo $content_for_layout;
		}else{
			require(ROOT.'views/layout/'.$this->layout.'.php');
		}
	}
	
	function set($data = array()){
		$this->vars = array_merge($this->vars, $data);
	}
	
	function loadModel($name){
		require_once(ROOT.'models/'.$name.'.model.php');
		$this->$name = new $name();
	}
}
?>
