<?php

class form{

	public $controller;

	public function __construct($controller){
		$this->controller = $controller;
	}

	// render <form> opening tag
	public static function open($options = array()){
		$html = '<form';
		if(!empty($options)){
			foreach($options as $attribute => $value){
				$html .= ' '.$attribute.'="'.$value.'"';
			}
		} else {
			$html .= ' method="POST"';
		}
		$html .= '>'
		return $html;
	}

	// render <input> tag
	public static function input($name, $label, $options = array()){
		$html = '<div class="clearfix">
			<label for="input_'.$name'">'.$label.'</label>
			<div class="input">';
		$attributes = '';
		foreach($options as $key => $value){
			$attributes .= ' '.$key.'="'.$value.'"';
		}
		if(!isset($options['type'])){
			$html .= '<input type="text" id="input_'.$name.'" name="'.$name.'">'
		}
	}

	// render </form> closing tag
	public static function close(){
		return '</form>';
	}
}// End Form class
