<?php

class ArticleController extends PlatformController
{
    public function indexAction()
    {
        $cate_id = $_GET['cate_id'];

        $article = Factory::M('ArticleModel');
        $artInfo = $article->getArtInfo($cate_id);
        $this->assign('artInfo', $artInfo);

        $rowsPerPage = 9;
        $maxNum = $GLOBALS['conf']['Page']['maxPages'];
        $url = "index.php?p=Home&c=Article&a=index&cate_id={$cate_id}";
        $rowCount = $article->getRowCount($cate_id);
        $page = new Page($rowsPerPage, $rowCount, $maxNum, $url);
        $strPage = $page->show();
        $this->assign('strPage', $strPage);

        $this->PublicAction($cate_id);

        $this->display('index.html');
    }

    protected function PublicAction($cate_id)
    {
        $category = Factory::M('CategoryModel');
        $subCate = $category->getSubCateById($cate_id);
        $this->assign('subCate', $subCate);

        $list = $category->getAllParentCateName($cate_id);
        $this->assign('list', $list);

        $article = Factory::M('ArticleModel');
        $sortByHits = $article->getSortByHits($cate_id, 9);
        $this->assign('sortByHits', $sortByHits);

        $sortByRecommend = $article->getSortByRecommend($cate_id, 9);
        $this->assign('sortByRecommend', $sortByRecommend);
    }

    public function showAction()
    {
        $art_id = $_GET['art_id'];
        $article = Factory::M('ArticleModel');

        $row = $article->getArtInfoById($art_id);
        $this->assign('row', $row);

        $article->updateHitsById($art_id);

        $cate_id = $row['cate_id'];

        $this->PublicAction($cate_id);

        $prev = $article->getPrevArt($art_id);
        $next = $article->getNextArt($art_id);

        $this->assign('prev', $prev);
        $this->assign('next', $next);

        $comment = Factory::M('CommentModel');
        $rowCount = $comment->getCmtNumsById($art_id);

        $this->assign('rowCount', $rowCount);

        $rowsPerPage = $GLOBALS['conf']['Page']['rowsPerPage'];
        $maxPages = $GLOBALS['conf']['Page']['maxPages'];
        $url = "index.php?p=Home&c=Article&a=show&art_id={$art_id}";

        $page = new Page($rowsPerPage, $rowCount, $maxPages,$url);
        $strPage = $page->show();

        $this->assign('strPage', $strPage);
        $cmtInfos = $comment->getCmtInfoByArtId($art_id);
        $this->assign('cmtInfos', $cmtInfos);

        $this->display('show.html');
    }

    public function commentAction()
    {
        if(!isset($_SESSION['userInfo'])){
            $this->jump('index.php?p=Home&c=User&a=login', 'plz log in.');
        }

        $cmtInfo = array();
        $cmtInfo['art_id'] = $_POST['art_id'];
        $cmt_content = $this->escapeData($_POST['content']);
        if(empty($cmt_content)) {
            $this->jump("index.php?p=Home&c=Article&a=show&art_id={$cmtInfo['art_id']}", 'comment?');
        }
        $cmtInfo['cmt_content'] = $cmt_content;
        $cmtInfo['cmt_user'] = $_SESSION['userInfo']['user_name'];
        $cmtInfo['cmt_time'] = time();

        $comment = Factory::M('CommentModel');
        if($comment->insertComment($cmtInfo)) {
            $this->jump("index.php?p=Home&c=Article&a=show&art_id={$cmtInfo['art_id']}");
        } else {
            $this->jump("index.php?p=Home&c=Article&a=show&art_id={$cmtInfo['art_id']}", 'plz try again.');
        }
    }
}