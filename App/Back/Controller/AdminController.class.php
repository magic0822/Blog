<?php
/**
 * admin manage controller(login, logout, change password)
 */

class AdminController extends PlatformController {
    public function loginAction() {
        $this->display('login.html');
    }

    public function checkAction () {
        $admin_name = $this->escapeData($_POST['admin_name']);
        $admin_pass = $this->escapeData($_POST['admin_pass']);
        $passcode = $this->escapeData($_POST['passcode']);
        $captcha = Factory::M('Captcha');
        if(!$captcha->checkCaptcha($passcode)){
            $this->jump('index.php?p=Back&c=Admin&a=login',':(Verification code is wrong！');
        }
        $admin = Factory::M('AdminModel');
        $result = $admin->check($admin_name, $admin_pass);
        if($result) {
            session_start();
            $_SESSION['adminInfo'] = $result;
            $admin->updateAdminInfo($result['admin_id']);
            $this->jump('index.php?p=Back&c=Manage&a=index');
        } else {
            $this->jump('index.php?p=Back&c=Manage&a=login');
        }
    }

    public function captchaAction()
    {
        $captcha = Factory::M('Captcha');
        $captcha->generate();
    }

    public function logoutAction()
    {
        @session_start();
        unset($_SESSION['adminInfo']);
        session_destroy();
        $this->jump('index.php?p=Back&c=Admin&a=login');
    }
}