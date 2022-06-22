<?php
include __DIR__ . '/telegramlib.php';
include __DIR__ . '/controller.php';


$updates = Telegramlib::get_update();

$last_message_id = 0;
foreach($updates as $update){
    $controller = new controller();
    $controller->handle($update);
    $last_message_id = $update['update_id'];
}

$massages = Telegramlib::get_update($last_message_id + 1);


