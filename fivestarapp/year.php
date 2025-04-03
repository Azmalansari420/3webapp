<?php 
error_reporting(0);

include_once 'lib/all_files.php';

$year = date("Y");
if(isset($_GET['year']))
{
    $year = $_GET['year'];
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com/" />
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&amp;display=swap" rel="stylesheet" />
        <link href="css/index.css" rel="stylesheet" type="text/css" />
        <title>Hanuman Lottery</title>
    </head>

    <body>
        <div class="root" id="root">
            <div class="appbar bg-dark">
                <div class="font-rubik text-center text-white bg-dark h1 m-0 py-2" onClick="index.php">Hanuman Lottery</div>
            </div>

            <!--Puttin Lottery Sectiomn -->
            <section class="container-fluid p-0 m-0">
                <section class="img" style="display: flex; justify-content: center;">
                    <img src="img/logo.png" />
                </section>
                <div class="row" id="rowtable2">
                    <div class="col p-0 m-0">
                        <!-- month Result laxami -->

                        <div style="display: flex; justify-content: center; align-items: center;">
                            <form style="display: flex;">
                                <select class="year" class="" name="year" style="min-width: 100px;">
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                </select>
                                &nbsp;
                                <input type="submit" value="Go" class="btn btn-primary" />
                            </form>
                        </div>

                        <!-- month Result maha laxami  -->
                        <table class="table text-center m-0 table-bordered">
                            <thead>
                                <tr>
                                    <th class="mrname">Hanuman Lottery CHART <?=$year ?></th>
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
$fetch_game = $con->all_fetch("game", array('status' => "Yes"), "order by id asc");
foreach ($fetch_game as $fg) {
?>
                                                <th><?=strtoupper(date("h:i a", strtotime($fg->game_time))) ?></th>
<?php } ?>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>




        <?php


$fetch_game = $con->all_fetch("number", array('status' => "Show","year"=>$year,), " GROUP BY create_on order by id asc");
if (is_array($fetch_game) || is_object($fetch_game)) { 
    $i = 1; 
 foreach ($fetch_game as $number) {
   $full_date = $number->create_on;
    ?>

                                            <tr class="ml22022-04-01">
                                                <td class="ldated"><?=date("d-m-Y", strtotime($number->create_on)) ?></td>
<?php
$fetch_game2 = $con->all_fetch("game", array('status' => "Yes"), "order by id asc");
if (is_array($fetch_game2) || is_object($fetch_game2)) { 
    $j = 1; 
 foreach ($fetch_game2 as $game_row) {
    $number_detail = fs("number",array("game_id"=>$game_row->id,"create_on"=>$full_date,));
    if (is_array($number_detail) || is_object($number_detail))  
        $fnumber = $number_detail->number;
    else
        $fnumber = "-";


// echo $number_detail->number;
    ?>
                                                <td class="td1000A00M"><?=$fnumber ?></td>
<?php $j++; }
}


 ?>
                                            </tr>
<?php $i++; }} ?>





                                            
                                        </tbody>
                                    </table>
                                </div>
                        <!-- month Result laxami end -->
                    </div>
                </div>
            </section>

            <!--Puttin Lottery Sectiomn End-->

            <section
                class="copyright"
                style="height: 50px; display: flex; justify-content: center; align-items: center; margin-top: 20px; box-shadow: 0 0 5px #ccc; background: #313131; color: white; font-size: 15px; text-transform: lowercase;"
            >
                <span> All &copy; Copyright are Reserve to Hanuman Lottery</span>
            </section>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </body>
</html>

