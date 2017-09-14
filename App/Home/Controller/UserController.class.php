<?php

class UserController extends PlatformController
{
    public function registerAction()
    {
        $master = Factory::M('MasterModel');
        $masterInfo = $master->getMasterInfo();
        $this->assign('masterInfo', $masterInfo);

        $article = Factory::M('ArticleModel');
        $newArt = $article->getNewArt(8);

        $this->assign('newArt', $newArt);
        $rmdArtByHits = $article->getRmdArtByHits(8);
        $this->assign('rmdArtByHits', $rmdArtByHits);
        $this->display('register.html');
    }

    public function dealRegisterAction()
    {
        $userInfo = array();
        $user_name = $this->escapeData($_POST['user_name']);
        if (empty($user_name)) {
            $this->jump('index.php?p=Home&c=User&a=register', ':( input user_name plz');
        }
        $user = Factory::M('UserModel');
        if ($user->if_name_exists($user_name)){
        $this->jump('index.php?p=Home&c=User&a=register', ':( name used');
        }
        $userInfo['user_name'] = $user_name;
        $user_pass1 = trim($_POST['pass1']);
        $user_pass2 = trim($_POST['pass2']);
        if(empty($user_pass1) || (empty($user_pass2))) {
            $this->jump('index.php?p=Home&c=User&a=register', ':( input password plz');
        }
        if($user_pass1 != $user_pass2) {
            $this->jump('index.php?p=Home&c=User&a=register', ':( password not match');
        }
        $userInfo['user_pass'] = md5($user_pass1);

        if($_FILES['user_image']['error'] != 4) {
            $upload = new Upload;
            $allow = array('image/png','image/gif','image/jpeg','image/jpg');
            $path = UPLOADS_DIR . 'user';
            $result = $upload->uploadAction($_FILES['user_image'],$allow,$path);
            if($result) {
                // Upload successful
                $userInfo['user_image'] = $result;
            }else {
                // upload failed
                $this->jump('index.php?p=Home&c=User&a=register',Upload::$error);
            }
        }else {
            $this->jump('index.php?p=Home&c=User&a=register','Please upload profile picture');
        }
		// store in database
		if($user->insertUser($userInfo)) {
            // redirect to login or index
            $this->jump('index.php?p=Home&c=User&a=login',':) Signup successful');
        }
    }

    public function loginAction()
    {
        $master = Factory::M('MasterModel');
        $masterInfo = $master->getMasterInfo();
        $this->assign('masterInfo', $masterInfo);

        $article = Factory::M('ArticleModel');
        $newArt = $article->getNewArt(8);

        $this->assign('newArt', $newArt);

        $rmdArtByHits = $article->getRmdArtByHits(8);
        $this->assign('rmdArtByHits', $rmdArtByHits);

        $this->display('login.html');
    }

    public function dealLoginAction()
    {
        $user_name = $this->escapeData($_POST['user_name']);
        $user_pass = $this->escapeData($_POST['pass']);

        if(empty($user_name) || empty($user_pass)) {
            $this->jump('index.php?p=Home&c=User&a=login', 'input your username or pwd');
        }

        $user = Factory::M('UserModel');
        $result = $user->check($user_name, md5($user_pass));
        if($result){
            @session_start();
            $_SESSION['userInfo'] = $result;

            $this->jump('index.php?p=Home&c=Index&a=index');
        } else {
            $this->jump('index.php?p=Home&c=User&a=login','username or pwd not match');
        }
    }

    public function logoutAction()
    {
        unset($_SESSION['userInfo']);

        $this->jump('index.php?p=Home&c=Index&a=index');
    }
}
