<?php
class ArticleModel extends Model {

    public function insertArt($art)
    {
        extract($art);
        $addtime = time();
        $sql="insert into bg_article values (null, $cate_id, '$title', '$thumb','$art_desc','$content','$author',default, $addtime, default, default)";
        return $this->dao->my_query($sql);
    }

    public function getArticle()
    {
        $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
        $rowsPerPage = $GLOBALS['conf']['Page']['rowsPerPage'];
        $maxPages = $GLOBALS['conf']['Page']['maxPages'];
        $offset = ($pageNum - 1) * $rowsPerPage;
        $sql = "select a.*, c.cate_name from bg_article as a left join bg_category as c on a.cate_id = c.cate_id where is_del = '0' order by addtime desc limit $offset, $rowsPerPage";
        return $this->dao->fetchAll($sql);
    }

    public function getArticleById($art_id)
    {
        $sql = "select * from bg_article where art_id = $art_id";
        return $this->dao->fetchRow($sql);
    }

    public function updateArtById($art)
    {
        extract($art);
        $sql = "update bg_article set cate_id=$cate_id, title= '$title', thumb='$thumb', art_desc='$art_desc', author='$author', content= '$content' where art_id=$art_id";
        return $this->dao->my_query($sql);
    }

    public function recoverArtById($art_id)
    {
        $sql = "update bg_article set is_del= '0' where art_id = $art_id";
        return $this->dao->my_query($sql);
    }

    public function delArticleById($art_id)
    {
        $sql = "update bg_article set is_del = '1' where art_id = $art_id";
        return $this->dao->my_query($sql);
    }

    public function delAllArticle($art_id)
    {
        $sql = "update bg_article set is_del = '1' where art_id in ($art_id)";
        return $this->dao->my_query($sql);
    }

    public function getDeledArticle()
    {
        $sql = "select a.*, c.cate_name from bg_article as a left join bg_category as c on a.cate_id = c.cate_id where is_del = '1' order by addtime desc";
        return $this->dao->fetchAll($sql);
    }

    public function realDelArticleById($art_id)
    {
        $sql = "delete from bg_article where art_id = $art_id";
        return $this->dao->my_query($sql);
    }

    public function realDelAllArticle($art_id)
    {
        $sql = "delete from bg_article where art_id in ($art_id)";
        return $this->dao->my_query($sql);
    }

    public function recoverAllArticle($art_id)
    {
        $sql = "update bg_article set is_del = '0' where art_id in ($art_id)";
        return $this->dao->my_query($sql);
    }

    public function getRowCount()
    {
        $sql = "select count(*) from bg_article where is_del = '0'";
        return $this->dao->fetchColumn($sql);
    }

    public function updateRecommendById($art_id, $is_recommend)
    {
        if($is_recommend == '0') {
            $is_recommend = '1';
        } else {
            $is_recommend = '0';
        }
        $sql = "update bg_article set is_recommend ='$is_recommend' where art_id ='$art_id'";
        return $this->dao->my_query($sql);
    }
}