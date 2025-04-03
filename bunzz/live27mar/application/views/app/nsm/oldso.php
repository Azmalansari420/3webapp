<?php
$from_date = $this->input->get('from_date');
$to_date = $this->input->get('to_date');
$device_id = $this->input->get('device_id');
$firebase_token = $this->input->get('firebase_token');
$this->load->view('app/include/header'); 

?>

<style>
    .nav-tabs.lined .nav-link.active {
        background-color: #5f94bf;
        border: 1px solid #5f94bf;
        color: #ffffff;
    }
    .group-input>label {
        font-size: 14px;
        font-weight: 600;
        color: black;
    }
    .group-input {
        margin-bottom: 10px;
    }
    .box-components {
        padding: 6px 5px;
    }
    .nav-tabs .nav-item .nav-link {
/*        border: 0;*/
        color: #1e1e1e;
        font-size: 14px;
        line-height: 15px;
        border-bottom: 1px solid transparent;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 4px;
        padding: 7px 7px;
        border: 1px solid black;
    }
.table {
    width: 100%; /* Ensure the table takes full width */
    min-width: 100%; /* Set a minimum width for the table */
}
td {
    border: 1px solid black;
}
th {
    background: #5f94bf !important;
    color: white;

    /*background: #7a91c0 !important;
    color: black;*/
    border: 1px solid;
    text-align: center;
}
label {
        font-size: 14px;
        font-weight: 600;
        color: black;
    }
    .group-input {
        margin-bottom: 30px;
    }
    
