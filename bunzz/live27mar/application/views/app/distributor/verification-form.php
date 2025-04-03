<?php
$device_id = $this->input->get('device_id');
$firebase_token = $this->input->get('firebase_token');
$sitesetting = $this->crud->fetchdatabyid('1','site_setting'); 
$this->load->view('app/include/header'); ?>


        
        <div class="header">
            <div class="tf-container">
                <div class="tf-statusbar br-none d-flex justify-content-center align-items-center">
                    <!-- <a href="#" class="back-btn"> <i class="icon-left"></i> </a> -->
                </div>
            </div>
        </div>
        <div class="logo d-flex justify-content-center py-2 mt-3">
            <img src="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>" alt="" style="width: 80px !important;">
        </div>
        <div class="mt-3 register-section">
            <div class="tf-container">
                <form class="tf-form" action="<?=base_url() ?>api/Distributor/kyc_details" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="firebase_token" value="<?=$firebase_token ?>">
                    <input type="hidden" name="device_id" value="<?=$device_id ?>">
                    <input type="hidden" name="user_id" value="<?=$full_detail->id ?>">
                    <input type="hidden" name="rsm_id" value="<?=$full_detail->rsm_id ?>">
                    <input type="hidden" name="asm_id" value="<?=$full_detail->asm_id ?>">
                    <input type="hidden" name="sales_office_id" value="<?=$full_detail->sales_office_id ?>">

                    
                    <h2 class="text-center mb-5">Distributor Register</h2>
                    <div class="group-input">
                        <label>Distributor Firm Name:</label>
                        <input type="text" value="<?=$full_detail->firm_name ?>" name="firm_name" required>
                    </div>
                    <div class="group-input">
                        <label>Distributor Contact Person:</label>
                        <input type="text" name="name" required value="<?=$full_detail->name ?>">
                    </div>
                    <div class="group-input">
                        <label>Distributor Contact Number:</label>
                        <input type="number" name="mobile" required value="<?=$full_detail->mobile ?>">
                    </div>
                    <div class="group-input">
                        <label>Distributor Address:</label>
                        <textarea  name="address"><?=$full_detail->address ?></textarea>
                    </div>
                    <div class="group-input">
                        <label>State:</label>
                        <select name="state" required class="state-id">
                            <option value="" selected>Select State</option>
                            <?php
                            $state = $this->crud->selectDataByMultipleWhere('state',array('status'=>1));
                            foreach($state as $data)
                                { ?>
                            <option <?php if(!empty($full_detail->state)) if($full_detail->state==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="group-input">
                        <label>City:</label>
                        <select class="city-list" name="city">
                            <?php
                            $city = $this->crud->selectDataByMultipleWhere('city',array('status'=>1));
                            foreach($city as $data)
                                { ?>
                            <option <?php if(!empty($full_detail->city)) if($full_detail->city==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="group-input">
                        <label>PIN Code:</label>
                        <input type="number" name="pincode" >
                    </div>

                    <div class="group-input">
                        <label>Distributor GSTIN Number:</label>
                        <input type="text" placeholder="" name="gst_no" value="<?=$full_detail->gst_no ?>">
                    </div>
                    <div class="group-input auth-pass-input last mb-5">
                        <label>GST Certificate Upload:</label>
                        <input type="file" class="file-upload" name="gst_certificate">
                    </div>
                    <div class="group-input auth-pass-input last mb-5">
                        <label>PAN Card Upload:</label>
                        <input type="file" class="file-upload" name="pan_card">
                    </div>
                    <div class="group-input auth-pass-input last mb-5">
                        <label>Aadhar Card Upload:</label>
                        <input type="file" class="file-upload" name="adharcard">
                    </div>
                    <div class="group-input auth-pass-input last mb-5">
                        <label>Electricity Bill (Work Location) Upload:</label>
                        <input type="file" class="file-upload" name="electric_bill">
                    </div>
                    <div class="group-input auth-pass-input last mb-5">
                        <label>Udyam Certificate Upload:</label>
                        <input type="file" class="file-upload" name="udhyam_certificate">
                    </div>
                    <div class="group-input auth-pass-input last mb-5">
                        <label>FSSAI License Upload:</label>
                        <input type="file" class="file-upload" name="fssai_licence_cert">
                    </div>

                    <label class="my-3 fs-img ">Factory Image</label>
                    <!-- <input type=" file" class="file-upload" value=""> -->

                    <div class="group-input auth-pass-input last mb-5">
                        <label>Godown Image 1 Upload:</label>
                        <input type="file" class="file-upload" name="godown_image1">
                    </div>
                    <div class="group-input auth-pass-input last mb-5">
                        <label>Godown Image 2 Upload:</label>
                        <input type="file" class="file-upload" name="godown_image2">
                    </div>
                    <div class="group-input auth-pass-input last mb-5">
                        <label>Vehicle Image Upload:</label>
                        <input type="file" class="file-upload" name="vechicle_image">
                    </div>
                    <div class="group-input auth-pass-input last mb-5">
                        <label>Team Image Upload:</label>
                        <input type="file" class="file-upload" name="team_image">
                    </div>
                    <div class="group-input auth-pass-input last mb-5">
                        <label>Self Image Upload:</label>
                        <input type="file" class="file-upload" name="self_image">
                    </div>
                    <div class="group-input">
                        <label>GPS Location LINK:</label>
                        <input type="text" placeholder="" name="gps_location_link">
                    </div>
                    <div class="group-input">
                        <label>Bank Details A/c Number:</label>
                        <input type="text" name="bank_ac_no" >
                    </div>
                    <div class="group-input">
                        <label>Bank Name:</label>
                        <input type="text" name="bank_name">
                    </div>
                    <div class="group-input">
                        <label>Branch Name:</label>
                        <input type="text" name="bank_branch">
                    </div>
                    <div class="group-input">
                        <label>IFSC Code:</label>
                        <input type="text" name="bank_ifcscode">
                    </div>


                    <div class="group-input auth-pass-input last mb-5">
                        <label>Cancelled Cheque Upload:</label>
                        <input type="file" class="file-upload" name="cancel_chequed">
                    </div>
                    <div class="group-input">
                        <label>Email ID:</label>
                        <input type="email" name="email" value="<?=$full_detail->email ?>">
                    </div>


                    <div class="group-cb mt-5">
                        <input type="checkbox" checked class="tf-checkbox" required>
                        <label class="fw_3">I hereby declare that the information provided is true and accurate to the best
                            of my knowledge. </label>
                    </div>
                    <button type="submit" name="submit" class="tf-btn accent large">Submit</button>

                </form>

            </div>
        </div>


<?php $this->load->view('app/include/footer'); ?>