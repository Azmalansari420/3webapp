<?php


?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Satta King</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
   
    .live-number {
/*        background: black;*/
        text-align: center;
        padding: 20px;
        margin: 5px 0;
        height: 150px;
        border-radius: 16px;
    }
    .live-number h2 {
        color: blue;
        padding-top: 9px;
    }
    .live-number p {
        color: white;
    }
    .live-number h1 {
        color: red;
    }
    .number {
    display: contents;
    align-items: center;
    justify-content: center;
    background: #bc1e2d;
    height: 75px;
    width: 75px;
    border-radius: 50%;
}


.number {
    position: relative;
}
img.logo-img {
    height: 75px;
    margin-bottom: 14px;
}
.time-date {
    background-image: linear-gradient(to bottom,#ab0405 0,#e73b3b 100%);
    padding: 27px 0;
}
.fire {
    color: #f00;
    text-shadow: 0px -2px 4px #fff, 0px -2px 10px #FF3, 0px -10px 20px #F90, 0px -20px 40px #C33;
    font-size: 40px;
    font-weight: bold;
}
.result h2{
    text-align: center;
    padding: 12px 0;
}
.blink {
          animation: blinker 1.5s linear infinite;
          color: white;
          font-family: sans-serif;
      }
      @keyframes blinker {
          50% {
              opacity: 0;
          }
      }

.name-acc{
      font-size: 17px;
    font-weight: 900;
}
  </style>

</head>
<body>


  <div>
      <!-- <div class="container"> -->
        <img style="color:white;font-weight: bold;padding: 5px;text-align: center;margin-bottom: 20px;height: 100%;width: 100%;" src="<?php echo base_url(); ?>assets/banner.jpg" class="img-fluid logo-img">
      <!-- </div> -->
  </div>


   <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row" style="justify-content: center;">
          <?php
            
                $this->db->order_by("id desc");
                $this->db->limit(1);
                $number = $this->db->get_where("number")->result_object();
                if(!empty($number))
                {
                  $number = $number[0];
                $data = $this->crud->selectDataByMultipleWhere('game',array('status'=>1,"id"=>$number->game_id,));
              ?>
          <div class="col-md-3">
            <div class="live-number">
              <h2><?php echo $data[0]->name; ?></h2>
              <div class="number">
                <button class="btn" style="border-radius: 50%;">
                  <h1 class="fire">
                  <?php                     
                        echo $number->number;
                  ?>
                </h1>
                </button>
              </div>

            </div>
          </div>
        <?php } ?>
        



        </div>
      </div>
    </div>
  </div>

  <div class = "main text-center">
    <marquee class="marq" bgcolor = "black" direction = "left" scrollamount="7" style="padding: 10px 0;color: white;font-weight: 600;">
      <div class="geek1">आज की गेम लेने के लिए हमारे व्हाट्सप्प पे ज्वाइन करे क्लिक करें. क्लिक करें |</div>
    </marquee>
    
    <p class="name-acc">༆༆༆༆༆༆༆༆༆༆༆༆༆༆༆༆༆<br>
 ꧁AVINASH BHAI ONLINE KHAIWAL꧂</p>


    <p class="name-acc">▬▬▬▬▬▬ஜ۩۞۩ஜ▬▬▬▬
    <br>🤷‍♀️ ईमानदारी में बड़ा नाम 🤷‍♀️
    <br>𓀬TIME ♲ TABLE𓀬  
    <br>᯽⊱┈────╌❊╌────┈⊰᯽
    <br>⦿दिल्ली बाजार।    ☞ 02:45 PM]
    <br>⦿श्री  गणेश।          ☞ 04:15 PM]
    <br>⦿फरीदाबाद।         ☞ 05:45 PM]
    <br>⦿ग़ज़िआबाद।       ☞ 08:00  PM]
    <br>⦿दिल्ली ताज।       ☞ 09:45 PM]
    <br>⦿गली।                  ☞ 10:45 PM]
    <br>⦿दिसावर।             ☞ 01:30 AM]
    <br>⦿⦿⦿⦿⦿⦿⦿⦿⦿⦿⦿⦿⦿
    <br>★पेमेंट रेट★
    <br>जोड़ी ➪10₹ के 9️⃣5️⃣0️⃣₹
    <br>हर्फ़   ➪100₹ के 9️⃣5️⃣0️⃣₹
    <br>▬▭▬▭▬▭▬▭▬▭▬▭▬▭
    <br>🔰सुपर फास्ट पेमेंट का वादा🔰
    <br>⦿फोन पे, गूगल पे, पेटीएम टू ट्रांसफर ⦿
    <br>📲9311737477
    <br>▬▬▬▬ஜ۩۞۩ஜ▬▬▬▬
    <br>➪ईमानदारी से काम करना है तो हमारे पास आइए**
    <br>▬▭▬▭▬▭▬▭▬▭▬▭▬▭
    <br>☟गेम भेजने के लिए इसको टच करे☟</p>
    <a href="https://api.whatsapp.com/send?phone=919311737477"><button style="height: 40px;width: 180px;background-color: black;color:#FFF;border: double 3px red;border-radius: 20px;">
        <font><b>WhatsApp NOW</b></font>
        </button>
      </a>
    </div>




  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 text-center" style="margin:50px 0;background: black;">
        <div class="time-date" style="background: black;display: inline-block;
    width: 30%;">

          <form method="get" action="<?=base_url() ?>#table">

            <select class="form-control" name="year" required style="margin-bottom: 10px;">
              <option value="">Select Year</option>
              <?php  
              $this->db->group_by("year");
              $this->db->order_by("year asc");
              $years = $this->db->get_where("number",array("status"=>1,))->result_object();
              foreach ($years as $key => $value) 
              {
                $selected = '';
                 if($value->year==$year)
                  $selected = 'selected';
              ?>
              <option <?=$selected ?> value="<?=$value->year ?>"><?=$value->year ?></option>
              <?php } ?>
            </select>

            <select class="form-control" name="month" required style="margin-bottom: 10px;">
              <option value="">Select month</option>
              <?php  
 
              for ($m=1; $m<=12; $m++) {
               $month_name = date('F', mktime(0,0,0,$m, 1, date('Y')));
               $month_name_val = date('M', mktime(0,0,0,$m, 1, date('Y')));

               $selected = '';
               if($month_name_val==$month_string)
                $selected = 'selected';
               
               
              ?>
              <option <?=$selected ?> value="<?=$month_name_val ?>"><?=$month_name ?></option>
              <?php } ?>
            </select>          
          <input class="btn btn-primary" type="submit" name="submit">
        </form>

        </div>
      </div>
    </div>
  </div>


