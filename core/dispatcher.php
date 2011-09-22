<?php

class dispatcher{

	public $request;	//URL appelée par l'utilisateur

	public function __construct(){
		$this->request = new request();
		router::parse($this->request);
		if($controller = $this->loadController()){
			if(!in_array($this->request->action, get_class_methods($controller))){
				$this->error('Le controller '.$this->request->controller.' n\'a pas de méthode '.$this->request->action);
			}
			call_user_func_array(array($controller, $this->request->action), $this->request->params);
			$controller->render($this->request->action);
		}else{
			$this->error('Le controller '.$this->request->controller.' n\'existe pas');
		}
	}

	private function error($flash){
		$controller = new Controller($this->request);
		$controller->set('flash', $flash);
		$controller->render(DS.'errors'.DS.'404');
	}

	private function loadController(){
		$name = strtolower($this->request->controller);
		$file = ROOT.DS.'controllers'.DS.$name.'.controller.php';
		if(file_exists($file)){
			require_once($file);
			return new $name(/*$this->request*/);
		}else{
			return false;
		}
	}

}

?>

