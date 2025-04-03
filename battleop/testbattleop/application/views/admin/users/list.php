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


        
          <?php $this->load->view('admin/include/header') ?>
          <?php $this->load->view('admin/include/sidebar') ?>


         
         <div id="content" class="app-content">
           
            <h1 class="page-header"><?php echo $page_title; ?> List</h1>

           

            <div class="row">
               
               <div class="col-xl-12">
                  <div class="panel panel-inverse">
                     <div class="panel-heading" style="justify-content: space-between;">
                        <h4 class="panel-title">All <?php echo $page_title; ?></h4>
                        <!-- <a href="<?php echo $add_url; ?>" class="btn btn-primary" style="margin-right: 10px;">Add New <?php echo $page_title; ?></a> -->

                        <button type="button" class="btn btn-danger delete_multiple" style="margin-right: 10px;">Delete Multiple</button>

                        <div class="panel-heading-btn" >
                           <form class="serch-box" method="post" action="<?=base_url($pagination_url) ?>">
                              <input type="search" name="search" value="<?php if(!empty($search))echo $search; ?>">
                              <input type="submit" name="submit" class="btn btn-outline-orange btn-sm">
                           </form>
                        </div>
                     </div>

                     <div class="panel-body">
                        <div style="text-align: end;margin-bottom: 10px;">
                           <button  class="btn btn-primary" id="btnExport" onclick="fnExcelReport();" > Get Excel </button>
                        </div>
                        <table id="headerTable" class="table table-striped table-bordered align-middle">
                           <thead>
                              <tr>
                                 <th width="1%">#</th>
                                 <th width="1%" data-orderable="false">Image</th>
                                 <th class="text-nowrap">Username</th>
                                 <th class="text-nowrap">Email</th>
                                 <th class="text-nowrap">Password</th>
                                 <th class="text-nowrap">Mobile</th>
                                 <th class="text-nowrap">Wallet</th>
                                 <th class="text-nowrap">Winning Amount</th>
                                 <th class="text-nowrap">Bonus Amount</th>
                                 <th class="text-nowrap">Join Date</th>
                                 <th class="text-nowrap">Status</th>
                                 <th class="text-nowrap">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $i=0;
                              foreach ($ALLDATA as $key => $data) 
                                 {  $i++;   ?>
                              <tr class="odd gradeX">
                                 <td width="1%" class="fw-bold text-dark">
                                    <label>
                                       <?php echo $i; ?>
                                       <input type="checkbox" name="multiple_delete[]" value="<?php echo $data->id; ?>" class="multiple_delete">
                                    </label>
                                 </td>
                                 
                                 <td width="1%">
                                    <img src="<?php echo base_url($upload_path); ?><?php echo $data->image; ?>" class="rounded h-60px my-n1 mx-n1" width="75"/>
                                 </td>
                                 <td class=""><?php echo $data->fname; ?></td>
                                 <td class=""><?php echo $data->email; ?></td>
                                 <td class=""><?php echo $data->password; ?></td>
                                 <td class=""><?php echo $data->mobile; ?></td>
                                 <td class=""><?php echo $data->wallet; ?></td>
                                 <td class=""><?php echo $data->winning_amt; ?></td>
                                 <td class=""><?php echo $data->bonus_amt; ?></td>
                                 <td class=""><?php echo date('d/m/Y h:i A',strtotime($data->date_time)); ?></td>

                                 <td class="">
                                    <span id="statusbyid<?=$data->id ?>"><?php echo status($data->status); ?> </span>
                                    <label class="switch" for="customSwitch-<?=$data->id ?>">
                                      <input type="checkbox" id="customSwitch-<?=$data->id ?>" <?php if($data->status==1)echo'checked'; ?> onclick="click_here(<?=$data->id ?>)">
                                      <span class="slider round"></span>
                                    </label>
                                 </td>

                                 <td>
                                    <!-- <a href="<?php echo $view_url.$data->id; ?>" class="btn btn-primary btn-sm">View</a> -->
                                    <a style="padding: 3px 3px;" href="<?php echo $edit_url.$data->id; ?>" class="btn btn-info btn-sm">Update</a>
                                    <a style="padding: 3px 3px;margin-top: 2px;" href="<?php echo $delete_url.$data->id; ?>" class="btn btn-danger btn-sm delete">Delete</a>

                                    <a href="<?=base_url('admin_con/withdraw_request/view_user_game?user_id='.$data->id) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"  data-original-title="View Details">
                                       <i class="fa fa-eye"></i>
                                       </a>
                                    
                                    <a href="<?=base_url('admin_con/withdraw_request/view_user_trans?user_id='.$data->id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-money"></i></a>
                                 </td>
                              </tr>
                           <?php } ?>
                              
                            
                           </tbody>
                        </table>
                        <?php
                        if(empty($search))
                           { ?>

                        <div class="row">
                           <div class="col-sm-5">
                              <div class="dataTables_info" id="data-table-buttons_info" role="status" aria-live="polite">Showing 1 to <?php echo $pageper; ?> of <?php echo $totalrow; ?> entries</div>
                           </div>
                           <div class="col-sm-7">
                              <?php echo $links; ?>
                           </div>
                        </div>
                     <?php } ?>
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