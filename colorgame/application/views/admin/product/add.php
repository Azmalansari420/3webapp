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

                  <div class="card card-body m-b-15">
                     <ul class="nav nav-tabs" id="nav-tabs">
                        <li class="nav-item"><a href="#basic-details" class="nav-link active" data-toggle="tab">Basic Details</a></li>
                        <li class="nav-item"><a href="#images" class="nav-link" data-toggle="tab">Images & Stock</a></li>
                        <li class="nav-item"><a href="#status" class="nav-link" data-toggle="tab">Status</a></li>
                     </ul>
                     <div class="tab-content tab-content-bordered">
                        <!-- basic-details -->
                        <div class="tab-pane fade show active" id="basic-details">
                           <div class="card m-b-15">
                              <div class="row">
                                 <div class="col-3 form-group m-b-0">
                                    <label>Select Categorie</label>
                                    <select class=" form-control" required name="cat_id">
                                       <option selected value="">-----Select Categorie---</option>
                                       <?php
                                       $categories = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));
                                       foreach($categories as $data)
                                          { ?>
                                       <option value="<?=$data->id ?>"><?=$data->name ?></option>
                                    <?php } ?>
                                    </select>
                                 </div>

                                 <div class="col-3 form-group">
                                    <label>Name </label>
                                    <input type="text" class="form-control" name="name" required>
                                 </div>
                                 <div class="col-3 form-group">
                                    <label>Rating </label>
                                    <input type="text" class="form-control" name="rating">
                                 </div>
                                 <div class="col-3 form-group">
                                    <label>SKU Code </label>
                                    <input type="text" class="form-control" name="skucode">
                                 </div>
                                 <div class="col-12 form-group">
                                    <label>Small Info </label>
                                    <textarea name="small_info" class="summernote form-control"></textarea>
                                 </div>
                                 <div class="col-12 form-group">
                                    <label>Specification </label>
                                    <textarea name="specification" class="summernote form-control"></textarea>
                                 </div>
                                 <div class="col-12 form-group">
                                    <label>Description </label>
                                    <textarea name="description" class="summernote form-control"></textarea>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                        <!-- images -->
                        <div class="tab-pane fade " id="images">
                           <div class="card m-b-15">
                              <div class="row">
                                 <div class="col-6 form-group">
                                    <label>Click to Upload Main Image (203*248)</label>
                                    <input type="file" id="image-input" class="form-control" name="thumb_image">
                                    <img id="image-preview" src="" alt="Image Preview" width="100px" style="display:none;">
                                 </div>

                                 <div class="col-12 text-center">
                                    <h2 class="mb-3" style="font-size: 20px;border: 1px solid;padding: 5px;">Upload Size, Price & Stock</h2>
                                 </div>

                                 <div class="col-12">
                                    <ul id="add-more-field" style="padding: 0;">
                                       <?php  
                                          $data = array();
                                          $count = 1;
                                          
                                          $i=0;
                                          while($i<$count)
                                          {
                                             $data['i'] = $i;
                                             $this->load->view("admin/product/add-image",$data);
                                              $i++;
                                          }
                                       ?>
                                   </ul>
                                   <div class="col-md-12 text-right">
                                       <input type="button" class="btn btn-sm btn-secondary" id="add-more-btn" value="Add card">
                                   </div>
                                 </div>

                                 
                              </div>
                           </div>
                        </div>
                        <!-- stsus -->
                        <div class="tab-pane fade" id="status">
                           <div class="card m-b-15">
                              <div class="row">
                                 
                                 <div class="col-3 form-group m-b-0">
                                    <label>Show Home</label>
                                    <select class=" form-control" required name="show_home" required>
                                       <option value="1" selected>Yes</option>
                                       <option value="0">No</option>
                                    </select>
                                 </div>
                                 <div class="col-3 form-group m-b-0">
                                    <label>Most populer</label>
                                    <select class=" form-control" required name="most_populer" required>
                                       <option value="1" selected>Yes</option>
                                       <option value="0">No</option>
                                    </select>
                                 </div>
                                 <div class="col-3 form-group m-b-0">
                                    <label>Best Product</label>
                                    <select class=" form-control" required name="best_product" required>
                                       <option value="1" selected>Yes</option>
                                       <option value="0">No</option>
                                    </select>
                                 </div>
                                 <div class="col-3 form-group m-b-0">
                                    <label>Flash Sale</label>
                                    <select class=" form-control" required name="flash_sale" required>
                                       <option value="1" selected>Yes</option>
                                       <option value="0">No</option>
                                    </select>
                                 </div>
                                 <div class="col-3 form-group m-b-0">
                                    <label>Deals of Today</label>
                                    <select class=" form-control" required name="deals_of_today" required>
                                       <option value="1" selected>Yes</option>
                                       <option value="0">No</option>
                                    </select>
                                 </div>

                                 <div class="col-3 form-group m-b-0">
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
                     </div>
                  </div>





               <div class="col-lg-4">

               </div>
            </form>
         </div>
         <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      </div>
<?php $this->load->view('admin/include/theams') ?>
<?php $this->load->view('admin/include/allscript') ?>
<script>


   var i = 1;
   $(document).on("click", "#add-more-btn",(function(e) {
     var button = $(this);
     $(button).attr("disabled",true);
     $(button).val("Wait...");
     var html =  ``;
     $.ajax({
     url : "<?php echo base_url('admin_con/product/addmore_image'); ?>",
     method : "POST",
     data : {i:i++},
         success: function(data)
         {
             console.log(data);
             $("#add-more-field").append(data);
             $(button).attr("disabled",false);
             $(button).val("Add Card");
              $(".multiselect").select2();
             const choies = document.querySelectorAll('.choicesjs')
             Array.from(choies,(elem) => {
                 new Choices(elem, {
                     removeItemButton: true,
                 })
             });
             
         }
     });
   }));

   $(document).on("click", ".remove-btn",(function(e) {
      $(this).parent().parent().remove();
   }));

   $(function () {
      $(".multiselect").select2();
   });

   var size_key = 0;
   $(document).on("change", ".selected-value",(function(e) {
      size_key = $(this).data("size_key");
     get_selected_size();
   }));

   function get_selected_size()
   {
      var select_size =  $('.selected-value'+size_key).children('option:selected');
      stock_html = "";
      $(select_size).each(function(index,item){
         var name_size = $(item).data('name');
         console.log(select_size);
         stock_html = stock_html+`
         <div class="row mb-3">
            <div class="cutom-stock col-4">
               <label class="form-label">Stock `+'('+name_size+')'+`</label>
               <input type="number" class="form-control" name="stock`+size_key+`[]" value="1">
            </div>
            <div class="cutom-stock col-4">
               <label class="form-label">MRP Price `+'('+name_size+')'+`</label>
               <input type="number" class="form-control" name="mrp_price`+size_key+`[]" value="1">
            </div>
            <div class="cutom-stock col-4">
               <label class="form-label">Sale Price `+'('+name_size+')'+`</label>
               <input type="number" class="form-control" name="sale_price`+size_key+`[]" value="1">
            </div>
         </div>
         `;
      });
      $("#cutom-stock"+size_key).html(stock_html);
   }





























</script>


















   </body>
</html>