
<?php
$access_token = 'Gmd8dwuuvkVewGzaq0xk8lqrl4rZV/wAv4ZQM97mJcitjItN21gXY43XLxFchH30f/DAcu2q/nJqh6IAXS9JYER5MHAhX4RtDyKgg8AOfPdrxdKIC3ddPZYYkUsaUhx0MTe8ENVM6t4+FEJLKEpibAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
