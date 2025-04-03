<?php

$curl = curl_init();
$token = "eyJ0eXAiOiJKV1QiLCJrZXlfaWQiOiJza192MS4wIiwiYWxnIjoiSFMyNTYifQ.eyJzdWIiOiIzQUNXTDYiLCJqdGkiOiI2N2IyY2Q2YjQwNzdjYjUyN2Y5OTNiZDQiLCJpc011bHRpQ2xpZW50IjpmYWxzZSwiaWF0IjoxNzM5NzcxMjQzLCJpc3MiOiJ1ZGFwaS1nYXRld2F5LXNlcnZpY2UiLCJleHAiOjE3Mzk4Mjk2MDB9.rzLtJxz_XXyuPFLLDdT-Jusxa36Cw0iHsx9ItDetYjU";

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.upstox.com/v2/option/chain?instrument_key=NSE_INDEX%7CNifty50&expiry_date=2025-02-27',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer ' . $token,

  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
