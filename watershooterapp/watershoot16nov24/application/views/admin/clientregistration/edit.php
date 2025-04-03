<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Edit <?php echo $page_title; ?></title>
      <?php $this->load->view('admin/include/allcss') ?>

   </head>
   <body>
       <?php echo loder; ?> 
      <div id="app" class="app app-header-fixed app-sidebar-fixed ">


          <?php $this->load->view('admin/include/header') ?>
          <?php $this->load->view('admin/include/sidebar') ?>


         
         <div id="content" class="app-content">
            <div class="d-flex align-items-center justify-content-between mb-3">
               <div>
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                     <li class="breadcrumb-item active"><i class="fa fa-arrow-back"></i> Edit <?php echo $page_title; ?></li>
                  </ol>
                  <h1 class="page-header mb-0">Edit <?php echo $page_title; ?></h1>
               </div>
                <div>
                  <button onclick="history.back();" class="btn btn-primary">Back</button>
               </div>
            </div>



               <form  class="row" method="post" enctype="multipart/form-data" action="#">
                  <div class="col-lg-8">
                     <div class="card border-0 mb-4">
                        <div class="card-header h6 mb-0 bg-none p-3">
                           <i class="fa fa-fa fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Content
                        </div>
                        <div class="card-body">
                           <div class="row">
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="<?=$EDITDATA[0]->name ?>">
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" value="<?=$EDITDATA[0]->email ?>">
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" class="form-control" name="mobile" value="<?=$EDITDATA[0]->mobile ?>">
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control" name="password" value="<?=$EDITDATA[0]->password ?>">
                                 </div>
                              </div>

                              <!-- <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Qualification</label>
                                    <input type="text" class="form-control" name="qualification" value="<?=$EDITDATA[0]->qualification ?>">
                                 </div>
                              </div>
                              
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Aadhar Card No</label>
                                    <input type="text" class="form-control" name="adhar" value="<?=$EDITDATA[0]->adhar ?>">
                                 </div>
                              </div>

                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">DOB</label>
                                    <input type="text" class="form-control" name="dob"  value="<?=$EDITDATA[0]->dob ?>">
                                 </div>
                              </div>

                              <div class="col-lg-6 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="gender">
                                       <option value="1"  <?php if($EDITDATA[0]->gender==1)echo 'selected'; ?>>Male</option>
                                       <option value="2" <?php if($EDITDATA[0]->gender==2)echo 'selected'; ?>>Female</option>
                                       <option value="3" <?php if($EDITDATA[0]->gender==3)echo 'selected'; ?>>Other</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" class="form-control" name="client_name" value="<?=$EDITDATA[0]->client_name ?>">
                                 </div>
                              </div>

                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Location</label>
                                    <input type="text" class="form-control" name="location" value="<?=$EDITDATA[0]->location ?>">
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Plant Capacity</label>
                                    <input type="text" class="form-control" name="plant_capacity" value="<?=$EDITDATA[0]->plant_capacity ?>">
                                 </div>
                              </div>

                              <div class="col-lg-6 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Operator Name</label>
                                    <select class="form-select" name="opratername">
                                       <option value="1"  <?php if($EDITDATA[0]->opratername==1)echo 'selected'; ?>>Shift A</option>
                                       <option value="2" <?php if($EDITDATA[0]->opratername==2)echo 'selected'; ?>>Shift B</option>
                                       <option value="3" <?php if($EDITDATA[0]->opratername==3)echo 'selected'; ?>>Shift C</option>
                                    </select>
                                 </div>
                              </div>
 -->





                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-4">
                      <div class="card border-0 mb-4">
                        <div class="card-header h6 mb-0 bg-none p-3">
                           <i class="fa fa-fa fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Upload Image
                        </div>
                        <div class="card-body">
                           <div class="row">

                              
                              <div class="col-lg-12 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                       <option value="">-- Select Status --</option>
                                       <option value="1"  <?php if($EDITDATA[0]->status==1)echo 'selected'; ?>>Show</option>
                                       <option value="0" <?php if($EDITDATA[0]->status==0)echo 'selected'; ?>>Hide</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-4 text-center">
                                 <div class="mb-lg-0 mb-3">
                                    <button class="btn btn-primary d-block" type="submit" name="submit">
                                       Update <?php echo $page_title; ?>
                                   </button>
                                 </div>
                              </div>

                              
                             
                           </div>
                        </div>
                     </div>                  
                  </div>
               </form>
           
         </div>
       
      </div>



   <?php $this->load->view('admin/include/footer') ?>
<script>
   CKEDITOR.replace('editor');
</script>
   </body>
</html>