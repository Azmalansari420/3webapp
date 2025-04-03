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
                        
                        <table class="table table-striped table-bordered align-middle" id="headerTable">
                           <thead>
                              <tr>
                                 <th width="1%">#</th>
                                 <th class="text-nowrap">NSM</th>
                                 <th class="text-nowrap">RSM</th>
                                 <th class="text-nowrap">ASM</th>
                                 <th class="text-nowrap">Sales Officer</th>
                                 <th width="1%" data-orderable="false">Self Image</th>
                                 <th class="text-nowrap">Firm Name</th>
                                 <th class="text-nowrap">Username</th>
                                 <th class="text-nowrap">Contact Person</th>
                                 <th class="text-nowrap">Contact Number</th>
                                 <th class="text-nowrap">State</th>
                                 <th class="text-nowrap">City</th>
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
                                 <td class=""><?php echo usersdetails($data->nsm_id); ?></td>
                                 <td class=""><?php echo usersdetails($data->rsm_id); ?></td>
                                 <td class=""><?php echo usersdetails($data->asm_id); ?></td>
                                 <td class=""><?php echo usersdetails($data->sales_office_id); ?></td>
                                 
                                 <td width="1%">
                                    <img src="<?php echo base_url($upload_path); ?><?php echo $data->self_image; ?>" class="rounded h-60px my-n1 mx-n1" width="75"/>
                                 </td>
                                 <td class=""><?php echo $data->firm_name; ?></td>
                                 <td class=""><?php echo $data->name; ?></td>
                                 <td class=""><?php echo $data->mobile; ?></td>
                                 <td class=""><?php echo statename($data->state); ?></td>
                                 <td class=""><?php echo cityname($data->city); ?></td>

                                 <td class="">
                                    <form action="<?=base_url() ?>admin_con/kyc_records/status_change" method="post">
                                       <input type="hidden" name="id" value="<?=$data->id ?>">
                                       <input type="hidden" name="user_id" value="<?=$data->user_id ?>">
                                       <select name="status">
                                          <!-- <option value="0" <?php if($data->status==0) echo "selected"; ?>>New</option> -->
                                          <option value="1" <?php if($data->status==1) echo "selected"; ?>>Approved</option>
                                          <option value="2" <?php if($data->status==2) echo "selected"; ?>>Under Review</option>
                                          <option value="3" <?php if($data->status==3) echo "selected"; ?>>Reject</option>
                                       </select>
                                       <input type="submit" name="submit" class="btn btn-sm btn-primary">
                                    </form>
                                 </td>

                                 <td>
                                    <a href="<?php echo $view_url.$data->id; ?>" class="btn btn-primary btn-sm">View</a>
                                    <!-- <a href="<?php echo $edit_url.$data->id; ?>" class="btn btn-info btn-sm">Edit</a> -->
                                    <a href="<?php echo $delete_url.$data->id; ?>" class="btn btn-danger btn-sm delete">Delete</a>
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