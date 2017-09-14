<?php

/**
 * PDODB
 */

class PDODB implements I_DAO {

	private $host;
	private $port;
	private $user;
	private $pass;
	private $charset;
	private $dbname;
	private $dsn;
	private $pdo;
	private static $instance;
	/**
	 * constructor
	 * @param array $arr
	 *
	 */
	private function __construct($arr) {
		$this->initParams($arr);
		$this->initDSN();
		$this->initPDO();
		$this->initAttribute();
	}
	/**
	 * @param array $arr
	 */
	public static function getInstance($arr) {
		if(!self::$instance instanceof self) {
			self::$instance = new self($arr);
		}
		return self::$instance;
	}
	/**
	 * initialize
	 */
	private function initParams($arr) {
		$this->host = isset($arr['host']) ? $arr['host'] : 'localhost';
		$this->port = isset($arr['port']) ? $arr['port'] : '3306';
		$this->user = isset($arr['user']) ? $arr['user'] : 'root';
		$this->pass = isset($arr['pass']) ? $arr['pass'] : 'today12345';
		$this->charset = isset($arr['charset']) ? $arr['charset'] : 'utf8';
		$this->dbname = isset($arr['dbname']) ? $arr['dbname'] : 'blog';
	}
	/**
	 * initialize dsn
	 */
	private function initDSN() {
		$this->dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=$this->charset";
	}
	/**
	 * initialize pdo
	 */
	private function initPDO() {
		try{
			$this->pdo = new PDO($this->dsn,$this->user,$this->pass);
		}catch(PDOException $e) {
			echo 'Database connection failed.<br />';
			echo 'Error number is: ',$e->getCode(),'<br />';
			echo 'Error message is: ',$e->getMessage(),'<br />';
			echo 'Error file is: ',$e->getFile(),'<br />';
			echo 'Error line is: ',$e->getLine(),'<br />';
			die;
		}
	}
	/**
	 * initial pdo exception mode
	 */
	private function initAttribute() {
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	/**
	 * catch exception
	 */
	private function my_error($e) {
		echo 'SQL execution failed.<br />';
		echo 'Error number is: ',$e->getCode(),'<br />';
		echo 'Error message is: ',$e->getMessage(),'<br />';
		echo 'Error file is: ',$e->getFile(),'<br />';
		echo 'Error line is: ',$e->getLine(),'<br />';
		die;
	}
	/**
	 * my_query method to CURD
	 */
	public function my_query($sql) {
		try{
			$result = $this->pdo->exec($sql);
		}catch(PDOException $e) {
			$this->my_error($e);
		}
		return $result;
	}
	/**
	 * fetchAll
	 */
	public function fetchAll($sql) {
		try{
			$stmt = $this->pdo->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
		}catch(PDOException $e) {
			$this->my_error($e);
		}
		return $result;
	}
	/**
	 * fetchRow
	 */
	public function fetchRow($sql) {
		try{
			$stmt = $this->pdo->query($sql);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
		}catch(PDOException $e) {
			$this->my_error($e);
		}
		return $result;
	}
	/**
	 * fetchColumn
	 */
	public function fetchColumn($sql,$i=NULL) {
		try{
			$stmt = $this->pdo->query($sql);
			if(is_null($i)){
				$result = $stmt->fetchColumn();
			}else{
				$result = $stmt->fetchColumn($i);
			}
			$stmt->closeCursor();
		}catch(PDOException $e) {
			$this->my_error($e);
		}
		return $result;
	}
	/**
	 * __clone
	 */
	private function __clone() {
		
	}
}