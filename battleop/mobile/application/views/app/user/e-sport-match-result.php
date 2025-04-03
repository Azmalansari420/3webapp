<?php
$id = $this->input->get('id');
$message = $this->db->get_where('match_result_content',array('match_id'=>$id,))->result_object();

$matche = $this->db->get_where('matches',array('id'=>$id,))->result_object();
if(!empty($matche))
    $matche = $matche[0];
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
   <?php include('include/allcss.php'); ?>
</head>
<body class='sc5 dark'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
<style>
    .single-page-area .title-area {
        padding: 8px 20px 9px;
    }
    .single-page-area {
        padding-top: 65px;
    }
    .head-title{
        background: #d3d300;
        padding: 5px;
        color: black;
    }
    .table-responsive>table>thead>tr>th {
        width: 20%!important;
    }
    .uikit-table-1 th {
    border: 0 !important;
    padding: 10px 3px;
}
    .uikit-table-1 td {
        border: 0 !important;
        padding: 12px 0px;
        font-size: 12px;
    }
    .yoyo {
        text-align: start;
        border: 1px solid white;
        padding: 5px;
        margin: 8px 0;
    }
</style>
    
    <div class="single-page-area">
        <div class="title-area ">
            <a class="btn back-page-btn"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4">Match Result</h3>
        </div>
        <div class="container">
            <div class="component-wrap mt-4 text-center">
                <div class="top-box">
                    <h6 style="text-transform: uppercase;"><?=$matche->match_title ?><br><?=date('d M Y - h:i A',strtotime($matche->match_date_time)) ?></h6>
                </div>

                <?php
                if(!empty($message))
                    { ?>
               <div class="yoyo">
                   <?=$message[0]->messge ?>
               </div>
           <?php } ?>

<?php
$this->db->limit(4);
$this->db->order_by('position asc');
$result = $this->db->where(" position!='0' ")->get_where('join_match_participates',array('match_id'=>$id))->result_object();
if(!empty($result))
{
?>
               <h6 class="head-title">Winner Winner Chicken Dinner</h6>
                <div class="ba-all-page-inner1 mb-4 p-0 border-radius-4">
                    <div class="table-responsive">
                        <table class="table uikit-table-1">
                            <thead>
                                <tr>
                                    <th scope="col">Pos</th>
                                    <th scope="col" style="font-size: 15px;">Player Name</th>
                                    <th scope="col">Kills</th>
                                    <th scope="col">Winning</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                
                                foreach($result as $value)
                                { $i++;
                                ?>
                                <tr>
                                    <th scope="row"><?=$i ?></th>
                                    <td><?=$value->username ?></td>
                                    <td><?=$value->total_kill ?></td>
                                    <td><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <span class="status-win"><?=$value->winning_amt ?></span></td>
                                </tr>

                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
<?php } ?>
                <!-- full-result -->
                <h6 class="head-title">Full Result</h6>
                <div class="ba-all-page-inner1 mb-4 p-0 border-radius-4">
                    <div class="table-responsive">
                        <table class="table uikit-table-1">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" style="font-size: 15px;">Player Name</th>
                                    <th scope="col">Kills</th>
                                    <th scope="col">Winning</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                $result = $this->db->get_where('join_match_participates',array('match_id'=>$id))->result_object();
                                foreach($result as $value)
                                { $i++;
                                ?>
                                <tr>
                                    <th scope="row"><?=$i ?></th>
                                    <td><?=$value->username ?></td>
                                    <td><?=$value->total_kill ?></td>
                                    <td><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <span class="status-win"><?=$value->winning_amt ?></span></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>     

    <?php include('include/allscript.php'); ?>
</body>
</html>