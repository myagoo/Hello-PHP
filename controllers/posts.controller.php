<?php
class posts extends Controller{

	public $models;

	public function __construct($request){
		$this->models = array('post', 'category');
		parent::__construct($request);
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
		$this->index();
	}

	public function edit($id=null){
		if(isset($_POST['post'])){
			$id = $this->post->save($_POST['post']);
		}
		$data['categories'] = $this->category->find();
		if(!empty($id)){
			$data['post'] = $this->post->find(array(
				'conditions' => 'posts.id = '.$id
			));
			$data['post'] = $data['post'][0];
			$this->set($data);
			$this->render('edit');
		}else{
			$data['post']['title']='';
			$data['post']['body']='';
			$this->set($data);
			$this->render('edit');
		}
	}
}
?>

