<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Add <?php echo $page_title; ?></title>
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
                     <li class="breadcrumb-item active"><i class="fa fa-arrow-back"></i> Add <?php echo $page_title; ?></li>
                  </ol>
                  <h1 class="page-header mb-0">Add <?php echo $page_title; ?></h1>
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
                              <div class="col-lg-6 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Select Category</label>
                                    <select class="form-select " name="cat_id" id="categorieid">
                                       <option value="">-- Select Category --</option>
                                       <?php
                                       $cat = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));
                                       foreach($cat as $data)
                                          { ?>
                                       <option value="<?=$data->id ?>"><?=$data->name ?></option>
                                    <?php } ?>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-6 mb-3">
                                    <div class="mb-lg-0 mb-3">
                                       <label class="form-label">Select Sub Categorie</label>
                                       <select class="form-select" name="sub_cat_id" id="location" required></select>
                                    </div>
                                 </div>
                               

                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                 </div>
                              </div>

                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">MRP Price</label>
                                    <input type="text" class="form-control" name="mrp_price">
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Sale Price</label>
                                    <input type="text" class="form-control" name="sale_price">
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Stock</label>
                                    <input type="text" class="form-control" name="stock">
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">SKU Code</label>
                                    <input type="text" class="form-control" name="sku_code">
                                 </div>
                              </div>



                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="editor"  placeholder="Enter text ..." rows="12"></textarea>
                                 </div>
                              </div>
                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Nutritional</label>
                                    <textarea class="form-control" name="nutritional" id="editor2"  placeholder="Enter text ..." rows="12"></textarea>
                                 </div>
                              </div>
                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Ingredients</label>
                                    <textarea class="form-control" name="ingredients" id="editor3"  placeholder="Enter text ..." rows="12"></textarea>
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
                                 <div class="mb-lg-0 mb-3 bg-light">
                                    <label class="form-label"style="width: 100%;text-align: center; position: relative;border: 1px solid aliceblue;">Upload Thumb Img
                                       <img id="blah" src="#" class="sd" style="display: none;width: 100%; height: 100%; position: relative; top: -22px;">
                                       <input style="display: none;" type="file" class="form-control" name="thumb_img"  id="imgInp">
                                   </label>
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3 bg-light">
                                    <label class="form-label">Multiple Image</label>
                                    <input type="file" name="image[]" class="form-control" multiple>
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                       <option value="">-- Select Status --</option>
                                       <option value="1" selected>Show</option>
                                       <option value="0">Hide</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-4 text-center">
                                 <div class="mb-lg-0 mb-3">
                                    <button class="btn btn-primary d-block" type="submit" name="submit">
                                       Add <?php echo $page_title; ?>
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


   /*subcategory*/
function get_sub_category()
  {
    var id = $("#categorieid").val();
    $.ajax({
        dataType:"json",
        url:"<?php echo base_url('admin_con/product/sub_categ'); ?>",
        method: "post",
        data:{id:id},
        success: function(data)
        {
         var result = data;
         console.log(data)
         if(result.status==200)
         {
             $("#location").html(result.data);
         }
         else{
             $("#location").html("");
         }
        }
    });  
   } 


$(document).on("change", "#categorieid",(function(e) {
        get_sub_category();
}));















   CKEDITOR.replace('editor');
   CKEDITOR.replace('editor2');
   CKEDITOR.replace('editor3');
</script>

   </body>
</html>