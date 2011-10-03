<?php

class html{

	public function anchor($url, $label, $attributes = array()){
		$html = '<a href="';
		if(preg_match('@^(?:http://)?([^/]+)@i', $url)){
			$html .= $url;
		} else {
			if(substr($url,0,1) == '/'){
				$html .= BASE_URL.$url;
			} else {
				$html .= BASE_URL.'/'.$url;
			}
		}
		$html .= '"';
		if(!empty($attributes)){
			foreach($attributes as $attribute => $value){
				$html .= ' '.$attribute.'="'.$value.'"';
			}
		}
		$html .= '>'.$label.'</a>';
		return $html;
	}

	public function img($url, $attributes = array()){
		$html = '<img src="';
		if(preg_match('@^(?:http://)?([^/]+)@i', $url)){
			$html .= $url;
		} else {
			if(substr($url,0,1) == '/'){
				$html .= BASE_URL.$url;
			} else {
				$html .= BASE_URL.'/'.$url;
			}
		}
		$html .= '"';
		if(!empty($attributes)){
			foreach($attributes as $attribute => $value){
				$html .= ' '.$attribute.'="'.$value.'"';
			}
		}
		$html .= '>';
		return $html;
	}
}

?>
