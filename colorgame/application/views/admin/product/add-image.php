<!-- <?php
print_r($i);

?> -->

<li class="row imagecard" style="margin-top: 25px;border: 1px solid black;
    padding: 10px;">

    <div class="col-2 form-group m-b-0">
        <label>Select Color</label>
        <select class=" form-control" name="color_id[]">
           <option selected value="">-----Select Color---</option>
           <?php
           $color = $this->crud->selectDataByMultipleWhere('color',array('status'=>1,));
           foreach($color as $data)
              {

                $selected = '';
                if(!empty($color_data->color_id))
                {                        
                    if($color_data->color_id==$data->id)
                        $selected = 'selected';
                }
               ?>
           <option value="<?=$data->id ?>" <?=$selected ?>><?=$data->name ?></option>
        <?php } ?>
        </select>
     </div>

     <div class="col-2 form-group m-b-0">
        <label>Select Size</label>
        <select data-size_key="<?=$i ?>" class="form-control multiselect selected-value selected-value<?=$i ?>" name="size_id<?=$i ?>[]" multiple style="display: block!important;">
           <?php 
            $size = $this->crud->selectDataByMultipleWhere('size',array('status'=>1,));
            foreach($size as $data)
                {
                    $selected = '';
                    if(!empty($color_data->size_id))
                    {
                        $size_arr = $this->db->get_where("all_images",array("p_id"=>$color_data->p_id,"size_id"=>$data->id,"color_id"=>$color_data->color_id,))->result_object();
                        if(!empty($size_arr))
                        {
                            $selected = 'selected';
                        }
                    }
                 ?>
           <option value="<?=$data->id ?>" <?=$selected ?> data-name="<?=$data->name ?>" data-size_key="<?=$i ?>"><?=$data->name ?></option>
        <?php } ?>
        </select>
     </div>

    

    <div class="col-4 mb-4">
        <div class="cutom-stock" id="cutom-stock<?=$i ?>">
            <?php 
            if(!empty($color_data->stock))
            {
            $stock_data = $this->db->group_by("size_id")->get_where("all_images",array("p_id"=>$color_data->p_id,"color_id"=>$color_data->color_id,))->result_object();
            if(!empty($stock_data))
            {
                foreach($stock_data as $stockkey1 => $data)
                {
                ?>
            <div class="row mb-3">
             <div class="cutom-stock col-4">
                <label class="form-label">Stock (<?=sizename($data->size_id) ?>)</label>
                <input type="number" class="form-control" name="stock<?=$i ?>[]" value="<?=$data->stock ?>">
             </div>
             <div class="cutom-stock col-4">
                <label class="form-label">MRP Price (<?=sizename($data->size_id) ?>)</label>
                <input type="number" class="form-control" name="mrp_price<?=$i ?>[]" value="<?=$data->mrp_price ?>">
             </div>
             <div class="cutom-stock col-4">
                <label class="form-label">Sale Price (<?=sizename($data->size_id) ?>)</label>
                <input type="number" class="form-control" name="sale_price<?=$i ?>[]" value="<?=$data->sale_price ?>">
             </div>
          </div>
            <?php } } } ?>
        </div>
     </div>

    <div class="col-2 mb-4">
        <div class="mb-lg-0 mb-3">
           <label class="form-label">Image(756*694)</label>
           <input type="file" class="form-control" name="image<?=$i ?>[]" multiple>
        </div>
    </div>    

    <div class="col-2 mb-4" style="padding-top: 10px;">
        <button type="button" class="btn btn-sm mb-2 btn-danger remove-btn mt-3">Remove</button>
    </div>

    <div class="row" style="margin-bottom: 12px;">
        <?php
        if(!empty($color_data->image))
        {
            $stock_data = $this->db->get_where("all_images",array("p_id"=>$color_data->p_id,"color_id"=>$color_data->color_id,'size_id'=>$color_data->size_id))->result_object();
            if(!empty($stock_data))
            {
                foreach ($stock_data as $keyimg => $valueimg)
                { ?>
                <div class="col-lg-3 c-img">
                    <span class="remove-multi">X</span>
                    <img src="<?=base_url('media/uploads/product/'.$valueimg->image) ?>" style="width: -webkit-fill-available;">
                    <input type="hidden" name="oldimage<?=$i ?>[]" value="<?=$valueimg->image ?>">
                </div>
        <?php } } } ?>
    </div>

</li>