<?php

class posts extends Controller {

	public $models = array('post', 'category', 'user');
	public $helpers = array('session', 'html');

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
		$this->post->delete($id);
		$this->session->flash('L\'article a bien été suprimmé');
		$this->index();
	}

	public function edit($id = null) {
		if (!empty($this->request->data)) {
			$post = $this->request->data['post'];
			$id = $this->post->save($post);
			$this->session->flash('Votre article a bien été enregistré');
			router::redirect(BASE_URL . '/posts/edit/' . $id);
		}
		$data['categories'] = $this->category->find();
		$data['users'] = $this->user->find(array(
					'conditions' => 'groups.name = "Administrateur"'
				));
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
