<?php
// Get the PHP helper library from url
require_once ('../Services/Nexmo.php');

$client = new Services_Nexmo();
$result = $client->call('to_number','from_number','fqdn_vxml_url', array());
echo $result;



