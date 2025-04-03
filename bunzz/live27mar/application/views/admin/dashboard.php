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
            <ol class="breadcrumb float-xl-end">
               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
               <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <h1 class="page-header">Dashboard</h1>

            <div class="row justify-content-center">

               <!-- <div class="col-xl-4 col-md-6 text-center">
                  <div class="widget widget-stats bg-blue">
                     <div class="stats-icon"><i class="fa fa-cogs"></i></div>
                     <div class="stats-info">
                        <p>Site Setting</p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/site_setting/edit/1');?>">View Detail <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-4 col-md-6 text-center">
                  <div class="widget widget-stats bg-info">
                     <div class="stats-icon"><i class="fa fa-sliders"></i></div>
                     <div class="stats-info">
                        <p>Slider</p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/slider/listing');?>">View Detail <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div>

               <div class="col-xl-4 col-md-6 text-center">
                  <div class="widget widget-stats bg-orange">
                     <div class="stats-icon"><i class="fa fa-contact-card"></i></div>
                     <div class="stats-info">
                        <p>Contact Enquiry</p>
                     </div>
                     <div class="stats-link">
                        <a href="<?php echo base_url('admin_con/contact/listing');?>">View Detail <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
               </div> -->


            </div>

            
         </div>
       
      </div>


         <?php $this->load->view('admin/include/footer') ?>


   </body>
</html>