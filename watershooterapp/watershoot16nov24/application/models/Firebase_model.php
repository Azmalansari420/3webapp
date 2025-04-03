<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require APPPATH . '/libraries/firebase/index.php';
require_once APPPATH.'vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
class Firebase_model extends CI_Model
{
	protected $database;
    protected $dbname = 'calingstatus';
    protected $dbname_chatstatus = 'chatstatus';
    protected $dbname_chat = 'ChatData';
     
    public function __construct()
    {
        parent::__construct();
        define("databseuri","https://kalyan-3291e-default-rtdb.firebaseio.com/");

       $acc = ServiceAccount::fromJsonFile(APPPATH.'models/kalyan-3291e-firebase-adminsdk-dbyam-3cd3bec0a8.json');
       $firebase = (new Factory)->withServiceAccount($acc)->withDatabaseUri(databseuri)->create();
       $this->database = $firebase->getDatabase();
    }



    public function call_status($data)
    {
        $this->insert_call($data);
    }
   public function whatsapp_status($data)
    {
        $this->insert_whatsapp($data);
    }
   public function upi_status($data)
    {
        $this->insert_upi($data);
    }
    public function delete_whatsapp($userID)
    {
        if (empty($userID) || !isset($userID)) { return FALSE; }
        $this->database->getReference("whatsapp_call")->getChild($userID)->remove();
        $this->database->getReference("make_call")->getChild($userID)->remove();
        $this->database->getReference("upi")->getChild($userID)->remove();
    }
    public function get_data()
    {
        print_r($this->get(11802155161));
    }



    public function insert_call(array $data) {
         if (empty($data) || !isset($data)) { return FALSE; }
         foreach ($data as $key => $value){
             $this->database->getReference()->getChild("make_call")->getChild($key)->set($value);
         }
         return TRUE;
     }

    public function insert_whatsapp(array $data) {
         if (empty($data) || !isset($data)) { return FALSE; }
         foreach ($data as $key => $value){
             $this->database->getReference()->getChild("whatsapp_call")->getChild($key)->set($value);
         }
         return TRUE;
     }
    public function insert_upi(array $data) {
         if (empty($data) || !isset($data)) { return FALSE; }
         foreach ($data as $key => $value){
             $this->database->getReference()->getChild("upi")->getChild($key)->set($value);
         }
         return TRUE;
     }





  	public function get(int $userID = NULL){    
         if (empty($userID) || !isset($userID)) { return FALSE; }
         if ($this->database->getReference($this->dbname)->getSnapshot()->hasChild($userID)){
             return $this->database->getReference($this->dbname)->getChild($userID)->getValue();
         } else {
             return FALSE;
         }
     }
     public function insert(array $data) {
         if (empty($data) || !isset($data)) { return FALSE; }
         foreach ($data as $key => $value){
             $this->database->getReference()->getChild($this->dbname)->getChild($key)->set($value);
         }
         return TRUE;
     }
     public function delete($userID) {
         if (empty($userID) || !isset($userID)) { return FALSE; }
         if ($this->database->getReference($this->dbname)->getSnapshot()->hasChild($userID)){
             $this->database->getReference($this->dbname)->getChild($userID)->remove();
             return TRUE;
         } else {
             return FALSE;
         }
     }


     public function insert_chat(array $data) {
         if (empty($data) || !isset($data)) { return FALSE; }
         foreach ($data as $key => $value){
             $this->database->getReference()->getChild($this->dbname_chatstatus)->getChild($key)->set($value);
         }
         return TRUE;
     }
     public function get_chat(int $userID = NULL){    
         if (empty($userID) || !isset($userID)) { return FALSE; }
         if ($this->database->getReference($this->dbname_chat)->getSnapshot()->hasChild($userID)){
             return $this->database->getReference($this->dbname_chat)->getChild($userID)->getValue();
         } else {
             return FALSE;
         }
     }
     public function delete_chat(int $userID) {
         if (empty($userID) || !isset($userID)) { return FALSE; }
         if ($this->database->getReference($this->dbname_chatstatus)->getSnapshot()->hasChild($userID)){
             $this->database->getReference($this->dbname_chatstatus)->getChild($userID)->remove();
             return TRUE;
         } else {
             return FALSE;
         }
     }
     
    public function push_notification($body,$title,$topic)
    {
        $msg = array
        (
            'body'  => $body,
            'title'     => $title,
            'vibrate'   => 1,
            'sound'     => 1,
        );
        
        $data['body'] = $body;
        $data['title'] = $title;
        
        $fields = array
        (
            'to'  => '/topics/'.$topic,
            'notification'  => $msg,
            'data' => $data
        );
        
        $headers = array
        (
            'Authorization: key=AAAAFfEJHxk:APA91bGgysTNa9_XEIncQfQrI05r47gz9H85bIPpUkAgt2cYmgY3bm5BulmelwFOnIYxsyDl2VeFpqwufeBjMmhv093no5gPV5f6-Hea6jbxRUYDNB53gl8Wl2T9XPQzLixfF1fPKfLZ',
            'Content-Type: application/json'
        );
        
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        
        return $result;
    }

     
     // public function push_notification($token,$message,$title)
     // {
     //     $msg = array(
     //           'body'   => $message,
     //           'title'  => $title,
     //           'vibrate' => 1,
     //           // 'image'=>"https://aduetechnologies.com/kuberkalyan/images/logo.png",

     //           );
     //      $fields = array
     //          (
     //            'to'    => $token,
     //             'notification' => $msg,
     //          );
     //    $curl = curl_init();
     //    curl_setopt_array($curl, array(
     //      CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
     //      CURLOPT_RETURNTRANSFER => true,
     //      CURLOPT_ENCODING => '',
     //      CURLOPT_MAXREDIRS => 10,
     //      CURLOPT_TIMEOUT => 0,
     //      CURLOPT_FOLLOWLOCATION => true,
     //      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     //      CURLOPT_CUSTOMREQUEST => 'POST',
     //       CURLOPT_POSTFIELDS => json_encode( $fields ),
     //      CURLOPT_HTTPHEADER => array(
     //        'Authorization: key=AAAAn08-A7g:APA91bE6mGLHL1LmbXMJyHu-TsK8pXuWB1n7xY2MkRMkGG91dFobOg1CNxyQwk1PRM4B1xxcZlHisGJ4X3wOBvcg5MQti5m1bfEYMLUv9PeG1P0n8r5pF7XBJ6ClnkRituwepD_EO6Kf',
     //        'Content-Type: application/json'
     //      ),
     //    ));
        
     //    $response = curl_exec($curl);
        
     //    curl_close($curl);
     //    // echo $response;
     //    return $response;
     // }
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     

}