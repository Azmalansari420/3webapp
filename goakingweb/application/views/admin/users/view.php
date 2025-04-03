<!DOCTYPE html>
<html lang="en">
   <title>User History</title>
   <?php $this->load->view('admin/include/allcss') ?>
   <body>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?php $this->load->view('admin/include/topbar') ?>
         <?php $this->load->view('admin/include/sidebar') ?>
         <div id="content" class="app-content">
            <h1 class="page-header add-header">User History </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="#">
               <div class="col-lg-12">
                  <div class="card m-b-15">
                     <div class="row card-body">

                        <div class="col-12 form-group">
                           <table id="data-table-default" class="table table-striped table-td-valign-middle table-bordered bg-white">
                             <thead>
                               <tr>
                                 <th width="1%">#</th>
                                 <th>Name</th>
                                 <th>ID</th>
                                 <th>Date</th>
                                 <th>Number</th>
                                 <th>Amount</th>
                                 <th>Game Type</th>
                               </tr>
                             </thead>
                             <tbody>
                               <?php 
                               $totalamt = 0;
                               $i = 1;
                               $user_id = $this->input->get('user_id');
                               $this->db->order_by('id desc');
                               $ALLDATA = $this->db->get_where('game_bet',array('user_id'=>$user_id))->result_object();
                               foreach ($ALLDATA as $key => $data) {
                                $totalamt += $data->amount; 
                               ?>
                               <tr>
                                 <td><?=$i++; ?></td>
                                 <td><?=username($data->user_id) ?></td>
                                 <td><?=get_user_id($data->user_id) ?></td>
                                 <td><?=date('d M, Y',strtotime($data->date)) ?></td>
                                
                                 <td><?=$data->number ?></td>
                                 <td><?=$data->amount ?></td>
                                 <td><?=$data->game_type_name ?></td>
                                 
                                
                               </tr>
                               <?php } ?>
                             </tbody>
                             
                           </table>
                           <div>
                              <strong>Total Amt:- <?=$totalamt ?></strong>
                           </div>
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

<link rel="stylesheet" type="text/css" href="<?=base_url() ?>media/admin/dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url() ?>media/admin/buttons.css">

<script type="text/javascript" src="<?=base_url() ?>media/admin/jquary.js"></script>
<script type="text/javascript" src="<?=base_url() ?>media/admin/datatable.js"></script>
<script type="text/javascript" src="<?=base_url() ?>media/admin/buttons.js"></script>
<script type="text/javascript" src="<?=base_url() ?>media/admin/jszip.js"></script>
<script type="text/javascript" src="<?=base_url() ?>media/admin/pdfmake.js"></script>
<script type="text/javascript" src="<?=base_url() ?>media/admin/fonts.js"></script>
<script type="text/javascript" src="<?=base_url() ?>media/admin/html5_min.js"></script>
<script type="text/javascript" src="<?=base_url() ?>media/admin/print.js"></script>



<script>
   $(document).ready(function() {
    $('#data-table-default').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel'
        ]
    } );
} );

</script>



   </body>
</html>