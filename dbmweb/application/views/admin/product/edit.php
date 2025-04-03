<!DOCTYPE html>
<html lang="en">
   <title>Update <?=$page_title ?></title>
   <?php $this->load->view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?php $this->load->view('admin/include/topbar') ?>
         <?php $this->load->view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <h1 class="page-header add-header">Update <?=$page_title ?> </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="#">
               <div class="col-lg-8">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-6 form-group">
                           <label>Name </label>
                           <input type="text" class="form-control" name="name" value="<?=$EDITDATA[0]->name ?>">
                        </div>

                        <div class="col-6 form-group">
                           <label>Price</label>
                           <input type="number" class="form-control" name="price"  value="<?=$EDITDATA[0]->price ?>"/>
                        </div>

                        <div class="col-6 form-group">
                           <label>Cycle (Days)</label>
                           <input type="number" class="form-control" name="cycle" id="cycle" oninput="calculateTotalIncome()" value="<?=$EDITDATA[0]->cycle ?>"/>
                        </div>

                        <div class="col-6 form-group">
                           <label>Daily Income</label>
                           <input type="number" class="form-control" name="daily_income" id="daily_income" oninput="calculateTotalIncome()" value="<?=$EDITDATA[0]->daily_income ?>"/>
                        </div>

                        <div class="col-6 form-group">
                           <label>Total Income</label>
                           <input type="text" class="form-control" name="total_income" id="total_income" readonly value="<?=$EDITDATA[0]->total_income ?>"/>
                        </div>

                        <div class="col-6 form-group">
                           <label>Purchase Limit</label>
                           <input type="text" class="form-control" name="purchase_limit" value="<?=$EDITDATA[0]->purchase_limit ?>"/>
                        </div>


                        <div class="col-12 form-group">
                           <label>Description </label>
                           <textarea name="description" class="summernote form-control"><?=$EDITDATA[0]->description ?></textarea>
                        </div>

                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-12 form-group">
                           <label>Click to Upload Image</label>
                           <input type="file" id="image-input" class="form-control" name="image">
                           <input  type="hidden" class="form-control" name="oldimage" value="<?php echo $EDITDATA[0]->image; ?>">
                           <?php
                           if(!empty($EDITDATA[0]->image))
                              { ?>
                           <img id="image-preview" src="<?php echo base_url($upload_path); ?><?php echo $EDITDATA[0]->image; ?>" alt="Image Preview" width="100px" >
                        <?php } ?>
                        </div>

                        <div class="col-12 form-group mb-2">
                           <label>Select Phase</label>
                           <select class=" form-control" required name="phase">
                              <option value="1"  <?php if($EDITDATA[0]->phase==1)echo 'selected'; ?>>Phase I</option>
                              <option value="2" <?php if($EDITDATA[0]->phase==2)echo 'selected'; ?>>Phase II</option>
                           </select>
                        </div>

                        <div class="col-12 form-group m-b-0">
                           <label>Select Status</label>
                           <select class=" form-control" required name="status">
                              <option value="1"  <?php if($EDITDATA[0]->status==1)echo 'selected'; ?>>Show</option>
                              <option value="0" <?php if($EDITDATA[0]->status==0)echo 'selected'; ?>>Hide</option>
                           </select>
                        </div>
                        
                        <div class="col-12 form-group mt-4">
                           <button type="submit" name="submit" class="btn btn-purple">Update <?=$page_title ?></button>
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
function calculateTotalIncome() {
    const cycle = parseFloat(document.getElementById("cycle").value) || 0;
    const dailyIncome = parseFloat(document.getElementById("daily_income").value) || 0;

    const totalIncome = cycle * dailyIncome;

    document.getElementById("total_income").value = totalIncome; // Round to 2 decimal places
}
</script>
   </body>
</html>