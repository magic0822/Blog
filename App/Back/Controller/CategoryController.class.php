<?php
class CategoryController extends PlatformController {
    public function indexAction()
    {
        $category = Factory::M('CategoryModel');
        $cateInfo = $category->getCategory();
        $this->assign('cateInfo', $cateInfo);
        $this->display('index.html');
    }

    public function addAction()
    {
        $category = Factory::M('CategoryModel');
        $cateInfo = $category->getCategory();
        $this->assign('cateInfo', $cateInfo);
        $this->display('add.html');
    }

    public function dealAddAction()
    {
        $cate = array();
        $cate['cate_name'] = $this->escapeData($_POST['cate_name']);
        $cate['cate_pid'] = $_POST['cate_pid'];
        $cate['cate_sort'] = $this->escapeData($_POST['cate_sort']);
        $cate['cate_desc'] = $this->escapeData($_POST['cate_desc']);

        if(empty($cate['cate_name']) || empty($cate['cate_desc']) || empty($cate['cate_sort'])) {
            $this->jump('index.php?p=Back&c=Category&a=add', ':( Info is not complete！');
        }
        if(!is_numeric($cate['cate_sort']) || (int)$cate['cate_sort'] != $cate['cate_sort'] || $cate['cate_sort'] < 1) {
            $this->jump('index.php?p=Back&c=Category&a=add', ':( sorted should be from 1-50.');
        }
        $category = Factory::M('CategoryModel');
        $result = $category->insertCate($cate);
        if($result){
            $this->jump('index.php?p=Back&c=Category&a=index');
        } else {
            $this->jump('index.php?p=Back&c=Category&a=add', ':( Unknown error, adding failed！');
        }
    }

    public function editAction()
    {
        $cate_id = $_GET['cate_id'];
        $category = Factory::M('CategoryModel');
        $cate = $category->getCategoryById($cate_id);
        $this->assign('cate',$cate);
        $cateInfo = $category->getCategory();
        $this->assign('cateInfo', $cateInfo);
        $this->display('edit.html');
    }

    public function dealEditAction()
    {
        $cate = array();
        $cate['cate_name'] = $this->escapeData($_POST['cate_name']);
        $cate['cate_pid'] = $_POST['cate_pid'];
        $cate['cate_sort'] = $this->escapeData($_POST['cate_sort']);
        $cate['cate_desc'] = $this->escapeData($_POST['cate_desc']);
        $cate['cate_id'] = $_POST['cate_id'];

        if (!is_numeric($cate['cate_sort']) || (int)$cate['cate_sort'] !=$cate['cate_sort'] || $cate['cate_sort'] <1) {
            $this->jump("index.php?p=Back&c=Category&a=edit&cate_id={$cate['cate_id']}", ':( sorted should be from 1-50.');
        }
        if(empty($cate['cate_name']) || empty($cate['cate_desc'])||empty($cate['cate_sort'])) {
            $this->jump("index.php?p=Back&c=Category&a=edit&cate_id={$cate['cate_id']}", ':( Info is not complete.');
        }

        $category = Factory::M('CategoryModel');
        $result = $category->updateCategoryById($cate);
        if($result) {
            $this->jump('index.php?p=Back&c=Category&a=index');
        } else {
            $this->jump("index.php?p=Back&c=Category&a=edit&cate_id={$cate['cate_id']}", ':( Unknown error, modify failed.');
        }
    }

    public function delAction()
    {
        $cate_id = $_GET['cate_id'];
        $category = Factory::M('CategoryModel');
        $subId = $category->getSubId($cate_id);
        if($subId) {
            $this->jump("index.php?p=Back&c=Category&a=index", ':( Unable to delete category which has subcategories.');
        }
        $result = $category->delCategoryById($cate_id);
        if($result) {
            $this->jump('index.php?p=Back&c=Category&a=index');
        } else {
            $this->jump('index.php?p=Back&c=Category&a=index', ':( Unknown error, delete failed！');
        }
    }

    public function delAllAction()
    {
        if(!isset($_POST['cate_id'])) {
            $this->jump('index.php?p=Back&c=Category&a=index', ':( Please choose the category！');
        }
        $cate_id = $_POST['cate_id'];
        $category = Factory::M('CategoryModel');
        foreach ($cate_id as $id) {
            if($category->getSubId($id)) {
                $this->jump('index.php?p=Back&c=Category&a=index', ':( Unable to delete category which has subcategories！');
            }
        }
        $result = $category->delAllCategory($cate_id);
        if($result) {
            $this->jump('index.php?p=Back&c=Category&a=index');
        } else {
            $this->jump('index.php?p=Back&c=Category&a=index', ':( Unknown error, delete failed！');
        }
    }
}
