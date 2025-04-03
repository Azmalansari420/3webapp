<?php 

// error_reporting(0);
include_once 'lib/all_files.php';


//fetch number
if (isset($submit_res)) {

  $fetch_all_num = $con->all_fetch('number', array('month' => $fi_month, 'year' => $fi_year, 'status' => "Yes"), 'GROUP BY create_on order by create_on asc');
} else {

  $curr_moth = date('m');
  $fetch_all_num = @$con->all_fetch('number', array('status' => 'Yes', 'month' => $curr_moth,'year'=>$fi_year,), 'GROUP BY create_on order by create_on asc');
}

 ?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com/" />
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&amp;display=swap" rel="stylesheet" />
        <link href="css/index.css" rel="stylesheet" type="text/css" />
        <title>Hanuman Lottery</title>       
    </head>

    <body>
        <div class="container px-2 bg-body" id="root">
            <!--head Row -->
            <section class="row px-2">
                <div class="col"></div>
            </section>
            <!--head Row -->
            <section class="row px-2">
                <div class="col">
                    <h1 class="text-center rounded shadow font-rubik py-2 mt-3 bg-danger text-white-50">Hanuman Lottery</h1>
                </div>
            </section>
            <!--head Row -->
            <section class="row px-2">
                <div class="col">
                    <img class="img-fluid shadow logo" src="img/banner.jpg" alt="" />
                </div>
            </section>
            <!--head Row -->

            <!-- Today Result Live  -->
            <section class="row py-3 px-3">
                <div class="col text-center live-result-box py-3 rounded-1">                   
                    <!--Puttin Lottery Sectiomn -->
                    <section class="container-fluid p-0 m-0">                        
                        <div class="row" id="rowtable2">
                            <div class="col p-0 m-0">
                                <!-- month Result laxami -->





                                <section class="row py-1 px-3">
                                    <div class="col text-center live-result-box py-2 rounded-1">
                                        <h3 class="text-center text-white my-2">Live Result</h3>
                                        <div class="h2 rombus squre mx-auto d-flex justify-content-center align-items-center" style="width: 5rem;
    height: 5rem;
    clip-path: none;
    border-radius: 50%;">
                                            <div id="latestresult">

<?php
$today = date("Y-m-d");
$row = $con->get("number","where create_on='$today'  order by id desc limit 1");
if(!empty($row))
{
    echo $row[0]->number;
}
else
{
   echo '--'; 
}
?>
                                                
                                                
                                                
                                                </div>
                                        </div>
                                        <div class="h4 text-white" id="latesttime"></div>
                                    </div>
                                </section>

                                <table class="table text-center table-bordered lottery table12">
                                    <tbody>
                                        <tr class="head_name">
                                            <td>S.no</td>
                                            <td>Game</td>

                                            <td>Time</td>
                                            <td>Old</td>
                                            <td>New</td>
                                        </tr>

        <?php


$fetch_game = $con->all_fetch("game", array('status' => "Yes"), "order by id asc");
if (is_array($fetch_game) || is_object($fetch_game)) { 
    $i = 1; 
 foreach ($fetch_game as $fg) {
    ?>

                                        <tr>
                                            <td><?=$i ?></td>
                                            <td><?=$fg->name ?></td>
                                            <td><?=strtoupper(date("h:i a", strtotime($fg->game_time))) ?></td>
                                            <td class="l2202204221000AM">
                                                
<?php
$today_result_this_game = $con->all_fetch("number",array("game_id"=>$fg->id,),"order by id desc limit 1 offset 1");
if(!empty($today_result_this_game))
{
    echo $today_result_this_game[0]->number;
}
// print_r($today_result_this_game);
?>

                                            </td>
                                            <td><span class="l2202204231000AM"></span>
<?php
// echo $fg->id;
$today_result_this_game = fs("number",array("create_on"=>$today,"game_id"=>$fg->id,));
if(!empty($today_result_this_game))
{
    echo $today_result_this_game->number;
}
// print_r($today_result_this_game);
?>
                                            </td>
                                        </tr>
<?php $i++; } } ?>
                                       
                                    </tbody>
                                </table>

                                <div style="display: flex; justify-content: center; align-items: center;"></div>
                                <!-- month Result maha laxami  -->
                                <section class="d-flex justify-content-center mb-2">
                                    <form action="year.php" class="mx-auto text-center" style="display: flex;">
                                        <select class="year" class="" name="year" style="min-width: 100px;">
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                        </select>
                                        &nbsp;
                                        <input type="submit" value="Go" class="btn btn-primary" />
                                    </form>
                                </section>






                                <table class="table text-center m-0 table-bordered" style="color: white; background-color: var(--bg-danger); margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th class="mrname">Hanuman Lottery CHART</th>
                                        </tr>
                                        <tr></tr>
                                    </thead>
                                </table>
                                <div class="month_table text-white">
                                    <table class="table text-center table-bordered table22">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
<?php  
foreach ($fetch_game as $fg) {
?>
                                                <th><?=strtoupper(date("h:i a", strtotime($fg->game_time))) ?></th>
<?php } ?>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>




        <?php

$year = date("Y");
$month = date("F");
$fetch_game = $con->all_fetch("number", array('status' => "Show","year"=>$year,"month"=>$month,), " GROUP BY create_on order by create_on asc");
if (is_array($fetch_game) || is_object($fetch_game)) { 
    $i = 1; 
 foreach ($fetch_game as $number) {
    ?>

                                            <tr class="ml22022-04-01">
                                                <td class="ldated"><?=date("d-m-Y", strtotime($number->create_on)) ?></td>
<?php
$fetch_game2 = $con->all_fetch("game", array('status' => "Yes"), "order by id asc");
if (is_array($fetch_game2) || is_object($fetch_game2)) { 
    $j = 1; 
 foreach ($fetch_game2 as $game_row) {

    $number_detail = fs("number",array("game_id"=>$game_row->id,"create_on"=>$number->create_on,));
    if(!empty($number_detail))
        $number_new = $number_detail->number;
    else
        $number_new = "-";


    ?>
                                                <td class="td1000AM"><?=$number_new?></td>
<?php $j++; }} ?>
                                            </tr>
<?php $i++; }} ?>





                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- month Result laxami end -->
                            </div>
                        </div>
                    </section>
                </div>
            </section>
            <!-- Month Result Result Live  -->
            <section class="text-center shadow my-2 py-2 px-3">
                Ye Website Sirf Manorajan ke liye
            </section>
        </div>

        <script src="../cdn.jsdelivr.net/npm/bootstrap%405.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="../code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </body>
</html>


