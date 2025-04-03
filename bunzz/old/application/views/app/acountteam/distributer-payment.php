<?php
$from_date = $this->input->get('from_date');
$to_date = $this->input->get('to_date');
$device_id = $this->input->get('device_id');
$firebase_token = $this->input->get('firebase_token');

$this->load->view('app/include/header'); 

?>

<style>
    .nav-tabs.lined .nav-link.active {
        background-color: #5f94bf;
        border: 1px solid #5f94bf;
        color: #ffffff;
    }
    .group-input>label {
        font-size: 14px;
        font-weight: 600;
        color: black;
    }
    .group-input {
        margin-bottom: 10px;
    }
    .box-components {
        padding: 6px 5px;
    }
    .nav-tabs .nav-item .nav-link {
/*        border: 0;*/
        color: #1e1e1e;
        font-size: 14px;
        line-height: 15px;
        border-bottom: 1px solid transparent;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 4px;
        padding: 7px 7px;
        border: 1px solid black;
    }
.table {
    width: 100%; /* Ensure the table takes full width */
    min-width: 100%; /* Set a minimum width for the table */
}
td {
    border: 1px solid black;
}
th {
    background: #5f94bf !important;
    color: white;

    /*background: #7a91c0 !important;
    color: black;*/
    border: 1px solid;
    text-align: center;
}
label {
        font-size: 14px;
        font-weight: 600;
        color: black;
    }
    .group-input {
        margin-bottom: 30px;
    }
    
</style>
    <div class="header is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a  class="back-btn"> <i class="icon-left"></i> </a>
                <h3>All Orders</h3>
                <a href="home.php" class="action-right"><i class="icon-home"></i></a>
                <!-- <a href="add-sale-officer.php" class="action-right"><i class="icon-plus" style="font-size: 24px;"></i></a> -->
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="tf-container">
            <!-- Add a search box -->
            <div class="mt-4">
                <input type="text" id="orderSearch" class="form-control" placeholder="Search by Order ID" onkeyup="filterTable()" />
            </div>

            <div class="tab-content mt-4">
                <div style="max-height: inherit; max-width: 100%; overflow-x: auto;">
                    <table class="table" id="orderTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>DS Code</th>
                                <th>DS Company Name</th>
                                <th>DS Name</th>
                                <th>DS Contact</th>
                                <th>Order ID</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $this->db->order_by('id desc');
                            $user = $this->db->get('finalorder')->result_object();
                            foreach ($user as $key => $data) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= empcode($data->user_id) ?></td>
                                    <td><?= distributerfirm($data->user_id) ?></td>
                                    <td><?= usersdetails($data->user_id) ?></td>
                                    <td><?= usermobile($data->user_id) ?></td>
                                    <td><?= $data->order_id ?></td>
                                    <td><?= currency_simble($data->after_discount_final_price) ?></td>
                                    <td>
                                        <form style="margin-top: 5px;" id="orderForm">
                                            <input type="hidden" class="table_id" value="<?=$data->id ?>">
                                            <select class="fo1rm-control order_status" style="width: 85px; padding: 5px 5px; line-height: 1;">
                                                <option value="0" <?php if($data->order_status == 0) echo "selected"; ?>>New</option>
                                                <option value="1" <?php if($data->order_status == 1) echo "selected"; ?>>Accept</option>
                                                <option value="5" <?php if($data->order_status == 5) echo "selected"; ?>>Reject</option>
                                            </select>

                                            <input type="text" name="reject_msg" class="reject_msg" style="display: <?php if(!empty($data->reject_msg)){ echo "block"; }else{echo "none";} ?>" placeholder="Enter rejection reason" value="<?php if(!empty($data->reject_msg)) echo $data->reject_msg ?>">
                                        </form>
                                    </td>
                                    <td>
                                        <a style="color: green;" href="invoice.php?order_id=<?= $data->order_id ?>">Invoice</a>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    
    


<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>





<script>

   $(document).ready(function () {
    // Handle dropdown change event
    $('.order_status').on('change', function () {
        var $form = $(this).closest('form'); // Get the closest form
        var status = $(this).val();
        var tableId = $form.find('.table_id').val();
        var $rejectMsg = $form.find('.reject_msg'); // Find reject_msg input in the same form
        var rejectMsg = $rejectMsg.val();

        if (status == '5') {
            $rejectMsg.show();
        } else {
            $rejectMsg.hide();
            rejectMsg = ''; // Clear the rejection message if not needed
        }

        // Send AJAX request to update status
        $.ajax({
            url: '<?=base_url('api/mis/update_order_status') ?>',
            type: 'POST',
            data: {
                table_id: tableId,
                order_status: status,
                reject_msg: rejectMsg
            },
            success: function (response) {
                toaster('Status updated successfully!', 'success');
            },
            error: function () {
                toaster('Failed to update status.', 'error');
            }
        });
    });

    // Submit the reject message when the user clicks outside of the input field
    $('.reject_msg').on('blur', function () {
        var $form = $(this).closest('form'); // Get the closest form
        var tableId = $form.find('.table_id').val();
        var rejectMsg = $(this).val();

        if (rejectMsg.trim() !== '') {
            // Send AJAX request to update the rejection message
            $.ajax({
                url: '<?=base_url('api/mis/update_order_status') ?>',
                type: 'POST',
                data: {
                    table_id: tableId,
                    order_status: '5',
                    reject_msg: rejectMsg
                },
                success: function (response) {
                    toaster('Rejection message submitted successfully!', 'success');
                },
                error: function () {
                    toaster('Failed to submit rejection message.', 'error');
                }
            });
        }
    });
});



















    function filterTable() {
        const input = document.getElementById("orderSearch");
        const filter = input.value.toUpperCase();
        const table = document.getElementById("orderTable");
        const rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName("td");
            let found = false;

            // Check Order ID, User ID, and After Discount Final Price columns
            if (cells[5] && cells[1] && cells[6]) {
                const orderID = cells[5].textContent || cells[5].innerText;
                const userID = cells[1].textContent || cells[1].innerText;
                const price = cells[6].textContent || cells[6].innerText;

                if (
                    orderID.toUpperCase().indexOf(filter) > -1 ||
                    userID.toUpperCase().indexOf(filter) > -1 ||
                    price.toUpperCase().indexOf(filter) > -1
                ) {
                    found = true;
                }
            }

            rows[i].style.display = found ? "" : "none";
        }
    }
</script>
