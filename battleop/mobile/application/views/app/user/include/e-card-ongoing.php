<?php  
foreach($data1 as $key => $data)
{ 
    $full_detail = get_user_app()['full_detail'];
     $query = $this->db->where('match_id',$data->id)->get('join_match_participates');
                 $count = $query->num_rows();
                 $percantage =  $count/$data->room_size * 100;
?>
<div class="mybet-single-card">
            <div class="card-title">
                <img src="<?=base_url() ?>assets/logo.png" class="img-fluid" style="height:50px">
                <h6 style="text-transform: uppercase;"><?=$data->match_title ?><br><span class="card-time"><?=date('d M Y - h:i A',strtotime($data->match_date_time)) ?></span></h6>
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
            <div class="progress-body1">
                <!-- <div class="progress progress-md mb-3 progress-body">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$percantage ?>%" aria-valuenow="<?=$count ?>" aria-valuemin="0" aria-valuemax="100"><?=$count ?></div>
                </div> -->
                    <!-- <span class="span-class"><?=$count ?>/<?=$data->room_size ?></span> -->
                        <a class="join-btn w-100" href="<?=$data->specter_url ?>" style="background: black;padding: 5px 5px;color: white;font-size: 12px;text-align: center;font-weight: 600;border: 1px solid #ffffff;position: relative;line-height: 2.5;">Spectate URL</a>
            </div>
        </div>
<?php } ?>