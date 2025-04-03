<?php
$id = $this->input->get('id');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Participate List</title>
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
      <!--  -->
      <div id="app" class="app app-header-fixed app-sidebar-fixed ">


        
          <?php $this->load->view('admin/include/header') ?>
          <?php $this->load->view('admin/include/sidebar') ?>


         
         <div id="content" class="app-content">
           
            <h1 class="page-header">Participate List</h1>

           

            <div class="row">
               
               <div class="col-xl-12">
                  <div class="panel panel-inverse">
                     <div class="panel-heading" style="justify-content: space-between;">
                        <h4 class="panel-title">All Participate</h4>
                     </div>

                     <div class="panel-body">
                        <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
                           <thead>
                              <tr>
                                 <th width="1%">#</th>
                                 <th data-orderable="false">Match Type</th>
                                 <th data-orderable="false">Name</th>
                                 <th data-orderable="false">Total Kill</th>
                                 <th data-orderable="false">Winning Amt</th>
                                 <th data-orderable="false">Position</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $i=0;

                              $join = $this->crud->selectDataByMultipleWhere('join_match_participates',array('match_id'=>$id));
                              foreach ($join as $key => $data) 
                                 {  $i++;   ?>
                              <tr class="odd gradeX">
                                 <td width="1%" class="fw-bold text-dark">
                                    <label>
                                       <?php echo $i; ?>
                                       <input type="checkbox" name="multiple_delete[]" value="<?php echo $data->id; ?>" class="multiple_delete">
                                    </label>
                                 </td>
                                 
                                 <td class=""><?php echo $data->match_type; ?></td>
                                 <td class=""><?php echo $data->username; ?></td>
                                 <td class=""><?php echo $data->total_kill; ?></td>
                                 <td class=""><?php echo $data->winning_amt; ?></td>
                                 <td class=""><?php echo $data->position; ?></td>
                                 
                               
                            
                                
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