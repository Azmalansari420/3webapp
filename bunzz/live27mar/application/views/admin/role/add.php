<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Add <?php echo $page_title; ?></title>
      <?php $this->load->view('admin/include/allcss') ?>

   </head>

<style>
   ol, ul {
       padding-left: 0!important;
   }
   li {
      list-style: none!important;
      }
</style>
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
                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Role Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <h3 class="box-title">Role Access Matrix</h3>
                                 </div>
                              </div>

                              <?php
                              $menuname = menuname();
                              $access_array = access_array();
                              $access1 = [];
                              $inner_access = [];
                              $main_access = [];

                              if(!empty($EDITDATA[0]->role_access))
                               {
                                   $access = json_decode($EDITDATA[0]->role_access);
                                   $main_access = $access->main_access;
                                   $inner_access = $access->inner_access;
                               }
                               foreach ($menuname as $key => $value) { 

                                $selected1 = '';
                                if(!empty($main_access)) if(in_array($key, $main_access)) $selected1 = 'checked';
                                ?>
                                <div class="col-lg-3">
                                    <input type="hidden" name="access_count[]" value="<?=$key ?>">
                                    <h4><label class="btn btn-dark"><input class="form-check-input" type="checkbox" name="main_access[]" value="<?=$key ?>" <?=$selected1 ?> > <?=$value ?></label></h4>
                                    <ul>
                                        <?php foreach ($access_array as $key2 => $value2){ 
                                        $selected2 = '';
                                        if(!empty($inner_access[$key]))
                                        {
                                            if(in_array($key2, $inner_access[$key])) $selected2 = 'checked';
                                        }
                                        
                                            ?>
                                            <li>
                                                <label class="btn btn-info">
                                                    <input class="form-check-input" type="checkbox" name="inner_access<?=$key ?>[]" value="<?=$key2 ?>" <?=$selected2 ?> > <?=$value2 ?>
                                                </label>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?> 
                              

                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-4">
                      <div class="card border-0 mb-4">
                        <div class="card-header h6 mb-0 bg-none p-3">
                           <i class="fa fa-fa fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Upload 
                        </div>
                        <div class="card-body">
                           <div class="row">

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
   CKEDITOR.replace('editor');
</script>

   </body>
</html>