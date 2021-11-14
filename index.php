<?php

$input = file_get_contents('php://input');
$data = json_decode($input);

$chat_id = $data->message->chat->id;
$message = $data->message->text;

$token = '2146837900:AAHUtkbxso65QAULLvK-ciCT01PPCv-6Lvg';
//$message = $message . " Webhook Reply";

if (str_contains($message, '/credit')) {
    $message = "Your command /credit";
}
elseif (str_contains($message, '/debit')) {
    $message = "Your command /debit";
}
else {
    $message = "Please enter valid command!!!";
}

$url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$message";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
$result = curl_exec($ch);
curl_close($ch);

?>