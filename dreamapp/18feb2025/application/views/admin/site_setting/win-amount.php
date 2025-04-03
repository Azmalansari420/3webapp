<!DOCTYPE html>
<html lang="en">
<title><?=$page_title ?></title>
   <?php $this->load->view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?php $this->load->view('admin/include/topbar') ?>
         <?php $this->load->view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <h1 class="page-header add-header"><?php echo $page_title; ?></h1>
            <form class="row" method="post" enctype="multipart/form-data" action="#">
               <div class="col-lg-8">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        
                        <div class="col-6 form-group">
                           <label>Mobile </label>
                           <input type="text" class="form-control" name="mobile" value="<?php echo $EDITDATA[0]->mobile; ?>">
                        </div>
                        <div class="col-6 form-group d-none">
                           <label>Alt Mobile </label>
                           <input type="text" class="form-control" name="alt_mobile" value="<?php echo $EDITDATA[0]->alt_mobile; ?>">
                        </div>
                        
                    

                        <div class="col-12 form-group mt-4">
                           <button type="submit" name="submit" class="btn btn-purple">Submit</button>
                        </div>

                     </div>
                  </div>
               </div>

          

            </form>
         </div>

         <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      </div>


      <?php $this->load->view('admin/include/theams') ?>
      <?php $this->load->view('admin/include/allscript') ?>
   </body>
</html>