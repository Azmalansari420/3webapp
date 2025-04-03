<?php
// $test = $this->db->get_where('game_times')->result_object();
// foreach ($test as $key => $value) {
//     print_r(date("Y-m-d H:i:s", $value->time));
//     $this->db->update("game_times",["declare_date_time"=>date("Y-m-d H:i:s", $value->time),],["id"=>$value->id,]);
// }

// die;



$content = $this->db->get_where('content',array('id'=>5))->result_object();
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
                  <a href="menu-bar.php" class="thumb">
                    <img src="<?=base_url() ?>assets/menu.svg" alt="img" width="44px" height="44px">
                  </a>
                  <div class="media-body">
                     <span class="profile-name" style="font-size: 25px;"><?=website_name ?></span>
                  </div>
                  
               </div>
               
               <div class="btn-wrap">
                  <a class="icon-btn" href=""><i class="ri-share-line"></i></a>
               </div>
            </div>

<style type="text/css">
   .main-home-area .profile-area .media .thumb {
    border: 1px solid #614bff00;
    border-radius: 50%;
}

   .game-card {
           
            padding: 15px;
            background: #9d0104;
            color: white;
            border-radius: 10px;
            text-align: center;
            position: relative;
            font-family: Arial, sans-serif;            
             background-size: cover;
             background-blend-mode: saturation;
        }
        
        .game-time {
            font-size: 20px;
            font-weight: bold;
        }
        .game-detail {
            font-size: 14px;
            margin: 5px 0;
        }
        /**/
        .next-result {
    background: blue;
    color: white;
    font-size: 12px;
    font-weight: 600;
    border-radius: 3px;
}

        .game-card h3 {
             font-size: 33px;
             margin: 0 !important;
         }

         .marquee-div {
             margin-top: 17px;
         }
</style>


            <!-- upcoming Game -->
            <div class="marquee-div">
               <marquee>
                  <div class="result-box-name" style="padding: 6px 10px;">
                     <p><?=website_name ?></p>
                  </div>
               </marquee>
            </div>

            <div class="upcoming-games">
               <div class="game-row">


                <?php
                $games = $this->crud->selectDataByMultipleWhere('game', array('status' => 1));

                foreach ($games as $data) {
                    $game_id = $data->id;
                    $today = date("Y-m-d");
                    $current_time = date("H:i:s");

                    // ✅ Last declared number before current time
                    $last_number = $this->db
                        ->where("game_id", $game_id)
                        ->where("create_on", $today)
                        ->where("declare_time <", $current_time) // Pehle declared ho chuka ho
                        ->order_by("declare_time", "DESC") // Sabse latest lo
                        ->limit(1)
                        ->get("number")
                        ->row();

                    // ✅ Next number to be declared
                    $next_number = $this->db
                        ->where("game_id", $game_id)
                        ->where("create_on", $today)
                        ->where("declare_time >", $current_time) // Agle declare hone wale number ko lo
                        ->order_by("declare_time", "ASC") // Sabse pehle jo aayega
                        ->limit(1)
                        ->get("number")
                        ->row();

                        // print_r($next_number)

                    ?>
                    <a href="game-details.php?game_id=<?= $game_id ?>" class="game-card" style="background-image: url(<?= base_url() ?>media/uploads/game/<?= $data->image ?>);">
                        <h3 class="game-title"><?= !empty($last_number) ? $last_number->number : "N/A" ?></h3>
                        <div class=""><?= $data->name ?></div>
                        <div class="">(<?= !empty($last_number) ? date('h:i A',strtotime($last_number->declare_time)) : "N/A" ?>)</div>
                        <div class="next-result">Next Result - <?= !empty($next_number) ? date('h:i A',strtotime($next_number->declare_time)) : "N/A" ?></div>
                    </a>
                    <?php
                } ?>




               


                  

               </div>
            </div>

           
          
            
         </div>
      </div>
      <?php include('include/allscript.php'); ?>
   </body>
</html>