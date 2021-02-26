<?php
include('/../vendor/autoload.php');
use Telegram;

$result = Telegram::getUpdates();
$text = $result['message']['text'];
$chat_id = $result['message']['chat']['id'];
$name = $result['message']['form']['username'];
$first_name = $result['message']['form']['first_name'];
$last_name = $result['message']['form']['last_name'];

if($text == "/start") {
    $reply = "Hello World!";
    Telegram::sendMessage([
        'chat_id' => $chat_id,
        'text' => $reply
    ]);
}
