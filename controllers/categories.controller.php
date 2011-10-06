<?php
class categories extends basic{

	public $models;

	public function __construct(){
		$this->models = array('category');
		parent::__construct();
	}

	//Liste les 5 derniers articles
	public function index(){

		if($data['categories'] = $this->category->find()){
			$this->set($data);
			$this->render('index');
		}else{
			$this->render('nothing');
		}
	}

	//Récupère un article
	public function view($id){
		$data['category'] = $this->category->find(array(
			'conditions' => 'categories.id = '.$id
		));
		$data['category'] = $data['category'][0];
		$this->set($data);
		$this->render('view');
	}

	//Supprime un article
	public function delete($id){
		$this->category->delete($id);
		$this->index();
	}

	public function edit($id=null){
		if(isset($_POST['category'])){
			$id = $this->category->save($_POST['category']);
		}
		if(!empty($id)){
			$data['category'] = $this->category->find(array(
				'conditions' => 'categories.id = '.$id
			));
			$data['category'] = $data['category'][0];
		}else{
			$data['category']['name']='';
		}
		$this->set($data);
		$this->render('edit');
	}
}
?>
