<!DOCTYPE html>
<html lang="en">
<title>Add <?=$page_title ?></title>
   <?php $this->load->view('admin/include/allcss') ?>
   <!-- Select2 CSS -->



   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?php $this->load->view('admin/include/topbar') ?>
         <?php $this->load->view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <h1 class="page-header add-header">Add <?=$page_title ?> </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="#">
               <div class="col-lg-12">
                  <div class="card m-b-15">
                     <div class="row card-body">

                        <div class="col-4 form-group m-b-0">
                           <label>Select User</label>
                           <br>
                           <select class=" form-control selectmultiple" required name="user_id">
                              <option disabled selected>Select User</option>
                              <?php
                              $user = $this->db->get_where('users',array('status'=>1))->result_object();
                              foreach ($user as $key => $value) 
                                 { ?>
                              <option value="<?=$value->id ?>"><?=$value->name ?> (<?=$value->user_id ?>)</option>
                           <?php } ?>
                           </select>
                        </div>
                        <div class="col-4 form-group m-b-0">
                           <label>Select Type</label>
                           <select class=" form-control" required name="pay_type">
                              <option disabled selected>Select Type</option>
                              <option value="1">Add (Credit)</option>
                              <option value="2">Deduct (Debit)</option>
                           </select>
                        </div>

                        <div class="col-4 form-group">
                           <label>Amount </label>
                           <input type="text" class="form-control" name="amount" />
                        </div>

                        <div class="col-12 form-group mt-4">
                           <button type="submit" name="submit" class="btn btn-purple">Add <?=$page_title ?></button>
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

      <!-- jQuery (must be loaded first) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS (after jQuery) -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    var $j = jQuery.noConflict();
    $j(document).ready(function() {
        $j('.selectmultiple').select2({
            placeholder: "Select User",
            allowClear: true
        });
    });
</script>
      
   </body>
</html>