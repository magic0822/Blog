<?php

class ArticleController extends PlatformController
{
    public function indexAction()
    {
        $article = Factory::M('ArticleModel');
        $artInfo = $article->getArticle();
        $this->assign('artInfo', $artInfo);

        $rowsPerPage = $GLOBALS['conf']['Page']['rowsPerPage'];
        $maxPages = $GLOBALS['conf']['Page']['maxPages'];
        $url = 'index.php?p=Back&c=Article&a=index';
        $rowCount = $article->getRowCount();
        $page = new Page($rowsPerPage, $rowCount, $maxPages, $url);
        $strPage = $page->show();
        $this->assign('strPage', $strPage);
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
        $art = array();
        $art['cate_id'] = $_POST['cate_id'];
        $art['title'] = $this->escapeData($_POST['title']);
        $art['author'] = $this->escapeData($_POST['author']);
        $art['art_desc'] = $this->escapeData($_POST['art_desc']);
        $art['content'] = addslashes($_POST['content']);
        // input data validation
        if (empty($art['title']) || empty($art['author']) || empty($art['art_desc']) || empty($art['content'])) {
            $this->jump('index.php?p=Back&c=Article&a=add', ':( Info not complete!');
        }
        // thumb picture upload validation
        if ($_FILES['thumb']['error'] != 4) {
            // if uploaded
            $upload = new Upload;// instance Upload class
            $allow = array('image/png', 'image/jpeg', 'image/gif', 'image/jpg');
            $path = UPLOADS_DIR . 'thumb/' . date('Ymd');
            if (!file_exists($path)) {
                mkdir($path);
            }
            // use core method in Upload class
            $result = $upload->uploadAction($_FILES['thumb'], $allow, $path);
            if ($result) {
                // upload successful
                $art['thumb'] = $result;
            } else {
                // upload fail, redirect and error pops up
                $error = Upload::$error;
                $this->jump('index.php?p=Back&c=Article&a=add', $error);
            }
        } else {
            // if no thumb picture uploaded
            $art['thumb'] = 'default.jpg';
        }
        // use model store data
        $article = Factory::M('ArticleModel');
        $result = $article->insertArt($art);
        if ($result) {
            $this->jump('index.php?p=Back&c=Article&a=index');
        } else {
            $this->jump('index.php?p=Back&c=Article&a=add', ':( Unknown error, upload failed!');
        }
    }


    public
    function editAction()
    {
        $art_id = $_GET['art_id'];
        $article = Factory::M('ArticleModel');
        $art = $article->getArticleById($art_id);
        $this->assign('art', $art);
        $category = Factory::M('CategoryModel');
        $cateInfo = $category->getCategory();
        $this->assign('cateInfo', $cateInfo);
        $this->display('edit.html');
    }

    public
    function dealEditAction()
    {
        $art = array();
        $art['cate_id'] = $_POST['cate_id'];
        $art['title'] = $this->escapeData($_POST['title']);
        $art['author'] = $this->escapeData($_POST['author']);
        $art['art_desc'] = $this->escapeData($_POST['art_desc']);
        $art['content'] = addslashes($_POST['content']);
        $art['art_id'] = $_POST['art_id'];//data from hidden input element
        // data validation
        if (empty($art['title']) || empty($art['author']) || empty($art['art_desc']) || empty($art['content'])) {
            $this->jump("index.php?p=Back&c=Article&a=edit&art_id={$art['art_id']}", ':( Info not complete!');
        }
        // thumb picture upload validation
        if ($_FILES['thumb']['error'] != 4) {
            // if uploaded
            $upload = new Upload;// instance Upload class
            $allow = array('image/png', 'image/jpeg', 'image/gif', 'image/jpg');
            $path = UPLOADS_DIR . 'thumb/' . date('Ymd');
            if (!file_exists($path)) {
                mkdir($path);
            }
            // use core method in Upload class
            $result = $upload->uploadAction($_FILES['thumb'], $allow, $path);
            if ($result) {
                // upload successful
                $art['thumb'] = $result;
            } else {
                // upload fail, redirect and error pops up
                $error = Upload::$error;
                $this->jump("index.php?p=Back&c=Article&a=edit&art_id={$art['art_id']}", $error);
            }
        } else {
            // use the old thumb picture if no new picture uploaded
            $art['thumb'] = $_POST['thumb_bak']; // data from hidden input element
        }
        // use model store data
        $article = Factory::M('ArticleModel');
        $result = $article->updateArtById($art);
        if ($result) {
            $this->jump('index.php?p=Back&c=Article&a=index');
        } else {
            $this->jump("index.php?p=Back&c=Article&a=edit&art_id={$art['art_id']}", ':( Unknown error, upload failed!');
        }
    }

