<?php
class users extends Controller{
	
	public $models;
	
	public function __construct(){
		$this->models = array('user', 'group');
		parent::__construct();
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
