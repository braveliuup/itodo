<?php
/**
* 数据操作类
*/
class Request
{
    // 允许的请求方式
    private static $method_type = array('get', 'post', 'put', 'patch', 'delete');

    //测试数据
    private static $test_class = array(
        1 => array('name' => '托福班', 'count' => 18),
        2 => array('name' => '雅思班', 'count' => 20),
    );

    public static function getRequest()
    {
        //请求方式
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        if(in_array($method, self::$method_type)){
            // 调用请求方式对应的方法
            $data_name = $method.'Data';
            return self::$data_name($_REQUEST);
        }
        return false;
    }

    // GET 获取信息
    private static function getData($request_data)
    {
        $id = (int)$request_data['id'];
        include("TodoModel.php");
        $todo = new Todo();
        if($id > 0){
            return self::$test_class[$id];
        }else{
            return $todo->getData(); 
        }
    }

    // patch 更新部分信息
    private static function patchData($request_data)
    {

    }

    // POST 新增数据
    private static function postData($request_data)
    {
        var_dump($request_data);
    }
}