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
                <h3>Distributor Payment</h3>
                <a href="home.php" class="action-right"><i class="icon-home"></i></a>
                <!-- <a href="add-sale-officer.php" class="action-right"><i class="icon-plus" style="font-size: 24px;"></i></a> -->
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="tf-container">
            <!-- Add a search box -->
            <div class="mt-4">
                <input type="text" id="orderSearch" class="form-control" placeholder="Search by Request ID" onkeyup="filterTable()" />
            </div>

            <div class="tab-content mt-4">
                <div style="max-height: inherit; max-width: 100%; overflow-x: auto;">
                    <table class="table" id="orderTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Request ID</th>
                                <th>DS Code</th>
                                <th>DS Company Name</th>
                                <th>DS Name</th>
                                <th>DS Contact</th>
                                <th>Amount</th>
                                <th>Activity</th>
                                <th>Message</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $this->db->order_by('id desc');
                            $user = $this->db->get('user_history')->result_object();
                            foreach ($user as $key => $data) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= date('d/M/Y',strtotime($data->add_date_time)) ?></td>
                                    <td><?= $data->request_id ?></td>
                                    <td><?= empcode($data->user_id) ?></td>
                                    <td><?= distributerfirm($data->user_id) ?></td>
                                    <td><?= usersdetails($data->user_id) ?></td>
                                    <td><?= usermobile($data->user_id) ?></td>
                                    <td><?= currency_simble($data->amount) ?></td>
                                    <td><?= $data->type ?></td>
                                    <td><?= $data->message ?></td>
                                    
                                    
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
                const request_id = cells[5].textContent || cells[5].innerText;
                const userID = cells[1].textContent || cells[1].innerText;
                const price = cells[6].textContent || cells[6].innerText;

                if (
                    request_id.toUpperCase().indexOf(filter) > -1 ||
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
