<table class="table table-striped table-td-valign-middle table-bordered bg-white">
  <thead>
    <tr>
      <th width="1%">#</th>
      <th>Image</th>
      <th>Phase</th>
      <th>Name</th>
      <th>price</th>
      <th>Cycle</th>
      <th>Daily Income</th>
      <th>Total Income</th>
      <th>Purchase Limit</th>
      <th>Status</th>
      <th>Action</th>
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
         <a href="<?=base_url($upload_path.$data->image) ?>" target="_blank">
            <img src="<?=base_url($upload_path.$data->image) ?>"  style="width: 150px;">
         </a>
      </td>
      <td><?=phase_status($data->phase) ?></td>
      <td><?=$data->name ?></td>
      <td><?=currency_simble($data->price) ?></td>
      <td><?=$data->cycle ?> Days</td>
      <td><?=currency_simble($data->daily_income) ?></td>
      <td><?=currency_simble($data->total_income) ?></td>
      <td><?=$data->purchase_limit ?></td>
      <td>
        <div class="switcher switcher-success">
         <span id="statusbyid<?=$data->id ?>"><?php echo status($data->status); ?> </span>
          <input type="checkbox" name="customSwitch-<?=$data->id ?>" id="customSwitch-<?=$data->id ?>" <?php if($data->status==1)echo'checked'; ?> onclick="click_here(<?=$data->id ?>)">
          <label for="customSwitch-<?=$data->id ?>"></label>
        </div>
      </td>
      <td class="btn-col text-nowrap" width="1%">
        <!-- <a href="<?php echo $view_url.$data->id; ?>" class="btn btn-info btn-xs m-r-2">View</a> -->
        <a href="<?php echo $edit_url.$data->id; ?>" class="btn btn-success btn-xs m-r-2">Update</a>
        <a href="#" class="btn btn-danger btn-xs text-white delete-btn-ajax" data-id="<?=$data->id ?>">Delete</a>
      </td>
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