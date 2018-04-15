<?php

require_once dirname(dirname(__FILE__)) . "/include/config.php";

class Db
{
	private $mysqli = null;
	
	function __construct() {
		global $db_config;
		$host = $db_config['db_host'];
		$username = $db_config['db_user'];
		$password = $db_config['db_password'];
		$database = $db_config['db_name'];
		$port = $db_config['db_port'];
		$this->mysqli = new mysqli($host,$username,$password,$database,$port);
		$this->mysqli->set_charset($db_config['db_charset']);
	}
	
	function __destruct() {
		if ($this->mysqli) {
			$this->mysqli->close();
		}
	}

	function query($sql) {
		$result = $this->mysqli->query($sql);
		if (is_object($result)) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		} else {
			return $result;
		}
	}

	function getInsertId() {
		return $this->mysqli->insert_id;
	}

    function begin_transaction() {
		$this->mysqli->begin_transaction();
	}

	function rollback() {
		$this->mysqli->rollback();
	}

	function commit() {
		return $this->mysqli->commit();
	}

	function getAffectedRows() {
		return $this->mysqli->affected_rows;
	}
}