    public
    function delAction()
    {
        $art_id = $_GET['art_id'];
        $article = Factory::M('ArticleModel');
        $result = $article->delArticleById($art_id);
        if ($result) {
            $this->jump('index.php?p=Back&c=Article&a=index');
        } else {
            $this->jump("index.php?p=Back&c=Article&a=index", ':( Unknown error, upload failed!');
        }
    }

    public
    function delAllAction()
    {
        if (!isset($_POST['art_id'])) {
            $this->jump('index.php?p=Back&c=Article&a=index', ':( Please choose the article.');
        }
        $art_id = implode(',', $_POST['art_id']);
        $article = Factory::M('ArticleModel');
        $result = $article->delAllArticle($art_id);
        if ($result) {
            $this->jump('index.php?p=Back&c=Article&a=index');
        } else {
            $this->jump("index.php?p=Back&c=Article&a=index", ':( Unknown error, delete failed！');
        }
    }

    public
    function recycleAction()
    {
        $article = Factory::M('ArticleModel');
        $artInfo = $article->getDeledArticle();
        $this->assign('artInfo', $artInfo);
        $this->display('recycle.html');
    }

    public
    function recoverAction()
    {
        $art_id = $_GET['art_id'];
        $article = Factory::M('ArticleModel');
        $result = $article->recoverArtById($art_id);
        if ($result) {
            $this->jump('index.php?p=Back&c=Article&a=recycle');
        } else {
            $this->jump('index.php?p=Back&c=Article&a=recycle', ':( Unknown error, recover failed！');
        }
    }


    public
    function realDelAction()
    {
        $art_id = $_GET['art_id'];
        $article = Factory::M('ArticleModel');
        $result = $article->realDelArticleById($art_id);
        if ($result) {
            $this->jump('index.php?p=Back&c=Article&a=recycle');
        } else {
            $this->jump('index.php?p=Back&c=Article&a=recycle', ':( Unknown error, delete failed！');
        }
    }

    public
    function realDelAllAction()
    {
        if (!isset($_POST['art_id'])) {
            $this->jump('index.php?p=Back&c=Article&a=recycle', ':( Please choose the article');
        }
        $art_id = implode(',', $_POST['art_id']);
        $article = Factory::M('ArticleModel');
        $result = $article->realDelAllArticle($art_id);
        if ($result) {
            $this->jump('index.php?p=Back&c=Article&a=recycle');
        } else {
            $this->jump("index.php?p=Back&c=Article&a=recycle", ':( Unknown error, delete failed！');
        }
    }

    public
    function recoverAllAction()
    {
        if (!isset($_POST['art_id'])) {
            $this->jump('index.php?p=Back&c=Article&a=recycle', ':( Please choose the article');
        }
        $art_id = implode(',', $_POST['art_id']);
        $article = Factory::M('ArticleModel');
        $result = $article->recoverAllArticle($art_id);
        if ($result) {
            $this->jump('index.php?p=Back&c=Article&a=recycle');
        } else {
            $this->jump("index.php?p=Back&c=Article&a=recycle", ':( Unknown error, recover failed！');
        }
    }

    public
    function isRecommendAction()
    {
        $art_id = $_GET['art_id'];
        $is_recommend = $_GET['is_recommend'];
        $pageNum = $_GET['pageNum'];
        $article = Factory::M('ArticleModel');
        $result = $article->updateRecommendById($art_id, $is_recommend);
        if ($result) {
            $this->jump("index.php?p=Back&c=Article&a=index&pageNum=$pageNum");
        } else {
            $this->jump('index.php?p=Back&c=Article&a=index&pageNum=$pageNum', ':( Unknown error, action failed');
        }
    }
}