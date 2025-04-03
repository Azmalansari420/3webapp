<?php

$this->load->view('app/include/header'); 
$from_date = $this->input->get('from_date');
$to_date = $this->input->get('to_date');
$device_id = $this->input->get('device_id');
$firebase_token = $this->input->get('firebase_token');
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
li.nav-item.col-6>label {
    font-size: 15px;
    color: black;
    margin-top: 16px;
    font-weight: 600;
}
.nav-tabs .nav-item {
    text-align: left;
}
    
</style>
    <div class="header is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a  class="back-btn"> <i class="icon-left"></i> </a>
                <h3>SKU</h3>
                <a href="home.php" class="action-right"><i class="icon-home"></i></a>
                <!-- <a href="add-sale-officer.php" class="action-right"><i class="icon-plus" style="font-size: 24px;"></i></a> -->
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="tf-container">
            <div class="">
                <div class="tf-tab box-components">

                    <?php
                    $chartData = [];
                    $totalAmount = 0;
                    $totalCategoryAmount = 0; // To store total amount spent across all categories

                    $currentYear = date('Y');
                    $currentMonth = date('m');

                    // Determine the start and end date for the fiscal year
                    if ($currentMonth < 4) { // If before April, the fiscal year started last year
                        $fiscalYearStart = ($currentYear - 1) . '-04-01';
                        $fiscalYearEnd = $currentYear . '-03-31';
                    } else { // If April or later, the fiscal year starts this year
                        $fiscalYearStart = $currentYear . '-04-01';
                        $fiscalYearEnd = ($currentYear + 1) . '-03-31';
                    }
                    $productTotals = [];
                    $productPrices = []; // This array will hold the sale price for each product

                    // Get all final orders for the specified RSM
                    $this->db->where('nsm_id', $full_detail->id);
                    $this->db->where('addeddate >=', $fiscalYearStart); // Assuming 'date' is the column in 'finalorder' table for order date
                    $this->db->where('addeddate <=', $fiscalYearEnd);
                    $finalorder = $this->db->get('finalorder')->result_object();

                    // Initialize an associative array to hold the total spent per product

                    foreach ($finalorder as $data) { 
                        $orderID = $data->order_id;
                        $totalSpent = (float) $data->after_discount_final_price;
                        $totalAmount += $totalSpent;
                        // Get all product names for this order
                        $order = $this->db->get_where('orders', array('order_id' => $orderID))->result_object();
                        foreach ($order as $value) {
                            $productName = $value->name; // Get the product name
                            $catID = $value->cat_id; // Get the category ID
                             $productprice = (float) $value->sale_price; 
                            // print_r($productprice);
                            $productSpent = (float) $value->after_discount_final_price;

                            $productPrices[$productName] = $productprice;
                            
                            // Accumulate total spent per product name
                            if (isset($productTotals[$productName])) {
                                $productTotals[$productName] += $totalSpent; // Add to existing total
                            } else {
                                $productTotals[$productName] = $totalSpent; // Initialize with current total
                            }
                            // Accumulate total spent per product name
                            if (isset($productTotals[$productName])) {
                                $productTotals[$productName] += $productSpent; // Add to existing total for this product
                            } else {
                                $productTotals[$productName] = $productSpent; // Initialize with current total
                            }
                            // Accumulate total spent per category ID
                            if (isset($categoryData[$catID])) {
                                $categoryData[$catID] += $productSpent; // Add to existing total
                            } else {
                                $categoryData[$catID] = $productSpent; // Initialize with current total
                            }

                            $totalCategoryAmount += $productSpent; // Add to overall category total
                        }
                    }

                    // Prepare chart data from the aggregated totals
                    foreach ($productTotals as $productName => $spent) {
                         $salePrice = isset($productPrices[$productName]) ? $productPrices[$productName] : 0; // Get the correct sale price for each product
                        $chartData[] = [
                            'products' => $productName . ' (Price: ' . $salePrice . ')', // Concatenate name and sale price
                            'total_spent' => $spent
                        ];
                    }


                    // Prepare chart data from the aggregated totals for categories
                    $categoryChartData = []; // This will hold data for the second pie chart
                    foreach ($categoryData as $catID => $spent) {
                        $categoryChartData[] = [
                            'category_id' => $catID,
                            'total_spent' => $spent
                        ];
                    }

                    // echo "Total Amount Spent on All Products: " . $totalAmount;
                    ?>

                    <div id="piechart_3d" style="width: 100%; height: 400px;"></div>
                    <h2 style="text-align: center;">Total Amount Spent on All Products: <?=currency_simble($totalAmount) ?></h2>


                    <div id="category_piechart" style="width: 100%; height: 400px;"></div>
                    <h2 style="text-align: center;">Total Amount Spent on All Categories: <?= currency_simble($totalCategoryAmount) ?></h2>
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
     google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawCategoryChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Product Name', 'Total Spent'],
            <?php
            // Output the data for the chart
            foreach ($chartData as $row) {
                echo "['{$row['products']}', {$row['total_spent']}],";
            }
            ?>
        ]);

        // Set chart options
        var options = {
            title: 'Products',
            is3D: true,
            // pieSliceText: 'label', // Show full product name as label
            tooltip: { isHtml: true }, // Show full name in tooltip
            legend: { position: 'right', textStyle: { fontSize: 12 } }, // Legend on the right
            chartArea: { width: '100%', height: '80%' }, // Adjust chart area
            fontSize: 12, // Adjust font size for better visibility
            sliceVisibilityThreshold: 0 // Display all slices
        };

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }


    function drawCategoryChart() {
        var data = google.visualization.arrayToDataTable([
            ['Category ID', 'Total Spent'],
            <?php
            foreach($categoryChartData as $data) {
                echo "['Category " . categoryname($data['category_id']) . "', " . $data['total_spent'] . "],";
            }
            ?>
        ]);

        var options = {
            title: 'Total Spent by Category',
            is3D: true,
            // pieSliceText: 'label', // Show full product name as label
            tooltip: { isHtml: true }, // Show full name in tooltip
            legend: { position: 'right', textStyle: { fontSize: 12 } }, // Legend on the right
            chartArea: { width: '90%', height: '80%' }, // Adjust chart area
            fontSize: 12, // Adjust font size for better visibility
            sliceVisibilityThreshold: 0 // Display all slices
        };

        var chart = new google.visualization.PieChart(document.getElementById('category_piechart'));
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





$(document).on("click", ".submit-btn", function(e) {
    getdata();
});

function getdata() {
    var category = $(".category").val();
    var sku_code = $(".sku_code").val();
    var asm_id = $(".asm-list").val();
    var sales_officer_id = $(".sales-officer-list").val();
    var from_date = $(".from_date").val();
    var to_date = $(".to_date").val();

   
    var form = new FormData();
    form.append("category", category);
    form.append("sku_code", sku_code);
    form.append("asm_id", asm_id);
    form.append("sales_officer_id", sales_officer_id);
    form.append("from_date", from_date);
    form.append("to_date", to_date);

    var settings = {
        "url": "<?=base_url() ?>api/rsm/skudata",
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
        if (response.status == 200) 
        {
            $(".html-data").html(response.data);

        } else {
            toaster(response.message, 'success');
            $(".html-data").html('');
        }
    });
}
getdata();
















































    // var asm_id = 0;
    //  $(document).on("click", ".submit-btn", function(e) {
    //     asm_id = $(".asm_id").val();
    //     if (asm_id == "") {
    //         toaster("Please Select an ASM", 'success');
    //         return;
    //     }
    //     // console.log(asm_id);
    //     load_more();
    // });
    
    // function load_more()
    // {
    //     var form = new FormData();
    //     form.append("asm_id", asm_id);

    //     var settings = {
    //       "url": "<?=base_url() ?>api/rsm/saleofficerlist",
    //       "method": "POST",
    //       "dataType": "json",
    //       "timeout": 0,
    //       "processData": false,
    //       "mimeType": "multipart/form-data",
    //       "contentType": false,
    //       "data": form
    //     };

    //     $.ajax(settings).done(function (response) {
    //       console.log(response);
    //         if(response.status==200)
    //         {
    //           $('.load-more').html(response.data);
    //         }
    //         else
    //           {
    //             toaster(response.message, 'success');
    //             $(".load-more").html('');
    //           }
          
    //     });
    // }

    // load_more();

   



</script>


