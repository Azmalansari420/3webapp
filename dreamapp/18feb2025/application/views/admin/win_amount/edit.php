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
               <div class="col-lg-12">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        
                        <div class="col-4 form-group">
                           <label>Jodi Amount </label>
                           <input type="text" class="form-control" name="jodi_amt" value="<?php echo $EDITDATA[0]->jodi_amt; ?>">
                           <span>Ex:- ₹1 = ₹100</span>
                        </div>
                        <div class="col-4 form-group ">
                           <label>Haruf Ander Amount </label>
                           <input type="text" class="form-control" name="haruf_ander_amt" value="<?php echo $EDITDATA[0]->haruf_ander_amt; ?>">
                           <span>Ex:- ₹1 = ₹10</span>
                        </div>
                        <div class="col-4 form-group ">
                           <label>Haruf Baher Amount </label>
                           <input type="text" class="form-control" name="haruf_baher_amt" value="<?php echo $EDITDATA[0]->haruf_baher_amt; ?>">
                           <span>Ex:- ₹1 = ₹10</span>
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