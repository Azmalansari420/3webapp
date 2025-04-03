<?php 
$user = $this->crud->selectDataByMultipleWhere('tbl_admin',array('id'=>$this->session->userdata("id"),));
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Dashboard</title>
      <?php $this->load->view('admin/include/allcss') ?>
   </head>
   <body>
     
      <?php echo loder; ?>
      
      <div id="app" class="app app-header-fixed app-sidebar-fixed ">

         <?php $this->load->view('admin/include/header') ?>
         


         
         <div id="content" class="container">



            <div class="row justify-content-center">

               <div class="col-xl-12 col-md-12 text-center">
            	  <!-- <h1 class="page-header">Access Denied</h1> -->
                  <div class="panel panel-inverse" style="padding:20px 0;margin-top: 100px;">
                  	<h2>You Don't Have Access</h2>
                  </div>
                  	<button class="btn btn-primary w-100px text-bg-black" onclick="history.back();">Click to Back</button>
               </div>

      
            </div>

            
         </div>
       
      </div>


         <?php $this->load->view('admin/include/footer') ?>


   </body>
</html>