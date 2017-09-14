<?php
class SinglePageModel extends Model {
    public function getPages()
    {
        $sql = "select * from bg_singlePage ORDER BY page_id desc";
        return $this->dao->fetchAll($sql);
    }

    public function insertPage($pageInfo)
    {
        extract($pageInfo);
        $sql =  "insert into bg_singlePage VALUES (null,'$title', '$content')";
        return $this->dao->my_query($sql);
    }
}