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
                  

                  <div class="col-lg-12">
                      <div class="card border-0 mb-4">
                        <div class="card-header h6 mb-0 bg-none p-3">
                           <i class="fa fa-fa fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Upload Video
                        </div>
                        <div class="card-body">
                           <div class="row">

                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3 bg-light">
                                    <label class="form-label">Upload Video </label>

                                       <input  type="file" class="form-control" name="image" >

                                       <input  type="hidden" class="form-control" name="oldimage" value="<?php echo $EDITDATA[0]->image; ?>">
                                       <?php
                                       if(!empty($EDITDATA[0]->image))
                                          { ?>
                                       <video width="200" height="200" class=" rounded" src="<?php echo base_url($upload_path); ?><?php echo $EDITDATA[0]->image; ?>" loop muted controls></video>
                                    <?php } ?>

                                      
                                   </label>
                                 </div>
                              </div>

                              <div class="col-lg-3 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Type</label>
                                    <select class="form-select" name="type">
                                       <option value="1"  <?php if($EDITDATA[0]->type==1)echo 'selected'; ?>>Video</option>
                                       <option value="2" <?php if($EDITDATA[0]->type==2)echo 'selected'; ?>>Influencers Reels</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-3 mb-3">
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