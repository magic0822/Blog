<?php
class SinglePageController extends PlatformController {
    public function indexAction()
    {
        $singlePage = Factory::M('SinglePageModel');
        $pageInfo = $singlePage->getPages();

        $this->assign('pageInfo', $pageInfo);
        $this->display('index.html');
    }

    public function addAction()
    {
        $this->display('add.html');
    }

    public function dealAddAction()
    {
        $pageInfo = array();
        $pageInfo['title'] = $_POST['title'];
        $pageInfo['content'] = $_POST['content'];

        if(empty($pageInfo['title']) || empty($pageInfo['content'])){
            $this->jump('index.php?p=Back&c=SinglePage&a=add', ':( Info is not complete.');
        }

        $singlePage = Factory::M('SinglePageModel');
        $result = $singlePage->insertPage($pageInfo);
        if($result) {
            $this->jump('index.php?p=Back&c=SinglePage&a=index');
        } else {
            $this->jump('index.php?p=Back&c=SinglePage&a=add', ':( Unknown error');
        }
    }

    public function editAction()
    {
        
    }

    public function dealEditAction()
    {
        
    }

    public function delAction()
    {
        
    }
}