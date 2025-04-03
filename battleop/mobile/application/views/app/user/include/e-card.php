<?php  
foreach($data1 as $key => $data)
{ 
    $query = $this->db->where('match_id',$data->id)->get('join_match_participates');
    $count = $query->num_rows();
    if(empty($data->room_size)) $data->room_size = 1;
    $percantage =  $count/$data->room_size * 100;
    
    // print_r(get_user());
    $full_detail = get_user_app()['full_detail'];
    // print_r($full_detail);

    $my_participent = $this->db->where(array('match_id'=>$data->id,"user_id"=>$full_detail->id,))->get('join_match_participates');
    $my_count = $my_participent->num_rows();
?>

<style>
  
</style>

<div class="mybet-single-card">
    <div class="card-title" style="justify-content: space-around!important;">
        <img src="<?=base_url() ?>assets/logo.png" class="img-fluid" style="height:50px">
        <h6 style="text-transform: uppercase;">
            <?=$data->match_title ?><br><span class="card-time"><?=date('d M Y - h:i A',strtotime($data->match_date_time)) ?></span></h6>

        <span class="open-detail-modal" style="color: black;" data-get_id="<?=$data->id ?>" data-target="#room-details-modelxx"><i class="fa fa-eye"></i></span>
    </div>
    <ul class="bet-details">
        <li class="upcoming-modal-open" data-match_type="<?=$data->match_title ?>" data-entry_type="<?=$data->entry_type ?>" data-htag="<?=$data->id ?>" data-prize_pool_description="<?=$data->prize_pool_description ?>"><span>Prize Pool:
            <span>
            <!-- <span data-bs-toggle="modal" data-bs-target="#upcoming-modal<?=$key ?>"> -->
            <i class="ri-arrow-down-s-line"></i></span></span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <?=$data->total_prize_pool ?></span>
        </li>
        <a href="<?=('e-sport-game-details?id='.$data->id) ?>">
            <li><span>Per Kill:</span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <?=$data->point_per_kill ?></span></li>
            <li><span>Entry Fee:</span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <span class="status-win"><?=$data->entry_fee ?></span></span></li>
            <li><span>Type:</span><span> <span class="status-win"><?=$data->match_type ?></span></span></li>
            <li><span>Version:</span><span> <span class="status-win"><?=$data->version ?></span></span></li>
            <li><span>Map:</span><span> <span class="status-win"><?=$data->map ?></span></span></li>
        </a>
    </ul>
    <div class="progress-body1" style="justify-content: center;">
        <div class="progress progress-md mb-3 progress-body">
            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$percantage ?>%" aria-valuenow="<?=$count ?>" aria-valuemin="0" aria-valuemax="<?=$data->room_size ?>"><?=$count ?></div>
        </div>
        <span class="span-class"><?=$count ?>/<?=$data->room_size ?></span>  

        <?php 
        $per_id_user_join = 0;
        if($data->match_type=='Solo')$per_id_user_join=1;
        if($data->match_type=='Duo')$per_id_user_join=2;
        if($data->match_type=='Squad')$per_id_user_join=4;
        if($per_id_user_join<=$my_count){ ?>
            <a class="join-btn">Joined</a>
        <?php }else{ ?>
            <a href="<?=('e-sport-match-join?id='.$data->id) ?>" class="join-btn">
                <?php
                    if($my_count==0)echo'';
                    if($my_count>0)
                    {
                        if($per_id_user_join==2 || $per_id_user_join==4)echo'+';
                    }
                ?> 
            Join</a>
        <?php } ?>
    </div>

<style>
    ul.bet-details>li {
    list-style: none !important;
}
</style>

    <div id="modalcbody<?=$data->id ?>" style="display: none;">
        <?php
            if(!empty($data->room_id))
                {
                    $full_detail = get_user_app()['full_detail'];
                    // print_r($full_detail);

                    $join_match_participates = $this->db->get_where('join_match_participates',array('user_id'=>$full_detail->id,'match_id'=>$data->id))->result_object();
                    if(!empty($join_match_participates))
                    {
                 ?>
            <ul class="bet-details">
                <li><span>Room ID:</span><span> <span class="status-win"> <?=$data->room_id ?></span></span></li>
                <li><span>Room Password:</span><span> <span class="status-win"> <?=$data->room_password ?></span></span></li>
                <li><span>Room Size:</span><span> <span class="status-win"> <?=$data->room_size ?></span></span></li>
            </ul>
            <?php } else {?>
            <p class="">you Don't Join This Match.</p>
            <?php } ?>
        <?php }  else{?>
            <p class="">Id Show Before 10 Mint</p>
        <?php } ?>    
    </div>



</div>

<style>
    .modal-backdrop
    {
        height: 100%!important;
        width: 100% !important;
    }
    .modal-backdrop.show {
        opacity: 0!important;
    }
</style>




<?php } ?>