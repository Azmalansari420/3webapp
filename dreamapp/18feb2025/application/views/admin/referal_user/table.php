<table class="table table-striped table-td-valign-middle table-bordered bg-white">
  <thead>
    <tr>
      <th width="1%">#</th>
      <th>Image</th>
      <th>Name</th>
      <th>Referal By</th>
      <th>Mobile</th>
      <th>Password</th>
      <th>Status</th>
      <!-- <th>Action</th> -->
    </tr>
  </thead>
  <tbody>
    <?php 
    $i = 1;
    foreach ($ALLDATA as $key => $data) { 
    ?>
    <tr>
      <td><?=$i++; ?>
         <input type="checkbox" name="multiple_delete[]" value="<?php echo $data->id; ?>" class="multiple_delete">
      </td>
      <td>
         <a href="<?=base_url($upload_path.$data->profile_image) ?>" target="_blank">
            <img src="<?=base_url($upload_path.$data->profile_image) ?>" style="width: 100px;height: 100px;">
         </a>
      </td>
      <td>Username:- <?=$data->name ?><br>
        User ID:- <?=$data->user_id ?><br>
        State:- <?=statename($data->state_id) ?>
      </td>
      <td>
        User ID:- <?=$data->referral_by ?><br>
        <!-- Username :- <?=user_idname($data->referral_by) ?> -->
      </td>
      <td><?=$data->mobile ?></td>
      <td><?=$data->password ?></td>
      
      
      <td>
        <form action="<?=base_url('admin_con/referal_user/updatestatus') ?>" method="post">
          <input type="hidden" name="id" value="<?=$data->id ?>">
          <input type="hidden" name="wallet" value="<?=$data->wallet ?>">
          <input type="hidden" name="referral_by" value="<?=$data->referral_by ?>">
          <select name="referal_status" required>
            <option value="">--Select Status--</option>
            <option value="2">Accept</option>
            <option value="3">REJECT</option>
          </select>
          <input type="submit" name="submit">
        </form>
      </td>
      <!-- <td class="btn-col text-nowrap" width="1%"> -->
        <!-- <a href="<?php echo $view_url.$data->id; ?>" class="btn btn-info btn-xs m-r-2">View</a> -->
        <!-- <a href="<?php echo $edit_url.$data->id; ?>" class="btn btn-success btn-xs m-r-2">Update</a> -->
        <!-- <a href="#" class="btn btn-danger btn-xs text-white delete-btn-ajax" data-id="<?=$data->id ?>">Delete</a> -->
      <!-- </td> -->
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="5">
      Total Data: <?= $total_rows ?> | Total Pages: <?= $total_pages ?>
    </td>
    </tr>
  </tfoot>
</table>

<script>
    $('.delete-btn-ajax').on('click', function() {
      event.preventDefault();
      var id = $(this).data('id');
      Swal.fire({
         title: "Are you sure?",
         showDenyButton: true,
         showCancelButton: true,
         confirmButtonText: "Yes",
      }).then((result) => {
         if (result.isConfirmed) 
         {
            $.ajax({
               type: 'POST',
               url: '<?=($delete_url)?>',
               data: {id: id},
               success: function(response) {
               // console.log(response);
               location.reload();
             }
           });
         }
      });
   });
</script>