<?php
//DAte 
date_default_timezone_set("ASIA/KOLKATA");
$date 		= date("Y-m-d"); 
$add_date   = date('Y-m-d H:i:m');
$add_date_time   = date('Y-m-d H:i:m');
$time       = date("H:i:m");
$add_time   = date("H:i:m");


//define table name
$u_r_table  = "user_register";

//smtp mail server details
define('MAIL_HOST','onlineneetprep.com');
define('MAIL_USER','no-reply@onlineneetprep.com');
define('MAIL_PASS','eklavya@123');
define('MAIL_SUBJECT','Eklavya');
define('MAIL_NAME','Eklavya');

//Define paths
define('HP','upload/');
define('PSP','upload');
define('AUP','../upload/');
define('UUP','upload');
define('AIP','web-admin/upload/');
define('base_url','https://aduetechnologies.com/fivestar/');
define('TITLE','<title>Eklavya</title>');
define('LOGIN_TITLE','Eklavya');
 
//extract post $_POST 
@extract($_POST);
//owner state
$month_list = array('1' =>'January' ,'2' =>'February' ,'3' =>'March' ,'4' =>'April' ,'5' =>'May' ,'6' =>'June' ,'7' =>'July' ,'8' =>'August' ,'9' =>'September' ,'10' =>'October' ,'11' =>'November' ,'12' =>'December' ); 


?>