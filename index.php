<?php

$token = '2119894887:AAG8Eh8GhUf7CkKogN_tWn4VH6GsJ9XIvSM';
$chat_id = '2117661388';
$message = 'from hereku!!!';
$url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$message";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
$result = curl_exec($ch);
curl_close($ch);

$result = json_decode($result, true);

if (isset($result['ok'])){
    if (isset($result['result'])){
        echo "D0ne";
    }
    else{
        echo $result['description'];
    }
}
else{
    echo "Something Went Wrong";
}



?>
