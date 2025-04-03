<?php
$about =  $this->db->get_where('content',array('id'=>4))->result_object();
$headline =  $this->db->get_where('content',array('id'=>5))->result_object();
?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <?php include('include/allcss.php'); ?>
   </head>
   <style>
      .pd-top-110 {
      padding-top: 35px;
      }
       .language-selector select {
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 5px 5px;
      font-size: 14px;
   }
   </style>
   <body class='sc5'>
      <!-- preloader area start -->
      <?php include('include/loader.php'); ?>
      <!-- preloader area end -->
      <div class="body-overlay" id="body-overlay"></div>
      <div class="container">
         <div class="main-home-area">
          <!-- top bar -->
            <div class="profile-area">
               <div class="media">
                  <a href="edit-profile.php" class="thumb">
                  <img src="<?=base_url() ?>media/uploads/users/<?=$full_detail->profile_image ?>" alt="img" onerror="this.src='<?=base_url() ?>media/uploads/users/user-profile.png'" width="44px" height="44px">
                  </a>
                  <div class="media-body">
                     <span class="profile-name"><?=$full_detail->name ?> [DA<?=$full_detail->user_id ?>]</span>
                     <div class="balance"> 
                        <span> <img src="<?=base_url() ?>assets/coin.png" alt="img"> </span>
                        <strong>&nbsp; <?=$full_detail->wallet ?> </strong> 
                     </div>
                  </div>
               </div>
               <div class="btn-wrap">
                  <div class="language-selector" style="position: relative;top: 7px;    ">
                      <select id="languageDropdown">
                          <option value="english" <?= ($this->session->userdata('current_lang') == 'english') ? 'selected' : '' ?>>English</option>
                          <option value="hindi" <?= ($this->session->userdata('current_lang') == 'hindi') ? 'selected' : '' ?>>हिन्दी</option>
                      </select>
                  </div>
                  <a class="icon-btn" href="notification.php"><i class="ri-notification-3-line"></i> <span class="badge"><?=count_unread_notifications($full_detail->id) ?></span></a>
               </div>
            </div>

            <!-- bannert -->  
            <div class="banner-slider owl-carousel pd-top-110 mb-1">
               <?php
                  $this->db->order_by('id desc');
                  $slider = $this->db->get_where('slider',array('status'=>1,))->result_object();
                  foreach($slider as $data)
                    { ?>
               <div class="item">
                  <img src="<?=base_url() ?>media/uploads/slider/<?=$data->image ?>" alt="img">
               </div>
               <?php } ?>
            </div>

            <!-- marquee -->
            <div class="marquee-line">
               <marquee><?=$headline[0]->content ?></marquee>
            </div>

            <?php
            $gamename = "WAIT";
            // Fetch today's last number
            $this->db->where('DATE(create_on)', date('Y-m-d')); 
            $this->db->order_by("id desc");
            $this->db->limit(1);
            $number = $this->db->get_where("game_result")->result_object();

            if (!empty($number)) {
                $number = $number[0];
                $data = $this->crud->selectDataByMultipleWhere('game', array('status' => 1, "id" => $number->game_id));
               if (!empty($data[0]))
               {
                  $gamename = $data[0]->name;
               }
               else
               {
                  $gamename = "WAIT";

               }
             }
            ?>

            <!-- last game redult -->
            <div class="live-result-box">
               <h3 class="game-name"><?=lang($gamename) ?></h3>
               <div class="result-box">
                  <img src="<?=base_url() ?>assets/img/icon/trophy.svg" alt="Winner Left" class="winner-image">
                  <div class="number" style="color: #000000;background: #ffffff;"><?php if(!empty($number->number)){ echo $number->number;} else{echo 'XX';} ?></div>
                  <img src="<?=base_url() ?>assets/img/icon/trophy.svg" alt="Winner Right" class="winner-image">
               </div>
            </div>

            <div class="text-box-2">
               <?=$about[0]->content ?>
            </div>

            <!-- upcoming Game -->
            <div class="result-box-name">
               <p><?=lang('Live Games') ?></p>
            </div>
            <div class="upcoming-games">
               <div class="game-row">

                <?php
                  $time = date("H:i:s");
                  $this->db->order_by('order_by asc');
                  $games = $this->db->get_where('game', array('status' => 1))->result_object();

                  foreach ($games as $data) 
                  {
                      $open_time = date('H:i:s', strtotime($data->open_time));
                      $close_time = date('H:i:s', strtotime($data->close_time));

                      if ($close_time < $open_time) 
                      {
                          if ($time >= $open_time || $time <= $close_time) {
                              $open_class = "open";
                              $open_status = "Open";
                              $open_url = "game-select.php?game_id=$data->id&id=$device_id";
                          } else {
                              $open_class = "";
                              $open_status = "Close";
                              $open_url = "javascript:void(0);";
                          }
                      } else {
                          if ($time >= $open_time && $time <= $close_time) {
                              $open_class = "open";
                              $open_status = "Open";
                              $open_url = "game-select.php?game_id=$data->id&id=$device_id";
                          } else {
                              $open_class = "";
                              $open_status = "Close";
                              $open_url = "javascript:void(0);";
                          }
                      }
                      ?>

                         <a href="<?=$open_url ?>" class="game-card">
                             <div class="game-header">
                                 <div class="game-icon"><?=$data->short_name ?></div>
                                 <div class="status <?=$open_class ?>"><?=lang($open_status) ?></div>
                             </div>
                             <h3 class="game-title"><?=lang($data->name) ?></h3>
                             <!-- <div class="game-time"><?=date('h:i A', strtotime($data->result_time)) ?></div> -->
                             <p class="game-detail"><?=lang("Start Time") ?> : <strong><?=date('h:i A', strtotime($open_time)) ?></strong></p>
                             <p class="game-detail"><?=lang("Close Time") ?> : <strong><?=date('h:i A', strtotime($close_time)) ?></strong></p>
                         </a>

                     <?php } ?>



                  


               </div>
            </div>

            <!-- live result  -->
            <div class="result-box-name">
               <p><?=website_name ?> <?=lang("Live  Result Of"); ?> <?php echo date("d M Y") ?></p>
            </div>
            <?php
            $this->db->order_by('order_by asc');
            $game = $this->db->get_where('game',array('status'=>1,))->result_object();
            foreach($game as $data)
               {
                  $todayNumberValue = "xx";
                  $yesterdayNumberValue = "xx";

                  $this->db->where('DATE(create_on)', date('Y-m-d'));
                  $this->db->order_by("id desc");
                  $this->db->limit(1);
                  $todayNumber = $this->db->get_where("game_result",array('game_id'=>$data->id))->result_object();
                  if (!empty($todayNumber)) 
                  {
                     $todayNumber = $todayNumber[0];
                     $todayNumberValue = $todayNumber->number;
                  }

                  // Fetch yesterday's number for the same game_id
                  $this->db->where('DATE(create_on)', date('Y-m-d', strtotime('-1 day')));
                  $this->db->order_by("id desc");
                  $this->db->limit(1);
                  $yesterdayNumber = $this->db->get_where("game_result",array('game_id'=>$data->id))->result_object();
                   if (!empty($yesterdayNumber)) 
                   {
                       $yesterdayNumber = $yesterdayNumber[0];
                       $yesterdayNumberValue = $yesterdayNumber->number;
                   }

                  

                  // print_r($number);


                ?>
            <div class="result-card">
               <div class="result-card-content">
                  <div class="result-card-left">
                     <div class="icon-box"><?=$data->short_name ?></div>
                     <div class="market-details">
                        <h3><?=lang($data->name) ?></h3>
                        <p><?=lang("Last Winning Number") ?>:- <?=$yesterdayNumberValue ?></p>
                     </div>
                  </div>
                  <div class="result-card-right">
                     <div class="winning-number"><?=$todayNumberValue ?></div>
                  </div>
               </div>
            </div>
         <?php } ?>

          
            
            <?php include('include/menubar.php'); ?>
         </div>
      </div>
      <?php include('include/chat-btn.php'); ?>
      <?php include('include/allscript.php'); ?>
   </body>
</html>