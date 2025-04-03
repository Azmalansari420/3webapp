<?php 


// error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

use Google\Auth\ApplicationDefaultCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;



    
require 'vendor/autoload.php';

use Google\Auth\CredentialsLoader;
use Google\Auth\OAuth2;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


$acc = ServiceAccount::fromJsonFile('knowledge-wave-india-firebase-adminsdk-ms372-7579836880.json');


$serviceAccountPath = 'knowledge-wave-india-firebase-adminsdk-ms372-7579836880.json';
$serviceAccountPathjson = json_decode(file_get_contents($serviceAccountPath));
$project_id = $serviceAccountPathjson->project_id;
define("databseuri","https://knowledge-wave-india-default-rtdb.firebaseio.com/");

$firebase = (new Factory)->withServiceAccount($acc)->withDatabaseUri(databseuri)->create();
$database = $firebase->getDatabase();


function call_status($data)
{
    global $database;
    if (empty($data) || !isset($data)) { return FALSE; }
    foreach ($data as $key => $value){
         $database->getReference()->getChild("make_call")->getChild($key)->set($value);
    }
    return TRUE;
}


$data = array(1=>array(time()=>array("mobile"=>123,)));
call_status($data);
