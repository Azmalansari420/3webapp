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
                  <div class="col-lg-12">
                     <div class="card border-0 mb-4">
                        <div class="card-header h6 mb-0 bg-none p-3">
                           <i class="fa fa-fa fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Content
                        </div>
                        <div class="card-body">
                           <div class="row">
                               <div class="col-lg-4 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Select Game</label>
                                    <select class="form-select" name="game_id">
                                      <?php 
                                      $course = $this->crud->selectDataByMultipleWhere('games',array('status'=>1,));
                                      foreach($course as $data)
                                       { ?>
                                       <option <?php if($data->id==$EDITDATA[0]->game_id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Match Title</label>
                                    <input type="text" class="form-control" name="match_title" value="<?=$EDITDATA[0]->match_title ?>">
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Pool-Prize type</label>
                                    <select class="form-select" name="pool_prize_type" id="pool_prize_type">
                                       <option value="" selected>-- Select Pool-Prize --</option>
                                       <option value="0" <?php if($EDITDATA[0]->pool_prize_type==0)echo 'selected'; ?>>Static</option>
                                       <option value="1" <?php if($EDITDATA[0]->pool_prize_type==1)echo 'selected'; ?>>Dynamic</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-6 mb-4" id="divid" style="display:none;">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Admin Share (%) *</label>
                                    <input type="number" class="form-control" name="admin_share" value="<?=$EDITDATA[0]->admin_share ?>">
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Prize Pool Description</label>
                                    <textarea class="form-control" name="prize_pool_description" id="editor"  placeholder="Enter text ..." rows="12"><?php echo $EDITDATA[0]->prize_pool_description; ?></textarea>
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Match Time *</label>
                                    <input type="datetime-local" class="form-control" name="match_date_time" value="<?=$EDITDATA[0]->match_date_time ?>">
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Match Type</label>
                                    <select class="form-select" name="match_type">
                                       <option value="" selected>-- Select Match Type --</option>
                                       <option value="Solo" <?php if($EDITDATA[0]->match_type=='Solo')echo 'selected'; ?>>Solo</option>
                                       <option value="Duo" <?php if($EDITDATA[0]->match_type=='Duo')echo 'selected'; ?>>Duo</option>
                                       <option value="Squad" <?php if($EDITDATA[0]->match_type=='Squad')echo 'selected'; ?>>Squad</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Version Type</label>
                                    <select class="form-select" name="version">
                                       <option value="" selected>-- Select Version Type --</option>
                                       <option value="TPP" <?php if($EDITDATA[0]->version=='TPP')echo 'selected'; ?>>TPP</option>
                                       <option value="FPP" <?php if($EDITDATA[0]->version=='FPP')echo 'selected'; ?>>FPP</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Platform Type</label>
                                    <select class="form-select" name="plateform">
                                       <option value="" selected>-- Select Platform Type --</option>
                                       <option value="Mobile" <?php if($EDITDATA[0]->plateform=='Mobile')echo 'selected'; ?>>Mobile</option>
                                       <option value="Desktop" <?php if($EDITDATA[0]->plateform=='Desktop')echo 'selected'; ?>>Desktop</option>
                                       <option value="Lite" <?php if($EDITDATA[0]->plateform=='Lite')echo 'selected'; ?>>Lite</option>
                                       <option value="Playstation" <?php if($EDITDATA[0]->plateform=='Playstation')echo 'selected'; ?>>Playstation</option>
                                       <option value="Xbox" <?php if($EDITDATA[0]->plateform=='Xbox')echo 'selected'; ?>>Xbox</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Entry Type</label>
                                    <select class="form-select" name="entry_type">
                                       <option value="" selected>-- Select Entry Type --</option>
                                       <option value="Free" <?php if($EDITDATA[0]->entry_type=='Free')echo 'selected'; ?>>Free</option>
                                       <option value="Paid" <?php if($EDITDATA[0]->entry_type=='Paid')echo 'selected'; ?>>Paid</option>
                                       <option value="Giveaway" <?php if($EDITDATA[0]->entry_type=='Giveaway')echo 'selected'; ?>>Giveaway</option>
                                       <option value="Sponsored" <?php if($EDITDATA[0]->entry_type=='Sponsored')echo 'selected'; ?>>Sponsored</option>
                                    </select>
                                 </div>
                              </div>

                               <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Entry Fee*</label>
                                    <input type="number" class="form-control" name="entry_fee" value="<?=$EDITDATA[0]->entry_fee ?>">
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Point Per Kill*</label>
                                    <input type="number" class="form-control" name="point_per_kill" value="<?=$EDITDATA[0]->point_per_kill ?>">
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Total Prize Pool*</label>
                                    <input type="number" class="form-control" name="total_prize_pool" value="<?=$EDITDATA[0]->total_prize_pool ?>">
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Map*</label>
                                    <input type="text" class="form-control" name="map" value="<?=$EDITDATA[0]->map ?>">
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Sponsored By*</label>
                                    <input type="text" class="form-control" name="sponseby" value="<?=$EDITDATA[0]->sponseby ?>">
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Spectate URL*</label>
                                    <input type="text" class="form-control" name="specter_url" value="<?=$EDITDATA[0]->specter_url ?>">
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Match Rules</label>
                                    <select class="form-select" name="match_rule">
                                       <option value="" selected>-- Select Match Rules --</option>
                                        <?php 
                                      $course = $this->crud->selectDataByMultipleWhere('match_rule',array('status'=>1,));
                                      foreach($course as $data)
                                       { ?>
                                       <option <?php if($data->id==$EDITDATA[0]->match_rule) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->title ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Private Match</label>
                                    <select class="form-select" name="private_match">
                                       <option value="No" <?php if($EDITDATA[0]->private_match=='No')echo 'selected'; ?>>No</option>
                                       <option value="Yes" <?php if($EDITDATA[0]->private_match=='Yes')echo 'selected'; ?>>Yes</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-3">
                                 <h2>Room Details</h2>
                              </div>

                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Room Id*</label>
                                    <input type="text" class="form-control" name="room_id" value="<?=$EDITDATA[0]->room_id ?>">
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Room Password*</label>
                                    <input type="text" class="form-control" name="room_password" value="<?=$EDITDATA[0]->room_password ?>">
                                 </div>
                              </div>
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Room Size*</label>
                                    <input type="number" class="form-control" name="room_size" value="<?=$EDITDATA[0]->room_size ?>">
                                 </div>
                              </div>


                              <div class="col-lg-12 mb-3" style="display:none;">
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
   CKEDITOR.replace('editor');


    $(document).ready(function(){
       $('#pool_prize_type').on('change', function() {
         if ( this.value == '1')
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