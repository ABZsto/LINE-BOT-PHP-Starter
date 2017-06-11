
<?php
$access_token = 'OiCgsPiq2xxMp6Q/XzuTDXKSrW6dD1KiexayhVCEsIVKln6SnhKrmmPNWSvOJwjef/DAcu2q/nJqh6IAXS9JYER5MHAhX4RtDyKgg8AOfPe3r6etkqLmVXjXqneWyg2CBzjTNciCT+u7n4x7c7ZrKAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
