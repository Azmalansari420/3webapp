<?php

// print_r($userorder);
// die;


// $user_id = $this->session->userdata("user")['id'];
$from_date = $this->input->get('from_date');
$to_date = $this->input->get('to_date');
$user_id = $this->input->get('user_id');


$username = $this->db->get_where('users',array('id'=>$user_id))->result_object()[0];



$device_id = $this->input->get('device_id');
$firebase_token = $this->input->get('firebase_token');
$this->load->view('app/include/header'); 
 
?>
<style>
	.ledger-top-bar
        {
        	display: flex;
        	justify-content: space-between;
        }

        .app-content {
            padding-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #000; /* Ensure borders are visible */
            padding: 6px; /* Adjust padding for printing */
            text-align: center;
        }

        table th {
            background-color: #ddd !important; /* Ensure background prints */
        }

        .ledger-top-bar > p {
            font-size: 12px;
        }

        /* Remove unnecessary elements */
        .tf-statusbar, .back-btn11 {
            display: none;
        }

        /* Ensure the table is fully visible */
        .chart-wrapper {
            width: 100% !important;
            overflow: visible !important;
        }

        /* Avoid truncation */
        .app-content {
            overflow: visible !important;
        }

	  /* Print-specific styles */
    @media print {
        body {
            margin: 0;
            padding: 0;
            font-size: 12px;
            color: black;
        }

        .ledger-top-bar
        {
        	display: flex;
        	justify-content: space-between;
        }

        .app-content {
            padding-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #000; /* Ensure borders are visible */
            padding: 6px; /* Adjust padding for printing */
            text-align: center;
        }

        table th {
            background-color: #ddd !important; /* Ensure background prints */
        }

        .ledger-top-bar > p {
            font-size: 12px;
        }

        /* Remove unnecessary elements */
        .tf-statusbar, .back-btn11 {
            display: none;
        }

        /* Ensure the table is fully visible */
        .chart-wrapper {
            width: 100% !important;
            overflow: visible !important;
        }

        /* Avoid truncation */
        .app-content {
            overflow: visible !important;
        }
    }
</style>

    <!-- /preload -->
    
    <div class="app-content" style="padding-top:0;">
	    <div class="app-section st1 mt-1 bg_white_color">
            <div class="tf-container">
                

                <div class="mt-3 tf-tab">
	                <div class="tf-tab box-components mt-0" style="padding: 10px 0;">
	                    <div class="text-center" style="text-align:center">
	                    	<h4><?php if(!empty($username)) echo $username->name; ?><br>
	                    	CUSTOMER LEDGER </h4>
	                    </div>
	                    <div>
					        <div style="margin-top: 25px;">
							    <p style="float: left; width: 50%;"><strong>Customer Code:</strong> <?php if(!empty($username)) echo $username->user_id; ?></p>
							    <p style="float: right; width: 50%;"><strong>Customer:</strong> <?php if(!empty($username)) echo $username->name; ?></p>
							    
							</div>

					        <div style="margin-top: 25px;">
					        	<p style="float: left; width: 50%;"><strong>Customer City:</strong> <?php if(!empty($username)) echo cityname($username->state); ?></p>
					        	<p style="float: right; width: 50%;"><strong>Customer State:</strong> <?php if(!empty($username)) echo statename($username->state); ?></p>
					        </div>					        
					        <div style="">
					        	<p style="width: 50%;"><strong>From:</strong> <?=$from_date ?> <strong>To:</strong> <?=$to_date ?></p>
					        </div>
	                    </div>

	                    <div style="margin-top: 50px;">
	                    	<table>
					            <thead>
					                <tr>
					                    <th>#</th>
					                    <th>Posting Date</th>
					                    <th>Req ID.</th>
					                    <th>Type</th>
					                    <th>Amount</th>
					                    <th>Balance. Amt</th>
					                    <!-- <th>Net Balance</th> -->
					                </tr>
					            </thead>
					            <tbody>
					            	<?php if (!empty($userorder)) : ?>
                						<?php 
                						$this->db->order_by('id desc');
                						foreach ($userorder as $key => $data) : ?>
					                <tr>
					                    <td><?=$key+1 ?></td>
					                    <td><?=$data->add_date_time ?></td>
					                    <td><?=$data->request_id ?></td>
					                    <td><?=$data->message ?> </td>
					                    <td> <?php if($data->type=='credit') { echo '<span style="color:green;">+</span>'; } else { echo '<span style="color:red;">-</span>';} ?> <?=currency_simble($data->amount) ?></td>
					                    <td><?=currency_simble($data->balance) ?></td>
					                    
					                </tr>
					                <?php endforeach; ?>
						            <?php else : ?>
						                <tr>
						                    <td colspan="6">No records found.</td>
						                </tr>
						            <?php endif; ?>
					                
					            </tbody>
					        </table>
	                    </div>
	                    <!--  -->
	                    <div class="mt-4">
	                    	<p><strong>Closing Balance:</strong>  <?php if(!empty($username)) echo currency_simble($username->wallet); ?></p>
	                    </div>


	                </div>	                
	            </div>
	                           
            </div>
        </div>

	    
        
	</div>

    
    
<?php $this->load->view('app/include/footer'); ?>
