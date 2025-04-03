<?php

defined('BASEPATH') or exit('No direct script access allowed');
use Twilio\Rest\Client;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require APPPATH.'libraries/phpmailer/Exception.php';
require APPPATH.'libraries/phpmailer/PHPMailer.php';
require APPPATH.'libraries/phpmailer/SMTP.php';
class Custom_model extends CI_Model
{

    public function sendEmail($data)
    {
        
        $setting = setting();
        $cc = array();
        $bcc = array();

        $to = explode(",", $data['to']);
        if(!empty($data['cc']))
          $cc = explode(",", $data['cc']);
        if(!empty($data['bcc']))
          $bcc = explode(",", $data['bcc']);


        $subject = $data['subject'];
        $body = $data['body'];
        $mailusername = $setting->mailusername;
        $mailpassword = $setting->mailpassword;
        $mailhost = $setting->mailhost;
        $mail_type = $setting->mail_type;
        if(!empty($data['files']))
          $files = $data['files'];
        else
          $files = array();


        if($mail_type==2)
        {

            /* G mail */
                
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = $mailhost;
                $mail->SMTPAuth = true;
                $mail->Username = $mailusername; // Your gmail
                $mail->Password = $mailpassword; // Your gmail app password
                 $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                //$mail->SMTPDebug = 1;
                $mail->SMTPOptions = array(
                  'ssl' => array(
                      'verify_peer' => false,
                      'verify_peer_name' => false,
                      'allow_self_signed' => true
                  )
                );
                $mail->setFrom($mailusername); // Your gmail jha se jani he
                foreach ($to as $key => $value) 
                $mail->addAddress($value); 
                foreach ($cc as $key => $value) 
                $mail->addCC($value); 
                foreach ($bcc as $key => $value) 
                $mail->addBCC($value);

                if(!empty($files))
                foreach ($files as $key => $value) 
                  $mail->addAttachment($value); 

                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $body;

            /* G mail end */
        }
        else if($mail_type==3)
        {

            /* hostinger */

              $mail = new PHPMailer(true);
              $mail->isSMTP();
              $mail->Host = $mailhost;
              $mail->SMTPAuth = true;
              $mail->Username = $mailusername; // Your gmail
              $mail->Password = $mailpassword; // Your gmail app password
              $mail->SMTPSecure = 'tls';
              $mail->Port = 587;
              $mail->setFrom($mailusername); // Your gmail
              foreach ($to as $key => $value) 
              $mail->addAddress($value); 
              foreach ($cc as $key => $value) 
              $mail->addCC($value); 
              foreach ($bcc as $key => $value) 
              $mail->addBCC($value); 

              if(!empty($files))
                foreach ($files as $key => $value) 
                  $mail->addAttachment($value);

              $mail->isHTML(true);
              $mail->Subject = $subject;
              $mail->Body = $body;
              $mail->send();

            /* hostinger end */
        }
        else if($mail_type==1)
        {

            /* webmail */

              $mail = new PHPMailer(true);
              $mail->isSMTP();
              $mail->Host = $mailhost;
              $mail->SMTPAuth = true;
              $mail->Username = $mailusername; // Your gmail
              $mail->Password = $mailpassword; // Your gmail app password
               $mail->SMTPSecure = 'ssl';
              $mail->Port = 465;
              $mail->SMTPOptions = array(
                  'ssl' => array(
                      'verify_peer' => false,
                      'verify_peer_name' => false,
                      'allow_self_signed' => true
                  )
              );
              $mail->setFrom($mailusername); // Your gmail jha se jani he
              foreach ($to as $key => $value) 
              $mail->addAddress($value); 
              foreach ($cc as $key => $value) 
              $mail->addCC($value); 
              foreach ($bcc as $key => $value) 
              $mail->addBCC($value); 

              if(!empty($files))
                  foreach ($files as $key => $value) 
                    $mail->addAttachment($value);

              $mail->isHTML(true);
              $mail->Subject = $subject;
              $mail->Body = $body;

            /* webmail end */
          }





      if($mail->Send())
      {
          return 1;
      }
      else
      {
          return 0;
      }
    }
    public function insert_data($table_name,$data)
    {
      $data['add_date_time'] = date("Y-m-d H:i:s");
      $data['update_date_time'] = date("Y-m-d H:i:s");
      $data['is_delete'] = 0;

      $update_history[] = array("user_id"=>$this->session->userdata('id'),"date_time"=>date("Y-m-d H:i:s"),"type"=>"add",);
      $data['update_history'] = json_encode($update_history);

      if($this->db->insert($table_name,$data))
        return $this->db->insert_id();
      else
        return 0;      
    }
    public function update_data($table_name,$data,$where)
    {
      $data['update_date_time'] = date("Y-m-d H:i:s");
      $update_history = json_decode($this->db->select("update_history")->limit(1)->get_where($table_name,$where)->result_object()[0]->update_history);
      $update_history[] = array("user_id"=>$this->session->userdata('id'),"date_time"=>date("Y-m-d H:i:s"),"type"=>"edit",);
      $data['update_history'] = json_encode($update_history);
      if($this->db->update($table_name,$data,$where))
        return true;
      else
        return false;      
    }
    public function insert_slug($slug,$p_id,$table_name,$controller_name,$old_slug,$page_name)
    {
        $data = array(
          "slug"=>$slug,
          "table_name"=>$table_name,
          "page_name"=>$page_name,
          "controller_name"=>$controller_name,
          "p_id"=>$p_id,
        );
        $this->db->delete("slugs",array("table_name"=>$table_name,"p_id"=>$p_id,));
        if(empty($this->db->get_where("slugs",array("slug"=>$slug,))->result_object()))
        {
            $this->db->insert("slugs",$data);
        }
        else
        { 
            $i=1;
            while ($i <= 10)
            {
              $slug2 = $slug.'-'.$i;
              $get_data = $this->db->get_where("slugs",array("slug"=>$slug2,))->result_object();
              if(empty($get_data))
              {
                $data['slug'] = $slug2; 
                $slug = $slug2;
                $this->db->insert("slugs",$data);
                break;
              }
              $i++;
            } 
        }
        return $slug;
        // $this->db->update($table_name,array("name_slug"=>$slug,),array("id"=>$p_id,));
    }

