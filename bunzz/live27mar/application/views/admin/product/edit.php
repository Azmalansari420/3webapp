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
                           <div class="row">

                              <div class="col-lg-6 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Select Category</label>
                                    <select class="form-select" name="cat_id" id="categorieid" >
                                       <option value="">-- Select Category --</option>
                                       <?php
                                       $cat = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));
                                       foreach($cat as $data)
                                          { ?>
                                       <option <?php if($EDITDATA[0]->cat_id==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                                    <?php } ?>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-6 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Select Sub Categorie</label>
                                    <select class="form-select" name="sub_cat_id" id="location" required>
                                       <?php
                                       $this->db->order_by('id desc');
                                       $categories = $this->crud->selectDataByMultipleWhere('sub_categories',array('status'=>1,));
                                       foreach($categories as $data)
                                          { ?>
                                       <option <?php if($EDITDATA[0]->sub_cat_id==$data->id) echo 'selected'; ?> value="<?php echo $data->id; ?>" ><?php echo $data->name; ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $EDITDATA[0]->name; ?>">
                                 </div>
                              </div>

                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">MRP Price</label>
                                    <input type="text" class="form-control" name="mrp_price" value="<?php echo $EDITDATA[0]->mrp_price; ?>">
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Sale Price</label>
                                    <input type="text" class="form-control" name="sale_price" value="<?php echo $EDITDATA[0]->sale_price; ?>">
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Stock</label>
                                    <input type="text" class="form-control" name="stock" value="<?php echo $EDITDATA[0]->stock; ?>">
                                 </div>
                              </div>
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">SKU Code</label>
                                    <input type="text" class="form-control" name="sku_code" value="<?php echo $EDITDATA[0]->sku_code; ?>">
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="editor"  placeholder="Enter text ..." rows="12"><?php echo $EDITDATA[0]->description; ?></textarea>
                                 </div>
                              </div>
                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Nutritional</label>
                                    <textarea class="form-control" name="nutritional" id="editor2"  placeholder="Enter text ..." rows="12"><?php echo $EDITDATA[0]->nutritional; ?></textarea>
                                 </div>
                              </div>
                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Ingredients</label>
                                    <textarea class="form-control" name="ingredients" id="editor3"  placeholder="Enter text ..." rows="12"><?php echo $EDITDATA[0]->ingredients; ?></textarea>
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
                                    <label class="form-label"style="width: 100%;text-align: center; position: relative;border: 1px solid aliceblue;">Upload thumb_img
                                       <img id="blah" src="<?php echo base_url($upload_path); ?><?php echo $EDITDATA[0]->thumb_img; ?>" class="sd" style="width: 100%; height: 100%; position: relative; top: -22px;">
                                       <input  type="hidden" class="form-control" name="oldthumb_img" value="<?php echo $EDITDATA[0]->thumb_img; ?>">
                                       <input style="display: none;" type="file" class="form-control" name="thumb_img"  id="imgInp">
                                   </label>
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3 bg-light" id="table-field">
                                     <?php
                                        $allimage = json_decode($EDITDATA[0]->image);
                                        foreach ($allimage as $key => $value) 
                                            { ?>

                                       <div style="display:inline-grid;justify-items: center;">
                                            <img src="<?php echo base_url($upload_path); ?><?php echo $value; ?>" height="75"  width="75">
                                            <input type="button" class="btn btn-danger" name="remove" id="remove" value="Remove">
                                            <input type="hidden" name="oldimage[]" value="<?php echo $value; ?>">
                                       </div>
                                       <?php } ?>

                                       <br>

                                        <input type="file" name="image[]" multiple class="form-control">
                                 </div>
                              </div>
                              <div class="col-lg-12 mb-3">
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

   $(document).on("change", "#categorieid",(function(e) {
           get_sub_category();
   }));

   /*sub category*/
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
               console.log(data);
               var result = data;
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



   CKEDITOR.replace('editor');
   CKEDITOR.replace('editor2');
   CKEDITOR.replace('editor3');

    $(document).ready(function(){
        $("#table-field").on('click','#remove',function(){
            $(this).closest('div').remove();
            x--;
        });
    });
</script>
   </body>
</html>