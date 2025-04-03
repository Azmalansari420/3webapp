<?php
 $user_id = $this->input->get('user_id');
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
   <head>
      <title><?php echo $page_title; ?> List</title>
       <?php $this->load->view('admin/include/allcss') ?>

   </head>
   <body class="theme-black">
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
      <!--  -->
      <div id="app" class="app app-header-fixed app-sidebar-fixed ">


        
          <?php $this->load->view('admin/include/header') ?>
          <?php $this->load->view('admin/include/sidebar') ?>


         
         <div id="content" class="app-content">
           
            <h1 class="page-header"><?php echo $page_title; ?> List</h1>

           

            <div class="row">
               
               <div class="col-xl-12">
                  <div class="panel panel-inverse">
                     <div class="panel-heading" style="justify-content: space-between;">
                        <h4 class="panel-title">All <?php echo $page_title; ?></h4>
                    
                     </div>

                     <div class="panel-body">
                        <div style="text-align: end;margin-bottom: 10px;">
                           <button  class="btn btn-primary" id="btnExport" onclick="fnExcelReport();" > Get Excel </button>
                        </div>
                        <div>
                            <?php 
                            $credit_amt = $this->db->select_sum('amount')->get_where('user_history',array('user_id'=>$user_id,'type'=>'credit'))->result_object()[0];  
                            $debit_amt = $this->db->select_sum('amount')->get_where('user_history',array('user_id'=>$user_id,'type'=>'debit'))->result_object()[0];  

                            ?>
                            <h2>Total Credit Amount:- <?=$credit_amt->amount ?></h2>
                            <h2>Total Debit Amount:- <?=$debit_amt->amount ?></h2>
                        </div>
                        <table id="headerTable" class="table table-striped table-bordered align-middle">
                           <thead>
                              <tr>
                                 <th width="1%">#</th>
                                 <th class="text-nowrap">Request Amount</th>
                                 <th class="text-nowrap">Date Time</th>
                                 <th class="text-nowrap">Type</th>
                                 <th class="text-nowrap">Message</th>
                                 <!-- <th class="text-nowrap">Action</th> -->
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                             
                              $i=0;
                              $userdetails = $this->db->get_where('user_history',array('user_id'=>$user_id))->result_object();
                           
                              foreach ($userdetails as $key => $data) 
                                 {  $i++;

                                    $user = $this->db->get_where('users',array('id'=>$data->user_id))->result_object();

                                 ?>
                              <tr class="odd gradeX">
                                 <td width="1%" class="fw-bold text-dark">
                                    <label>
                                       <?php echo $i; ?>
                                       <input type="checkbox" name="multiple_delete[]" value="<?php echo $data->id; ?>" class="multiple_delete">
                                    </label>
                                 </td>
                                 <td><?=$data->amount ?></td>
                                 <td><?=date('d/m/Y h:i A',strtotime($data->date_time)) ?></td>
                                  <td><?=$data->type ?></td>
                                  <td><?=$data->message ?></td>

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



   <?php $this->load->view('admin/include/footer') ?>

 

   </body>
</html>