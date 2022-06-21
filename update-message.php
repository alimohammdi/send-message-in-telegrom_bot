<?php
include __DIR__ . '/telegramlib.php';

$messages = Telegramlib::get_update();

$last_message_id = 0;
foreach($messages as $message){
    $chat_id = $message['message']['chat']['id'];
    $get_message =  'ممنون بابت پیام ' . $message['message']['text'];
    Telegramlib::send_message($get_message,$chat_id);
    $last_message_id = $message['update_id'];
}

$massages = Telegramlib::get_update($last_message_id + 1);


