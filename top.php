<?php
 
$strAccessToken = "OiCgsPiq2xxMp6Q/XzuTDXKSrW6dD1KiexayhVCEsIVKln6SnhKrmmPNWSvOJwjef/DAcu2q/nJqh6IAXS9JYER5MHAhX4RtDyKgg8AOfPe3r6etkqLmVXjXqneWyg2CBzjTNciCT+u7n4x7c7ZrKAdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";

//function extract_int($str){  
    //$str=str_replace(",","",$str);
     //preg_match('/[[:digit:]]+\.?[[:digit:]]*/', $str, $regs);  
     //return (doubleval($regs[0])); 
//}     
//$num = extract_int($arrJson);

//$num1=str_split($arrJson);
//$num2=str_split($arrJson,1);
//$operator=str_split($arrJson,2)
//=====================================================================//
//====================================================================//
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดีค่ะ";
 
}
else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ";
 
}
else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
}
else if($arrJson['events'][0]['message']['text'] == "12ss"){
      foreach ($arrJson as $element) {
        if (is_numeric($element)) {
           $arrPostData = array();
           $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
           $arrPostData['messages'][0]['type'] = "text";
           $arrPostData['messages'][0]['text'] = "".($element);
        }
 
 
}
else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>
