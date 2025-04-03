<!DOCTYPE html>
<html lang="en">
<title>Add <?=$page_title ?></title>
   <?php $this->load->view('admin/include/allcss') ?>
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
                           <label>Select Coupen Type</label>
                           <select class=" form-control coupentype" required name="coupen_type">
                              <option value="" selected>-- Select Coupen Type --</option>
                              <option value="1" >Total Cart Amount</option>
                              <option value="2">Product Wise</option>
                           </select>
                        </div>

                        <div class="col-4 form-group m-b-0" id="divid" style="display:none;">
                           <label>Select Product</label>
                           <select class="form-control selectpicker" name="p_id[]" multiple>
                              <?php
                              $product = $this->db->get_where('product',array('status'=>1,))->result_object();
                              foreach($product as $data)
                                 { ?>
                              <option value="<?=$data->id ?>"><?=$data->name ?></option>
                           <?php } ?>
                           </select>
                        </div>

                        <div class="col-4 form-group">
                           <label>Name </label>
                           <input type="text" class="form-control" name="name" />
                        </div>
                        <div class="col-4 form-group">
                           <label>Amount</label>
                           <input type="number" class="form-control" name="amount" />
                        </div>                        

                        <div class="col-4 form-group">
                           <label>Expiry Date</label>
                           <input type="date" class="form-control" name="expirey_date" />
                        </div>

                        <div class="col-4 form-group m-b-0">
                           <label>Select Type</label>
                           <select class=" form-control" required name="type">
                              <option value="1" selected>Percentage</option>
                              <option value="2">Amount</option>
                           </select>
                        </div>

                        <div class="col-4 form-group m-b-0">
                           <label>Select Status</label>
                           <select class=" form-control" required name="status">
                              <option value="1" selected>Show</option>
                              <option value="0">Hide</option>
                           </select>
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

      <script>
    $(document).ready(function(){
    $('.coupentype').on('change', function() {
      if ( this.value == '2')
      {
        $("#divid").show();
      }
      else
      {
        $("#divid").hide();
      }
    });
});
</script>
   </body>
</html>