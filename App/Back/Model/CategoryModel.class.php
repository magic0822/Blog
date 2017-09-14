<?php

class CategoryModel extends Model
{
    public function getCategory()
    {
        $sql = 'select * from bg_category order by cate_sort asc';
        $list = $this->dao->fetchAll($sql);
        return $this->getCateTree($list);
    }

    private function getCateTree($list, $pid = 0, $level = 0)
    {
        static $cate_list = array();
        foreach ($list as $row) {
            if ($row['cate_pid'] == $pid) {
                $row['level'] = $level;
                $cate_list[] = $row;
                $this->getCateTree($list, $row['cate_id'], $level + 1);
            }
        }
        return $cate_list;
    }

    public function insertCate($cate)
    {
        extract($cate);
        $sql = "insert into bg_category values(null, '$cate_name', $cate_pid, $cate_sort, '$cate_desc')";
        return $this->dao->my_query($sql);
    }

    public function getCategoryById($cate_id)
    {
        $sql = "select * from bg_category where cate_id = $cate_id";
        return $this->dao->fetchRow($sql);
    }

    public function updateCategoryById($cate)
    {
        extract($cate);
        $sql = "update bg_category set cate_name = '$cate_name', cate_pid= $cate_pid, cate_sort = $cate_sort, cate_desc = '$cate_desc' where cate_id=$cate_id";
        return $this->dao->my_query($sql);
    }

    public function getSubId($cate_id)
    {
        $sql = "select * from bg_category where cate_pid = $cate_id";
        return $this->dao->fetchAll($sql);
    }

    public function delCategoryById($cate_id)
    {
        $sql = "delete from bg_category where cate_id=$cate_id";
        return $this->dao->my_query($sql);
    }

    public function delAllCategory($cate_id)
    {
        $cate_id = implode(',', $cate_id);
        $sql = "delete from bg_category where cate_id in ($cate_id)";
        return $this->dao->my_query($sql);
    }
}
