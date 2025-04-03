<?php
$from_date = $this->input->get('from_date');
$to_date = $this->input->get('to_date');
$device_id = $this->input->get('device_id');
$firebase_token = $this->input->get('firebase_token');
// print_r($url);





$this->load->view('app/include/header'); 

?>
<style>
 

</style>

    <!-- /preload -->

    <div class="app-header">
      <div class="tf-container">
        <div class="tf-topbar d-flex justify-content-between align-items-center">
          <a class="user-info d-flex justify-content-between align-items-center" href="profile.php">
            <img src="<?=base_url() ?>media/uploads/distributor/<?=$full_detail->profile_image ?>" alt="image" onerror="this.src='<?=base_url() ?>media/uploads/1725100321.jpg'">

            <div class="content">
              <h4 class="white_color"><?=$full_detail->name ?></h4>
              <!-- <p class="white_color fw_4">Let’s save your money!</p> -->
            </div>
          </a>
          <div class="d-flex align-items-center gap-4">
            <a href="javascript:void(0);" id="btn-popup-left">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path d="M7.25687 5.89462C8.06884 5.35208 9.02346 5.0625 10 5.0625C11.3095 5.0625 12.5654 5.5827 13.4913 6.50866C14.4173 7.43462 14.9375 8.6905 14.9375 10C14.9375 10.9765 14.6479 11.9312 14.1054 12.7431C13.5628 13.5551 12.7917 14.188 11.8895 14.5617C10.9873 14.9354 9.99452 15.0331 9.03674 14.8426C8.07896 14.6521 7.19918 14.1819 6.50866 13.4913C5.81814 12.8008 5.34789 11.921 5.15737 10.9633C4.96686 10.0055 5.06464 9.01271 5.43835 8.1105C5.81205 7.20829 6.44491 6.43716 7.25687 5.89462ZM8.29857 12.5464C8.80219 12.8829 9.3943 13.0625 10 13.0625C10.8122 13.0625 11.5912 12.7398 12.1655 12.1655C12.7398 11.5912 13.0625 10.8122 13.0625 10C13.0625 9.3943 12.8829 8.80219 12.5464 8.29857C12.2099 7.79494 11.7316 7.40241 11.172 7.17062C10.6124 6.93883 9.99661 6.87818 9.40254 6.99635C8.80847 7.11451 8.26279 7.40619 7.83449 7.83449C7.40619 8.26279 7.11451 8.80847 6.99635 9.40254C6.87818 9.99661 6.93883 10.6124 7.17062 11.172C7.40241 11.7316 7.79494 12.2099 8.29857 12.5464ZM24.7431 14.1054C23.9312 14.6479 22.9765 14.9375 22 14.9375C20.6905 14.9375 19.4346 14.4173 18.5087 13.4913C17.5827 12.5654 17.0625 11.3095 17.0625 10C17.0625 9.02346 17.3521 8.06884 17.8946 7.25687C18.4372 6.44491 19.2083 5.81205 20.1105 5.43835C21.0127 5.06464 22.0055 4.96686 22.9633 5.15737C23.921 5.34789 24.8008 5.81814 25.4913 6.50866C26.1819 7.19918 26.6521 8.07896 26.8426 9.03674C27.0331 9.99452 26.9354 10.9873 26.5617 11.8895C26.1879 12.7917 25.5551 13.5628 24.7431 14.1054ZM23.7014 7.45363C23.1978 7.11712 22.6057 6.9375 22 6.9375C21.1878 6.9375 20.4088 7.26016 19.8345 7.83449C19.2602 8.40882 18.9375 9.18778 18.9375 10C18.9375 10.6057 19.1171 11.1978 19.4536 11.7014C19.7901 12.2051 20.2684 12.5976 20.828 12.8294C21.3876 13.0612 22.0034 13.1218 22.5975 13.0037C23.1915 12.8855 23.7372 12.5938 24.1655 12.1655C24.5938 11.7372 24.8855 11.1915 25.0037 10.5975C25.1218 10.0034 25.0612 9.38763 24.8294 8.82803C24.5976 8.26844 24.2051 7.79014 23.7014 7.45363ZM7.25687 17.8946C8.06884 17.3521 9.02346 17.0625 10 17.0625C11.3095 17.0625 12.5654 17.5827 13.4913 18.5087C14.4173 19.4346 14.9375 20.6905 14.9375 22C14.9375 22.9765 14.6479 23.9312 14.1054 24.7431C13.5628 25.5551 12.7917 26.1879 11.8895 26.5617C10.9873 26.9354 9.99452 27.0331 9.03674 26.8426C8.07896 26.6521 7.19918 26.1819 6.50866 25.4913C5.81814 24.8008 5.34789 23.921 5.15737 22.9633C4.96686 22.0055 5.06464 21.0127 5.43835 20.1105C5.81205 19.2083 6.44491 18.4372 7.25687 17.8946ZM8.29857 24.5464C8.80219 24.8829 9.3943 25.0625 10 25.0625C10.8122 25.0625 11.5912 24.7398 12.1655 24.1655C12.7398 23.5912 13.0625 22.8122 13.0625 22C13.0625 21.3943 12.8829 20.8022 12.5464 20.2986C12.2099 19.7949 11.7316 19.4024 11.172 19.1706C10.6124 18.9388 9.99661 18.8782 9.40254 18.9963C8.80847 19.1145 8.26279 19.4062 7.83449 19.8345C7.40619 20.2628 7.11451 20.8085 6.99635 21.4025C6.87818 21.9966 6.93883 22.6124 7.17062 23.172C7.40241 23.7316 7.79494 24.2099 8.29857 24.5464ZM19.2569 17.8946C20.0688 17.3521 21.0235 17.0625 22 17.0625C23.3095 17.0625 24.5654 17.5827 25.4913 18.5087C26.4173 19.4346 26.9375 20.6905 26.9375 22C26.9375 22.9765 26.6479 23.9312 26.1054 24.7431C25.5628 25.5551 24.7917 26.1879 23.8895 26.5617C22.9873 26.9354 21.9945 27.0331 21.0367 26.8426C20.079 26.6521 19.1992 26.1819 18.5087 25.4913C17.8181 24.8008 17.3479 23.921 17.1574 22.9633C16.9669 22.0055 17.0646 21.0127 17.4383 20.1105C17.8121 19.2083 18.4449 18.4372 19.2569 17.8946ZM20.2986 24.5464C20.8022 24.8829 21.3943 25.0625 22 25.0625C22.8122 25.0625 23.5912 24.7398 24.1655 24.1655C24.7398 23.5912 25.0625 22.8122 25.0625 22C25.0625 21.3943 24.8829 20.8022 24.5464 20.2986C24.2099 19.7949 23.7316 19.4024 23.172 19.1706C22.6124 18.9388 21.9966 18.8782 21.4025 18.9963C20.8085 19.1145 20.2628 19.4062 19.8345 19.8345C19.4062 20.2628 19.1145 20.8085 18.9963 21.4025C18.8782 21.9966 18.9388 22.6124 19.1706 23.172C19.4024 23.7316 19.7949 24.2099 20.2986 24.5464Z" fill="white" stroke="white" stroke-width="0.125" />
              </svg>
            </a>
            <a href="#!" id="btn-popup-up" class="icon-notification1"><span>2</span></a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="app-content" style="padding-top:0;">
      <div class="card-secton" style="margin-top: 0;">

        

      <div class="mt-5 tf-tab" style="margin-bottom: 100px;">
          <div class="tf-tab box-components mt-0 tf-container" style="paddi1ng1: 10px 0;">

            <h3 class="fw_6 d-flex justify-content-between mb-3"> Download Report </h3>

              <form  method="get" class="nav nav-tabs lined row" role="tablist" style="justify-content: space-1around!important;">
                  <input type="hidden" name="device_id" value="<?= $device_id ?>">
                  <input type="hidden" name="firebase_token" value="<?= $firebase_token ?>">
                  
                  <li class="nav-item col-6" >
                      <label>Select ASM</label>
                      <select class="form-select asm-list" name="asm_id" >
                         <option selected value="">Select ASM</option>
                         <?php
                         $rsm = $this->crud->selectDataByMultipleWhere('users',array('role'=>3,'status'=>1,));
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
                         $rsm = $this->crud->selectDataByMultipleWhere('users',array('role'=>4,'status'=>1,));
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
                         $rsm = $this->crud->selectDataByMultipleWhere('users',array('role'=>5,'status'=>1,));
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
                <!-- <div class="highest-amount"></div> -->
                  <div class="tab-pane fade show active" id="item1" role="tabpanel">
                    <div class="excel-btn" style="display: none;text-align: center;"></div>
                      
                  </div>



              </div>
          </div>                  
      </div>

      

      </div>        
    </div>

    
    


