<!DOCTYPE html>
<html lang="en">
   <head>
      <title><?php echo $page_title; ?> List</title>
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
           
            <h1 class="page-header"><?php echo $page_title; ?> List</h1>

           

            <div class="row">
               
               <div class="col-xl-12">
                  <div class="panel panel-inverse">
                     <div class="panel-heading" style="justify-content: space-between;">
                        <h4 class="panel-title">All <?php echo $page_title; ?></h4>
                        <a href="<?php echo $add_url; ?>" class="btn btn-primary" style="margin-right: 10px;">Add New <?php echo $page_title; ?></a>
                        <button type="button" class="btn btn-danger delete_multiple">Delete Multiple</button>
                     </div>

                     <div class="panel-body">
                        <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
                           <thead>
                              <tr>
                                 <th width="1%">#</th>
                                 <th class="text-nowrap">Game</th>
                                 <th class="text-nowrap">Title</th>
                                 <th class="text-nowrap">Date/Time</th>
                                 <th class="text-nowrap">Entry Fee</th>
                                 <th class="text-nowrap">Match Type</th>
                                 <th class="text-nowrap">Open/Private</th>
                                 <th class="text-nowrap">Status</th>
                                 <th class="text-nowrap">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $i=0;
                              foreach ($ALLDATA as $key => $data) 
                                 {  $i++;  
                                    $game = $this->crud->selectDataByMultipleWhere('games',array('id'=>$data->game_id));

                                  ?>
                              <tr class="odd gradeX">
                                 <td width="1%" class="fw-bold text-dark">
                                    <label>
                                       <?php echo $i; ?>
                                       <input type="checkbox" name="multiple_delete[]" value="<?php echo $data->id; ?>" class="multiple_delete">
                                    </label>
                                 </td>
                                 
                                 <td class=""><?php if(!empty($game)) echo $game[0]->name; else echo 'not found'; ?></td>
                                 <td class=""><?php echo $data->match_title; ?></td>
                                 <td class=""><?php echo date('d-m-Y h:i A',strtotime($data->match_date_time)); ?></td>
                                 <td class=""><?php echo $data->entry_fee; ?></td>
                                 <td class=""><?php echo $data->match_type; ?></td>
                                 <td class=""><?php echo private_type($data->private_match); ?></td>

                                 <td>
                                    <form method="post" action="<?=base_url('admin_con/matches/status_change') ?>">
                                       <input type="hidden" name="id" value="<?=$data->id ?>">
                                       <select class="form-select mb-1" <?php if(empty($data->room_id)) echo 'disabled' ?> name="status">
                                          <option value="1" <?php if($data->status=='1') echo 'selected'; ?>>OnGoing</option>
                                          <option value="0" <?php if($data->status=='0') echo 'selected'; ?>>UpComing</option>
                                          <option value="2" <?php if($data->status=='2') echo 'selected'; ?>>Result</option>
                                       </select>
                                       <input type="submit" name="submit" <?php if(empty($data->room_id)) echo 'disabled' ?>>
                                    </form>
                                 </td>

                                 <!-- <td class="">
                                    <span id="statusbyid<?=$data->id ?>"><?php echo match_live_type($data->status); ?> </span>
                                    <label class="switch" for="customSwitch-<?=$data->id ?>">
                                      <input <?php if(empty($data->room_id)) echo 'disabled' ?> type="checkbox" id="customSwitch-<?=$data->id ?>" <?php if($data->status==1)echo'checked'; ?> onclick="click_here(<?=$data->id ?>)">
                                      <span class="slider round"></span>
                                    </label>
                                 </td> -->

                                 <td>
                                    <a href="<?php echo $edit_url.$data->id; ?>" class="btn btn-info btn-sm btn-new-class">Edit</a>
                                    <a href="<?php echo $delete_url.$data->id; ?>" class="btn btn-danger btn-sm delete btn-new-class">Delete</a>
                                    <?php if(!empty($data->room_id)) { ?>
                                    <a href="<?php echo $view_url.$data->id; ?>" class="btn btn-primary btn-sm btn-new-class">Add Result</a>
                                 <?php } ?>
                                  <a href="<?php echo base_url('admin_con/matches/participantes/'.$data->id) ?>" class="btn btn-primary btn-sm btn-new-class"><i class="fa fa-eye"></i> Participants</a>
                                 </td>
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

  <script type="text/javascript">
        function click_here(id)
        {
            current_element = $('#statusbyid'+id);
            if($('#customSwitch-'+id).prop("checked")==true)
                var status = 1;
            else
                var status = 0;
            $.ajax({
                url:'<?php echo $status_value; ?>',
                method:'post',
                data:{status:status,id:id},
                success:function(data){
                    console.log(data);
                    // location.reload();
                    var result = JSON.parse(data);
                    current_element.html(result.data['status']);
                }
            });
        }

        /*-------delete all--------*/

        $(document).ready(function(){
            $(".delete_multiple").click(function(event)
             {
               var ids = [];
               $('.multiple_delete:checked').each(function () {
                  ids.push(this.value);
               });

               if(ids.length==0)
               {
                  swal("Atleast Select one ....");
                  return false;
               }

               Swal.fire({
                  title: "Are you sure?",
                  text: "You won't be able to revert this!",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Yes, delete it!"
                }).then((result) => {
               if (result.isConfirmed) 
                  {
                    $.ajax({
                        url:'<?php echo $multiple_delete; ?>',
                        method:'post',
                        data:{id:ids},
                        success:function(data)
                        {   
                           location.reload();
                           // console.log(data);
                        }
                     });                    
                  }
                });
              })
            });
   </script>

   </body>
</html>