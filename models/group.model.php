<?php
class group extends model{
		public function __construct(){
			$this->table = 'groups';
			$this->key = 'id';
			$this->displayField = 'name';
			$this->hasMany = array('user');
			parent::__construct();
		}
}
?>
