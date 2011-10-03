<?php
class posts extends Controller{

	public $models = array('post', 'category');
	public $helpers = array('session', 'html');

	//Liste les 5 derniers articles
	public function index(){
		if($data['posts'] = $this->post->getLast()){
			$this->set($data);
		}else{
			$this->render('nothing');
		}
	}

	//Récupère un article
	public function view($id){
		$data['post'] = $this->post->find(array(
			'conditions' => 'posts.id = '.$id
		));
		$data['post'] = $data['post'][0];
		$data['post']['created'] = date('d/m/Y', strtotime($data['post']['created']));
		$this->set($data);
		$this->render('view');
	}

	//Supprime un article
	public function delete($id){
		$this->post->delete($id);
		$this->session->flash('L\'article a bien été suprimmé');
		$this->index();
	}

	public function edit($id = null){
		if(isset($_POST['post'])){
			$id = $this->post->save($_POST['post']);
			$this->session->flash('Votre article a bien été enregistré');
		}
		$data['categories'] = $this->category->find();
		if(!empty($id)){
			$data['post'] = $this->post->find(array(
				'conditions' => 'posts.id = '.$id
			));
			$data['post'] = $data['post'][0];
		}else{
			$data['post']['title']='';
			$data['post']['body']='';
		}
		$this->set($data);
		$this->render('edit');
	}
}
?>
