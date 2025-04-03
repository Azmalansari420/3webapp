<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
use Google\Auth\Credentials\ServiceAccountCredentials;

$token = "eFnSlsoaQImgYGQDFyJaqG:APA91bFUml1HhNexTkZXiNvXkSYE9vDIqWfagNPuxWYA-AiUN0oYmPQfYpGK0y3LVINJi9XtQuVSRo29AtFB0WC-F4uu-4i8xpmpudO_Vs-84Rx3QjKImbs";

function getAccessToken($credentialsPath) {
    $scopes = ['https://www.googleapis.com/auth/cloud-platform'];
    $credentials = new ServiceAccountCredentials(
        $scopes,
        $credentialsPath
    );
    $accessToken = $credentials->fetchAuthToken()['access_token'];
    return $accessToken;
}

function sendFCMNotification($title, $body, $token) {
    $serviceAccountPath = 'knowledge-wave-india-firebase-adminsdk-ms372-7579836880.json';
    $serviceAccountPathjson = json_decode(file_get_contents($serviceAccountPath));
    $project_id = $serviceAccountPathjson->project_id;
    $accessToken = getAccessToken($serviceAccountPath);
    
    // Print the token to confirm
    echo "FCM Token: " . $token . "<br>";

    $message = [
        'message' => [
            'topic' => 'allnoti2',
            // 'token' => $token,
            'notification' => [
                'title' => $title,
                'body'  => $body
            ]
        ]
    ];    

    $url = 'https://fcm.googleapis.com/v1/projects/'.$project_id.'/messages:send';
    $headers = array
    (
        'Authorization: Bearer ' . $accessToken,
        'Content-Type: application/json'
    );
    
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, $url );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $message ) );
    
    $result = curl_exec($ch );
    curl_close( $ch );

    echo "FCM Notification Result: " . $result . "\n"; // You can print the result of the notification request.
}

$title = 'Hello, World!';
$body = 'This is a test notification.';
sendFCMNotification($title, $body, $token);

?>
