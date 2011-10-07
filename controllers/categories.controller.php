<?php

class categories extends controller {

	public $models = array('category');

	public function index() {
		$data['categories'] = $this->category->find();
		$this->set($data);
	}

	//Récupère un article
	public function view($id) {
		$data['category'] = $this->category->find(array(
			'conditions' => 'categories.id = ' . $id
				));
		$data['category'] = $data['category'][0];
		$this->set($data);
	}

	//Supprime un article
	public function delete($id) {
		$this->needLogin();
		$this->category->delete($id);
		$this->session->flash('La catégorie a bien été suprimmé');
		router::redirect();
	}

	public function edit($id=null) {
		$this->needLogin();
		if(!empty($_POST['category'])){
			$id = $this->category->save($_POST['category']);
			if($id !== false){
				$this->session->flash('La catégorie a été correctement créée.');
				router::redirect(BASE_URL.'/categories');
			} else{
				$this->session->flash('Une erreur est survenue lors de la création de la catégorie.', 'error');
			}
		}
		if(!empty($id)) {
			$data['category'] = $this->category->find(array(
				'conditions' => 'categories.id = ' . $id
					));
			# Puisque find renvoie des lignes de résultats, on assigne la premiere
			$data['category'] = $data['category'][0];
		} else {
			$data['category']['name'] = '';
		}
		$this->set($data);
	}

}

?>
