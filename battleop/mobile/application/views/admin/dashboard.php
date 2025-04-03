<?php 
$user = $this->crud->selectDataByMultipleWhere('tbl_admin',array('id'=>$this->session->userdata("id"),));

$matchescount = $this->db->count_all('matches'); 

// ----ongoing-----
$this->db->where('status',1);
$ongoing = $this->db->get('matches');
$count_ongoing = $ongoing->num_rows(); 

// -------upcoming--
$this->db->where('status',0);
$upcoming = $this->db->get('matches');
$count_upcoming = $upcoming->num_rows(); 

/*-----complete---*/
$this->db->where('status',2);
$complete = $this->db->get('matches');
$count_complete = $complete->num_rows(); 


/*------income--*/
$income_credit = $this->db->select_sum('balance')->get_where('user_history',array('type'=>'credit'))->result_object();
$income_credit = $income_credit[0]->balance;

$income_debit = $this->db->select_sum('balance')->get_where('user_history',array('type'=>'debit'))->result_object();
$income_debit = $income_debit[0]->balance;





?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Dashboard</title>
      <?php $this->load->view('admin/include/allcss') ?>
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
   </head>
   <body>
      <div id="snackbar"><?php echo $this->session->flashdata('message'); ?></div>
     <?php if($this->session->flashdata('message')){ ?>
       <script>
         function myFunction() {
           var x = document.getElementById("snackbar");
           x.className = "show";
           setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
         }
         myFunction();
         </script>
  
   <?php } ?>
      <?php echo loder; ?>
      
      <div id="app" class="app app-header-fixed app-sidebar-fixed ">

         <?php $this->load->view('admin/include/header') ?>
         <?php $this->load->view('admin/include/sidebar') ?>
         
<style>
   .pie-chart {
       min-height: 50px;
           background: white;
   }
   .panel-heading {
    background: var(--bs-gray-900);
    color: var(--bs-white);
}
 .panel-heading {
    padding: 0.75rem 0.9375rem;
    border: none;
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}
.panel-heading .panel-title {
    font-size: .75rem;
    margin: 0;
    line-height: 1.35;
    flex: 1;
}
.panel-heading .panel-heading-btn {
    display: flex;
    align-items: center;
}
.class-img {
    background: black;
    padding: 14px 0px;
}

.class-img>h3, p, h4 {
   color: white;
}

