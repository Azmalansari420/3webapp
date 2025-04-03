<table class="table table-striped table-td-valign-middle table-bordered bg-white">
  <thead>
    <tr>
      <th width="1%">#</th>
      <th>Order Date</th>
      <th>Order ID</th>
      <th>Customer Details</th>
      <th>Customer Address</th>
      <th>Amount</th>
      <th>Payment Type</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i = 1;
    foreach ($ALLDATA as $key => $data) { 
    ?>
    <tr data-id="<?=$data->id ?>">
      <td><?=$i++; ?>
         <input type="checkbox" name="multiple_delete[]" value="<?php echo $data->id; ?>" class="multiple_delete">
      </td>
      <td><?=date('d M, Y',strtotime($data->orderdate)) ?></td>
      <td><?=$data->order_id ?></td>
      <td>
        Name:- <?=$data->name ?><br>
        Email:- <?=$data->email ?><br>
        Mobile:- <?=$data->mobile ?><br>        
      </td>
      <td>
        Address:- <?=$data->address ?><br>
        Locality:- <?=$data->locality ?><br>
        State:- <?=statename($data->state) ?><br>        
        City:- <?=cityname($data->city) ?><br>        
        Pincode:- <?=$data->pincode ?><br>        
      </td>
      <td><?=currency_simble($data->after_discount_final_price) ?></td>
      <td><?=paymenttype($data->payment_type) ?></td>
      <td>
        <form>
          <input type="hidden" name="id" class="table_id" value="<?=$data->id ?>">
          <select class="form-control order_status" name="order_status" data-id="<?=$data->id ?>">
            <option value="0" <?php if($data->order_status==0) echo "selected"; ?>>Payment Pending</option>
            <option value="1" <?php if($data->order_status==1) echo "selected"; ?>>Confirm</option>
            <option value="2" <?php if($data->order_status==2) echo "selected"; ?>>On Delivery</option>
            <option value="3" <?php if($data->order_status==3) echo "selected"; ?>>Shipped Order</option>
            <option value="4" <?php if($data->order_status==4) echo "selected"; ?>>Completed</option>
            <option value="5" <?php if($data->order_status==5) echo "selected"; ?>>Canceled</option>

          </select>
        </form>
      </td>
      <td class="btn-col text-nowrap" width="1%">
        <a target="_blank" href="<?php echo $invoice_url.$data->id; ?>" class="btn btn-info btn-xs m-r-2">Invoice</a>
        <a href="<?php echo $view_url.$data->id; ?>" class="btn btn-success btn-xs m-r-2">View Order</a>
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