</style>
    <div class="header is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a  class="back-btn"> <i class="icon-left"></i> </a>
                <h3>Sales Officers</h3>
                <a href="home.php" class="action-right"><i class="icon-home"></i></a>
                <!-- <a href="add-sale-officer.php" class="action-right"><i class="icon-plus" style="font-size: 24px;"></i></a> -->
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="tf-container">
            <div class="">
                <div class="tf-tab box-components">

                    <h3 class="fw_6 d-flex justify-content-between mb-3"> SO wise Performance </h3>

                    <table class="table"> 
                        <thead>
                            <tr>
                                <th>SO Name</th>
                                <!-- <th>Ranking</th> -->
                                <th>Total Sale</th>
                                <th>Total Distributer</th>
                                <th>ASM Name</th>
                            </tr>
                        </thead>
                        <tbody >
                          <?php


                          $chartData = [['User', 'Total Spent']]; 
                          $i=0;
                          $this->db->select('sales_office_id,asm_id,city,state,user_id, SUM(after_discount_final_price) as total_spent');
                          $this->db->from('finalorder');
                          $this->db->where('nsm_id', $full_detail->id);
                          $this->db->group_by('asm_id');
                          $this->db->order_by('total_spent', 'DESC');
                          $this->db->limit(5);
                          $userorder = $this->db->get()->result();

                          foreach($userorder as $data)
                            { 
                              $i++; 
                              $name = userdetails($data->sales_office_id); // Get the user name
                              $totalSpent = (float) $data->total_spent; // Ensure it's a float
                              $chartData[] = [$name, $totalSpent];
                              ?>
                            <tr>
                              <td><?=userdetails($data->sales_office_id) ?></td>
                              <!-- <td><?=$i ?></td> -->
                              <td><?=$data->total_spent ?></td>
                              <td><?=getdistributerlist_count($data->sales_office_id); ?></td>
                              <td><?=userdetails($data->asm_id) ?></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>



                      <h3 class="fw_6 d-flex justify-content-between mb-3"> 5 Lowest Performers </h3>

                    <table class="table"> 
                        <thead>
                            <tr>
                                <th>SO Name</th>
                                <!-- <th>Ranking</th> -->
                                <th>Total Sale</th>
                                <th>Total Distributer</th>
                                <th>ASM Name</th>
                            </tr>
                        </thead>
                        <tbody >
                          <?php
                          $chartData = [['User', 'Total Spent']]; 
                          $i=0;
                          $this->db->select('sales_office_id,asm_id,city,state,user_id, SUM(after_discount_final_price) as total_spent');
                          $this->db->from('finalorder');
                          $this->db->where('nsm_id', $full_detail->id);
                          $this->db->group_by('asm_id');
                          $this->db->order_by('total_spent', 'ASC');
                          $this->db->limit(5);
                          $userorder = $this->db->get()->result();

                          foreach($userorder as $data)
                            { 
                              $i++; 
                              $name = userdetails($data->sales_office_id); 
                              $totalSpent = (float) $data->total_spent;
                              $chartData[] = [$name, $totalSpent];
                              ?>
                            <tr>
                              <td><?=userdetails($data->sales_office_id) ?></td>
                              <!-- <td><?=$i ?></td> -->
                              <td><?=$data->total_spent ?></td>
                              <td><?=getdistributerlist_count($data->sales_office_id); ?></td>
                              <td><?=userdetails($data->asm_id) ?></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>

                      <!-- <div id="piechart_3d" style="width: 100%; height: 100%;"></div> -->
                </div>
                
            </div>



            <div class="mt-5 tf-tab" style="margin-bottom: 100px;">
                <div class="tf-tab box-components mt-0 tf-container" style="paddi1ng1: 10px 0;">
                    <h3 class="fw_6 d-flex justify-content-between mb-3"> Download Report </h3>
                    <form  method="get" class="nav nav-tabs lined row" role="tablist" style="justify-content: space-1around!important;">
                        <input type="hidden" name="device_id" value="<?= $device_id ?>">
                        <input type="hidden" name="firebase_token" value="<?= $firebase_token ?>">

                        <li class="nav-item col-6" style="display:none;">
                            <label>Select RSM</label>
                            <select class="form-select rsm-list" name="rsm_id" >
                               <option selected value="">Select RSM</option>
                               <?php
                               $rsm = $this->crud->selectDataByMultipleWhere('users',array('role'=>2,'status'=>1,'nsm_id'=>$full_detail->id));
                               foreach($rsm as $data)
                                  { ?>
                               <option value="<?=$data->id ?>" ><?=$data->name ?></option>
                            <?php } ?>
                            </select>
                        </li>
                        
                        <li class="nav-item col-6"  style="display:none;">
                            <label>Select ASM</label>
                            <select class="form-select asm-list" name="asm_id" >
                               <option selected value="">Select ASM</option>
                               <?php
                               $rsm = $this->crud->selectDataByMultipleWhere('users',array('role'=>3,'status'=>1,'nsm_id'=>$full_detail->id));
                               foreach($rsm as $data)
                                  { ?>
                               <option value="<?=$data->id ?>" ><?=$data->name ?></option>
                            <?php } ?>
                            </select>
                        </li>

                        <li class="nav-item col-6" >
                            <label>Select Sales Officer</label>
                            <select class="form-select sales-officer-list" name="sales_office_id" >
                              <option selected value="">Select Sales Officer</option>
                               <?php
                               $rsm = $this->crud->selectDataByMultipleWhere('users',array('role'=>4,'status'=>1,'nsm_id'=>$full_detail->id));
                               foreach($rsm as $data)
                                  { ?>
                               <option value="<?=$data->id ?>" ><?=$data->name ?></option>
                            <?php } ?>
                            </select>
                        </li>

                        <li class="nav-item col-6" >
                            <label>Select Distributer</label>
                            <select class="form-select distributer-list" name="distributer_id" >
                              <option selected value="">Select Distributer</option>
                               <?php
                               $rsm = $this->crud->selectDataByMultipleWhere('users',array('role'=>5,'status'=>1,'nsm_id'=>$full_detail->id));
                               foreach($rsm as $data)
                                  { ?>
                               <option value="<?=$data->id ?>" ><?=$data->name ?></option>
                            <?php } ?>
                            </select>
                            </select>
                        </li>                 

                        <li class="nav-item col-6" >
                            <label>From Date</label>
                            <input type="date" name="from_date" class="from_date" value="<?= !empty($from_date) ? $from_date : ''; ?>">
                        </li>
                        
                        <li class="nav-item col-6" >
                            <label>To Date</label>
                            <input type="date" name="to_date" class="to_date" value="<?= !empty($to_date) ? $to_date : ''; ?>">
                        </li>
                        
                        <li class="nav-item col-12">
                            <button type="button" class="btn btn-primary btn-sm mt-3 mb-3 submit-btn">Submit</button>
                        </li>                         
                    </form>

                    <div class="tab-content mt-4">
                      <div class="tab-pane fade show active" id="item1" role="tabpanel">
                        <div class="excel-btn" style="display: none;text-align: center;"></div>
                      </div>
                    </div>
                </div>                  
            </div>
            
        </div>
    </div>
    
    
    


<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>

<script src="<?=base_url() ?>javascript/canvasjs.min.js"></script>
<script src="<?=base_url() ?>javascript/loader.js"></script>
<script>





    google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);

  // Prepare PHP data for the chart
  var chartData = <?= json_encode($chartData) ?>;

  function drawChart() {
      var data = google.visualization.arrayToDataTable(chartData);

      var options = {
          title: 'Total Spent by SO',
          is3D: true,
          legend: { position: 'right', textStyle: { fontSize: 12 } }, // Legend on the right
          chartArea: { width: '90%', height: '90%' }, // Adjust chart area
          fontSize: 18, // Adjust font size for better visibility
          sliceVisibilityThreshold: 0 

      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
      chart.draw(data, options);
  }


var id = 0;

/*sales officer list*/
$(document).on("change", ".rsm-list",(function(e) {
id = $(this).val();
  showrsm_list();
}));

function showrsm_list()
{
var form = new FormData();
form.append("id", id);

console.log(id);

var settings = {
  "url": "<?=base_url() ?>api/rsm/showrsm_list",
  "method": "POST",
  "dataType": "json",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  if(response.status==200) 
  {
    $(".asm-list").html(response.data);
  } 
  else 
  {
    $(".asm-list").html('');
  }
});

}


/*sales officer list*/
$(document).on("change", ".asm-list",(function(e) {
id = $(this).val();
  showsalesofficer_list();
}));

function showsalesofficer_list()
{
var form = new FormData();
form.append("id", id);

var settings = {
  "url": "<?=base_url() ?>api/rsm/showsalesofficer_list",
  "method": "POST",
  "dataType": "json",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  if(response.status==200) 
  {
    $(".sales-officer-list").html(response.data);
  } 
  else 
  {
    $(".sales-officer-list").html('');
  }
});

}


