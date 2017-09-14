<?php

/**
 * basic model class
 */
class Model {
	protected $dao;
	/**
	 * initial database
	 */
	protected function initDAO() {
		$config = $GLOBALS['conf']['db'];
		switch($GLOBALS['conf']['App']['dao']) {
			case 'mysql': $dao_class = 'MySQLDB';break;
			case 'pdo': $dao_class = 'PDODB';
		}
		$this->dao = $dao_class::getInstance($config);
	}
	/**
	 * constructor
	 */
	public function __construct() {
		$this->initDAO();
	}
}