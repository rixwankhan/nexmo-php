<?php
// Get the PHP helper library from url
require_once ('../Services/Nexmo.php');



$client = new Services_Nexmo();
$result = $client->sms('to_number','from_number','text_body_here', array());
echo $result;
