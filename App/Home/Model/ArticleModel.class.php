<?php
class ArticleModel extends Model {
    public function getRecommendArt($length)
    {
        $sql = "select a.*,c.cate_name from bg_article as a left join bg_category as c on a.cate_id = c.cate_id where is_del = '0' and is_recommend = '1' order by addtime desc limit $length";
        return $this->dao->fetchAll($sql);
    }

    public function getRmdArtByHits($length)
    {
        $sql = "select art_id, title from bg_article where is_del = '0' and is_recommend = '1' order by hits desc limit $length";
        return $this->dao->fetchAll($sql);
    }

    public function getNewArt($length)
    {
        $sql = "select art_id, title from bg_article where is_del = '0' order by addtime desc limit $length";
        return $this->dao->fetchAll($sql);
    }

    public function getArtInfo($cate_id)
    {
        $ids = $this->getAllSubIds($cate_id);
        $ids .= $cate_id;

        $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
        $rowsPerPage = 9;
        $offset = ($pageNum - 1) * $rowsPerPage;
        $sql = "select a.*,c.cate_name from bg_article as a left join bg_category as c on a.cate_id=c.cate_id where is_del='0' and a.cate_id in($ids) order by addtime desc limit $offset, $rowsPerPage";
        return $this->dao->fetchAll($sql);
        return $this->dao->fetchAll($sql);
    }

    protected function getAllSubIds($cate_id)
    {
        $sql = "select cate_id from bg_category where cate_pid = '$cate_id'";
        $id = $this->dao->fetchAll($sql);
        static $ids = '';
        foreach ($id as $row) {
            $ids .= $row['cate_id'] . ',';
            $this->getAllSubIds($row['cate_id']);
        }
        return $ids;
    }

    public function getRowCount($cate_id)
    {
        $ids = $this->getAllSubIds($cate_id);
        $ids .= $cate_id;
        $sql = "select count(*) from bg_article where is_del='0' and cate_id in($ids)";
    }

    public function getSortByHits($cate_id,$length)
    {
        $ids = $this->getAllSubIds($cate_id);
        $ids .= $cate_id;
        $sql = "select art_id, title from bg_article where is_del='0' and cate_id in($ids) ORDER BY hits desc limit $length";
        return $this->dao->fetchAll($sql);
    }

    public function getSortByRecommend($cate_id, $length)
    {
        $ids = $this->getAllSubIds($cate_id);
        $ids .= $cate_id;
        $sql = "select art_id, title from bg_article where is_del='0' and is_recommend='1' and cate_id in($ids) ORDER BY addtime desc limit $length";
        return $this->dao->fetchAll($sql);
    }

    public function getArtInfoById($art_id)
    {
        $sql = "select * from bg_article where art_id = {$art_id}";
        return $this->dao->fetchRow($sql);
    }

    public function updateHitsById($art_id)
    {
        $sql = "update bg_article set hits = hits + 1 where art_id={$art_id}";
        return $this->dao->my_query($sql);
    }

    public function getPrevArt($art_id)
    {
        $sql = "select art_id, title from bg_article where is_del = '0' and art_id<$art_id order by art_id desc limit 1";
        return $this->dao->fetchRow($sql);
    }

    public function getNextArt($art_id)
    {
        $sql = "select art_id, title from bg_article where is_del = '0' and art_id>$art_id order by art_id asc limit 1";
        return $this->dao->fetchRow($sql);
    }
}