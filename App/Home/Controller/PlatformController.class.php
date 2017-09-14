<?php
class PlatformController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $category = Factory::M('CategoryModel');
        $firstCate = $category->getFirstCate();
        $this->assign('firstCate', $firstCate);
        session_start();
    }
}