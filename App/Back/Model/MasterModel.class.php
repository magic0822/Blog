<?php
/**
 * Created by PhpStorm.
 * User: magic
 * Date: 5/19/2017
 * Time: 8:40 AM
 */

class MasterModel extends Model{
    public function getMasterInfo()
    {
        $sql = "select * from bg_master limit 1";
        return $this->dao->fetchRow($sql);
    }

    public function updateMasterInfo()
    {
        extract($masterInfo);
        $sql = "update bg_master set nickname='{$nickname}',job='{$job}', home='{$home}', tel='{$tel}', email='{$email}'";
        return $this->dao->my_query($sql);
    }
}