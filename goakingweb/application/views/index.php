<?php
   $sitesetting = $this->crud->fetchdatabyid('1','site_setting');
   $headline =  $this->db->get_where('content',array('id'=>5))->result_object();
   $box1 =  $this->db->get_where('content',array('id'=>6))->result_object();
   $box2 =  $this->db->get_where('content',array('id'=>7))->result_object();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title><?=website_name ?></title>
      <link rel="shortcut icon" type="image/x-icon" href="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"/>
      <!-- css-link -->
      <link rel="stylesheet" href="<?=base_url() ?>website/style.css" />
      <!-- icon-link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
   </head>
   <body>
      <div class="header" style="display: flex;justify-content: space-between;padding: 0 20px;align-items: center;background-color: #000;">
         <h1 class="new-logo py-4 m-0 text-uppercase">
            <a href="<?=base_url() ?>"><b><span><?=website_name ?></span></b></a>
         </h1>
         <a href="goa-king.apk" class="btn btn-success sky-btn sky-two-btn">Download App</a>
      </div>




      
      <section>
         <div class="container-fluid text-center sata-result py-4">
            <div class="buttons">
               <a
                  href="https://api.whatsapp.com/send?phone=<?=$sitesetting[0]->mobile ?>&amp;text=Hello"
                  class="button-53"
                  role="button"
                  >Whats app</a
                  >
               <a
                  href="tel:<?=$sitesetting[0]->mobile ?>"
                  class="button-53 right-button"
                  role="button"
                  >Call Now</a
                  >
            </div>
         </div>
      </section>
      <?php
         $gamename = "Wait";
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
               $gamename = "Wait";
         
            }
          }
         ?>
      <section>
         <div
            class="container-fluid py-4"
            style="
            text-align: center;
            border: 5px solid yellow;
            background-color: #000;
            border-radius: 10px;
            "
            >
            <p style="color: #fff; font-size: 20px; font-weight: 600">
               जी हाँ सबसे तेज़ और सी रिजल्ट् केवल इसी साइट पे मिलेगा
            </p>
            <h2 style="font-weight: 600; color: green"><?php if(!empty($data)) { echo $data[0]->name; } else { echo 'Wait'; } ?></h2>
            <span
               style="
               background-color: #fff;
               padding: 20px;
               border-radius: 50%;
               display: inline-block;
               font-size: 24px;
               font-weight: 600;
               color: red;
               "
               ><?php if(!empty($number->number)) { echo $number->number;} else{echo 'Wait';} ?></span
               >
         </div>
      </section>
      <h5 style="font-weight: 600; text-align: center; margin: 0">
         <?=website_name ?> Live  Result Of <?php echo date("d M Y") ?>
         <a href="javascript:void(0)"
            ><img src="<?=base_url() ?>website/images/item1.png" alt=""
            /></a>
      </h5>
      <section>
         <div class="container-fluid">
            <div class="row" style="background-color: #e5e7eb">
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
                  
                      ?>
               <div
                  class="col-lg-3"
                  style="border: 1px solid black; text-align: center; padding: 10px 0"
                  >
                  <h5 style="color: red; font-weight: 600"><?=$data->name ?></h5>
                  <p class="m-0"><strong><?=date('h:i A', strtotime($data->result_time)) ?></strong></p>
                  <p style="color: red; font-weight: 600; font-size: 20px">
                     <span style="color: green">{<?=$yesterdayNumberValue ?>}</span> =>
                     <span style="color: blue">[<?=$todayNumberValue ?>]</span>
                  </p>
               </div>
               <?php } ?>
            </div>
         </div>
      </section>
      <!-- website-linksection ends-->
      <div class="content-section" id="table">
         <div class="text-center py-3">
            <h4><strong>Monthly <?php echo date("M Y") ?> CHART</strong></h4>
         </div>
         <div class="table-section table-responsive">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th>Date</th>
                     <?php
                        $game_ids = array();
                        $game_data = $this->db->get_where("game", array("status" => 1))->result_object();
                        foreach ($game_data as $value) {
                            $game_ids[] = $value->id; ?>
                     <th><?= $value->name ?></th>
                     <?php } ?>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     // Get year and month from the form
                     $year = isset($_GET['year']) ? $_GET['year'] : date("Y");
                     $month_string = isset($_GET['month']) ? $_GET['month'] : date("M");
                     
                     // Generate dates for the month
                     $month_number = date('m', strtotime("1 $month_string")); // Convert month string to number
                     $list = array();
                     for ($d = 1; $d <= 31; $d++) {
                         $time = mktime(12, 0, 0, $month_number, $d, $year);
                         if (date('m', $time) == $month_number) {
                             $print_date = date('d-m-Y', $time);
                             $date = date('Y-m-d', $time);
                     
                             // Fetch results for the date
                             $date_for = $this->crud->selectDataByMultipleWhere('game_result', array('create_on' => $date, 'year' => $year, 'month' => $month_string));
                             if (!empty($date_for)) { ?>
                  <tr>
                     <th scope="row">
                        <?= $print_date ?>
                     </th>
                     <?php
                        foreach ($game_ids as $value) {
                            $number_print = 'xx';
                            $number = $this->db->get_where("game_result", array("game_id" => $value, "create_on" => $date, "year" => $year, "month" => $month_string, "status" => 1))->result_object();
                            if (!empty($number)) {
                                $number = $number[0];
                                $number_print = $number->number;
                            } ?>
                     <td><?= $number_print ?></td>
                     <?php } ?>
                  </tr>
                  <?php }
                     }
                     } ?>   
               </tbody>
            </table>
         </div>
      </div>
      <section>
         <div class="container-fluid text-center px-0">
            <h4 style="background-color: aliceblue;color: #000;margin: 0;padding: 20px 0;">
               Result Chart <?=date("Y"); ?>
            </h4>
            <div class="row w-100">
               <?php
                  $this->db->order_by('order_by asc');
                  $game = $this->crud->selectDataByMultipleWhere('game',array('status'=>1,));
                  foreach($game as $data)
                     { ?>
               <div class="col-sm-12 col-lg-12" style="background-color: green">
                  <p class="sata-result m-0">
                     <span class="pe-4">
                     <i class="fa-regular fa-calendar-check" style="color: #fff"></i>
                     </span>
                     <a href="record-chart?id=<?=$data->id ?>" style="color: #fff; font-weight: 600">
                     <?=$data->name ?> SATTA RECORD CHART <?=date("Y"); ?></a>
                  </p>
               </div>
               <?php } ?>
            </div>
         </div>
      </section>
      <section>
         <div
            class="container-fluid text-center py-4 questions"
            style="background-color: #b8d6f179"
            >
            <?=$box1[0]->content ?>
         </div>
      </section>
      <section>
         <div class="container-fulid text-center" style="background-color: #e5e7eb; border: 1px solid black">
            <?=$box2[0]->content ?>
         </div>
      </section>
      <footer>
         <p style="font-weight: 600">
            &copy; (<?=date("Y") ?>) <?=website_name ?> All Rights Reserved.
         </p>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>