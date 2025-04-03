<?php  
foreach($data1 as $key => $data)
{ 
    $full_detail = get_user_app()['full_detail'];
?>
 <div class="mybet-single-card">
                <div class="card-title">
                    <img src="<?=base_url() ?>assets/logo.png" class="img-fluid" style="height:50px">
                    <h6 style="text-transform: uppercase;"><?=$data->match_title ?> <br><span class="card-time"><?=date('d M Y - h:i A',strtotime($data->match_date_time)) ?></span></h6>
                </div>
                <ul class="bet-details">
                    <li class="upcoming-modal-open" data-match_type="<?=$data->match_title ?>" data-entry_type="<?=$data->entry_type ?>" data-htag="<?=$data->id ?>" data-prize_pool_description="<?=$data->prize_pool_description ?>"><span>Prize Pool:
                    <span>
                    <!-- <span data-bs-toggle="modal" data-bs-target="#upcoming-modal<?=$key ?>"> -->
                    <i class="ri-arrow-down-s-line"></i></span></span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <?=$data->total_prize_pool ?></span>
                </li>
                    <a href="<?=('e-sport-match-result?id='.$data->id) ?>">
                        <li><span>Per Kill:</span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <?=$data->point_per_kill ?></span></li>
                        <li><span>Entry Fee:</span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <span class="status-win"><?=$data->entry_fee ?></span></span></li>
                        <li><span>Type:</span><span> <span class="status-win"><?=$data->match_type ?></span></span></li>
                        <li><span>Version:</span><span> <span class="status-win"><?=$data->version ?></span></span></li>
                        <li><span>Map:</span><span> <span class="status-win"><?=$data->map ?></span></span></li>
                    </a>
                </ul>
                <ul class="bet-status result-btns">
                    <a href="<?=$data->specter_url ?>" class="result-btn w-100">Watch Match</a>
                    <?php
                    $join_status = '';
                    $joinmatch = $this->crud->selectDataByMultipleWhere('join_match',array('match_id'=>$data->id,'user_id'=>$full_detail->id));
                    if(!empty($joinmatch))
                        {
                            $join_status = 'Joined';
                        }
                        else
                        {
                            $join_status = 'Not Joined';
                        }
                        ?>
                    <a  style="background:white;color: black;border: 1px solid black;" class="result-btn w-100"><?=$join_status ?></a>
                    <!-- <a href="<?=('e-sport-match-result?id='.$data->id) ?>" class="btn btn-primary">View Match Result</a> -->
                    <!-- <a class="btn btn-info">Not Joined</a> -->
                </ul>
            </div>
<?php } ?>