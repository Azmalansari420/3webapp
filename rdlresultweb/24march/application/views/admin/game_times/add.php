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
                           <label>Select Game</label>
                           <select class=" form-control" required name="game_id">
                              <?php
                              $game = $this->db->get_where('game',array('status'=>1))->result_object();
                              foreach($game as $data)
                                 { ?>
                              <option value="<?=$data->id ?>"><?=$data->name ?></option>
                           <?php } ?>
                           </select>
                        </div>
                        <div class="col-4 form-group m-b-0">
                           <label>Select Game Time</label>
                           <select class=" form-control" required name="game_time_id">
                              <?php
                              $game = $this->db->get_where('all_times',array('status'=>1))->result_object();
                              foreach($game as $data)
                                 { ?>
                              <option value="<?=$data->id ?>"><?=date('h:i A',strtotime($data->time)) ?></option>
                           <?php } ?>
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
   </body>
</html>