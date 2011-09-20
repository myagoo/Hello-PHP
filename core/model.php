<?php
class model{
	public $db = 'default';
	public $table;
	public $key;
	public $id;
	static $connections = array();

	/**
	*
	*
	**/
	public function __construct(){
		$query = 'DESCRIBE '.$this->table;
		$results = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_assoc($results)){
			$fieldName = $row['Field'];
			unset($row['Field']);
			$this->fields[$fieldName] = $row;
		}
		debug($this->fields);
	}

	public function read($fields=null){
		if(empty($fields)){
			$fields='*';
		}
		$query='SELECT '.$fields.' FROM '.$this->table.' WHERE '.$this->key.' = "'.$this->id.'"';
		$result = mysql_query($query) or die(mysql_error());
		$data = mysql_fetch_assoc($result);
		foreach($data as $key=>$value){
			$this->$key = $value;
		}
	}

	public function save($data,$html=false){
		//Si l'id est rempli, il s'agit d'un UPDATE
		if(!empty($data[$this->key])){
			$query='UPDATE '.$this->table.' SET ';
			foreach($data as $key=>$value){
				if($key != $this->key){
					$query.= $key.' = "'.mysql_real_escape_string($value).'", ';
				}
			}
			$query=substr($query,0,-2);
			if($this->fields['updated']){
				$query .= ', updated = "'.date('Y-m-d H:i:s').'"';
			}
			$query.=' WHERE '.$this->key.' = '.$data[$this->key];
		//Sinon c'est un insert
		}else{
			unset($data[$this->key]);
			$query='INSERT INTO '.$this->table.' (';
			foreach($data as $key=>$value){
				$query.= $key.', ';
			}
			$query=substr($query,0,-2);
			if($this->fields['updated']){
				$query .= ', created';
			}
			$query.= ') VALUE (';
			foreach($data as $value){
				$query.= '"'.mysql_real_escape_string($value).'", ';
			}
			$query=substr($query,0,-2);
			if($this->fields['created']){
				$query .= ', "'.date('Y-m-d H:i:s').'"';
			}
			$query.=')';
		}
		mysql_query($query) or die(mysql_error());
		if(empty($data[$this->key])){
			$this->id = mysql_insert_id();
		}else{
			$this->id = $data[$this->key];
		}
		return $this->id;
	}
	//Ancienne version
	public function find($options=array()){
		$conditions = '1=1';
		$fields = '*';
		if(!empty($this->fields)){
			$fields = '';
			foreach($this->fields as $fieldName => $informations){
				$fields .= $this->table.'.'.$fieldName.' as '.get_Class($this).'_'.$fieldName.', ';
			}
			$fields=substr($fields,0,-2);
		}
		$limit = '';
		$order = $this->table.'.'.$this->key.' ASC';
		$left_outer = '';
		//
		if(!empty($this->belongsTo)){
			foreach($this->belongsTo as $modelName){
				$model = $this->load($modelName);
				//E.G. : , posts.id as post_id
				$fields .= ', '.$model->table.'.'.$model->key.' as '.$modelName.'_'.$model->key;
				$fields .= ', '.$model->table.'.'.$model->displayField.' as '.$modelName.'_'.$model->displayField;
				$left_outer .= ' LEFT OUTER JOIN '.$model->table.' ON '.$this->table.'.'.$modelName.'_id = '.$model->table.'.id';
			}
		}
		//
		if(!empty($options['conditions'])){
			$conditions = $options['conditions'];
		}
		if(!empty($options['fields'])){
			$fields = $options['fields'];
		}
		if(!empty($options['limit'])){
			$limit = ' LIMIT '.$options['limit'];
		}
		if(!empty($options['order'])){
			$order = $this->table.'.'.$options['order'];
		}
		$query = 'SELECT '.$fields.' FROM '.$this->table.$left_outer.' WHERE '.$conditions.' ORDER BY '.$order.$limit;
		$results=mysql_query($query) or die(mysql_error());
		if(mysql_num_rows($results)){
			$i = 0;
			while($row = mysql_fetch_assoc($results)){
				foreach($row as $fieldName =>$value){
					$pos = strpos($fieldName, '_');
					$prefix = substr($fieldName, 0, $pos);
					$sufix = substr($fieldName, $pos+1, strlen($fieldName));
					if($prefix == get_Class($this)){
						$data[$i][$sufix] = $value;
					}else{
						$data[$i][$prefix][$sufix] = $value;
					}
				}
				$i++;
			}
			return $data;
		}else{
			return false;
		}
	}

	public function delete($id=null){
		if(empty($id)){
			$id= $this->current;
		}
		$query='DELETE FROM '.$this->table.' WHERE '.$this->key.' = "'.$id.'"';
		mysql_query($query) or die(mysql_error());
	}

	static function load($name){
		require_once(ROOT.DS.'models'.DS.$name.'.model.php');
		return new $name();
	}
}
?>

