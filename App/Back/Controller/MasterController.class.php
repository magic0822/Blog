<?php
class MasterController extends PlatformController {
    public function indexAction()
    {
        $master = Factory::M('MasterModel');
        $masterInfo = $master->getMasterInfo();
        $this->assign('masterInfo', $masterInfo);
        $this->display('index.html');
    }

    public function editAction()
    {
        $masterInfo = array();
        $masterInfo['nickmame'] = $this->escapeData($_POST['nickname']);
        $masterInfo['job'] = $this->escapeData($_POST['job']);
        $masterInfo['home'] = $this->escapeData($_POST['home']);
        $masterInfo['email'] = $this->escapeData($_POST['email']);
        $masterInfo['tel'] = $this->escapeData($_POST['tel']);

        if(empty($masterInfo['nickname']) || empty($masterInfo['job'])||empty($masterInfo['home'])||empty($masterInfo['email'])||empty($masterInfo['tel'])) {
            $this->jump('index.php?p=Back&c=Master&a=index', ':( Please complete info input.');
        }
        $master = Factory::M('MaterModel');
        $result = $master->updateMasterInfo($masterInfo);
        if($result){
            $this->jump('index.php?p=Back&c=Master&a=index', ':) Update successful');
        } else {
            $this->jump('index.php?p=Back&c=Master&a=index', ':( Update failed, please try again.');
        }
    }
}