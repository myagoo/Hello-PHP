<?php
class post extends model{

	public $table = 'posts';
	public $key = 'id';
	public $displayField = 'title';
	public $belongsTo = array('category', 'user');

	public function getLast($count = 5){
		return $this->find(array(
			'limit' => $count,
			'order' => 'created DESC'
		));
	}
}
?>
