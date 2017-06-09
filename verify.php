<?php
$access_token = 'K1IWohnjcPI3OZ9l4IeYz9YT5plWDTv9g9VmPN08PdJD7pbyv+GRzVeI7zl4WVlpf/DAcu2q/nJqh6IAXS9JYER5MHAhX4RtDyKgg8AOfPdd7hgK+rKQxLk8ZjkMrZJ8SCTZf/MORouXmLm++jdH8gdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