<?php $this->load->view('app/include/bottom-menus'); ?>
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
          title: 'ASM Sales Breakdown (Pie Chart)',
          is3D: true,
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
      chart.draw(data, options);
  }











var id = 0;
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






  // google.charts.load("current", {packages:["corechart"]});
  // google.charts.setOnLoadCallback(drawChart);
  // function drawChart() {
  //   var data = google.visualization.arrayToDataTable([
  //     ['Task', 'Hours per Day'],
  //     ['Work',     11],
  //     ['Eat',      2],
  //     ['Commute',  2],
  //     ['Watch TV', 2],
  //     ['Sleep',    7]
  //   ]);

  //   var options = {
  //     title: 'My Daily Activities',
  //     is3D: true,
  //   };

  //   var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
  //   chart.draw(data, options);
  // }











$(document).ready(function () {
    // Trigger getdata on button click
    $(document).on("click", ".submit-btn", function () {
        getdata();
    });

    // Trigger file download
    $(document).on("click", ".download-btn", function (e) {
        e.preventDefault(); // Prevent default anchor behavior
        var fileUrl = $(this).attr("href"); // Use 'href' to get the file URL
        if (fileUrl) {
            window.location.href = fileUrl; // Trigger the download
        } else {
            console.error("File URL is undefined!");
        }
    });
});

