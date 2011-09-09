<?php
class post extends model{
		public function __construct(){
			$this->table = 'posts';
			$this->key = 'id';
			$this->displayField = 'title';
			$this->belongsTo = array('category', 'user');
			parent::__construct();
		}
		
		public function getLast($count = 5){
			return $this->find(array(
				'limit' => $count,
				'order' => 'created DESC'
			));
		}
}
?>
