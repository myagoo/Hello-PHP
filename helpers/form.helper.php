<?php

class form {

	public $controller;

	public function __construct($controller = null) {
		$this->controller = $controller;
	}

	// render <form> opening tag
	public static function open($options = array()) {
		$legend = '';
		if (isset($options['legend'])) {
			$legend .= '<legend>' . $options['legend'] . '</legend>';
			unset($options['legend']);
		}
		$attributes = '';
		foreach ($options as $k => $v) {
			$attributes .= ' ' . $k . '="' . $v . '"';
		}
		$html = '<form method="POST"' . $attributes . '>';
		$html .= '<fieldset>';
		$html.= $legend;
		return $html;
	}

	// render <input> tag
	public static function input($name, $value, $options = array()) {
		$begin = '<div class="clearfix">';
		# Liste des options qui ne sont pas des attributs de l'input
		if (isset($options['label'])) {
			$begin .= '<label for="input_' . $name . '">' . $options['label'] . '</label>';
			unset($options['label']);
		}
		if (isset($options['type'])) {
			$type = $options['type'];
			unset($options['type']);
		}
		if (isset($options['reset'])) {
			$reset = $options['reset'];
			unset($options['reset']);
		}

		$begin .='<div class="input">';
		$end = '</div></div>';
		$attributes = '';
		foreach ($options as $k => $v) {
			$attributes .= ' ' . $k . '="' . $v . '"';
		}
		if (isset($type)) {
			if ($type == 'textarea') {
				$input = '<textarea id="input_' . $name . '" name="' . $name . '"' . $attributes . '>' . $value . '</textarea>';
			} elseif ($type == 'hidden') {
				$begin = '';
				$input = '<input type="hidden" id="input_' . $name . '" name="' . $name . '" value="' . $value . '"' . $attributes . '>';
				$end = '';
			} elseif ($type == 'submit') {
				$begin = '<div class="actions">';
				$input = '<input type="submit" class="btn primary" id="input_' . $name . '" name="' . $name . '" value="' . $value . '"' . $attributes . '>';
				if (isset($reset)) {
					$input.= ' <button class="btn" type="reset">' . $reset . '</button>';
				}
				$end = '</div>';
			}
		} else {
			$input = '<input type="text" id="input_' . $name . '" name="' . $name . '" value="' . $value . '"' . $attributes . '>';
		}
		$html = $begin . $input . $end;
		return $html;
	}

	public static function select($name, $value, $options, $params) {
		$html = '<div class="clearfix">';
		if (isset($params['label'])) {
			$html .= '<label for="input_' . $name . '">' . $params['label'] . '</label>';
			unset($params['label']);
		}
		$html .='<div class="input">';
		$attributes = '';
		foreach ($params as $k => $v) {
			$attributes .= ' ' . $k . '="' . $v . '"';
		}
		$html .= '<select name="' . $name . '"' . $attributes . '>';
		foreach ($options as $k => $v) {
			$selected = '';
			if ($value == $k) {
				$selected = ' SELECTED';
			}
			$html .= '<option value="' . $k . '"' . $selected . '>' . $v . '</option>';
		}
		$html .= '</select>';
		$html.='</div>';
		$html.='</div>';
		return $html;
	}

	// render </form> closing tag
	public static function close() {
		$html = '</fieldset>';
		$html .= '</form>';
		return $html;
	}

}

// End Form class
