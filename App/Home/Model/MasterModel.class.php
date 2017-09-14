<?php
class MasterModel extends Model {
    public function getMasterInfo()
    {
        $sql = "select * from bg_master limit 1";
        return $this->dao->fetchRow($sql);
    }
}