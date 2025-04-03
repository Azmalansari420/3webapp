<?php
$match_id = $this->input->get('id');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Add Result</title>
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
                     <li class="breadcrumb-item active"><i class="fa fa-arrow-back"></i> Add Result</li>
                  </ol>
                  <h1 class="page-header mb-0">Add Result</h1>
               </div>
               <div>
                  <button onclick="history.back();" class="btn btn-primary">Back</button>
               </div>
            </div>



               <form  class="row" method="post" enctype="multipart/form-data" action="#">
                  <input type="hidden" name="match_id" value="<?=$match_id ?>">
                  <div class="col-lg-12">
                     <div class="card border-0 mb-4">
                        <div class="card-header h6 mb-0 bg-none p-3">
                           <i class="fa fa-fa fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Content
                        </div>
                        <div class="card-body">
                           <div class="row">
                              
                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Declare Result</label>
                                    <textarea class="form-control" name="declare_result" id="editor"  placeholder="Enter text ..." rows="12"><?php if(!empty($EDITDATA[0]->declare_result)) echo $EDITDATA[0]->declare_result; ?></textarea>
                                 </div>
                              </div>

                               <div class="col-lg-12 mb-4 text-center">
                                 <div class="mb-lg-0 mb-3">
                                    <button class="btn btn-primary d-block" type="submit" name="submit">
                                       Add Result
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