<?php

// MySQLDB
class MySQLDB implements I_DAO {
	private $host;
	private $port;
	private $user;
	private $pass;
	private $charset;
	private $dbname;
	private static $instance;

	private $link;
	/**
	 * construtor
	 * @param array $arr
	 *
	 */
	private function __construct($arr) {
		// initialize
		$this->host = isset($arr['host']) ? $arr['host'] : 'localhost';
		$this->port = isset($arr['port']) ? $arr['port'] : '3306';
		$this->user = isset($arr['user']) ? $arr['user'] : 'root';
		$this->pass = isset($arr['pass']) ? $arr['pass'] : 'today12345';
		$this->charset = isset($arr['charset']) ? $arr['charset'] : 'utf8';
		$this->dbname = isset($arr['dbname']) ? $arr['dbname'] : 'blog';

		// connect to database
		$this->my_connect();

		$this->my_charset();

		$this->my_dbname();
	}
	/**
	 * get instance
	 * @param array $arr to construtor
	 */
	public static function getInstance($arr) {
		if(!self::$instance instanceof self) {
			self::$instance = new self($arr);
		}
		return self::$instance;
	}
	/**
	 * connect to database
	 * 
	 */
	private function my_connect() {
		if($link = @ mysql_connect("$this->host:$this->port", $this->user, $this->pass)) {
			// connect successfull
			$this->link = $link;
		}else {
			// connect failed
			echo "Database connect failed！<br />";
			echo "Error code：" , mysql_errno() , '<br />';
			echo "Error msg：" , mysql_error() , '<br />';
			die;
		}
	}
	/**
	 * @param string $sql
	 * @return mixed bool|resource
	 */
	public function my_query($sql) {
		$result = mysql_query($sql);
		if(!$result) {
			echo "SQL execution failed.<br />";
			echo "Error code：" , mysql_errno() , '<br />';
			echo "Error msg：" , mysql_error() , '<br />';
			return false;
		}else {
			return $result;
		}
	}
	/**
	 * return multi row and column query results
	 * @param string $sql
	 * @param mixed false|array
	 *
	 */
	public function fetchAll($sql) {
		if($result = $this->my_query($sql)) {
			$rows = array();
			while($row = mysql_fetch_assoc($result)) {
				$rows[] = $row;
			}
			mysql_free_result($result);
			return $rows;
		}else {
			return false;
		}
	}
	/**
	 * return single row multi column query result
	 * @param string $sql
	 * @param mixed false|array
	 *
	 */
	public function fetchRow($sql) {
		if($result = $this->my_query($sql)) {
			$row = mysql_fetch_assoc($result);
			mysql_free_result($result);
			return $row;
		}else {
			return false;
		}
	}
	/**
	 * return single row single column query result
	 * @param string $sql
	 * @return mixed(false|scalar)
	 *
	 */
	public function fetchColumn($sql) {
		if($result = $this->my_query($sql)) {
			$row = mysql_fetch_row($result);
			mysql_free_result($result);
			return isset($row[0]) ? $row[0] : false;
		}else {
			return false;
		}
	}
	/**
	 * select default charset
	 *
	 */
	private function my_charset() {
		$sql = "set names $this->charset";
		$this->my_query($sql);
	}
	/** 
	 * select default databse
	 *
	 */ 
	private function my_dbname() {
		$sql = "use $this->dbname";
		$this->my_query($sql);
	}
	/**
	 * destructor
	 *
	 */ 
	public function __destruct() {
		@ mysql_close($this->link);
	}
	/**
	 * __sleep
	 *
	 */ 
	public function __sleep() {
		return array('host', 'port', 'user', 'pass', 'charset', 'dbname');
	}
	/**
	 * __wakeup
	 *
	 */ 
	public function __wakeup() {
		$this->my_connect();
		$this->my_charset();
		$this->my_dbname();
	}
	/**
	 * __set()
	 * @param $name
	 * @param $value
	 *
	 */
	public function __set($name, $value) {
		$allow_set = array('host', 'port', 'user', 'pass', 'charset', 'dbname');
		if(in_array($name, $allow_set)) {
			 $this->$name = $value;
		}
	}
	/**
	 * __get()
	 * @param $name
	 *
	 */
	public function __get($name) {
		$allow_get = array('host', 'port', 'charset', 'dbname');
		if(in_array($name, $allow_get)) {
			return $this->$name;
		}else {
			return NULL;
		}
	}
	/**
	 * __unset()
	 * @param $name
	 *
	 */
	public function __unset($name) {
		// unable to delete any variables
	}
	/**
	 * __isset()
	 * @param $name
	 *
	 */
	public function __isset($name) {
		$allow_isset = array('host', 'port', 'user', 'pass', 'charset', 'dbname');
		if(in_array($name, $allow_isset)) {
			return true;
		}else {
			return false;
		}
	}
	/**
	 * __clone()
	 *
	 */
	private function __clone() {
		
	}
}