<?php
$type = $_GET['type'];
$from_date = $this->input->get('from_date');
$to_date = $this->input->get('to_date');
?>

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

                        

                     </div>

                     <div class="panel-body">
                        <div class="d-flex justify-content-center mb-4 mt-4">
                           <form method="get" action="<?=base_url('admin_con/water_form/listing') ?>">
                              <input type="hidden" name="type" value="<?=$type ?>">
                              <label class="form-label" style="margin-right:10px;">
                                 From Date
                                 <input type="date" name="from_date" class=" w-200px" value="<?php if(!empty($from_date)) echo $from_date; ?>">
                              </label>
                              <label class="form-label" style="margin-right:10px;">
                                 To Date
                                 <input type="date" name="to_date" class="w-200px" value="<?php if(!empty($to_date)) echo $to_date; ?>">
                              </label>
                              <input type="submit" name="submit" class="btn btn-primary w-200px">
                           </form>
                        </div>
                  
                        
                        <table class="table table-striped table-bordered align-middle" id="data-table-buttons-2">
                           <thead>
                              <tr>
                                 <th width="1%">#</th>
                                 <th class="text-nowrap">Username</th>
                                 <th class="text-nowrap">Date</th>
                                 <th class="text-nowrap">Flow meter inlet</th>
                                 <th class="text-nowrap">Flow meter outlet</th>
                                 <th class="text-nowrap">PH</th>
                                 <th class="text-nowrap">Temperature</th>
                                 <th class="text-nowrap">Tds</th>
                                 <th class="text-nowrap">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $i=0;
                              foreach ($ALLDATA as $key => $data) 
                                 {  $i++;

                                    $username = $this->crud->selectDataByMultipleWhere('registration',array('id'=>$data->user_id));
                                 ?>
                              <tr class="odd gradeX">
                                 <td width="1%" class="fw-bold text-dark">
                                    <label>
                                       <?php echo $i; ?>
                                       <input type="checkbox" name="multiple_delete[]" value="<?php echo $data->id; ?>" class="multiple_delete">
                                    </label>
                                 </td>

                                 <td class=""><?php if(!empty($username)) echo $username[0]->name; ?></td>
                                 <td class=""><?php echo $data->date; ?></td>
                                 <td class=""><?php echo $data->flow_meter_inlet; ?></td>
                                 <td class=""><?php echo $data->flow_meter_outlet; ?></td>
                                 <td class=""><?php echo $data->intel_para_ph; ?></td>
                                 <td class=""><?php echo $data->intel_para_temprature; ?></td>
                                 <td class=""><?php echo $data->intel_para_tds; ?></td>

                                 

                                 <td>
                                    <a href="<?php echo $view_url.$data->id; ?>" class="btn btn-primary btn-sm">View</a>
                                    <!-- <a href="<?php echo $edit_url.$data->id; ?>" class="btn btn-info btn-sm">Edit</a> -->
                                    <a href="<?php echo $delete_url.$data->id; ?>" class="btn btn-danger btn-sm delete">Delete</a>
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

   $('#data-table-buttons-2').DataTable({
          responsive: true,
          dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
          buttons: [
            { extend: 'copy', className: 'btn-sm' },
            { extend: 'csv', className: 'btn-sm' },
            { extend: 'excel', className: 'btn-sm' },
            { extend: 'pdf', className: 'btn-sm' },
            { extend: 'print', className: 'btn-sm' }
          ],
        });


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