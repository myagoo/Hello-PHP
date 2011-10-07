<?php

class users extends controller {

	public $models = array('user', 'group');
	public $helpers = array('session');

	public function login() {
		if(!empty($this->request->data['user'])) {
			$user = $this->request->data['user'];
			if($this->user->find(array(
						'conditions' => 'users.username = "' . $user['username'] . '" AND users.password = "' . sha1($user['password']) . '"'
					))) {
				$this->session->data('user', time());
				$this->session->flash('Vous êtes maintenant connecté !');
				$to = $this->session->data('from');
				if(!empty($to)){
					$this->session->del('from');
					router::redirect($to);
				} else {
					router::redirect();
				}
			} else {
				$this->session->flash('Le nom d\'utilisateur et/ou le mot de mot de passe saisi est incorrect', 'error');
			}
		}
	}

	public function logout() {
		$this->session->del('user');
		$this->session->flash('Vous êtes maintenant déconnecté.', 'error');
		router::redirect();
	}

	public function signup() {
		$user = $this->request->data['user'];
		if(!empty($user)) {
			$data['user'] = $this->request->data['user'];
			if($data['user']['password'] == $data['user']['confirm']) {
				if(!$this->user->find(array(
							'conditions' => 'users.username = "' . $data['user']['username'] . '"'
						))) {
					unset($data['user']['confirm']);
					$data['user']['password'] = sha1($data['user']['password']);
					$this->user->save($data['user']);
					$this->session->flash('Vous pouvez maintenant vous connecter.');
					router::redirect();
				}
			} else {
				$this->set($data); # Permet à l'utilisateur de ne pas retaper certaines informations déjà saisies malgré l'erreur
				$this->session->flash('Le mot de passe et le mot de passe de confirmation sont différents', 'error');
			}
		} else {
			$data['user']['username'] = '';
			$data['user']['email'] = '';
			$this->set($data);
		}
	}

	public function index() {
		$data['users'] = $this->user->find();
		$this->set($data);
	}

	//Récupère un article
	public function view($id) {
		$data['user'] = $this->user->find(array(
			'conditions' => 'users.id = ' . $id
				));
		$data['user'] = $data['user'][0];
		$this->set($data);
		$this->render('view');
	}

	//Supprime un article
	public function delete($id) {
		$this->user->delete($id);
		$this->index();
	}

	public function edit($id=null) {
		if(isset($_POST['user'])) {
			$id = $this->user->save($_POST['user']);
		}
		$data['groups'] = $this->group->find();
		if(!empty($id)) {
			$data['user'] = $this->user->find(array(
				'conditions' => 'users.id = ' . $id
					));
			$data['user'] = $data['user'][0];
		} else {
			$data['user']['username'] = '';
			$data['user']['password'] = '';
			$data['user']['email'] = '';
		}
		$this->set($data);
		$this->render('edit');
	}

}
?>

