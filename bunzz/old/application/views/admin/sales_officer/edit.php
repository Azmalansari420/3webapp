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
                  <input type="hidden" name="kyc_status" value="<?=$EDITDATA[0]->kyc_status ?>">
                  <div class="col-lg-8">
                     <div class="card border-0 mb-4">
                        <div class="card-header h6 mb-0 bg-none p-3">
                           <i class="fa fa-fa fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Content
                        </div>
                        <div class="card-body">
                           <div class="row">
                              <div class="col-lg-4 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Select NSM</label>
                                    <select class="form-select nsm-id" name="nsm_id" required>
                                       <option selected value="">Select NSM</option>
                                       <?php
                                       $rsm = $this->crud->selectDataByMultipleWhere('users',array('role'=>1,'status'=>1,));
                                       foreach($rsm as $data)
                                          { ?>
                                       <option <?php if($EDITDATA[0]->nsm_id==$data->id) echo 'selected'; ?> value="<?=$data->id ?>" ><?=$data->name ?></option>
                                    <?php } ?>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Select RSM</label>
                                    <select class="form-select rsm-id rsm-list" name="rsm_id" required>
                                       <?php
                                       $rsm = $this->crud->selectDataByMultipleWhere('users',array('role'=>2,'status'=>1,));
                                       foreach($rsm as $data)
                                          { ?>
                                       <option <?php if($EDITDATA[0]->rsm_id==$data->id) echo 'selected'; ?> value="<?=$data->id ?>" ><?=$data->name ?></option>
                                    <?php } ?>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Select ASM</label>
                                    <select class="form-select asm-list" name="asm_id" required>
                                       <?php
                                       $rsm = $this->crud->selectDataByMultipleWhere('users',array('role'=>3,'status'=>1,));
                                       foreach($rsm as $data)
                                          { ?>
                                       <option <?php if($EDITDATA[0]->asm_id==$data->id) echo 'selected'; ?> value="<?=$data->id ?>" ><?=$data->name ?></option>
                                    <?php } ?>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" required value="<?=$EDITDATA[0]->name ?>">
                                 </div>
                              </div>
                       

                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" class="form-control" name="mobile"  value="<?=$EDITDATA[0]->mobile ?>">
                                 </div>
                              </div>

                 
                              
                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Distributor address</label>
                                    <textarea class="form-control" name="address" placeholder="Enter text ..." rows="5"><?=$EDITDATA[0]->address ?></textarea>
                                 </div>
                              </div>
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
                                    <label class="form-label">State</label>
                                    <select class="form-select state-id" name="state" required>
                                       <?php
                                        $state = $this->crud->selectDataByMultipleWhere('state',array('status'=>1));
                                        foreach($state as $data)
                                            { ?>
                                        <option  <?php if($EDITDATA[0]->state==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                                        <?php } ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-12 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">City</label>
                                    <select class="form-select city-list" name="city" required>
                                       <?php
                                        $state = $this->crud->selectDataByMultipleWhere('state',array('status'=>1));
                                        foreach($state as $data)
                                            { ?>
                                        <option <?php if($EDITDATA[0]->city==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                                        <?php } ?>
                                    </select>
                                 </div>
                              </div>

                             <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="email" class="form-control" name="email" value="<?=$EDITDATA[0]->email ?>" required>
                                 </div>
                              </div>
                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control" name="password" value="<?=$EDITDATA[0]->password ?>" required>
                                 </div>
                              </div>
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