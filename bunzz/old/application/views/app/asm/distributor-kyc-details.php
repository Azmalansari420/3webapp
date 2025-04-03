<?php
$this->load->view('app/include/header'); 
$id = $this->input->get('id');
$kycdata = $this->crud->selectDataByMultipleWhere('kyc_records',array('user_id'=>$id));
if(!empty($kycdata))
{
    $kycdata = $kycdata[0];
}
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

    
</style>
    <div class="header is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="javascript:void(0);" class="back-btn"> <i class="icon-left"></i> </a>
                <h3>Distributor Details</h3>
                <a href="home.php" class="action-right"><i class="icon-home"></i></a>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="tf-container">
            <div class="">
                <?php
                if(!empty($kycdata))
                    { ?>
                <div class="tf-tab box-components">
                    <ul class="nav nav-tabs lined" role="tablist">
                        <li class="nav-item" >
                          <a href="#!" class="nav-link  active" data-bs-toggle="tab" data-bs-target="#tabIcon1" role="tab" aria-controls="tabIcon1" aria-selected="true">
                                Basic Details
                            </a>
                        </li>
                        <li class="nav-item">
                           <a href="#!" class="nav-link" data-bs-toggle="tab" data-bs-target="#tabIcon2" role="tab" aria-controls="tabIcon2" aria-selected="false">
                                Documents
                           </a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link" data-bs-toggle="tab" data-bs-target="#tabIcon3" role="tab" aria-controls="tabIcon3" aria-selected="false">
                                Bank Details
                            </a>
                         </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link" data-bs-toggle="tab" data-bs-target="#tabIcon4" role="tab" aria-controls="tabIcon4" aria-selected="false">
                                Status
                            </a>
                         </li>
                    </ul>
                    <div class="tab-content mt-4">                        
                        <div class="tab-pane fade show active" id="tabIcon1" role="tabpanel">
                            <div class="group-input">
                                <label>Distributor Firm Name:</label>
                                <input type="text" value="<?=$kycdata->firm_name ?>" name="firm_name" readonly>
                            </div>
                            <div class="group-input">
                                <label>Distributor Contact Person:</label>
                                <input type="text" name="name" readonly required value="<?=$kycdata->name ?>">
                            </div>
                            <div class="group-input">
                                <label>Distributor Contact Number:</label>
                                <input type="number" name="mobile" required value="<?=$kycdata->mobile ?>" readonly>
                            </div>
                            <div class="group-input">
                                <label>Email ID:</label>
                                <input type="email" name="email" value="<?=$kycdata->email ?>">
                            </div>
                            <div class="group-input">
                                <label>Distributor Address:</label>
                                <textarea readonly rows="4" name="address"><?=$kycdata->address ?></textarea>
                            </div>
                            <div class="group-input">
                                <label>State:</label>
                                <select name="state" disabled class="state-id">
                                    <option value="" selected>Select State</option>
                                    <?php
                                    $state = $this->crud->selectDataByMultipleWhere('state',array('status'=>1));
                                    foreach($state as $data)
                                        { ?>
                                    <option <?php if(!empty($kycdata->state)) if($kycdata->state==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="group-input">
                                <label>City:</label>
                                <select class="city-list" name="city" disabled>
                                    <?php
                                    $city = $this->crud->selectDataByMultipleWhere('city',array('status'=>1));
                                    foreach($city as $data)
                                        { ?>
                                    <option <?php if(!empty($kycdata->city)) if($kycdata->city==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="group-input">
                                <label>PIN Code:</label>
                                <input type="number" name="pincode" value="<?=$kycdata->pincode ?>" readonly>
                            </div>
                            <div class="group-input">
                                <label>Distributor GSTIN Number:</label>
                                <input type="text" placeholder="" name="gst_no" value="<?=$kycdata->gst_no ?>" readonly>
                            </div>
                            <div class="group-input">
                                <label>GPS Location LINK:</label>
                                <input type="text" placeholder="" name="gps_location_link" value="<?=$kycdata->gps_location_link ?>" readonly>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="tabIcon2" role="tabpanel">
                            <div class="group-input">
                                <label>GST Certificate Upload:</label>
                                <br>
                                <img src="<?=base_url() ?>media/uploads/distributor/<?=$kycdata->gst_certificate ?>" style="width: 65%;">
                            </div>

                            <div class="group-input">
                                <label>PAN Card Upload:</label>
                                <br>
                                <img src="<?=base_url() ?>media/uploads/distributor/<?=$kycdata->pan_card ?>" style="width: 65%;">
                            </div>
                            <div class="group-input">
                                <label>Aadhar Card Upload:</label>
                                <br>
                                <img src="<?=base_url() ?>media/uploads/distributor/<?=$kycdata->adharcard ?>" style="width: 65%;">
                            </div>
                            <div class="group-input">
                                <label>Electricity Bill (Work Location) Upload:</label>
                                <br>
                                <img src="<?=base_url() ?>media/uploads/distributor/<?=$kycdata->electric_bill ?>" style="width: 65%;">
                            </div>
                            <div class="group-input">
                                <label>Udyam Certificate Upload:</label>
                                <br>
                                <img src="<?=base_url() ?>media/uploads/distributor/<?=$kycdata->udhyam_certificate ?>" style="width: 65%;">
                            </div>
                            <div class="group-input">
                                <label>FSSAI License Upload:</label>
                                <br>
                                <img src="<?=base_url() ?>media/uploads/distributor/<?=$kycdata->fssai_licence_cert ?>" style="width: 65%;">
                            </div>
                            <div class="group-input">
                                <label>Godown Image 1 Upload:</label>
                                <br>
                                <img src="<?=base_url() ?>media/uploads/distributor/<?=$kycdata->godown_image1 ?>" style="width: 65%;">
                            </div>
                            
                            <div class="group-input">
                                <label>Godown Image 2 Upload:</label>
                                <br>
                                <img src="<?=base_url() ?>media/uploads/distributor/<?=$kycdata->godown_image2 ?>" style="width: 65%;">
                            </div>
                            <div class="group-input">
                                <label>Vehicle Image Upload:</label>
                                <br>
                                <img src="<?=base_url() ?>media/uploads/distributor/<?=$kycdata->vechicle_image ?>" style="width: 65%;">
                            </div>
                            <div class="group-input">
                                <label>Team Image Upload:</label>
                                <br>
                                <img src="<?=base_url() ?>media/uploads/distributor/<?=$kycdata->team_image ?>" style="width: 65%;">
                            </div>
                            <div class="group-input">
                                <label>Self Image Upload:</label>
                                <br>
                                <img src="<?=base_url() ?>media/uploads/distributor/<?=$kycdata->self_image ?>" style="width: 65%;">
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tabIcon3" role="tabpanel">
                            <div class="group-input">
                                <label>Bank Details A/c Number:</label>
                                <input type="text" value="<?=$kycdata->bank_ac_no ?>" name="firm_name" readonly>
                            </div>
                            <div class="group-input">
                                <label>Bank Name:</label>
                                <input type="text" name="bank_name" value="<?=$kycdata->bank_name ?>" readonly>
                            </div>
                            <div class="group-input">
                                <label>Branch Name:</label>
                                <input type="text" name="bank_branch" value="<?=$kycdata->bank_branch ?>" readonly>
                            </div>
                            <div class="group-input">
                                <label>IFSC Code:</label>
                                <input type="text" name="bank_ifcscode" value="<?=$kycdata->bank_ifcscode ?>" readonly>
                            </div>
                            <div class="group-input">
                                <label>Cancelled Cheque Upload:</label>
                                <br>
                                <img src="<?=base_url() ?>media/uploads/distributor/<?=$kycdata->cancel_chequed ?>" style="width: 65%;">
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tabIcon4" role="tabpanel">
                            <form method="post" action="<?=base_url('api/Distributor/status_change') ?>">
                                <input type="hidden" name="id" value="<?=$kycdata->id ?>" class="get-id">
                                <input type="hidden" name="user_id" value="<?=$kycdata->user_id ?>" class="get-user_id">
                                <div class="group-input">
                                    <label>KYC Status:</label>
                                    <select class="get-status" name="status" disabled>
                                        <option value="1" <?php if($kycdata->status==1) echo 'selected'; ?>>Approved</option>
                                        <option value="2" <?php if($kycdata->status==2) echo 'selected'; ?>>Under Review</option>
                                        <option value="3" <?php if($kycdata->status==3) echo 'selected'; ?>>Reject</option>
                                    </select>
                                </div>
                                <!-- <button type="button" class="tf-btn accent submit-btn">Submit</button> -->
                            </form>
                        </div>
                    </div>
                </div>
                <?php } else {?>
                    <div class="row mt-5">
                        <div class="col-lg-12 text-center">
                            <h2>Details Not Filled by Distributor.</h2>
                        </div>
                    </div>
                <?php } ?>
                
            </div>
            
        </div>
    </div>
    
    
    


<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>


<script>
      $(document).on("click", ".submit-btn",(function(e) {
          status_update();
        }));

    function status_update()
    {
        var id = $(".get-id").val();
        var user_id = $(".get-user_id").val();
        var status = $(".get-status").val();

        var form = new FormData();
        form.append("id", id);
        form.append("user_id", user_id);
        form.append("status", status);

        var settings = {
          "url": "<?=base_url() ?>/api/Distributor/status_change",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
          console.log(response);
          if(response.status)
          {
              toaster(response.message, 'success');

          }
        });
    }
</script>