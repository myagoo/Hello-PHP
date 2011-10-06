<?php

class posts extends controller {

	public $models = array('post', 'category', 'user');
	public $helpers = array('session', 'html', 'form');

	//Liste les 5 derniers articles
	public function index() {
		$data['posts'] = $this->post->getLast();
		$this->set($data);
	}

	//Récupère un article
	public function view($id) {
		$data['post'] = $this->post->find(array(
			'conditions' => 'posts.id = ' . $id
				));
		$data['post'] = $data['post'][0];
		$data['post']['created'] = date('d/m/Y', strtotime($data['post']['created']));
		$this->set($data);
		$this->render('view');
	}

	//Supprime un article
	public function delete($id) {
		$this->needLogin();
		$this->post->delete($id);
		$this->session->flash('L\'article a bien été suprimmé');
		router::redirect();
	}

	public function edit($id = null) {
		# Cette action ne sera accessible qu'apres authentification
		$this->needLogin();
		# Si des données sont postées
		if (!empty($this->request->data)) {
			$post = $this->request->data['post'];
			$id = $this->post->save($post);
			$this->session->flash('Votre article a bien été enregistré');
			router::redirect(BASE_URL . '/posts/edit/' . $id);
		}
		
		# Used to select the category of the post in the view
		$data['categories'] = $this->category->find();
		if ($data['categories'] !== false) {
			foreach ($data['categories'] as $category){
				$array[$category[$this->category->key]] = $category[$this->category->displayField];
			}
			$data['categories'] = $array;
			unset($array);
		}else{
			$data['categories'] = array();
		}
		
		# Used to select the author of the post in the view
		$data['users'] = $this->user->find();
		if ($data['users'] !== false) {
			foreach ($data['users'] as $user){
				$array[$user[$this->user->key]] = $user[$this->user->displayField];
			}
			$data['users'] = $array;
			unset($array);
		}else{
			$data['users'] = array();
		}
		
		if (!empty($id)) {
			$data['post'] = $this->post->find(array(
				'conditions' => 'posts.id = ' . $id
					));
			$data['post'] = $data['post'][0];
		} else {
			$data['post']['title'] = '';
			$data['post']['body'] = '';
		}
		$this->set($data);
	}

}

?>
