<?php foreach ($sizelist as $key => $value) { ?>
    <span style="margin-right: 2px;" class="badge badge-dark size_value <?php if($key == 0) echo 'active-size'; ?>" data-size_id="<?=$value->size_id ?>"><?=$value->size_id ?></span>
<?php } ?>
<script>
	
</script>