function getdata() {
    var asm_id = $(".asm-list").val();
    var sales_officer_id = $(".sales-officer-list").val();
    var distributer_id = $(".distributer-list").val();
    var from_date = $(".from_date").val();
    var to_date = $(".to_date").val();


    console.log('ASM ID:', asm_id);
    console.log('Sales Officer ID:', sales_officer_id);
    console.log('Distributer ID:', distributer_id);
    console.log('From Date:', from_date);
    console.log('To Date:', to_date);

 

    var form = new FormData();
    form.append("asm_id", asm_id);
    form.append("sales_officer_id", sales_officer_id);
    form.append("distributer_id", distributer_id);
    form.append("from_date", from_date);
    form.append("to_date", to_date);

    var settings = {
        url: "<?=base_url() ?>api/mis/leadgerdata",
        method: "POST",
        dataType: "json",
        processData: false,
        contentType: false,
        data: form,
    };

    $.ajax(settings)
        .done(function (response) {
            console.log(response);
            if (response.status === 200) {
                $(".html-data").html(response.data);
                $(".excel-btn").css("display", "block");

                // Update the button to download the Excel file
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






// $(document).ready(function() {
//     // Load data on page load
//     // getdata();

//     // Trigger getdata on button click
//     $(document).on("click", ".submit-btn", function(e) {
//         getdata();
//     });
// });

// function getdata() {
//     var asm_id = $(".asm-list").val();
//     var sales_officer_id = $(".sales-officer-list").val();
//     var distributer_id = $(".distributer-list").val();
//     var from_date = $(".from_date").val();
//     var to_date = $(".to_date").val();

//     console.log('ASM ID:', asm_id);
//     console.log('Sales Officer ID:', sales_officer_id);
//     console.log('Distributer ID:', distributer_id);
//     console.log('From Date:', from_date);
//     console.log('To Date:', to_date);

//     var form = new FormData();
//     form.append("asm_id", asm_id);
//     form.append("sales_officer_id", sales_officer_id);
//     form.append("distributer_id", distributer_id);
//     form.append("from_date", from_date);
//     form.append("to_date", to_date);

//     var settings = {
//         "url": "<?=base_url() ?>api/rsm/leadgerdata",
//         "method": "POST",
//         "dataType": "json",
//         "timeout": 0,
//         "processData": false,
//         "mimeType": "multipart/form-data",
//         "contentType": false,
//         "data": form
//     };

//     $.ajax(settings).done(function(response) {
//         console.log(response);
//         if (response.status == 200) 
//         {
//             $(".html-data").html(response.data);

//         } else {
//             toaster(response.message, 'success');
//             $(".html-data").html('');
//         }
//     });
// }

//     getdata();






</script>
