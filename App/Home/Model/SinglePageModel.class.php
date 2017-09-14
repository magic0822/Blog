<?php
class SinglePageModel extends Model {
    public function getSinglePageById($page_id)
    {
        $sql = "select * from bg_singlePage where page_id={$page_id}";
        return $this->dao->fetchRow($sql);
    }
}