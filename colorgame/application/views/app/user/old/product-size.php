<?php
// print_r($p_id);
    $this->db->group_by('size_id');
    $size = $this->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$p_id,'color_id'=>$color_id));
    $size_id = 0;
    if(!empty($size)) {
        $size_id = $size[0]->size_id;
        foreach ($size as $key => $value) {
            $size_name = $this->crud->selectDataByMultipleWhere('size',array('id'=>$value->size_id));
            if($key==0) $size_id = $size_name[0]->id;
            ?>
            <span class="badge badge-dark size_value <?php if($key==0) echo 'active-size'; ?>" data-size_id="<?php echo $size_name[0]->id; ?>"><?php echo $size_name[0]->name; ?></span>
            <?php
        }
    }
?>



<script>
//     $(document).ready(function(){
//     $('.size_value').click(function(){
//         $('.size_value').removeClass('active-size');
//         $(this).addClass('active-size');
//     });
// });
</script>