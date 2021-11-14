<?php

$input = file_get_contents('php://input');
$data = json_decode($input);

$chat_id = $data->message->chat->id;
$message = $data->message->text;

$token = '2146837900:AAHUtkbxso65QAULLvK-ciCT01PPCv-6Lvg';
//$message = $message . " Webhook Reply";

if (str_contains($message, '/prepaid')) {
    $message = "Your command /credit";
}
elseif (str_contains($message, '/giftCard')) {
    $message = urlencode('Enter in this format: \n brand e.g "Visa Card" (required) \n Number e.g "123456789" (required) \n pin1 e.g "12434" (optional) \n pin2 e.g "12434" (optional) \n value e.g "2000" (required) \n purchase rate e.g "0.7" (required)');
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