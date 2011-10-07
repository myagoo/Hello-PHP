<?php

require (CORE . DS . 'coreController.php');

/**
 * Cette classe sera étendue par l'ensemble de vos controllers, vous pouvez alors y intégrer vos propres communes à tous les controllers
 */
class controller extends coreController {

	public function __construct($request = null) {
		parent::__construct($request);
		$this->beforeAll();
	}

	/**
	 * Teste si l'utilisateur est connecté.
	 * Si ce n'est pas le cas, il est alors redirigé vers la page de connexion, sinon, la méthode parente reprend le controle
	 */
	public function needLogin() {
		$this->loadHelper('session');
		$user = $this->session->data('user');
		if(empty($user)) {
			$this->session->flash('Vous devez être authentifié pour effectuer cette action');
			$this->session->data('from', BASE_URL . $this->request->url);
			router::redirect(BASE_URL . '/users/login');
		}
	}

	/**
	 * Appelée tout de suite aprè la construction d'un controller, cette méthode offre un comportement commun à tous les controllers
	 */
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

}

?>