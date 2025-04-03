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
                        <button type="button" class="btn delete_multiple btn-danger">Delete Multiple</button>
                     </div>

                     <div class="panel-body">
                        <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
                           <thead>
                              <tr>
                                 <th width="1%">#</th>
                                 <th class="text-nowrap">Name</th>
                                 <th class="text-nowrap">Email</th>
                                 <th class="text-nowrap">Mobile</th>
                                 <th class="text-nowrap">Subject</th>
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
                                 <td class=""><?php echo $data->name; ?></td>
                                 <td class=""><?php echo $data->email; ?></td>
                                 <td class=""><?php echo $data->mobile; ?></td>
                                 <td class=""><?php echo $data->subject; ?></td>
                                 <td>
                                    <a href="<?php echo $view_url.$data->id; ?>" class="btn btn-primary btn-sm">View</a>
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