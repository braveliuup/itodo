<?php
/**
*
* 输出类
*/
class Response
{
    const HTTP_VERSION = "HTTP/1.1";

    // 返回结果
    public static function sendResponse($data)
    {
        if($data){
            $code = 200;
            $message = 'OK';
        }else{
            $code = 404;
            $data = array('error' => 'Not Found');
            $message = 'Not Found';
        }

        // 输出结果
        header(self::HTTP_VERSION . " " . $code . " " . $message );
        $content_type = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : $_SERVER['HTTP_ACCEPT'];
        if(strpos($content_type, 'application/json') !== false){
            header("Content-Type: application/json");
            echo self::encodeJson($data);
        }else if(strpos($content_type, 'application/xml') !== false){
            header('Content-Type: application/xml');
            echo self::encodeXml($data);
        }else {
            header("Content-Type: text/html");
            echo self::encodeHtml($data);
        }
    }

    public static function encodeJson($data)
    {
        return json_encode($data);
    }
    public static function encodeXml($data)
    {
        return json_encode($data);
       
    }
    public static function encodeHtml($data)
    {
        return json_encode($data);
       
    }
}