<?php


?>












   <div class="container table-responsive" style="padding-bottom:20px;"> 
   <div class="result">
     <h2>Result </h2>
   </div>
  <table class="table table-bordered table-hover" id="table">
       <thead class="thead-dark">
        <tr>
          <th scope="col">Day</th>           
          
          <?php
          $game_ids = array(); 
          $order_by_game = 'sort desc';
          $this->db->order_by($order_by_game);
          $game_data = $this->db->get_where("game",array("status"=>1,))->result_object();
          foreach ($game_data as $key => $value)
          {
            $game_ids[] = $value->id;
          ?>
           <th scope="col"><?=$value->name ?></th>
          <?php } ?>
          </tr>
      </thead>    

      <tbody>
            <?php 

            $list=array();
            for($d=1; $d<=31; $d++)
            {
                $time=mktime(12, 0, 0, $month, $d, $year);          
                if (date('m', $time)==$month)       
                    $print_date=date('d-m-Y', $time);
                    $date=date('Y-m-d', $time);
                    $date_for = $this->crud->selectDataByMultipleWhere('number',array('create_on'=>$date,));
                  if(!empty($date_for))
                  {      
            ?>
          <tr>
              <th scope="row">
               <?=$print_date ?>
              </th>


              <?php
              foreach ($game_ids as $key => $value)
              {
                $number_print = 'xx';
                $number = $this->db->get_where("number",array("game_id"=>$value,"create_on"=>$date,"year"=>$year,"month"=>$month_string,"status"=>1,))->result_object();
                if(!empty($number))
                {
                  $number = $number[0];
                  $number_print = $number->number;

                }
              ?>
                <td>
                  <?php  
                  // echo $month;

                  ?>
                  <?=$number_print ?></td>
              <?php } ?>

          </tr>
        <?php  }} ?>         
       
      </tbody>
    </table>
  </div>




  <div style="background: black;color:white;font-weight: bold;padding: 5px;text-align: center;padding-top:40px;">
    <h2>!!! DISCLAIMER !!!</h2>
    <p style=" font-size: 16px; color:#fff; ">This is a Non Commercial website. We Show Only News and Provide Entertainment. Viewing This Website Is On Your Own Risk... All The Information Shown on Website is Sponsored and We Warn You That Satta is Your Country May be Banned of Illegal..... We Are Not Responsible For Any Issues OR Scam.... We Respect All Country Rules / Laws.... If You Not Agree / Satisfied With Our Site Disclaimer.... Please Quit Our Site Right Now And Never Visit This Site Again. Thank you....</p>

   <!--  <p style="font-size:22px; color:#fff;">Site Owner Contact Number</p>

    <p style="font-size:25px; color:#fff;">+91-9311737477</p>
    
    <a href="https://api.whatsapp.com/send?phone=919311737477"><button style="height: 40px;width: 180px;background-color: black;color:#FFF;border: double 3px red;border-radius: 20px;">
      <font ><b>WhatsApp NOW</b></font>
      </button>
    </a>
  </div> -->

  <div class="footer-bottom" style="background-color:black;padding: 25px 0;text-align: center;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p>2022  All Rights Reserved by Satta King.</p>
          </div>
        </div>
      </div>
    </div>

</body>
</html>
