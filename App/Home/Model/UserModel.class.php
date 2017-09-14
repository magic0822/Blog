<?php
class UserModel extends Model {
    public function if_name_exists($user_name)
    {
        $sql = "select * from bg_user where user_name='{$user_name}'";
        return $this->dao->fetchAll($sql);
    }

    public function insertUser($userInfo)
    {
        extract($userInfo);
        $user_time = time();
        $sql = "insert into bg_user values(null, '{$user_name}', '{$user_pass}','{$user_image}',{$user_time})";
        return $this->dao->my_query($sql);
    }

    public function check($name, $pass)
    {
        $sql = "select * from bg_user WHERE user_name='$name' and user_pass='$pass'";
        return $this->dao->fetchRow($sql);
    }
}