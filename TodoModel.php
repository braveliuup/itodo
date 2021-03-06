<?php
require("DBUtils.php");
class Todo{
    private $db ;

    function __construct(){
        $this->db = new DBUtils();
    }

    public function getData()
    {
        // $sql = "(select  *  from `tbl_todo` where `done_status` = 0 order by `create_time`) 
        //          UNION ALL  
        //          (select  *  from `tbl_todo`  where `done_status` = 1 order by `done_time` DESC  )";
        $sql = "select * from tbl_todo where content <> '' order by done_status , create_time desc";
        $rows = $this->db->queryRows($sql);
        return $rows;   
    }
    public function patchData($data)
    {
        $sql = "update tbl_todo set done_status = {$data[status]}, done_time = sysdate() where uid = {$data[id]};";
        return $this->db->update($sql);
    }

    public function postData($data)
    {
        $sql = "insert into tbl_todo (content, create_time, done_status) values ('{$data[content]}',sysdate(),0)";
        //return $sql;
        return $this->db->update($sql);
    }

    public function condition()
    {
        
    }

}

// Test Unit
// $todo = new Todo();
// echo $todo->getData();
// echo $todo->postData(array("content"=>"asdf"));
// echo $todo->patchData(array("id"=>1));
