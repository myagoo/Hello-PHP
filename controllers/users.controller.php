<?php
class users extends Controller{

	public $models = array('user', 'group');
	public $helpers = array('session');

	public function login(){
		if(isset($_POST['user'])){
			$user = $_POST['user'];
			if($this->user->find(array(
				'conditions' => 'users.username = "'.$user['username'].'" AND users.password = "'.sha1($user['password']).'"'
			))){
				$this->session->data('user', time());
				$this->session->flash('Vous êtes maintenant connecté !');
				router::redirect();
			} else {
				$this->session->flash('Le nom d\'utilisateur et/ou le mot de mot de passe saisi est incorrect', 'error');
			}
		}
	}

	public function logout(){
		$this->session->del('user');
		router::redirect();
	}

	public function signup(){
		if(isset($_POST['user'])){
			$data['user'] = $_POST['user'];
			if($data['user']['password'] == $data['user']['confirm']){
				if(!$this->user->find(array(
					'conditions' => 'users.username = "'.$data['user']['username'].'"'
				))){
					unset($data['user']['confirm']);
					$data['user']['password'] = sha1($user['password']);
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

	public function index(){
		if($data['users'] = $this->user->find()){
			$this->set($data);
			$this->render('index');
		}else{
			$this->render('nothing');
		}
	}

	//Récupère un article
	public function view($id){
		$data['user'] = $this->user->find(array(
			'conditions' => 'users.id = '.$id
		));
		$data['user'] = $data['user'][0];
		$this->set($data);
		$this->render('view');
	}

	//Supprime un article
	public function delete($id){
		$this->user->delete($id);
		$this->index();
	}

	public function edit($id=null){
		if(isset($_POST['user'])){
			$id = $this->user->save($_POST['user']);
		}
		$data['groups'] = $this->group->find();
		if(!empty($id)){
			$data['user'] = $this->user->find(array(
				'conditions' => 'users.id = '.$id
			));
			$data['user'] = $data['user'][0];
		}else{
			$data['user']['username']='';
			$data['user']['password']='';
			$data['user']['email']='';
		}
		$this->set($data);
		$this->render('edit');
	}
}
?>

