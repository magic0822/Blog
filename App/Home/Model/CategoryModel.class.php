<?php
class CategoryModel extends Model {
    public function getFirstCate()
    {
        $sql = "select * from bg_category where cate_pid=0 order by cate_sort";
        return $this->dao->fetchAll($sql);
    }

    public function getSubCateById($cate_id)
    {
        $sql = "select cate_id, cate_name from bg_category where cate_pid=$cate_id";
        return $this->dao->fetchAll($sql);
    }

    public function getAllParentCateName($cate_id) {
        // get category name and parent id
        $sql = "select cate_name,cate_pid from bg_category where cate_id={$cate_id}";
        $cate = $this->dao->fetchRow($sql);
        $cate_name = $cate['cate_name'];//get current category name
        static $list = array();
        $list[$cate_id] = $cate_name;
        $cate_pid = $cate['cate_pid'];

        // validate if parent id is 0
        if($cate_pid != 0) {
            // recursive point
            $this->getAllParentCateName($cate_pid);
        }
        return array_reverse($list,true);
    }

}