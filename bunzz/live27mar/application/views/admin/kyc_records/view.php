<!DOCTYPE html>
<html lang="en">
   <head>
      <title>View <?php echo $page_title; ?></title>
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
                     <li class="breadcrumb-item active"><i class="fa fa-arrow-back"></i> View <?php echo $page_title; ?></li>
                  </ol>
                  <h1 class="page-header mb-0">View <?php echo $page_title; ?></h1>
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
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo userdetails($EDITDATA[0]->user_id); ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Distributor Firm Name </label>
                                    <input type="text" class="form-control" name="firm_name"  value="<?php echo $EDITDATA[0]->firm_name; ?>" readonly>
                                 </div>
                              </div>


                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Distributor Contact Number</label>
                                    <input type="text" class="form-control" name="mobile"  value="<?php echo $EDITDATA[0]->mobile; ?>" readonly>
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Distributor Address</label>
                                    <textarea class="form-control" name="message" id="editor"  placeholder="Enter text ..." readonly rows="5" ><?php echo $EDITDATA[0]->address; ?></textarea>
                                 </div>
                              </div>




                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Select State</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo statename($EDITDATA[0]->state); ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Select City</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo cityname($EDITDATA[0]->city); ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">PIN Code</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo ($EDITDATA[0]->pincode); ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Distributor GSTIN Number</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo ($EDITDATA[0]->gst_no); ?>" readonly>
                                 </div>
                              </div>


                           
                              <div class="col-lg-8 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">GPS Location LINK</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo ($EDITDATA[0]->gps_location_link); ?>" readonly>
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Bank Details A/c Number</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo ($EDITDATA[0]->bank_ac_no); ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Bank Name</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo ($EDITDATA[0]->bank_name); ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Branch Name</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo ($EDITDATA[0]->bank_branch); ?>" readonly>
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">IFSC Code</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo ($EDITDATA[0]->bank_ifcscode); ?>" readonly>
                                 </div>
                              </div>

                              

                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Email ID</label>
                                    <input type="text" class="form-control" name="subject"  value="<?php echo ($EDITDATA[0]->email); ?>" readonly>
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">KYC STATUS</label><br>
                                    <?=distributer_status($EDITDATA[0]->status) ?>
                                 </div>
                              </div>

                              
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-4">
                      <div class="card border-0 mb-4">
                        <div class="card-header h6 mb-0 bg-none p-3">
                           <i class="fa fa-fa fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Upload Documnet
                        </div>
                        <div class="card-body">
                           <div class="row">

                             <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">GST Certificate Upload</label>
                                    <br>
                                    <br>
                                    <a href="<?=base_url($upload_path.$EDITDATA[0]->gst_certificate) ?>" target="_blank">
                                       <img src="<?=base_url($upload_path.$EDITDATA[0]->gst_certificate) ?>" width="100">
                                    </a>
                                 </div>
                              </div>

                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">PAN Card Upload</label>
                                    <br>
                                    <br>
                                    <a href="<?=base_url($upload_path.$EDITDATA[0]->pan_card) ?>" target="_blank">
                                       <img src="<?=base_url($upload_path.$EDITDATA[0]->pan_card) ?>" width="100">
                                    </a>
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Aadhar Card Upload</label>
                                    <br>
                                    <br>
                                    <a href="<?=base_url($upload_path.$EDITDATA[0]->adharcard) ?>" target="_blank">
                                       <img src="<?=base_url($upload_path.$EDITDATA[0]->adharcard) ?>" width="100">
                                    </a>
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Electricity Bill (Work Location) Upload</label>
                                    <br>
                                    <br>
                                    <a href="<?=base_url($upload_path.$EDITDATA[0]->electric_bill) ?>" target="_blank">
                                       <img src="<?=base_url($upload_path.$EDITDATA[0]->electric_bill) ?>" width="100">
                                    </a>
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Udyam Certificate Upload:</label>
                                    <br>
                                    <br>
                                    <a href="<?=base_url($upload_path.$EDITDATA[0]->udhyam_certificate) ?>" target="_blank">
                                       <img src="<?=base_url($upload_path.$EDITDATA[0]->udhyam_certificate) ?>" width="100">
                                    </a>
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">FSSAI License Upload:</label>
                                    <br>
                                    <br>
                                    <a href="<?=base_url($upload_path.$EDITDATA[0]->fssai_licence_cert) ?>" target="_blank">
                                       <img src="<?=base_url($upload_path.$EDITDATA[0]->fssai_licence_cert) ?>" width="100">
                                    </a>
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-4 text-center"><h3>Factory Image</h3></div>

                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Godown Image 1 Upload</label>
                                    <br>
                                    <br>
                                    <a href="<?=base_url($upload_path.$EDITDATA[0]->godown_image1) ?>" target="_blank">
                                       <img src="<?=base_url($upload_path.$EDITDATA[0]->godown_image1) ?>" width="100">
                                    </a>
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Godown Image 2 Upload</label>
                                    <br>
                                    <br>
                                    <a href="<?=base_url($upload_path.$EDITDATA[0]->godown_image2) ?>" target="_blank">
                                       <img src="<?=base_url($upload_path.$EDITDATA[0]->godown_image2) ?>" width="100">
                                    </a>
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Vehicle Image Upload</label>
                                    <br>
                                    <br>
                                    <a href="<?=base_url($upload_path.$EDITDATA[0]->vechicle_image) ?>" target="_blank">
                                       <img src="<?=base_url($upload_path.$EDITDATA[0]->vechicle_image) ?>" width="100">
                                    </a>
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Team Image Upload</label>
                                    <br>
                                    <br>
                                    <a href="<?=base_url($upload_path.$EDITDATA[0]->team_image) ?>" target="_blank">
                                       <img src="<?=base_url($upload_path.$EDITDATA[0]->team_image) ?>" width="100">
                                    </a>
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Self Image Upload</label>
                                    <br>
                                    <br>
                                    <a href="<?=base_url($upload_path.$EDITDATA[0]->self_image) ?>" target="_blank">
                                       <img src="<?=base_url($upload_path.$EDITDATA[0]->self_image) ?>" width="100">
                                    </a>
                                 </div>
                              </div>


                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Cancelled Cheque Upload</label>
                                    <br>
                                    <br>
                                    <a href="<?=base_url($upload_path.$EDITDATA[0]->cancel_chequed) ?>" target="_blank">
                                       <img src="<?=base_url($upload_path.$EDITDATA[0]->cancel_chequed) ?>" width="100">
                                    </a>
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
   ClassicEditor
      .create( document.querySelector( '#editor' ), {
         // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
      } )
      .then( editor => {
         window.editor = editor;
      } )
      .catch( err => {
         console.error( err.stack );
      } );
</script>
   </body>
</html>