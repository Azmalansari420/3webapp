<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Participantes List</title>
         <?php $this->load->view('admin/include/allcss') ?>

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


         
         <div id="content" class="app-content">
           
            <h1 class="page-header">Participantes List</h1>

            <div class="row">
               
               <div class="col-xl-12">
                  <div class="panel panel-inverse">
                     <div class="panel-heading" style="justify-content: space-between;">
                        <h4 class="panel-title">All Participantes</h4>
                     </div>

                     <div class="panel-body">
                        <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
                           <thead>
                              <tr>
                                 <th >#</th>
                                 <th class="text-nowrap">Username</th>
                                 <th class="text-nowrap">Participantes Game Username</th>
                                 <th class="text-nowrap">Participantes Game UID</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $i=0;
                              $this->db->order_by('id desc');
                              $participates = $this->db->get_where('join_match_participates',array('match_id'=>$EDITDATA[0]->id))->result_object();

                              foreach ($participates as $key => $data) 
                                 {  $i++; 

                                    $user = $this->crud->selectDataByMultipleWhere('users',array('id'=>$data->user_id,));

                                   ?>
                              <tr class="odd gradeX">
                                 <td width="1%" class="fw-bold text-dark">
                                    <label>
                                       <?php echo $i; ?>
                                       <input type="checkbox" name="multiple_delete[]" value="<?php echo $data->id; ?>" class="multiple_delete">
                                    </label>
                                 </td>                                 
                                 <td class=""><?php if(!empty($user)){ echo $user[0]->fname;}else{echo 'user not Found';} ?></td>
                                 <td class=""><?php echo $data->username; ?></td>
                                 <td class=""><?php echo $data->game_uid; ?></td>
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