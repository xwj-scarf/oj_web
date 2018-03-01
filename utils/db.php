<?php

class Db
{
	private $mysqli;
	private $result;

	public function connect($config) {
		$host = $config['db_host'];
		$username = $config['db_user'];
		$password = $config['db_password'];
		$database = $config['db_name'];
		$port = $config['db_port'];
		$this->mysqli = new mysqli($host,$username,$password,$database,$port);
		$this->mysqli->set_charset($config['db_charset']);
	}

	public function select($table,$field=null,$where=null){
		$sql = "select * from {$table}";
		if (!empty($field)) {
			$field = '`' . implode('`,`',$field) . '`';
			$sql = str_replace('*',$field,$sql);
		}
		if (!empty($where)) {
			$sql = $sql . 'where ' . $where;
		}
		$this->result = $this->mysqli->query($sql);
		return $this->result->fetch_all(MYSQLI_ASSOC);
	}
}
