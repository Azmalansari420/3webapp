<?php
   $sitesetting = $this->crud->fetchdatabyid('1','site_setting');
   $id = $this->input->get('id');
   $game = $this->crud->selectDataByMultipleWhere('game',array('id'=>$id));
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
      <style>
         .table-section table th {
         background-color: orange;
         color: #000000;
         }
      </style>
      <div class="header" style="display: flex;justify-content: space-between;padding: 0 20px;align-items: center;background-color: #000;">
         <h1 class="new-logo py-4 m-0 text-uppercase">
            <a href="<?=base_url() ?>"><b><span><?=website_name ?></span></b></a>
         </h1>
         <a href="goa-king.apk" class="btn btn-success sky-btn sky-two-btn">Download App</a>
      </div>
      <!-- website-linksection ends-->
      <div class="content-section">
         <div class="text-center py-3">
            <h4><?php if(!empty($game)){echo $game[0]->name;}else{echo 'Not Found!';} ?> <?php echo date("Y") ?> Chart</h4>
         </div>
         <div class="table-section table-responsive">
            <table class="table table-striped">
               <tbody>
                  <?php
                     $this->db->order_by('create_on desc');
                     $game_number = $this->db->get_where("game_result", array("game_id" => $id))->result_object();
                     
                     $currentYear = '';
                     $currentMonth = '';
                     foreach ($game_number as $key => $value)
                     {
                        $recordYear = date('Y', strtotime($value->create_on));
                        $recordMonth = date('F', strtotime($value->create_on));
                     
                        if ($currentYear !== $recordYear) 
                        {
                          $currentYear = $recordYear;
                          echo "<tr><th colspan='2'><strong style='color:#ff0000;'>Year: $currentYear</strong></th></tr>";
                        }
                        if ($currentMonth !== $recordMonth) 
                        {
                             $currentMonth = $recordMonth;
                             echo "<tr><th colspan='2'><strong>Month: $currentMonth</strong></th></tr>";
                         }
                        
                      ?>
                  <tr>
                     <th><?=$value->create_on ?></th>
                     <th><?=$value->number ?></th>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>


      <footer>
         <p style="font-weight: 600">
            &copy; (<?=date("Y") ?>) <?=website_name ?> All Rights Reserved.
         </p>
      </footer>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>