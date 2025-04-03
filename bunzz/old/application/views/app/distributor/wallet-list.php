<?php
foreach($data as $aValue)
{

?>

    <a class="tf-trading-history" href="#!">
        <div class="inner-left">
            <div class="thumb">
                <img src="<?=base_url() ?>media/icon.webp" alt="image">
            </div>
            <div class="content">
                <h4><?=$aValue->message ?></h4>
                <p><?=date('d M, Y',strtotime($aValue->date_time)) ?></p>
            </div>
        </div>
        <?php
        if($aValue->type=='credit')
        { ?>
            <span class="num-val success_color">+ ₹ <?=number_format($aValue->amount,2) ?></span>
        <?php } else if($aValue->type=='debit') {?>
            <span class="num-val critical_color">- ₹ <?=number_format($aValue->amount,2) ?></span>
        <?php } ?>
    </a>
<?php } ?>