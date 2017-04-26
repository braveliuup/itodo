<?php
class DBUtils{
      
 
 /**
  *通用更新方法 insert update delete 操作
  *@param sql  
  *@return bool  true false
  */
  public function update($sql){
    $link = $this->getConn();
    mysql_query($sql);
    //如果出错显示
   if(DEBUG){
   echo mysql_error();
   }
    $rs = mysql_affected_rows($link);
    $rs = $rs > 0;
    mysql_close($link);
    return $rs;
  }
      
 /**
  *通用查询方法 select 操作
  *@param sql  
  *@return array
  */
  public function queryRows($sql){
   //创建连接，编码，数据库
   $link = $this->getConn();
   //发送sql
   $rs = mysql_query($sql);
   //如果出错显示
   if(DEBUG){
   echo mysql_error();
   }
        
        
   $rows = array();
   while($row = mysql_fetch_assoc($rs)){
    $rows[] = $row;//pdemo7.php
   }
   //
   mysql_free_result($rs);    
   mysql_close($link);
   return $rows;
  }
      
         
 /**
  *通用查询方法 select 操作  查询结果一行数据
  *@param sql  
  *@return array   如果失败返回 false;
  */
 public function queryRow($sql){
    $rs = $this->queryRows($sql);
    if(!empty($rs[0])){
     return $rs[0];
    }
    return false;
 }
      
 /**
  *通用查询方法 select 操作  查询结果一个数据
  *@param sql  
  *@return array   如果失败返回 false;
  * 例:  select count(*) from user;
  */
 public function queryObj($sql){
     $rs = $this->queryRows($sql);
    //var_dump($rs);
    if(!empty($rs[0][0])){
     return $rs[0][0];
    }
    return false;
 }
      
     
  private function getConn(){
   $link = mysql_connect('hdm111425482.my3w.com','hdm111425482','xiaoyong000');
   mysql_query("set names utf8");
   mysql_select_db("hdm111425482_db");
   return $link;
  }
      
}