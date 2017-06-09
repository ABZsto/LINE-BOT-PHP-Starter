<?php
curl -X POST \
-H 'Content-Type:application/json' \
-H 'Authorization: Bearer 3HXZA6OLw8b6CRXO7XP/2MejydjIdz/W6LKxpf3gMnT9KDgcP/SBjL+tWOKr6BxBf/DAcu2q/nJqh6IAXS9JYER5MHAhX4RtDyKgg8AOfPfSrr6xJngznmpABi5q4OB2xO+xNj2FhLFPUMQisaGgVwdB04t89/1O/w1cDnyilFU=' \
-d '{
    "replyToken":"nHuyWiB7yP5Zw52FIkcQobQuGDXCTA",
    "messages":[
        {
            "type":"text",
            "text":"Hello, user"
        },
        {
            "type":"text",
            "text":"May I help you?"
        }
    ]
}' https://api.line.me/v2/bot/message/reply
$access_token = '3HXZA6OLw8b6CRXO7XP/2MejydjIdz/W6LKxpf3gMnT9KDgcP/SBjL+tWOKr6BxBf/DAcu2q/nJqh6IAXS9JYER5MHAhX4RtDyKgg8AOfPfSrr6xJngznmpABi5q4OB2xO+xNj2FhLFPUMQisaGgVwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
