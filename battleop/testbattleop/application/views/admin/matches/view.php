<?php

$messahe = $this->crud->selectDataByMultipleWhere('match_result_content',array('match_id'=>$EDITDATA[0]->id));

// print_r($participate);
// die;
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Result List</title>
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

<style>
   a.btn-new-class {
       padding: 0 4px;
   }
</style>
        
          <?php $this->load->view('admin/include/header') ?>
          <?php $this->load->view('admin/include/sidebar') ?>


         
         <div id="content" class="app-content">
           
            <h1 class="page-header">Result List</h1>

           

            <div class="row">
               
               <div class="col-xl-12">
                  <div class="panel panel-inverse">
                     <div class="panel-heading" style="justify-content: space-between;">
                        <h4 class="panel-title">All List</h4>
                     </div>


                    <!--  <br>
                     <div class="form-box" style="display: flex;justify-content: center;">
                        <form style="width: 20%;" action="<?=base_url('admin_con/matches/view/'.$EDITDATA[0]->id) ?>" method="get">
                           <input type="search" name="username" class="form-control" value="<?php if(!empty($username)) echo $username; ?>" >
                           <input type="submit" name="submit" value="Submit" class="btn btn-sm btn-success w-100px mb-2 mt-2">
                        </form>
                     </div> -->

                     <form class="panel-body" method="post" action="<?=base_url('admin_con/matches/declere_result') ?>">
                        <input type="hidden" name="match_id" value="<?=$EDITDATA[0]->id ?>">
                        
                        <!-- <label class="form-label">Add Message</label>
                        <textarea rows="8" id='editor' name="message" class="mb-3 form-control"></textarea> -->

                       
                           <a href="#modal-dialog" class="btn btn-sm btn-success w-100px mb-5" data-bs-toggle="modal">Add Notes</a>

                        <table id="data144-table-buttons" class="table table-striped table-bordered align-middle">
                           <thead>
                              <tr>
                                 <th width="1%">#</th>
                                 <th class="text-nowrap">PUBG ID</th>
                                 <th class="text-nowrap">Total Kill</th>
                                 <th class="text-nowrap">Pool Prize</th>
                                 <th class="text-nowrap">Position</th>
                                 <th class="text-nowrap">Winning Amount</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $point_per_kill = $EDITDATA[0]->point_per_kill;
                              
                              $i=0;
                              foreach ($participate as $key => $data) 
                                 {  $i++;  


                                  ?>


                              <tr class="odd gradeX">
                                 <td width="1%" class="fw-bold text-dark">
                                  <input type="hidden" name="id[]" value="<?=$data->id ?>">
                                    <label>
                                       <?php echo $i; ?>
                                    </label>
                                 </td>
                                 
                                 <td class=""><a href="<?=base_url('admin_con/users/edit/'.$data->user_id) ?>"><?php echo $data->username; ?></a></td>
                                 <td class="">
                                    <input type="text" name="total_kill[]" value="<?php echo $data->total_kill; ?>" class="input value1<?=$data->id ?>" data-id="<?=$data->id ?>"> x <?=$point_per_kill ?>


                                    
                                 </td>
                                 <td class=""><input type="text" name="pool_prize[]" value="<?php echo $data->pool_prize; ?>" class="input value2<?=$data->id ?>" data-id="<?=$data->id ?>"></td>
                                  <td>
                                    <select class="form-select mb-1" name="position[]"  data-id="<?=$data->id ?>">
                                       <option value="0" <?php if(empty($data->position)) echo 'selected'; ?>>Select</option>
                                       <option value="1" <?php if(!empty($data->position)) if($data->position=='1') echo 'selected'; ?>>Winner</option>
                                       <option value="2" <?php if(!empty($data->position)) if($data->position=='2') echo 'selected'; ?>>1st Runner Up</option>
                                       <option value="3" <?php if(!empty($data->position)) if($data->position=='3') echo 'selected'; ?>>2nd Runner Up</option>
                                       <option value="4" <?php if(!empty($data->position)) if($data->position=='4') echo 'selected'; ?>>3rd Runner Up</option>
                                       <option value="5" <?php if(!empty($data->position)) if($data->position=='5') echo 'selected'; ?>>4th Runner Up</option>
                                       <option value="6" <?php if(!empty($data->position)) if($data->position=='6') echo 'selected'; ?>>5th Runner Up</option>
                                       <option value="7" <?php if(!empty($data->position)) if($data->position=='7') echo 'selected'; ?>>6th Runner Up</option>
                                       <option value="8" <?php if(!empty($data->position)) if($data->position=='8') echo 'selected'; ?>>7th Runner Up</option>
                                       <option value="9" <?php if(!empty($data->position)) if($data->position=='9') echo 'selected'; ?>>8th Runner Up</option>
                                       <option value="10" <?php if(!empty($data->position)) if($data->position=='10') echo 'selected'; ?>>9th Runner Up</option>
                                    </select>
                                 </td>
                                 <td class=""><input type="number" name="winning_amt[]" value="<?php echo $data->winning_amt; ?>" id="result<?=$data->id ?>" readonly></td>

                              </tr>
                           <?php } ?>
                              
                            
                           </tbody>
                        </table>
                        <button type="submit" name="submit" class="btn btn-primary add_result" style="margin-right: 10px;">Submit Result</button>

                     </form>
                    
                  </div>
               </div>
            </div>
         </div>
       
      </div>



   <?php $this->load->view('admin/include/footer') ?>

<div class="modal fade" id="modal-dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add Notes</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
         </div>
         <div class="modal-body">
           <form method="post" action="<?=base_url('admin_con/matches/add_notes') ?>">
            <input type="hidden" name="match_id" value="<?=$EDITDATA[0]->id ?>">
              <label class="form-label">Add Notes</label>
              <textarea rows="8" id='editor' name="message" class="mb-3 form-control"><?php if(!empty($messahe)) echo $messahe[0]->messge; ?></textarea>
              <button class="btn btn-primary" type="submit" name="submit">Submit</button>
           </form>
         </div>
         <div class="modal-footer">
            <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
         </div>
      </div>
   </div>
   </div>



  <script type="text/javascript">
     $(document).ready(function(){
       $(".input").keyup(function(){
         var point_per_kill = <?=$point_per_kill; ?>;
         var id = $(this).data('id');
         var val1 = +$(".value1"+id).val()*point_per_kill;
         var val2 = +$(".value2"+id).val();
         $("#result"+id).val(val1+val2);
      });
   });




$(document).ready(function() {
    $('#data144-table-buttons').dataTable( {
        "pageLength": 300
    } );
} );


CKEDITOR.replace('editor');

   </script>

   <style>
      div#data144-table-buttons_length {
       display: none;
   }
   </style>

   </body>
</html>