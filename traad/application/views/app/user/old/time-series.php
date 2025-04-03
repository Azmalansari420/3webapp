<?php
$stock_data = [
    [
        "datetime" => "2025-01-28 3:29:00",
        "open" => 1832.44995,
        "close" => 1829.75
    ],
    [
        "datetime" => "2025-01-28 3:28:00",
        "open" => 1832.40002,
        "close" => 1834.5
    ],
    [
        "datetime" => "2025-01-28 3:27:00",
        "open" => 1832.40002,
        "close" => 1845.5
    ],
    [
        "datetime" => "2025-01-28 3:26:00",
        "open" => 1832.75,
        "close" => 1858.69995
    ],
];

// Prepare data for chart
$labels = [];
$open_values = [];
$close_values = [];

foreach ($stock_data as $data) {
    $labels[] = date("H:i", strtotime($data['datetime'])); // Format as HH:MM
    $open_values[] = $data['open'];
    $close_values[] = $data['close'];
}

$data_for_chart = [
    'labels' => $labels,
    'open' => $open_values,
    'close' => $close_values
];

// print_r($data_for_chart['labels']);


 include('include/allcss.php'); ?>

 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        canvas {
            max-width: 600px;
            margin: auto;
        }
    </style>

  <!-- loader start-->
  <?php include('include/loader.php'); ?>

  <?php include('include/sidebar.php'); ?>
  <!-- loader end -->

  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="ri-menu-line"></i>
        </button>
        <h3 class="middle-title">Discover</h3>
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- Statistics starts -->
  <section class="section-lg-t-space section-b-space">
    <div class="custom-container">
      <canvas id="stockChart"></canvas>
    </div>
  </section>

  <section class="section-lg-t-space section-b-space p-0">
    <div class="custom-container d-flex justify-content-between">
      <p style="font-weight: 600;font-size: 20px;">Price:- 1899.55</p>
    </div>
  </section>

  <section class="section-lg-t-space section-b-space">
    <div class="custom-container d-flex justify-content-between">
      <button class="btn btn-primary">buy</button>
      <button class="btn btn-success">Sale</button>
    </div>
  </section>
  <!-- Statistics end -->

 

  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

  <!-- bottom navbar start -->
 <?php include('include/bootom-menu.php'); ?>
  <!-- bottom navbar end -->

  <!-- bootstrap js -->
 <?php include('include/allscipt.php'); ?>
 

 <script>
        // Convert PHP data to JavaScript
        var labels = <?php echo json_encode($data_for_chart['labels']); ?>;
        var openData = <?php echo json_encode($data_for_chart['open']); ?>;
        var closeData = <?php echo json_encode($data_for_chart['close']); ?>;

        var ctx = document.getElementById('stockChart').getContext('2d');

        var stockChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Open Price',
                        data: openData,
                        borderColor: 'blue',
                        borderWidth: 2,
                        fill: true,
                        backgroundColor: 'rgba(0, 0, 255, 0.1)',
                        pointRadius: 5,
                        pointBackgroundColor: 'blue'
                    },
                    {
                        label: 'Close Price',
                        data: closeData,
                        borderColor: 'red',
                        borderWidth: 2,
                        fill: true,
                        backgroundColor: 'rgba(255, 0, 0, 0.1)',
                        pointRadius: 5,
                        pointBackgroundColor: 'red'
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: false,
                        title: {
                            display: true,
                            text: 'Price (INR)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Time (HH:MM)'
                        }
                    }
                }
            }
        });
    </script>