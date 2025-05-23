<?php

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
                                <th>Ranking</th>
                                <th>Total Sale</th>
                                <th>Total Distributer</th>
                                <th>ASM Name</th>
                            </tr>
                        </thead>
                        <tbody >
                          <?php


                          $chartData = [['User', 'Total Spent']]; // Initialize chartData with headers
                          $i=0;
                          $this->db->select('sales_office_id,asm_id,city,state,user_id, SUM(after_discount_final_price) as total_spent');
                          $this->db->from('finalorder');
                          $this->db->where('asm_id', $full_detail->id);
                          $this->db->group_by('sales_office_id');
                          $this->db->order_by('total_spent', 'DESC');
                          // $this->db->limit(5);
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
                              <td><?=$i ?></td>
                              <td><?=$data->total_spent ?></td>
                              <td><?=getdistributerlist_count($data->sales_office_id); ?></td>
                              <td><?=userdetails($data->asm_id) ?></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>

                      <div id="piechart_3d" style="width: 100%; height: 100%;"></div>
                </div>
                
            </div>



            <div class="mt-5 tf-tab">
              <div class="tf-tab box-components mt-0 tf-container" style="paddi1ng1: 10px 0;">

                <h3 class="fw_6 d-flex justify-content-between mb-3"> Download Report </h3>

                  <form  method="get" class="nav nav-tabs lined row" role="tablist" style="justify-content: space-1around!important;">
                     
                      

                      <li class="nav-item col-6" >
                          <label>Select Sales Officer</label>
                          <select class="form-select sales-officer-list" name="sales_office_id" >
                            <option selected value="">Select Sales Officer</option>
                         <?php
                         $rsm = $this->crud->selectDataByMultipleWhere('users',array('role'=>4,'status'=>1,'asm_id'=>$full_detail->id));
                         foreach($rsm as $data)
                            { ?>
                         <option value="<?=$data->id ?>" ><?=$data->name ?></option>
                      <?php } ?>
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
                    <!-- <div class="highest-amount"></div> -->
                      <div class="tab-pane fade show active" id="item1" role="tabpanel">
                          <div style="overflow-x: auto;">
                            <table class="table"> 
                              <thead>
                                  <tr>
                                      <th>SO EMP</th>
                                      <th>SO Name</th>
                                      <th>SO Contact</th>
                                      <th>DS Code</th>
                                      <th>DS Componey Name</th>
                                      <th>DS Name</th>
                                      <th>DS Contact</th>
                                      <th>State</th>
                                      <th>Distric</th>
                                      <th>Month 1</th>
                                      <th>Month 2</th>
                                      <th>Month 3</th>
                                      <th>Month 4</th>
                                      <th>Total Sale</th>
                                  </tr>
                              </thead>
                              <tbody class="html-data"></tbody>
                            </table>
                          </div>
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

$(document).ready(function() {
    // Call getdata() on page load to fetch and display all data
    getdata("", "", "", "");

    $(document).on("click", ".submit-btn", function(e) {
        // Get values from the filters and call getdata() with them
        var asm_id = '<?=$full_detail->id ?>';
        var sales_officer_id = $(".sales-officer-list").val();
        var from_date = $(".from_date").val();
        var to_date = $(".to_date").val();
        getdata(asm_id, sales_officer_id, from_date, to_date);
    });

    function getdata(asm_id, sales_officer_id, from_date, to_date) {
        var form = new FormData();
        form.append("asm_id", asm_id);
        form.append("sales_officer_id", sales_officer_id);
        form.append("from_date", from_date);
        form.append("to_date", to_date);

        var settings = {
            "url": "<?=base_url() ?>api/asm/salesdata",
            "method": "POST",
            "dataType": "json",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form
        };

        $.ajax(settings).done(function(response) {
            console.log(response);
            if (response.status == 200) {
                $(".html-data").html(response.data);
            } else {
                toaster(response.message, 'success');
                $(".html-data").html('');
            }
        });
    }
});




</script>


