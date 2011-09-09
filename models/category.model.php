<?php
	class category extends Model{

		public function __construct(){
			$this->table = 'categories';
			$this->key = 'id';
			$this->displayField = 'name';
			$this->hasMany = array('post');
			parent::__construct();
		}
	}
?>
