<?php
class posts extends Controller{

	public $models = array('post', 'category');
	public $helpers = array('session');

	public function __construct(){
		parent::__construct();
	}

	//Liste les 5 derniers articles
	public function index(){
		if($data['posts'] = $this->post->getLast()){
			$this->set($data);
			$this->render('index');
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
		$this->set($data);
		$this->render('view');
	}

	//Supprime un article
	public function delete($id){
		$this->post->delete($id);
		$this->session->setFlash('L\'article a bien été suprimmé');
		$this->index();
	}

	public function edit($id = null){
		if(isset($_POST['post'])){
			$id = $this->post->save($_POST['post']);
			$this->session->setFlash('Votre article a bien été enregistré sous l\'id '.$id);
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

