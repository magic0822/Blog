<?php
class PlatformController extends Controller {
    protected function checkLogin()
    {
        $no_need = array('Admin'=>array('login','check','captcha'),);
        if(isset($no_need[CONTROLLER]) && in_array(ACTION, $no_need[CONTROLLER])) {
            return ;
        }
        @session_start();
        if(!isset($_SESSION['adminInfo'])) {
            $this->jump('index.php?p=Back&c=Admin&a=login', ':( Please login.');
        }
    }

    public function __construct()
    {
        parent::__construct();
        $this->checkLogin();
    }
}