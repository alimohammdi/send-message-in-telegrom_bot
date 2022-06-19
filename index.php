<?php 

define('TOKEN','5491967367:AAHL6XbmOCgPHFAmV1Myul_PnAYXA3eeV9Q');

$url = 'https://api.telegram.org/bot'.TOKEN.'/';
$chat_id = "330045578";

$get_me = $url . "getMe";
$send_massage = $url . "sendMessage?text=hi ali&chat_id=".$chat_id;

$curl = curl_init($send_massage);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
$result = curl_exec($curl);

echo "\n";
var_dump($result);