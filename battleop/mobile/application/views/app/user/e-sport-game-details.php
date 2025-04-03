<?php
$id = $this->input->get('id');
$user_id = $full_detail->id;
$matche = $this->db->get_where('matches',array('id'=>$id))->result_object();
if(!empty($matche))
    $matche = $matche[0];

$matchrule = $this->db->get_where('match_rule',array('id'=>$matche->match_rule))->result_object();
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
        padding: 15px 20px 15px;
    }
    .single-page-area {
        padding-top: 60px;
        padding-bottom: 70px;
/*        padding-bottom: 50px;*/
    }
    ul.part-ul {
        margin-top: 15px;
    }
    ul.part-ul>li {
        list-style: auto;
    }

    .footer-ul{
        display: flex;
        justify-content: space-around;
    }
    .main-footer-bottom ul {
        margin: 0;
        padding: 10px 0;
    }
    .deposit-modal-wrap ul li {
        display: flex;
        justify-content: center;
    }
    .main-footer-bottom ul li {
    width: auto!important;
]
    
</style>
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" ><i class="ri-arrow-left-s-line"></i></a>
            <h3 style="text-transform:uppercase;"><?=$matche->match_title ?> <br><?=date('d M Y - h:i A',strtotime($matche->match_date_time)) ?></h3>
        </div>
        <div class="container mybet-single-card">
            <ul class="bet-details">
                <li><span>Tyoe:</span><span> <span class="status-win"><?=$matche->match_type ?></span></span></li>
                <li><span>Version:</span><span> <span class="status-win"><?=$matche->version ?></span></span></li>
                <li><span>Map:</span><span> <span class="status-win"><?=$matche->map ?></span></span></li>
                <li><span>Entry Fee:</span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <span class="status-win"><?=$matche->entry_fee ?></span></span></li>
                <li><span>Match Schedule:</span><span style="font-size: 15px;"><?=date('d M Y - h:i A',strtotime($matche->match_date_time)) ?></span></li>
            </ul>


            <h6 class="mb-3 text-center">Room Details</h6>

            <?php
            if(!empty($matche->room_id))
                {
                    $join_match_participates = $this->db->get_where('join_match_participates',array('user_id'=>$user_id,'match_id'=>$id))->result_object();
                    if(!empty($join_match_participates))
                    {
                 ?>
            <ul class="bet-details">
                <li><span>Room ID:</span><span> <span class="status-win"> <?=$matche->room_id ?></span></span></li>
                <li><span>Room Password:</span><span> <span class="status-win"> <?=$matche->room_password ?></span></span></li>
                <li><span>Room Size:</span><span> <span class="status-win"> <?=$matche->room_size ?></span></span></li>
            </ul>
            <?php } else {?>
            <p class="">you Don't Join This Match.</p>
            <?php } ?>
        <?php }  else{?>
            <p class="">Id Show Before 10 Mint</p>
        <?php } ?> 

            <!-- <button type="button" data-bs-toggle="modal" data-bs-target="#deposit-success-modal" class="btn btn-danger" style="width: 100%;">Click To View</button> -->

            <!-- <div class="modal fade filter-modal-popup" id="deposit-success-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="container">
                            <div class="modal-card-wrap text-center">
                                <h3 class="title"> Room Details!</h3>
                                <?php
                                    if(!empty($matche->room_id))
                                        {
                                            $join_match_participates = $this->db->get_where('join_match_participates',array('user_id'=>$user_id,'match_id'=>$id))->result_object();
                                            if(!empty($join_match_participates))
                                            {
                                         ?>
                                    <ul class="bet-details">
                                        <li><span>Room ID:</span><span> <span class="status-win"> <?=$matche->room_id ?></span></span></li>
                                        <li><span>Room Password:</span><span> <span class="status-win"> <?=$matche->room_password ?></span></span></li>
                                        <li><span>Room Size:</span><span> <span class="status-win"> <?=$matche->room_size ?></span></span></li>
                                    </ul>
                                    <?php } else {?>
                                    <p class="">you Don't Join This Match.</p>
                                    <?php } ?>
                                <?php }  else{?>
                                    <p class="">Id Show Before 10 Mint</p>
                                <?php } ?>           
                            </div>
                        </div>              
                    </div>            
                </div>
            </div> -->

            

            <h6 class="mb-3 mt-5">About This Match</h6>
            <?php echo $matche->prize_pool_description ?>

            <?php
            if(!empty($matchrule))
                { ?>
            <?=$matchrule[0]->content ?>
        <?php } ?>

            <a class="btn btn-border w-100 mt-4" onclick="showDiv()">Participants</a>

            <div id="welcomeDiv" style="display:none;" class="answer_list" >
                <ul class="part-ul">
                    <?php
                    $i=0;
                    $participates = $this->db->get_where('join_match_participates',array('match_id'=>$id,))->result_object();
                    foreach($participates as $data)
                        { $i++; ?>
                    <li><?=$data->username ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

         <div class="main-footer-bottom d-block text-center">
                <ul class="footer-ul">
                    <?php
                    if($matche->status!=1)
                        { ?>
                    <li>
                        <a class="e-sport-btn btn-success" data-bs-toggle="modal" data-bs-target="#deposit-modal">My Entries</a>
                    </li>                    
                    <li>
                        <?php  
                        $my_participent = $this->db->where(array('match_id'=>$matche->id,"user_id"=>$full_detail->id,))->get('join_match_participates');
                        $my_count = $my_participent->num_rows();
                        $per_id_user_join = 1;
                        if($matche->match_type=='Solo')$per_id_user_join=1;
                        if($matche->match_type=='Duo')$per_id_user_join=2;
                        if($matche->match_type=='Squad')$per_id_user_join=4;
                        if($per_id_user_join<=$my_count){ ?>
                            <a  class="e-sport-btn btn-info">Joined</a>
                        <?php }else{ ?>
                            <a href="<?=('e-sport-match-join?id='.$id)?>" class="e-sport-btn btn-info">+ Join Now</a>
                        <?php } ?>

                    </li>
                    <?php } else {?>
                        <li><a class="e-sport-btn btn-info" href="<?=$matche->specter_url ?>" >Spectate URL</a></li>
                    <?php } ?>
                </ul>
            </div>

    </div>     

<?php
$matchtime = $matche->match_date_time;
$newTime = strtotime('-15 minutes');
$fifty_minus = date('Y-m-d h:i:s', $newTime);
$display = '';

if($matchtime<=$fifty_minus)
{
    $display = "none";
}
else
{
    $display = "block";
}

?>

    <!-- model -->
    <div class="modal fade filter-modal-popup" id="deposit-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-card-wrap deposit-modal-wrap text-center">
                        <h3 class="title">My Entries</h3>
                        <?php
                        $myentry = $this->db->get_where('join_match_participates',array('match_id'=>$id,'user_id'=>$user_id))->result_object();
                        if(!empty($myentry))
                            { ?>
                        <ul>
                            <?php                            
                            foreach($myentry as $data)
                                { ?>
                            <li style="align-items: center;margin-bottom:10px"><input type="text" class="form-control username" name="username" value="<?=$data->username ?>" style="border: 1px solid azure !important;margin-bottom: 0px;"> 
                                <i style="display:<?=$display ?>;" class="fa fa-edit" style="margin-left: 5px;"></i>
                            </li>
                        <?php } ?>
                        <li style="display:<?=$display ?>;"><button type="button" class="btn btn-success" id="update-username">Update</button></li>
                        </ul>
                    <?php } else { ?>
                        <p>You Haven't yet Joined This Match. Go Ahead and Join Now.</p>
                    <?php } ?>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>           
                    </div>
                </div>              
            </div>            
        </div>
    </div>


     



   <?php include('include/allscript.php'); ?>

<script>
    function showDiv() {
       document.getElementById('welcomeDiv').style.display = "block";
    }
</script>

<script>
   $(document).on("click", "#update-username",(function(e) {
      updateusername();
    })); 

    function updateusername()
    {
        username = [];
        username_temp = $('.username');
        $.each(username_temp, function(index, item) {
            username.push(item.value);
        });        

        var form = new FormData();
        form.append("match_id", <?=$id ?>);
        form.append("user_id", <?=$user_id ?>);
        form.append("username", username);

        var settings = {
          "url": "<?=base_url() ?>api/user/updateusername",
          "method": "POST",
          "dataType": "Json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
          console.log(response);
          print_toast(response.message);
          
        });
    }
</script>

</body>
</html>