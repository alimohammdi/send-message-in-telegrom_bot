<?php
//define a variable for token code
define('TOKEN','5491967367:AAHZ4i9lHHttPgr84A6dsJKxs4WqJos9O_o');
class Telegramlib {
    private static $url;
//    select function for paste url and token code
    public static function init(){
       self::$url = 'https://api.telegram.org/bot'.TOKEN.'/';
    }
// get method telegram API (method) // get  text message and chat_id in with array
    private static function execute( $_method , array $_parameters){
        if(!isset(self::$url)){
           self::init();
        }
        $url = self::$url . $_method;
        $curl = curl_init($url);
        if(!empty($_parameters)){
            curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($_parameters));
        }
        curl_setopt($curl,CURLOPT_HTTPHEADER,['content-type:application/json']);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        $result = curl_exec($curl);
//        check curl error
        $error = null;
        if(curl_error($curl)){
            $error = curl_error($curl);
        }
        if(!is_null($error)){
            return false ;
        }
        $output = json_decode($result,true);
        if(is_null($output)) {
            return false ;
        }
        return  $output;
    }
//    send message function
    public static  function send_message( $_text , $_chat_id){
        $parameters = [
            "text" => $_text,
            "chat_id" => $_chat_id
        ];
        return self::execute('sendMessage' ,$parameters);
    }
    public static function get_update( $_offset = null ){
        $parameters = [];
        if(!is_null($_offset)){
            $parameters["offset"] = $_offset;
        }

        $result = self::execute('getUpdates' ,$parameters);

        if(!is_array($result)){
            return false;
        }
        return $result['result'];
    }
}