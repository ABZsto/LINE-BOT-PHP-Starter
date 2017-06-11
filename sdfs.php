<?php
{
  "events": [
      {
        "replyToken": "u8b4544c027253be2993f7b87f058124c",
        "type": "message",
        "timestamp": 1519190751,
        "source": {
             "type": "user",
             "userId": "	
Uc256b7e100b0ad95ecc9140fea984eae"
         },
         "message": {
             "id": "1519190751",
             "type": "text",
             "text": "Hello, world"
          }
      }
  ]
}
$access_token = 'OiCgsPiq2xxMp6Q/XzuTDXKSrW6dD1KiexayhVCEsIVKln6SnhKrmmPNWSvOJwjef/DAcu2q/nJqh6IAXS9JYER5MHAhX4RtDyKgg8AOfPe3r6etkqLmVXjXqneWyg2CBzjTNciCT+u7n4x7c7ZrKAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
