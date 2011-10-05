<?php

class controller {

	private $vars;
 //Variables à faire passer à la vue
	private $rendered = false;
 //Permet de savoir si la vue a déjà été rendu
	public $layout = 'default';
	public $request;

	public function __construct($request = null) {
		$this->vars = array();
		if (isset($request)) {
			$this->request = $request;
		}
		if (!empty($this->models)) {
			$this->loadModel($this->models);
		}
		if (!empty($this->helpers)) {
			$this->loadHelper($this->helpers);
		}
		$this->beforeAll();
	}

	public function beforeAll() {
		$this->loadModel('twitter');
		$this->loadHelper('html');
		$data['twitter']['user'] = $this->twitter->find(array('request' => 'user'));
		$data['twitter']['tweets'] = $this->twitter->find(array('count' => 5));
		foreach ($data['twitter']['tweets'] as &$tweet) {
			$tweet['text'] = preg_replace('@(https?://([-\w\.]+)+(/([\w/_\.]*(\?\S+)?(#\S+)?)?)?)@', '<a href="$1">$1</a>', $tweet['text']);
			$tweet['text'] = preg_replace('/\s+#(\w+)/', ' <a href="http://search.twitter.com/search?q=%23$1">#$1</a>', $tweet['text']);
			$tweet['text'] = preg_replace('/@(\w+)/', '<a href="http://twitter.com/$1">@$1</a>', $tweet['text']);
		}
		$this->set($data);
	}

	public function render($view) {
		if ($this->rendered) {
			return false;
		}
		if (strpos($view, '/') === 0) {
			$view = ROOT . DS . 'views' . $view . '.view.php';
		} else {
			$view = ROOT . DS . 'views' . DS . get_class($this) . DS . $view . '.view.php';
		}
		extract($this->vars);
		ob_start();
		require($view);
		$content_for_layout = ob_get_clean();
		if ($this->layout == false) {
			echo $content_for_layout;
		} else {
			require(ROOT . DS . 'views' . DS . 'layout' . DS . $this->layout . '.php');
		}
		$this->rendered = true;
	}

	public function set($key, $value = null) {
		if (isset($this))
			if (is_array($key)) {
				$this->vars = array_merge($this->vars, $key);
			} else {
				$this->vars[$key] = $value;
			}
	}

	public function loadModel($model) {
		if (is_array($model)) {
			foreach ($model as $m) {
				require_once(ROOT . DS . 'models' . DS . $m . '.model.php');
				if (!isset($this->$m)) {
					$this->$m = new $m();
				}
			}
		} else {
			require_once(ROOT . DS . 'models' . DS . $model . '.model.php');
			if (!isset($this->$model)) {
				$this->$model = new $model();
			}
		}
	}

	public function loadHelper($helper) {
		if (is_array($helper)) {
			foreach ($helper as $h) {
				require_once(ROOT . DS . 'helpers' . DS . $h . '.helper.php');
				if (!isset($this->$h)) {
					$this->$h = new $h();
				}
			}
		} else {
			require_once(ROOT . DS . 'helpers' . DS . $helper . '.helper.php');
			if (!isset($this->$helper)) {
				$this->$helper = new $helper();
			}
		}
	}

	public function loadController($controller) {
		if (is_array($controller)) {
			foreach ($controller as $c) {
				require_once(ROOT . DS . 'controllers' . DS . $c . '.controller.php');
				if (!isset($this->$c)) {
					$this->$c = new $c();
				}
			}
		} else {
			require_once(ROOT . DS . 'controller' . DS . $controller . '.controller.php');
			if (!isset($this->$controller)) {
				$this->$controller = new $controller();
			}
		}
	}

}
?>
