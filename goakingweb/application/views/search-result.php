<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Satta King LS</title>
      <link
         href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
         rel="stylesheet"
         />
      <!-- css-link -->
      <link rel="stylesheet" href="<?=base_url() ?>assets/style.css" />
      <!-- icon-link -->
      <link
         rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
         />
   </head>
   <body>
      <div class="header" style="background-color: #000;">
         <!-- <h1 class="py-4 m-0">Satta King LS</h1> -->
         <h1 class="new-logo py-4 m-0 text-uppercase">
            <b>Sat<span>ta</span> King <span>LS</span></b>
         </h1>
      </div>
      

      <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 text-center" style="margin:50px 0;background: black;">
        <div class="time-date" style="background: black;display: inline-block;
    width: 30%;">

          <form method="get" action="<?=base_url('') ?>#table">

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



      <!-- website-linksection ends-->
      <div class="content-section">
         <div class="text-center py-3">
            <h4>Game <?php echo date("Y") ?> Chart</h4>
         </div>
         <div class="table-section table-responsive">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th>Date</th>
                     <?php
                      $game_ids = array(); 
                      $order_by_game = 'sort desc';
                      $this->db->order_by($order_by_game);
                      $game_data = $this->db->get_where("game",array("status"=>1,))->result_object();
                      foreach ($game_data as $key => $value)
                      {
                        $game_ids[] = $value->id;
                      ?>
                     <th><?=$value->name ?></th>
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
                      <?=$number_print ?></td>
                  <?php } ?>
                  </tr>
                <?php  } } ?>    
                 
               </tbody>
            </table>
         </div>
      </div>




      <footer>
         <p style="font-weight: 600">
            &copy; © (2017-2024) Satta-King LS.com All Rights Reserved.
         </p>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>