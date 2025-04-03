<?php
 $user_id = $this->input->get('user_id');
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
   <head>
      <title>Tournament Participation List</title>
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
           
            <h1 class="page-header">Tournament Participation List</h1>

           

            <div class="row">
               
               <div class="col-xl-12">
                  <div class="panel panel-inverse">
                     <div class="panel-heading" style="justify-content: space-between;">
                        <h4 class="panel-title">All Tournament Participation</h4>
                    
                     </div>

                     <div class="panel-body">
                      
                        <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
                           <thead>
                              <tr>
                                 <th width="1%">#</th>
                                 <th class="text-nowrap">Match ID</th>
                                 <th class="text-nowrap">Match Title</th>
                                 <th class="text-nowrap">Pubg ID</th>
                                 <th class="text-nowrap">Win PlayCoins</th>
                                 <th class="text-nowrap">Date</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                             
                              $i=0;
                              $this->db->group_by('join_id');
                              $this->db->order_by('id desc');
                              $userdetails = $this->db->get_where('user_history',array('user_id'=>$user_id,'type2'=>2))->result_object();
                           
                              foreach ($userdetails as $key => $data) 
                                 {  $i++;

                                    $user = $this->db->get_where('users',array('id'=>$data->user_id))->result_object();
                                    $matchname = $this->db->get_where('matches',array('id'=>$data->join_id))->result_object();

                                    // $this->db->group_by('user_id');
                                    $join_match_participates = $this->db->get_where('join_match_participates',array('match_id'=>$data->join_id,'user_id'=>$data->user_id))->result_object();
                                    // print_r($join_match_participates);

                                 ?>
                              <tr class="odd gradeX">
                                 <td width="1%" class="fw-bold text-dark">
                                    <label>
                                       <?php echo $i; ?>
                                       <input type="checkbox" name="multiple_delete[]" value="<?php echo $data->id; ?>" class="multiple_delete">
                                    </label>
                                 </td>
                                 <td><?=$data->join_id ?></td>
                                 <td><?php if(!empty($matchname)) echo $matchname[0]->match_title; else echo 'not found';  ?></td>
                                 <td>
                                    All Join Username<br>
                                    <?php
                                    foreach($join_match_participates as $value)
                                    { ?>
                                       Username:- <?=$value->username ?><br>
                                    <?php } ?>
                                 </td>
                                  <td><?php if(!empty($join_match_participates)) echo $join_match_participates[0]->winning_amt ?></td>
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



   <?php $this->load->view('admin/include/footer') ?>

 

   </body>
</html>