.p-text{
   font-size: 14px;
    font-weight: 600;
}
.prog-bar{
   padding: 10px;
}
</style>

         
         <div id="content" class="app-content">
            <ol class="breadcrumb float-xl-end">
               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
               <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <h1 class="page-header">Dashboard</h1>

            <div class="row">

               <div class="col-xl-6 col-md-6 text-center">
                  <div class="widget widget-stats bg-blue">
                     <div class="stats-icon"><i class="fa fa-cogs"></i></div>
                     <div class="stats-info">
                        <p>Total Reg User<br>(<?php echo $this->db->count_all('users'); ?>)</p>
                     </div>
                  </div>
               </div>
               <!-- <div class="col-xl-4 col-md-6 text-center">
                  <div class="widget widget-stats bg-blue">
                     <div class="stats-icon"><i class="fa fa-cogs"></i></div>
                     <div class="stats-info">
                        <p>Total Admin User<br>(live ke bad)</p>
                     </div>
                  </div>
               </div> -->

               <div class="col-xl-6 col-md-6 text-center">
                  <div class="widget widget-stats bg-blue">
                     <div class="stats-icon"><i class="fa fa-cogs"></i></div>
                     <div class="stats-info">
                        <p>Total Withdraw Req.<br>(<?php echo $this->db->count_all('withdraw_request'); ?>)</p>
                     </div>
                  </div>
               </div>

               <!-- ----chart -->

             <!--   <div class="col-xl-4 ">
                  <div class="pie-chart">
                     <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">TOURNAMENT SUMMERY</h4>
                     </div>

                     <div id="donut-example"></div>

                     <div class="row mt-3 mb-3">
                        <div class="col-xl-12 text-center">
                           <div class="class-img">
                              <h3>Total Match</h3>
                              <p class="m-0 p-text"><?php echo $this->db->count_all('matches'); ?></p>
                           </div>
                        </div>
                        <div class="col-xl-4 text-center mt-2">
                           <h4 class="text-dark">Ongoing</h4>
                           <p class="text-dark p-text"><?=$count_ongoing ?></p>
                        </div>
                        <div class="col-xl-4 text-center mt-2">
                           <h4 class="text-dark">Upcoming</h4>
                           <p class="text-dark p-text"><?=$count_upcoming ?></p>
                        </div>
                        <div class="col-xl-4 text-center mt-2">
                           <h4 class="text-dark">Completed</h4>
                           <p class="text-dark p-text"><?=$count_complete ?></p>
                        </div>
                     </div>
                  </div>
               </div> -->

           <!--     <div class="col-xl-4 ">
                  <div class="pie-chart">
                     <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">TOTAL REVENUE </h4>
                     </div>
                     <div id="donut-example2"></div>

                     <div class="row mt-3 mb-3">
                        <div class="col-xl-12 text-center">
                           <div class="class-img">
                              <h3>Loss</h3>
                              <p class="m-0 p-text"><?=$income_credit-$income_debit ?></p>
                           </div>
                        </div>
                        <div class="col-xl-6 text-center mt-2">
                           <h4 class="text-dark">Total Expense</h4>
                           <p class="text-dark p-text"><?=$income_debit ?></p>
                        </div>
                        <div class="col-xl-6 text-center mt-2">
                           <h4 class="text-dark">Total Income</h4>
                           <p class="text-dark p-text"><?=$income_credit ?></p>
                        </div>
                     </div>
                  </div>
               </div> -->

               <div class="col-xl-6">
                  <div class="" style="background:white;">
                     <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">MATCH COUNTER</h4>
                     </div>

                     <div class="panel-body">
                        <div class="row">
                           <div class="col-md-12 mb-3 mb-md-0">
                              <?php
                              $games = $this->db->get_where('games',array('status'=>1,))->result_object();
                              foreach($games as $data)
                                 {
                                    
                                    $this->db->where('game_id',$data->id);
                                    $query = $this->db->get('matches');
                                    $counter = $query->num_rows();
                                    if($counter>0 && $matchescount>0)
                                       $bar = $counter/$matchescount*100;
                                    else $bar = 0;


                                  ?>
                              <div class="prog-bar">
                                 <h4 class="text-dark"><?=$data->name ?></h4>
                                 <div class="progress mb-2">
                                    <div class="progress-bar fs-10px fw-bold" style="width: <?=$bar ?>%"><?=$counter ?></div>
                                 </div>
                              </div>
                              <?php } ?>
                              
                           </div>
                        </div>
                     </div>

                  </div>
               </div>

               <div class="col-xl-6 ">
                  <div class="panel panel-inverse" data-sortable-id="table-basic-6">
                     <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">NEW REGISTRATION</h4>
                        <div class="panel-heading-btn">
                           <a href="<?php echo base_url('admin_con/users/listing');?>" class="btn btn-primary">View All</a>
                        </div>
                     </div>
                     <div class="panel-body">
                        <div class="table-responsive">
                           <table class="table table-bordered mb-0">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email Address</th>
                                    <th>Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 $i=0;
                                 $this->db->order_by('id desc');
                                 $this->db->limit(5);
                                 $user = $this->db->get_where('users')->result_object();
                                 foreach($user as $data)
                                    { $i++; ?>
                                 <tr>
                                    <td><?=$i ?></td>
                                    <td><?=$data->fname ?></td>
                                    <td><?=$data->mobile ?></td>
                                    <td><?=$data->email ?></td>
                                    <td><?=date('d/m/Y h:i A',strtotime($data->date_time)) ?></td>
                                 </tr>
                              <?php } ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>


               <div class="col-xl-6 ui-sortable">
                  <div class="panel panel-inverse" data-sortable-id="table-basic-5">
                     <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">RECENT REDEEM REQUEST</h4>
                        <div class="panel-heading-btn">
                           <a href="<?=base_url('admin_con/withdraw_request/listing') ?>" class="btn btn-primary">View All</a>
                        </div>
                     </div>
                     <div class="panel-body">
                        <div class="table-responsive">
                           <table class="table table-bordered mb-0">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>UPI ID</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                 </tr>
                              </thead>
                              <tbody>   
                              <?php
                              $i=0;
                              $this->db->order_by('id desc');
                              $this->db->limit(5);
                              $withdraw_request = $this->db->get_where('withdraw_request')->result_object();
                              foreach($withdraw_request as $data)
                              { $i++; 
                                 $user = $this->crud->selectDataByMultipleWhere('users',array('id'=>$data->user_id));
                              ?>                              
                                 <tr>
                                    <td><?=$i ?></td>
                                    <td><?php if(!empty($user)) echo $user[0]->fname; ?></td>
                                    <td><?=$data->upi_no ?></td>
                                    <td><?=$data->amount ?></td>
                                    <td><?=date('d/m/Y h:i A',strtotime($data->date_time)) ?></td>
                                 </tr>
                              <?php } ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>

            </div>

            


         </div>
       
      </div>




         <?php $this->load->view('admin/include/footer') ?>

 <script id="rendered-js" >



Morris.Donut({
  element: 'donut-example',
  data: [
  { label: "Ongoing", value: <?=$count_ongoing ?> },
  { label: "Upcoming", value: <?=$count_upcoming ?> },
  { label: "Completed", value: <?=$count_complete ?> }] 
});




Morris.Donut({
  element: 'donut-example2',
  data: [
  { label: "Total Expense", value: <?=$income_debit ?> },
  { label: "Total Income", value: <?=$income_credit ?> }] 
});








    </script>






   </body>
</html>