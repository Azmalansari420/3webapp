<table class="table table-striped table-td-valign-middle table-bordered bg-white">
  <thead>
    <tr>
      <th width="1%">#</th>
      <th>Date</th>
      <th>Game Time</th>
      <th>Game Name</th>
      <th>Game Number</th>
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
      
      <td><?=$data->create_on ?> </td>
      <td><?=gametime($data->game_time_id) ?></td>
      <td><?=gamename($data->game_id) ?></td>
      <td class="editable" data-id="<?= $data->id ?>" data-field="number">
          <span class="edit-text"><?= $data->number ?></span>
          <input type="text" class="edit-input form-control" value="<?= $data->number ?>" style="display:none; width: 50px;">
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




    $(document).ready(function () {
    $(".editable").dblclick(function () {
        var cell = $(this);
        var span = cell.find(".edit-text");
        var input = cell.find(".edit-input");

        span.hide(); // Hide text
        input.show().focus(); // Show input field and focus on it
    });

    $(".edit-input").blur(function () { // When input loses focus
        updateNumber($(this));
    });

    $(".edit-input").keypress(function (event) { 
        if (event.which == 13) { // Enter key pressed
            updateNumber($(this));
        }
    });

    function updateNumber(inputElement) {
        var cell = inputElement.closest(".editable");
        var id = cell.data("id"); // Get row ID
        var newValue = inputElement.val(); // Get new number
        var span = cell.find(".edit-text");

        if (newValue.trim() !== "") {
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin_con/number/update_number') ?>", // Replace with your actual update function URL
                data: { id: id, number: newValue },
                success: function (response) {
                    if (response == "success") {
                        span.text(newValue);
                    } else {
                        console.log("Update failed!");
                    }
                }
            });
        }

        inputElement.hide(); // Hide input field
        span.show(); // Show updated text
    }
});
</script>