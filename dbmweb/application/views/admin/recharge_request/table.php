<table class="table table-striped table-td-valign-middle table-bordered bg-white">
  <thead>
    <tr>
      <th width="1%">#</th>
      <th>Username & ID</th>
      <th>Request ID</th>
      <th>Amount</th>
      <th>Pay Type</th>
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
      <td><?=username($data->user_id) ?></td>
      <td><?=$data->request_id ?></td>
      <td><?=$data->amount ?></td>
      <td><?=$data->pay_type ?></td>
      <td><?=add_point_status($data->status) ?></td>
      <td>
        <form action="<?=base_url('admin_con/recharge_request/updatestatus') ?>" method="post">
          <input type="hidden" name="id" value="<?=$data->id ?>">
          <input type="hidden" name="user_id" value="<?=$data->user_id ?>">
          <input type="hidden" name="amount" value="<?=$data->amount ?>">
          <input type="hidden" name="requestid" value="<?=$data->request_id ?>">
          <select name="status" required>
            <option value="">--Select Status--</option>
            <option value="3">SUCCESS</option>
            <option value="4">REJECT</option>
          </select>
          <input type="submit" name="submit">
        </form>
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