    public function insert_meta_tags($slug,$old_slug)
    {     
        $data = array(
          "meta_title"=>$this->input->post("meta_title"),
          "meta_keyword"=>$this->input->post("meta_keyword"),
          "meta_description"=>$this->input->post("meta_description"),
          "meta_auther"=>$this->input->post("meta_auther"),
          "slug"=>$slug,
        );
        $this->db->delete("meta_tags",array("slug"=>$old_slug,));
      if(empty($this->db->get_where("meta_tags",array("slug"=>$slug,))->result_object()))
      {
          $this->db->insert("meta_tags",$data);
      }       
      else
      {
          $this->db->update("meta_tags",$data,array("slug"=>$slug,));
      }      
    }


    public function get_meta_tags()
    {
      $html = '';
      $base = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
      $base .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
      $url = explode($base, (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")[1];

      if(empty($url))
        $url = 'home';
      
      $meta_select ="page_name,meta_title,meta_keyword,meta_description,meta_auther";
      $meta_data = $this->db->select($meta_select)->get_where("meta_tags",array("slug"=>$url,"is_delete"=>0,"status"=>1,))->result_object();     


      $meta_title = '';
      $meta_keyword = '';
      $meta_description = '';
      $meta_auther = '';
      if(!empty($meta_data))
      {
        $meta_data = $meta_data[0];
         $meta_title = $meta_data->meta_title;
         $meta_keyword = $meta_data->meta_keyword;
         $meta_description = $meta_data->meta_description;
         $meta_auther = $meta_data->meta_auther;
      }else
      {

        $meta_data = $this->db->limit(1)->select($meta_select)->get_where("meta_tags",array("slug"=>'home',"is_delete"=>0,"status"=>1,))->result_object();
        if(!empty($meta_data))
        {
          $meta_data = $meta_data[0];
           $meta_title = $meta_data->meta_title;
           $meta_keyword = $meta_data->meta_keyword;
           $meta_description = $meta_data->meta_description;
           $meta_auther = $meta_data->meta_auther;
        }
      }



       $html = '
            <title>'.$meta_title.'</title>
            <meta name="keywords" content="'.$meta_keyword.'">
            <meta name="description" content="'.$meta_description.'"> 
            <meta name="meta_auther" content="'.$meta_auther.'"> 
          ';



      return $html;
    }


    public function wallet($user_id)
    {
      $amount = 0;

      $this->db->select("wallet");
      $user = $this->db->get_where("users",array("id"=>$user_id,))->result_object();
      if(!empty($user))
      {
        $amount = $user[0]->wallet;
      }
      return $amount;
    }


    public function wallet_credit_debit($user_id,$type,$amount,$message,$join_id,$type2='')
    {    
      $wallet_amount = $this->wallet($user_id);
      if($type=="debit")
      {
        $new_amount = $wallet_amount-$amount;
        $this->db->update("users",array("wallet"=>$new_amount,),array("id"=>$user_id,));      
      }
      else if($type=='credit')
      {
        $new_amount = $wallet_amount+$amount;
        $this->db->update("users",array("wallet"=>$new_amount,),array("id"=>$user_id,));
      }
      $history_data = array(
        "user_id"=>$user_id,
        "join_id"=>$join_id,
        "amount"=>$amount,
        "balance"=>$new_amount,
        "type"=>$type,
        "message"=>$message,
        "date_time"=>date("Y-m-d H:i:s"),
        "add_date_time"=>date("Y-m-d H:i:s"),
        "update_date_time"=>date("Y-m-d H:i:s"),
        "status"=>1,
        "type2"=>$type2,
        "is_delete"=>0,
      );
      if($this->db->insert("user_history",$history_data))
        return $this->db->insert_id();
      else
        return false;
    }


    public function win_credit_debit($user_id,$type,$amount,$message,$join_id,$type2='')
    {    
      $wallet_amount = 0;
      $user = $this->db->get_where("users",array("id"=>$user_id,))->result_object();
      if(!empty($user))
      {
        $wallet_amount = $user[0]->winning_amt;
      }
      if($type=="debit")
      {
        $new_amount = $wallet_amount-$amount;
        $this->db->update("users",array("winning_amt"=>$new_amount,),array("id"=>$user_id,));      
      }
      else if($type=='credit')
      {
        $new_amount = $wallet_amount+$amount;
        $this->db->update("users",array("winning_amt"=>$new_amount,),array("id"=>$user_id,));
      }
      $history_data = array(
        "user_id"=>$user_id,
        "join_id"=>$join_id,
        "amount"=>$amount,
        "balance"=>$new_amount,
        "type"=>$type,
        "message"=>$message,
        "date_time"=>date("Y-m-d H:i:s"),
        "add_date_time"=>date("Y-m-d H:i:s"),
        "update_date_time"=>date("Y-m-d H:i:s"),
        "status"=>1,
        "type2"=>$type2,
        "is_delete"=>0,
      );
      if($this->db->insert("user_history",$history_data))
        return $this->db->insert_id();
      else
        return false;
    }



// --------------------------------refer--------------------

    public function refer_wallet($user_id)
    {
      $amount = 0;

      $this->db->select("bonus_amt");
      $user = $this->db->get_where("users",array("id"=>$user_id,))->result_object();
      if(!empty($user))
      {
        $amount = $user[0]->bonus_amt;
      }
      return $amount;
    }


    /*wallet amt*/
    public function wallet_credit_debit_refer($user_id,$type,$amount,$message,$join_id,$type2='')
    {    
      $wallet_amount = $this->refer_wallet($user_id);
      if($type=="debit")
      {
        $new_amount = $wallet_amount-$amount;
        $this->db->update("users",array("bonus_amt"=>$new_amount,),array("id"=>$user_id,));      
      }
      else if($type=='credit')
      {
        $new_amount = $wallet_amount+$amount;
        $this->db->update("users",array("bonus_amt"=>$new_amount,),array("id"=>$user_id,));
      }
      $history_data = array(
        "user_id"=>$user_id,
        "join_id"=>$join_id,
        "amount"=>$amount,
        "balance"=>$new_amount,
        "type"=>$type,
        "message"=>$message,
        "date_time"=>date("Y-m-d H:i:s"),
        "add_date_time"=>date("Y-m-d H:i:s"),
        "update_date_time"=>date("Y-m-d H:i:s"),
        "status"=>1,
        "type2"=>$type2,
        "is_delete"=>0,
      );
      if($this->db->insert("user_history",$history_data))
        return $this->db->insert_id();
      else
        return false;
    }

    public function about_to_win_list($table_name)
    {
      $table_name = $table_name;
      $limit = 12;
      $page = 1;
      $page1 = 1;
      $offset = 0;
      $status = 1;
      $table_id = 1;
      $kyc_step = 0;
      $listcheckbox = [];
      $filter_search_value = '';
      $keys = '';
      $where_query = "";
      $order_by = "$table_name.id desc";
      $time_id = 0;
      $game_id = 0;
      $card_id = 0;
      $is_delete = 0;
      $session_id = 0;
      $panna = 0;
      $digit = 0;
      $post_data = $this->input->post('post_data');
      if(!empty($post_data))
      {
        $post_data = json_decode($post_data);
        if(!empty($post_data->limit))
          $limit = $post_data->limit;
        if(!empty($post_data->page))
          $page = $post_data->page;
        if(!empty($post_data->filter_search_value))
          $filter_search_value = $post_data->filter_search_value;
        if(!empty($post_data->keys))
          $keys = $post_data->keys;
        if(!empty($post_data->table_id))
          $table_id = $post_data->table_id;
        if(!empty($post_data->game_id))
          $game_id = $post_data->game_id;
        if(!empty($post_data->time_id))
          $time_id = $post_data->time_id;
        if(!empty($post_data->session_id))
          $session_id = $post_data->session_id;
        if(!empty($post_data->panna))
          $panna = $post_data->panna;
        if(!empty($post_data->digit))
          $digit = $post_data->digit;
        if(!empty($post_data->date))
          $date = $post_data->date;
      }
      
      
      $open_panna_win_number = "$panna";
      $close_panna_win_number ="";
      $jodi_win_number = '';
      $open_digit_win_number = $digit;
      $close_digit_win_number = '';
      $bid1 = '';
      $bid2 = '';
      $bid1_win_array = [];
      $bid2_win_array = [];

      $check_data = $this->db->get_where("game_result",array("game_id"=>$game_id,"time_id"=>$time_id,"date"=>$date,))->result_object();
      if(!empty($check_data) && $session_id==2)
      {
        $check_data = $check_data[0];
        $open_panna_win_number = $check_data->open_number;
        $open_digit_win_number = $check_data->open_single_number;
        $close_digit_win_number = $check_data->close_single_number;
        $close_panna_win_number = "$panna";               
      }

      

      $single_digit_number = $digit;
      $odd_digit_number = $digit;
      $red_bracket_digit_number = $digit;
      $single_panna_digit_number = $panna;
      $double_panna_digit_number = $panna;
      $tripple_panna_digit_number = $panna;
      $sp_dp_tp_panna_digit_number = $panna;
      $half_sangam_digit_number = $digit;
      $full_sangam_digit_number = $digit;
      $sp_motor_digit_number = $digit;
      $dp_motor_digit_number = $digit;

      if($session_id==1)
      {
        $bid1_win_array = array_merge([$single_digit_number],[$single_panna_digit_number],[$double_panna_digit_number],[$tripple_panna_digit_number],[$sp_dp_tp_panna_digit_number],[$sp_motor_digit_number],[$dp_motor_digit_number],[$odd_digit_number]);
        $bid2_win_array = array_merge([0]);
      }
      else
      {
        $close_digit_win_number = $digit;
        $jodi_digit_number = $check_data->open_single_number.$check_data->close_single_number;
        $bid2 = $panna;
        $bid1_win_array = array_merge([$single_digit_number],[$single_panna_digit_number],[$double_panna_digit_number],[$tripple_panna_digit_number],[$sp_dp_tp_panna_digit_number],[$sp_motor_digit_number],[$dp_motor_digit_number],[$jodi_digit_number],[$odd_digit_number]);
      }


      $where_query .= " $table_name.time_id='$time_id' and $table_name.game_id='$game_id' and ";      
      $only_date = $date;

      $year = date("Y",strtotime($date));
      $month = date("m",strtotime($date));
      $day = date("d",strtotime($date));

      if($month[0]==0)$month = $month[1];
      if($day[0]==0)$day = $day[1];
      $date = $year.'-'.$month.'-'.$day;
      $where_query .= " CONCAT(YEAR($table_name.add_date_time),'-',MONTH($table_name.add_date_time),'-',DAY($table_name.add_date_time))='$date'  and ";
      $where_query .= " $table_name.status='$status' and $table_name.is_delete='$is_delete' ";
      



      $this->db->where_in("session_id",$session_id);
      $this->db->where_in("bid",$bid1_win_array);
      $this->db->where_in("card_id",[1,2,3,4,5,6,7,8,11]);
      if(!empty($bid2_win_array))
      {
        $this->db->where_in("bid2",$bid2_win_array);
      }
      $this->db->order_by($order_by);
      $this->db->where($where_query);
      $this->db->limit($limit,$offset);
      $this->db
      ->select("users.fname as fname")
      ->select("users.image as image")
      ->select("users.mobile as mobile")
      ->select("users.wallet as wallet")
      ->select("users.id as user_id")

      ->select("game.name as game_name2")
      ->select("game_times.open_time as open_time")
      ->select("game_times.close_time as close_time")
      ->select("game_times.name as game_name")
      ->select("card.name as game_type")
      ->select("card.win_price as win_price")

      ->select("$table_name.id as id")
      ->select("$table_name.amount as amount")
      ->select("$table_name.bid as bid")
      ->select("$table_name.bid2 as bid2")
      ->select("$table_name.type as type")
      ->select("$table_name.session_id as session_id")
      ->select("$table_name.card_id as card_id")
      ->select("$table_name.add_date_time as add_date_time")

      ->join("game as game","$table_name.game_id=game.id","LEFT")
      ->join("users as users","$table_name.user_id=users.id","LEFT")
      ->join("game_times as game_times","$table_name.time_id=game_times.id","LEFT")
      ->join("card as card","$table_name.card_id=card.id","LEFT");
      $list = $this->db->get($table_name)->result_object();

      // print_r($this->db->last_query());


      $this->db->where_in("session_id",2);
      $this->db->where(array("type"=>15,"bid"=>$open_digit_win_number,"bid2"=>$close_panna_win_number,));
      $this->db->where_in("card_id",[9]);      
      $this->db->order_by($order_by);
      $this->db->where($where_query);
      $this->db->limit($limit,$offset);
      $this->db
      ->select("users.fname as fname")
      ->select("users.image as image")
      ->select("users.mobile as mobile")
      ->select("users.wallet as wallet")
      ->select("users.id as user_id")
      ->select("game.name as game_name2")
      ->select("game_times.name as game_name")
      ->select("game_times.open_time as open_time")
      ->select("game_times.close_time as close_time")
      ->select("card.name as game_type")
      ->select("card.win_price as win_price")
      ->select("$table_name.id as id")
      ->select("$table_name.amount as amount")
      ->select("$table_name.bid as bid")
      ->select("$table_name.bid2 as bid2")
      ->select("$table_name.type as type")
      ->select("$table_name.session_id as session_id")
      ->select("$table_name.card_id as card_id")
      ->select("$table_name.add_date_time as add_date_time")
      ->join("users as users","$table_name.user_id=users.id","LEFT")
      ->join("game as game","$table_name.game_id=game.id","LEFT")
      ->join("game_times as game_times","$table_name.time_id=game_times.id","LEFT")
      ->join("card as card","$table_name.card_id=card.id","LEFT");
      $half_sangam_list = $this->db->get($table_name)->result_object();

      $this->db->where_in("session_id",2);
      $this->db->where(array("type"=>16,"bid2"=>$close_digit_win_number,"bid"=>$open_panna_win_number,));
      $this->db->where_in("card_id",[9]);      
      $this->db->order_by($order_by);
      $this->db->where($where_query);
      $this->db->limit($limit,$offset);
      $this->db
      ->select("users.fname as fname")
      ->select("users.image as image")
      ->select("users.mobile as mobile")
      ->select("users.wallet as wallet")
      ->select("users.id as user_id")
      ->select("game.name as game_name2")
      ->select("game_times.name as game_name")
      ->select("game_times.open_time as open_time")
      ->select("game_times.close_time as close_time")
      ->select("card.name as game_type")
      ->select("card.win_price as win_price")
      ->select("$table_name.id as id")
      ->select("$table_name.amount as amount")
      ->select("$table_name.bid as bid")
      ->select("$table_name.bid2 as bid2")
      ->select("$table_name.type as type")
      ->select("$table_name.session_id as session_id")
      ->select("$table_name.card_id as card_id")
      ->select("$table_name.add_date_time as add_date_time")
      ->join("users as users","$table_name.user_id=users.id","LEFT")
      ->join("game as game","$table_name.game_id=game.id","LEFT")
      ->join("game_times as game_times","$table_name.time_id=game_times.id","LEFT")
      ->join("card as card","$table_name.card_id=card.id","LEFT");
      $half_sangam_list2 = $this->db->get($table_name)->result_object();



      $this->db->where_in("session_id",2);
      $this->db->where(array("type"=>17,"bid2"=>$close_panna_win_number,"bid"=>$open_panna_win_number,));
      $this->db->where_in("card_id",[10]);      
      $this->db->order_by($order_by);
      $this->db->where($where_query);
      $this->db->limit($limit,$offset);
      $this->db
      ->select("users.fname as fname")
      ->select("users.image as image")
      ->select("users.mobile as mobile")
      ->select("users.wallet as wallet")
      ->select("users.id as user_id")
      ->select("game.name as game_name2")
      ->select("game_times.name as game_name")
      ->select("game_times.open_time as open_time")
      ->select("game_times.close_time as close_time")
      ->select("card.name as game_type")
      ->select("card.win_price as win_price")
      ->select("$table_name.id as id")
      ->select("$table_name.amount as amount")
      ->select("$table_name.bid as bid")
      ->select("$table_name.bid2 as bid2")
      ->select("$table_name.type as type")
      ->select("$table_name.session_id as session_id")
      ->select("$table_name.card_id as card_id")
      ->select("$table_name.add_date_time as add_date_time")
      ->join("users as users","$table_name.user_id=users.id","LEFT")
      ->join("game as game","$table_name.game_id=game.id","LEFT")
      ->join("game_times as game_times","$table_name.time_id=game_times.id","LEFT")
      ->join("card as card","$table_name.card_id=card.id","LEFT");
      $full_sangam_list = $this->db->get($table_name)->result_object();
      

      $listd = array_merge($list,$half_sangam_list,$half_sangam_list2,$full_sangam_list);

      $data['game_id'] = $game_id;
      $data['time_id'] = $time_id;
      $data['session_id'] = $session_id;
      $data['panna'] = $panna;
      $data['open_panna_win_number'] = $open_panna_win_number;
      $data['close_panna_win_number'] = $close_panna_win_number;
      $data['open_digit_win_number'] = $open_digit_win_number;
      $data['close_digit_win_number'] = $close_digit_win_number;
      $data['jodi_win_number'] = $jodi_win_number;
      $data['date'] = $only_date;
      $data['list'] = $listd;
      return $data;
    }



}

