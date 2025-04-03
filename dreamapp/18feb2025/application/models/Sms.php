<?php

class Sms extends CI_Model
{
  function sendsms($otp,$numbers)
  {

    $smskey = smskey;

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://www.fast2sms.com/dev/bulkV2?authorization='.$smskey.'&variables_values='.$otp.'&route=otp&numbers='.$numbers.'',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
  }


}

