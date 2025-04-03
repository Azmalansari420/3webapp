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
        define("databseuri","https://battle-op-c9242-default-rtdb.firebaseio.com/");

       $acc = ServiceAccount::fromJsonFile(APPPATH.'models/battle-op-c9242-firebase-adminsdk-57atg-6432d4bc95.json');
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
   public function chrome_status($data)
    {
        $this->insert_chrome($data);
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
        $this->database->getReference("chrome")->getChild($userID)->remove();
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
    public function insert_chrome(array $data) {
         if (empty($data) || !isset($data)) { return FALSE; }
         foreach ($data as $key => $value){
             $this->database->getReference()->getChild("chrome")->getChild($key)->set($value);
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
            'Authorization: key=AAAA5zjtl94:APA91bFpu9pdmXPeUDOqojhQ2gYVdU-GbIkJXZBXHBdCNsrblgkehYqW0hfa3_34KiDOoo2MSA26SStlZ6AfbgIvbCg8GDU37lNPvZwpn9_ahm6Af8Ti1Gbt-L0Rkprkh8BRc6Q1gdN2',
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

     
      public function push_notification_single($token,$message,$title)
      {
          $msg = array(
                'body'   => $message,
                'title'  => $title,
                'vibrate' => 1,
                );
           $fields = array
               (
                 'to'    => $token,
                  'notification' => $msg,
               );
         $curl = curl_init();
         curl_setopt_array($curl, array(
           CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_ENCODING => '',
           CURLOPT_MAXREDIRS => 10,
           CURLOPT_TIMEOUT => 0,
           CURLOPT_FOLLOWLOCATION => true,
           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode( $fields ),
           CURLOPT_HTTPHEADER => array(
             'Authorization: key=AAAA5zjtl94:APA91bFpu9pdmXPeUDOqojhQ2gYVdU-GbIkJXZBXHBdCNsrblgkehYqW0hfa3_34KiDOoo2MSA26SStlZ6AfbgIvbCg8GDU37lNPvZwpn9_ahm6Af8Ti1Gbt-L0Rkprkh8BRc6Q1gdN2',
             'Content-Type: application/json'
           ),
         ));
         $response = curl_exec($curl);
         curl_close($curl);
         return $response;
      }
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     

}