<?php

/**
 * Project initial class
 */
class Frame {
	/**
	 * Project entrance
	 */
	public static function run() {
		// Basic folder constant
		static::initConst();
		// initial config
		static::initConfig();
		// dispatch parameter
		static::initDispatchParam();
		// Platform related folder constant
		static::initPlatformConst();
		// autoload method
		static::initAutoload();
		// dispatch request
		static::initDispatch();
}
	/**
	 * Basic folder
	 */
	private static function initConst() {
		// root folder
        define('ROOT_DIR', str_replace('\\', '/', getcwd()) . '/');
        // app folder
        define('APP_DIR', ROOT_DIR . 'App/');
        // frame folder
        define('FRAME_DIR', ROOT_DIR . 'Frame/');
        // config folder
        define('CONFIG_DIR', APP_DIR . 'Config/');
        // dao folder
        define('DAO_DIR', FRAME_DIR . 'dao/');
        // vendor folder
        define('VENDOR_DIR', ROOT_DIR . 'Vendor/');
        // Smarty folder
        define('SMARTY_DIR', VENDOR_DIR . 'Smarty/');
        // Public folder
        define('PUBLIC_DIR', ROOT_DIR . 'Public/');
        // upload folder
        define('UPLOADS_DIR', ROOT_DIR . 'Uploads/');
	}
	/**
	 * initial config
	 */
	private static function initConfig() {
		// store as global, valid to entire project
		$GLOBALS['conf'] = include CONFIG_DIR . 'conf.php';
	}
	/**
	 * confirm dispatch parameter
	 */
	private static function initDispatchParam() {
		// platform dispatch parameter p
		$default_platform = $GLOBALS['conf']['App']['default_platform'];
		define('PLATFORM', isset($_GET['p']) ? $_GET['p'] : $default_platform);
		// controller dispatch parameter c
		$default_controller = $GLOBALS['conf'][PLATFORM]['default_controller'];
		define('CONTROLLER', isset($_GET['c']) ? $_GET['c'] : $default_controller);
		// action dispatch parameter a
		$default_action = $GLOBALS['conf'][PLATFORM]['default_action'];
		define('ACTION', isset($_GET['a']) ? $_GET['a'] : $default_action);
	}
	/**
	 * platform relate folder
	 */
	private static function initPlatformConst() {
		// current platform controller folder
		define('CURRENT_CON_DIR', APP_DIR . PLATFORM . '/Controller/');
		// current platform model folder
		define('CURRENT_MODEL_DIR', APP_DIR . PLATFORM . '/Model/');
		// current platform view folder
		define('CURRENT_VIEW_DIR', APP_DIR . PLATFORM . '/View/');
		//below 3 folders only can be used related path and related with platform
		define('CSS_DIR', '/Public/' . PLATFORM . '/css/');
		define('JS_DIR', '/Public/' . PLATFORM . '/js/');
		define('IMAGES_DIR', '/Public/' . PLATFORM . '/images/');
	}
	/**
	 * file autoload
	 */
	public static function autoload($class_name) {
		// core class in array
		$frame_class_list = array(
			// key  	 =>  value
			// class name  =>  class file path
			'Controller'=>FRAME_DIR . 'Controller.class.php',
			'Model'		=>FRAME_DIR . 'Model.class.php',
			'Factory'	=>FRAME_DIR . 'Factory.class.php',
			'MySQLDB'	=>DAO_DIR . 'MySQLDB.class.php',
			'PDODB'		=>DAO_DIR . 'PDODB.class.php',
			'I_DAO'		=>DAO_DIR . 'I_DAO.interface.php',
			'Smarty'	=>SMARTY_DIR . 'Smarty.class.php',
            'Captcha'   =>VENDOR_DIR . 'Captcha.class.php',
            'Upload'    =>FRAME_DIR . 'Upload.class.php',
            'Page' => FRAME_DIR . 'Page.class.php',

		);
		// if it's core class
        if(isset($frame_class_list[$class_name])) {
            include $frame_class_list[$class_name];
        }
        elseif(substr($class_name, -10) == 'Controller') {
            include CURRENT_CON_DIR . $class_name . '.class.php';
        }
        elseif(substr($class_name, -5) == 'Model') {
            include CURRENT_MODEL_DIR . $class_name . '.class.php';
        }
    }
	/**
	 * register autoload method
	 */
	private static function initAutoload() {
		spl_autoload_register(array(__CLASS__,'autoload'));
	}
	/**
	 * dispatch
	 */
	private static function initDispatch() {
		// instance controller
		$controller_name = CONTROLLER . 'Controller';
		$controller = new $controller_name;
		$action_name = ACTION . 'Action';
		$controller->$action_name();
	}
}
