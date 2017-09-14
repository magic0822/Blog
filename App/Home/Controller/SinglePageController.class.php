<?php
class SinglePageController extends PlatformController {
    public function indexAction()
    {
        $page_id = $_GET['page_id'];
        $singlePage = Factory::M('SinglePageModel');
        $pageInfo = $singlePage->getSinglePageById($page_id);
        $master = Factory::M('MasterModel');
        $masterInfo = $master->getMasterInfo();
        $this->assign('pageInfo', $pageInfo);
        $this->assign('masterInfo', $masterInfo);
        $this->display('index.html');
    }

}