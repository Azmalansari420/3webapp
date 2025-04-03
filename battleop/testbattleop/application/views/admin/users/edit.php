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
                           <div class="row justify-content-center">
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Join Date</label>
                                    <input type="local-time" class="form-control" value="<?php echo $EDITDATA[0]->date_time; ?>">
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="fname" value="<?php echo $EDITDATA[0]->fname; ?>">
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email"  value="<?php echo $EDITDATA[0]->email; ?>">
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control" name="password"  value="<?php echo $EDITDATA[0]->password; ?>">
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" class="form-control" name="mobile"  value="<?php echo $EDITDATA[0]->mobile; ?>">
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

                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Wallet</label>
                                    <input type="text" class="form-control" name="wallet"  value="<?php echo $EDITDATA[0]->wallet; ?>">
                                 </div>
                              </div>
                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Winning Amount</label>
                                    <input type="text" class="form-control" name="winning_amt"  value="<?php echo $EDITDATA[0]->winning_amt; ?>">
                                 </div>
                              </div>
                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Bonus Amount</label>
                                    <input type="text" class="form-control" name="bonus_amt"  value="<?php echo $EDITDATA[0]->bonus_amt; ?>">
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                       <option value="1"  <?php if($EDITDATA[0]->status==1)echo 'selected'; ?>>Active</option>
                                       <option value="0" <?php if($EDITDATA[0]->status==0)echo 'selected'; ?>>Deactive</option>
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