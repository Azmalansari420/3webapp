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

                        <!-- <div style="text-align: end;margin-bottom: 10px;">
                           <button  class="btn btn-primary" id="btnExport" onclick="fnExcelReport();" > Get Excel </button>
                        </div> -->
                        
                        <table class="table table-striped table-bordered align-middle" id="headerTable">
                           <thead>
                              <tr>
                                 <th width="1%">#</th>
                                 <th >#</th>
                                 <th>Order ID</th>
                                 <th>Date</th>
                                 <th>Custumer Details</th>
                                 <th>Total</th>
                                 <th>Payment Type</th>                               
                                 <!-- <th class="text-nowrap">Status</th> -->
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
                                 
                                 <td>
                                    <strong>NSM:- <?php echo usersdetails($data->nsm_id); ?></strong><br>
                                    <strong>RSM:- <?php echo usersdetails($data->rsm_id); ?></strong><br>
                                    <strong>ASM:- <?php echo usersdetails($data->asm_id); ?></strong><br>
                                    <strong>SO:- <?php echo usersdetails($data->sales_office_id); ?></strong><br>
                                 </td>

                                 <td><?php echo $data->order_id; ?></td>
                                 <td><?php echo date('d-M-Y',strtotime($data->addeddate)); ?></td>
                                 <td>
                                    Name:- <?php echo $data->name; ?>  <br>
                                    Email:- <?php echo $data->email; ?><br>
                                    Mobile:- <?php echo $data->mobile; ?><br>
                                 </td>
                                 <td>₹ <?php echo number_format($data->after_discount_final_price,2); ?></td>
                                 <td><?php echo paymenttype($data->payment_type); ?></td>
                                 <!-- <td class="">
                                    <form method="post" action="<?php echo base_url('admin_con/finalorder/status_change'); ?>" enctype="multipart/form-data">
                                       <input type="hidden" name="id" value="<?=$data->id ?>">
                                       <select class="form-select mb-2" name="order_status">
                                          <option value="0" <?php if($data->order_status==0)echo'selected'; ?>>Update Status</option>
                                          <option value="1" <?php if($data->order_status==1)echo'selected'; ?>>Confirm Order</option>
                                          <option value="2" <?php if($data->order_status==2)echo'selected'; ?>>Warehouse</option>
                                          <option value="3" <?php if($data->order_status==3)echo'selected'; ?>>Shipped Order</option>
                                          <option value="4" <?php if($data->order_status==4)echo'selected'; ?>>Deliverd</option>
                                          <option value="5" <?php if($data->order_status==5)echo'selected'; ?>>Cancel</option>
                                       </select>
                                       <input class="btn btn-dark" type="submit" name="submit" value="Update">
                                    </form>
                                 </td> -->

                                 <td>
                                    <!-- <a href="<?php echo $view_url.$data->id; ?>" class="btn btn-primary btn-sm">View</a> -->
                                    <a href="<?php echo $edit_url.$data->id; ?>" class="btn btn-info btn-sm">View</a>
                                    <a href="<?php echo $invoice_url.$data->id; ?>" class="btn btn-primary btn-sm">Invoice</a>
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