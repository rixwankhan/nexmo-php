<?php
require_once 'config.php';


class Services_Nexmo
{

    function call($to,$from,$answer_url, array $optional)
    {
        global $api_key;
        global $api_secret;
        $answer_method = 'POST';
        $status_url = '';
        $status_method = 'POST';
        $error_url = '';
        $error_method = 'POST';
        $machine_detection = 'true';
        $machine_timeout = '10s';


            foreach($optional as $key=>$value)
            {

                if($key == 'answer_method'){$answer_method = $value;}

                if($key == 'status_url'){$status_url = $value;}

                if($key == 'status_method'){$status_method = $value;}

                if($key == 'error_url'){$error_url = $value;}

                if($key == 'error_method'){$error_method = $value;}

                if($key == 'machine_detection'){$machine_detection = $value;}

                if($key == 'machine_timeout'){$machine_timeout = $value;}

            }



        $url = 'https://rest.nexmo.com/call/json?' . http_build_query(array(
                'api_key' => $api_key,
                'api_secret' => $api_secret,
                'to' => $to,
                'from' => $from,
                'answer_url' => $answer_url,
                'answer_method' => $answer_method,
                'status_url' => $status_url,
                'status_method' => $status_method,
                'error_url' => $error_url,
                'error_method' => $error_method,
                'machine_detection' => $machine_detection,
                'machine_timeout' => $machine_timeout
            ));

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);


        return $response;

    }

    function sms($to,$from,$text, array $optional)
    {
        global $api_key;
        global $api_secret;

        $type = 'text';
        $status_report_req = 0;
        $client_ref = '';
        $callback = '';


        foreach($optional as $key=>$value)
        {

            if($key == 'type'){$type = $value;}

            if($key == 'status-report-req'){$status_report_req = $value;}

            if($key == 'client-ref'){$client_ref = $value;}

            if($key == 'callback'){$callback = $value;}

        }


        $url = 'https://rest.nexmo.com/sms/json?' . http_build_query(
                [
                    'api_key' =>  $api_key,
                    'api_secret' => $api_secret,
                    'to' => $to,
                    'from' => $from,
                    'text' => $text
                ]
            );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        return $response;

    }

    function search_number($country, array $optional)
    {
        global $api_key;
        global $api_secret;
        $features = 'VOICE,SMS';
        $size = 10;

        foreach($optional as $key=>$value)
        {

            if($key == 'pattern'){$pattern = $value;}

            if($key == 'features'){$features = $value;}

            if($key == 'size'){$size = $value;}

        }

        if(isset($pattern))
        {

            $url = 'https://rest.nexmo.com/number/search?' .  http_build_query([
                    'api_key' => $api_key,
                    'api_secret' => $api_secret,
                    'country' => $country,
                    'features' => $features,
                    'size' => $size,
                    'pattern' => $pattern
                ]);

        }
        else
        {

            $url = 'https://rest.nexmo.com/number/search?' .  http_build_query([
                    'api_key' => $api_key,
                    'api_secret' => $api_secret,
                    'country' => $country,
                    'features' => $features,
                    'size' => $size
                ]);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        return $response;

    }

    function buy_number($country, $msisdn)
    {
        global $api_key;
        global $api_secret;

            $url = 'https://rest.nexmo.com/number/buy?' .  http_build_query([
                    'api_key' => $api_key,
                    'api_secret' => $api_secret,
                    'country' => $country,
                    'msisdn' => $msisdn
                ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        $response = curl_exec($ch);

        return $response;

    }

    function cancel_number($country, $msisdn)
    {
        global $api_key;
        global $api_secret;

        $url = 'https://rest.nexmo.com/number/cancel?' .  http_build_query([
                'api_key' => $api_key,
                'api_secret' => $api_secret,
                'country' => $country,
                'msisdn' => $msisdn
            ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        $response = curl_exec($ch);

        return $response;

    }

    function update_number($country,$msisdn, array $optional)
    {
        global $api_key;
        global $api_secret;
        $moHttpUrl = '';
        $moSmppSysType = 'SMPP';
        $voiceCallbackType = '';
        $voiceCallbackValue = '';
        $voiceStatusCallback = '';

        foreach($optional as $key=>$value)
        {

            if($key == 'moHttpUrl'){$moHttpUrl = $value;}

            if($key == 'moSmppSysType'){$moSmppSysType = $value;}

            if($key == 'voiceCallbackType'){$voiceCallbackType = $value;}

            if($key == 'voiceCallbackValue'){$voiceCallbackValue = $value;}

            if($key == 'voiceStatusCallback'){$voiceStatusCallback = $value;}

        }

            $url = 'https://rest.nexmo.com/number/update?' .  http_build_query([
                    'api_key' => $api_key,
                    'api_secret' => $api_secret,
                    'country' => $country,
                    'msisdn' => $msisdn,
                    'moHttpUrl' => $moHttpUrl,
                    'moSmppSysType' => $moSmppSysType,
                    'voiceCallbackType' => $voiceCallbackType,
                    'voiceCallbackValue' => $voiceCallbackValue,
                    'voiceStatusCallback' => $voiceStatusCallback
                ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        $response = curl_exec($ch);

        return $response;

    }

}


