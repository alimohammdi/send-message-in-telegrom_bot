<?php 
// your bot token in telegram (give it from botfather)
include __DIR__ . '/env.php';
include __DIR__ . '/telegramlib.php';
Telegramlib::init();
//send message (hi ali mohammadi ) to user with chat id = 00000000
$send_massage = Telegramlib::send_message("hi ali mohammadi " , "00000000");
return $send_massage;
