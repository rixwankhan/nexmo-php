<?php
// Get the PHP helper library from url
require_once ('../Services/Nexmo.php');


//search virtual number
$client = new Services_Nexmo();
$result = $client->search_number('US', array());
echo $result;


//buy virtual number
$client = new Services_Nexmo();
$result = $client->buy_number('US', '12675097576');
echo $result;


//update virtual number callbackurl and sms callbackurl
$client = new Services_Nexmo();
$result = $client->update_number('US', '12675097576', array(
    'voiceCallbackType'=>'vxml',
    'voiceCallbackValue'=>'callback url here'
));
echo $result;


//cancel number
$client = new Services_Nexmo();
$result = $client->buy_number('US', '12675097576');
echo $result;


