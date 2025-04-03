<?php
foreach($data as $aValue)
{

?>
<li class="list-card-invoice">
    <div class="logo">
        <img src="<?=base_url() ?>media/uploads/distributor/<?=$aValue->profile_image ?>" onerror="this.src='<?=base_url() ?>media/uploads/1725100321.jpg'">
    </div>
    <div class="content-right">
        <h4>
          <a href="<?=('rsm/edit-sale-officer.php?id='.$aValue->id) ?>"><?=$aValue->name ?> 
            <?=asmstatus($aValue->status) ?>
          </a>
        </h4>
        <p><?=$aValue->email ?> <br> <?=$aValue->mobile ?></p>
    </div>
</li>
<?php } ?>