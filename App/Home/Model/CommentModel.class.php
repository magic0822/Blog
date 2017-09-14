<?php

class CommentModel extends Model
{
    public function insertComment($cmtInfo)
    {
        extract($cmtInfo);
        $sql = "insert into bg_comment VALUES (null,{$art_id}, '$cmt_user','{$cmt_content}',{$cmt_time})";
        return $this->dao->my_query($sql);
    }

    public function getCmtNumsById($art_id)
    {
        $sql = "select count(*) from bg_comment where art_id={$art_id}";
        return $this->dao->fetchColumn($sql);
    }

    public function getCmtInfoByArtId($art_id)
    {
        $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] :
        1;
        $rowsPerPage = $GLOBALS['conf']['Page']['rowsPerPage'];
        $offset = ($pageNum - 1) * $rowsPerPage;
        $sql = "select c.*, u.user_image from bg_comment as c left join bg_user as u on c.cmt_user = u.user_name where art_id={$art_id} ORDER BY c.cmt_time asc limit $offset, $rowsPerPage";
        return $this->dao->fetchAll($sql);
    }
}