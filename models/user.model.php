<?php
class user extends model{
		public function __construct(){
			$this->table = 'users';
			$this->key = 'id';
			$this->displayField = 'username';
			$this->belongsTo = array('group');
			$this->hasMany = array('post');
			parent::__construct();
		}
}
?>
