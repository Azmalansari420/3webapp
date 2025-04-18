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
               <div class="col-lg-12">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-6 form-group">
                           <label>Name </label>
                           <input type="text" class="form-control" name="name" value="<?=$EDITDATA[0]->name ?>">
                        </div>

                        <div class="col-6 form-group">
                           <label>Short Name </label>
                           <input type="text" class="form-control" name="short_name" value="<?=$EDITDATA[0]->short_name ?>">
                        </div>

                         <div class="col-6 form-group">
                           <label>Jodi Rate </label>
                           <input type="text" class="form-control" name="jodi_rate" value="<?=$EDITDATA[0]->jodi_rate ?>"/>
                        </div>

                        <div class="col-6 form-group">
                           <label>Haruf Rate </label>
                           <input type="text" class="form-control" name="haruf_rate" value="<?=$EDITDATA[0]->haruf_rate ?>"/>
                        </div>

                        <div class="col-6 form-group">
                           <label>Open Time </label>
                           <input type="time" class="form-control" name="open_time" value="<?=$EDITDATA[0]->open_time ?>"/>
                        </div>

                        <div class="col-6 form-group">
                           <label>Close Time </label>
                           <input type="time" class="form-control" name="close_time" value="<?=$EDITDATA[0]->close_time ?>"/>
                        </div>
                        <div class="col-6 form-group">
                           <label>Result Time </label>
                           <input type="time" class="form-control" name="result_time" value="<?=$EDITDATA[0]->result_time ?>"/>
                        </div>


                        <div class="col-6 form-group m-b-0">
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
   </body>
</html>