$(document).on("change", ".sales-officer-list",(function(e) {
id = $(this).val();
  showdistributer_list();
}));

function showdistributer_list()
{
var form = new FormData();
form.append("id", id);

var settings = {
  "url": "<?=base_url() ?>api/rsm/showdistributer_list",
  "method": "POST",
  "dataType": "json",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  if(response.status==200) 
  {
    $(".distributer-list").html(response.data);
  } 
  else 
  {
    $(".distributer-list").html('');
  }
});

}








 /*leader data*/
  $(document).ready(function () 
  {
      $(document).on("click", ".submit-btn", function () {
          getdata();
      });
      $(document).on("click", ".download-btn", function (e) {
          e.preventDefault();
          var fileUrl = $(this).attr("href"); 
          if (fileUrl) {
              window.location.href = fileUrl; 
          } else {
              console.error("File URL is undefined!");
          }
      });
  });

  function getdata() 
  {
      var rsm_id = $(".rsm-list").val();
      var asm_id = $(".asm-list").val();
      var sales_officer_id = $(".sales-officer-list").val();
      var distributer_id = $(".distributer-list").val();
      var from_date = $(".from_date").val();
      var to_date = $(".to_date").val(); 

      var form = new FormData();
      form.append("rsm_id", rsm_id);
      form.append("asm_id", asm_id);
      form.append("sales_officer_id", sales_officer_id);
      form.append("distributer_id", distributer_id);
      form.append("from_date", from_date);
      form.append("to_date", to_date);

      var settings = {
          url: "<?=base_url() ?>api/nsm/leadgerdata",
          method: "POST",
          dataType: "json",
          processData: false,
          contentType: false,
          data: form,
      };

      $.ajax(settings)
          .done(function (response) {
              console.log(response);
              if (response.status === 200) 
              {
                  $(".html-data").html(response.data);
                  $(".excel-btn").css("display", "block");
                  var downloadExcel = `<a class="download-btn" href="${response.file_url}" download>Click to Download Excel</a>`;
                  $(".excel-btn").html(downloadExcel);
              } else {
                  toaster(response.message, "error");
                  $(".html-data").html("");
                  $(".excel-btn").css("display", "none");
              }
          })
          .fail(function (xhr) {
              console.error("Error fetching data:", xhr.responseText);
          });
  }

  getdata();










</script>


