<li class="row" style="margin-top: 25px;">

	

    <div class="col-lg mb-4">
        <div class="mb-lg-0 mb-3">
           <label class="form-label">Title</label>
           <input type="text" class="form-control" name="title[]" value="<?php if(!empty($all_images->title)) echo $all_images->title; ?>">
        </div>
     </div>
    <div class="col-lg mb-4">
        <div class="mb-lg-0 mb-3">
           <label class="form-label">Content</label>
           <textarea class="form-control" name="content[]"><?php if(!empty($all_images->content)) echo $all_images->content; ?></textarea>
        </div>
     </div>
     
    <div class="col-lg mb-4" style="padding-top: 10px;">
        <button type="button" class="btn btn-sm mb-2 btn-danger remove-btn mt-3">Remove</button>
    </div>

   


</li>