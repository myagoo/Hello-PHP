<?php

require (CORE . DS . 'coreController.php');

/**
 * Cette classe sera étendue par l'ensemble de vos controllers, vous pouvez alors y intégrer vos propres communes à tous les controllers
 */
class controller extends coreController {

    public function needLogin() {
	$this->loadHelper('session');
	$user = $this->session->data('user');
	if (empty($user)) {
	    $this->session->flash('Vous devez être authentifié pour effectuer cette action');
	    $this->session->data('from', BASE_URL . $this->request->url);
			router::redirect(BASE_URL . '/users/login');
		}
    }

}

?>