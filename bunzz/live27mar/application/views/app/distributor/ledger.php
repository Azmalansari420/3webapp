<?php
$this->load->view('app/include/header');
$from_date = $this->input->get('from_date');
$to_date = $this->input->get('to_date');
$device_id = $this->input->get('device_id');
$firebase_token = $this->input->get('firebase_token');
?>
<style>
/* Add your CSS styles here */
</style>

<div class="header is-fixed">
    <div class="tf-container">
        <div class="tf-statusbar d-flex justify-content-center align-items-center" style="height: 40px;">
            <a href="home.php" class="back-btn11"> <i class="icon-left"></i> </a>
            <h3>Ledger</h3>
            <a href='home.php' class="action-right"><i class="icon-home"></i></a>
        </div>
    </div>
</div>

<div class="app-content" style="padding-top:0;">
    <div class="app-section st1 mt-1 bg_white_color">
        <div class="tf-container">
            <div class="mt-5 tf-tab">
                <div class="tf-tab box-components mt-0" style="padding: 10px 0;">
                    <!-- Updated Form -->
                    <form id="ledgerForm" class="nav nav-tabs lined" role="tablist" style="justify-content: space-around!important;">
                        <input type="hidden" name="device_id" id="device_id" value="<?=$device_id ?>">
                        <input type="hidden" name="firebase_token" id="firebase_token" value="<?=$firebase_token ?>">
                        <li class="nav-item" style="width: 46%;">
                            <label>From Date</label>
                            <input type="date" name="from_date" id="from_date" value="<?php if (!empty($from_date)) echo $from_date; ?>">
                        </li>
                        <li class="nav-item" style="width: 46%;">
                            <label>To Date</label>
                            <input type="date" name="to_date" id="to_date" value="<?php if (!empty($to_date)) echo $to_date; ?>">
                        </li>
                        <li class="nav-item" style="width: 46%;">
                            <button type="submit" class="btn btn-primary btn-sm mt-3 mb-3">Submit</button>
                        </li>
                    </form>
                    <div class="tab-content mt-4">
                        <div class="tab-pane fade show active" id="item1" role="tabpanel">
                            <div id="7daychartContainer" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="totalAmountContainer" class="wrap-total" style="display: none;">
                <div class="total-item" style="width: 100%;justify-content: center;">
                    <a href="#!" class="box-icon bg_primary"><i class="icon-arrow-up_minor primary_color"></i></a>
                    <div class="content">
                        <p class="fw_4" style="font-weight: 700;color: black;">Total Amount</p>
                        <h2 class="fw_6 success_color" id="totalAmount"></h2>
                    </div>
                </div>
            </div>

            <div id="pdfDownloadContainer" style="display: none; text-align: center; margin-top: 20px;">
			    <a id="downloadPdfBtn" href="#" class="btn btn-primary">Download PDF</a>
			</div>

        </div>
    </div>
</div>

<?php $this->load->view('app/include/footer'); ?>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<style>
a.canvasjs-chart-credit {
    display: none !important;
}
</style>

<script>

	$(document).ready(function () {
    $("#ledgerForm").on("submit", function (e) {
        e.preventDefault();

        const from_date = $("#from_date").val();
        const to_date = $("#to_date").val();
        const device_id = $("#device_id").val();
        const firebase_token = $("#firebase_token").val();

        // Perform AJAX request
        $.ajax({
            url: "<?= base_url('api/distributor/leadgerdata') ?>",
            type: "GET",
            data: {
                from_date: from_date,
                to_date: to_date,
                device_id: device_id,
                firebase_token: firebase_token
            },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    // Convert y values to numbers
                    const dataPoints = response.dataPoints.map((point) => ({
                        label: point.label,
                        y: Number(point.y)
                    }));

                    updateChart(dataPoints);

                    $("#totalAmount").text(response.totalAmount);
                    $("#totalAmountContainer").show();

                    // Show download button with dynamic URL
                    $("#downloadPdfBtn").attr("href", response.downloadUrl);
                    $("#pdfDownloadContainer").show();
                } else {
                    toaster(response.message, 'No data found for the selected dates.');
                }
            },
            error: function () {
                toaster(response.message, 'An error occurred while processing your request. Please try again.');
            }
        });
    });

    // Function to update the chart
    function updateChart(dataPoints) {
        var chart = new CanvasJS.Chart("7daychartContainer", {
            animationEnabled: true,
            theme: "light2",
            axisY: {
                title: "Rupees"
            },
            data: [
                {
                    type: "column",
                    dataPoints: dataPoints
                }
            ]
        });
        chart.render();
    }
});










</script>
