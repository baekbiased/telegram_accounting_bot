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
    $message = urlencode('Enter in this format: <\br> brand e.g "Visa Card" (required) <\br> Number e.g "123456789" (required) <\br> pin1 e.g "12434" (optional) <\br> pin2 e.g "12434" (optional) <\br> value e.g "2000" (required) <\br> purchase rate e.g "0.7" (required)');
    $message2 = "e.g. 'giftcard 1234567812345678 1234 5678 2000 0.5 yes 200 save this info'";
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

$url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$message2";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
$result = curl_exec($ch);
curl_close($ch);

?>