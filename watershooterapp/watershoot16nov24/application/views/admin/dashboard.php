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
<?php
$i=0;
$this->db->limit(5);
$this->db->order_by('id desc');
$contact_enq = $this->db->select('id,name,email,mobile,subject,addeddate')->get_where('contact')->result_object();
if(!empty($contact_enq))
{ 
?>
               <div class="col-xl-8 col-md-6 text-center mt-3 bg-gradient-orange-red">
                  <h2 class="pt-2">Latest Contact Enquiry</h2>
                  <div class="panel-body " >
                     <table id="headerTable" class="table table-striped  align-middle">
                        <thead>
                           <tr>
                              <th width="1%">#</th>
                              <th class="text-nowrap">Name</th>
                              <th class="text-nowrap">Email</th>
                              <th class="text-nowrap">Mobile</th>
                              <th class="text-nowrap">Subject</th>
                              <th class="text-nowrap">Date</th>
                              <th class="text-nowrap">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           foreach ($contact_enq as $key => $data) 
                              {  $i++;   ?>
                           <tr class="odd gradeX">
                              <td width="1%" class="fw-bold text-dark"><?php echo $i; ?></td>
                              <td class=""><?php echo $data->name; ?></td>
                              <td class=""><?php echo $data->email; ?></td>
                              <td class=""><?php echo $data->mobile; ?></td>
                              <td class=""><?php echo $data->subject; ?></td>
                              <td class=""><?php echo date('Y/m/d h:i A',strtotime($data->addeddate)); ?></td>
                              <td>
                                 <a href="<?php echo base_url('admin_con/contact/view/'.$data->id); ?>" class="btn btn-primary btn-sm">View</a>
                              </td>
                           </tr>
                        <?php } ?>
                           
                         
                        </tbody>
                     </table>
                  </div>
               </div>

<?php } ?>

            </div>

            
         </div>
       
      </div>


         <?php $this->load->view('admin/include/footer') ?>


   </body>
</html>