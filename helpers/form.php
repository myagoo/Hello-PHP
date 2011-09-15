<?php

class Form{

	private static $instance = NULL;

	// get Singleton instance of Form class
	public static function getInstance(){
		if (self::$instance === NULL){
			self::$instance = new self;
		}
		return self::$instance;
	}

	// render <form> opening tag
	public static function open(array $attributes){
		$html = '<form';
		if (!empty($attributes)){
			foreach ($attributes as $attribute => $value){
				if (in_array($attribute, array('action', 'method', 'id', 'class', 'enctype')) and !empty($value)){
					// assign default value to 'method' attribute
					if ($attribute === 'method' and ($value !== 'post' or $value !== 'get')){
						$value = 'post';
					}
					$html .= ' ' . $attribute . '="' . $value . '"';
				}
			}
		}
		return $html . '>';
	}

	// render <input> tag
	public static function input(array $attributes){
		$html = '<input';
		if (!empty($attributes)){
			foreach ($attributes as $attribute => $value){
				if (in_array($attribute, array('type', 'id', 'class', 'name', 'value')) and !empty($value)){
					$html .= ' ' . $attribute . '="' . $value . '"';
				}
			}
		}
		return $html . '>';
	}

	// render <textarea> tag
	public static function textarea(array $attributes){
		$html = '<textarea';
		$content = '';
		if (!empty($attributes)){
			foreach ($attributes as $attribute => $value){
				if (in_array($attribute, array('rows', 'cols', 'id', 'class', 'name', 'value')) and !empty($value)){
					if ($attribute === 'value'){
						$content = $value;
						continue;
					}
					$html .= ' ' . $attribute . '="' . $value . '"';
				}
			}
		}
		return $html . '>' . $content . '</textarea>';
	}
	public static function select($name,$options,$selected = '',$params = ''){
		$return = '<select name="'.$name.'" id="'.$name.'"';
		if(is_array($params))
		{
		    foreach($params as $key=>$value)
		    {
		        $return.= ' '.$key.'="'.$value.'"';
		    }
		}
		else
		{
		    $return.= $params;
		}
		$return.= '>';
		foreach($options as $key=>$value)
		{
		    $return.='<option value="'.$value.'"'.($selected != $value ? '' : ' selected="selected"').'>'.$key.'</option>';
		}
		return $return.'</select>';
	}

	// render </form> closing tag
	public static function close(){
		return '</form>';
	}
}// End Form class 
