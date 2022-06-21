<?php
include __DIR__ . '/telegramlib.php';
Telegramlib::init();
//send message (hi ali mohammadi ) to user with chat id = 00000000
$send_massage = Telegramlib::send_message("hi ali mohammadi " , "330045578");
return $send_massage;
