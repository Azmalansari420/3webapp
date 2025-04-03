<?php
$today = date("Y-m-d");
$game_id = $this->input->get('game_id');
?>

<!DOCTYPE html>
<html lang="zxx">
   <head>
      <?php include('include/allcss.php'); ?>
   </head>
   <style>
      .pd-top-110 {
      padding-top: 35px;
      }
       .main-home-area .profile-area .media .thumb {
    border: 1px solid #614bff00;
    border-radius: 50%;
}
   </style>
   <body class='sc5'>
      <!-- preloader area start -->
      <?php include('include/loader.php'); ?>
      <!-- preloader area end -->
      <div class="body-overlay" id="body-overlay"></div>
      <div class="container">
         <div class="main-home-area">
          <!-- top bar -->
            <div class="profile-area">
               <div class="media">
                  <a href="home.php" class="thumb">
                  <a class="icon-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
                  </a>
                  <div class="media-body">
                     <span class="profile-name" style="font-size: 25px;"><?=website_name ?></span>
                  </div>
               </div>
               <div class="btn-wrap">
                  <a class="icon-btn" href=""><i class="ri-share-line"></i></a>
               </div>
            </div>



<style type="text/css">
   .top-bar-sec {
    margin-top: 34px;
    display: flex;
    justify-content: space-between;
    padding: 10px;
}

        .date-box {
            background: green;
            color: white;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            text-align: center;
            margin-top: 10px;
        }
        table {
            width: 90%;
            border-collapse: collapse;
            background: #9d0104;
            margin-top: 10px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid black;
            color: white;
            text-align: center
        }
        th {
            font-weight: bold;
        }

        .styled-date {
            padding: 0 10px;
            font-size: 16px;
            border: 2px solid #28a745;
            border-radius: 5px;
            outline: none;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        .styled-date:hover {
            background: #e8f5e9;
        }

        .styled-date:focus {
            border-color: #1e7e34;
            box-shadow: 0 0 5px #1e7e34;
        }
        
</style>


             <div class="top-bar-sec">
                <h5 style="color: white;"><?=gamename($game_id) ?></h5>                
                <input type="date" id="datePicker" class="styled-date" value="<?=$today ?>">
             </div>

             <div style="display: flex;justify-content: center;">
                <table id="gameTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Time/Date</th>
                            <th>Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be loaded dynamically here -->
                    </tbody>
                </table>
             </div>

            

            

           
          
            
         </div>
      </div>
      <?php include('include/allscript.php'); ?>

<script>
    $(document).ready(function() 
    {
        function fetchData(date) {
            var gameId = "<?= $game_id ?>";

            $.ajax({
                url: "<?= base_url('welcome/fetch_numbers') ?>",
                type: "GET",
                data: { game_id: gameId, date: date },
                dataType: "json",
                success: function(response) {
                    var tbody = $("#gameTable tbody");
                    tbody.empty();
                    
                    if(response.length > 0) {
                        $.each(response, function(index, data) {
                            var row = "<tr>"+
                                "<td>"+ (index + 1) +"</td>"+
                                "<td>"+ data.create_on +" "+ formatTime(data.declare_time) +"</td>"+
                                "<td>"+ data.number +"</td>"+
                                "</tr>";
                            tbody.append(row);
                        });
                    } else {
                        tbody.append("<tr><td colspan='3'>No data found</td></tr>");
                    }
                }
            });
        }

        function formatTime(time) {
            var date = new Date("1970-01-01 " + time);
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12;
            minutes = minutes < 10 ? '0'+minutes : minutes;
            return hours + ':' + minutes + ' ' + ampm;
        }

        $("#datePicker").on("change", function() {
            var selectedDate = $(this).val();
            fetchData(selectedDate);
        });

        fetchData("<?= $today ?>");
    });
</script>


   </body>
</html>