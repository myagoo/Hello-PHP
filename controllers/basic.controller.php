<?php
require (CORE.DS.'controller.php');

/**
 * Cette classe sera étendue par l'ensemble de vos controllers, vous pouvez alors y intégrer vos propres communes à tous les controllers
 */
class basic extends controller {

	public function needLogin(){
		$user = $this->session->data('user');
		if(empty($user)){
			$this->session->data('from', BASE_URL.$this->request->url);
			router::redirect(BASE_URL.'/users/login');
		}
	}

}
?>