<?php
$table_id = $this->input->get('table_id');
$olddata = $this->crud->selectDataByMultipleWhere('ledger_creation',array('id'=>$table_id));

if(!empty($olddata))
{
    $olddata = $olddata[0];
}


if(!empty($table_id))
{
    $name = "Update";
}
else 
{
    $name = "Add";
}

$this->load->view('app/include/header'); 

?>

<style>
    .group-input>label {
        font-size: 14px;
        font-weight: 600;
        color: black;
    }
    .group-input {
        margin-bottom: 30px;
    }
</style>
    <!-- /preload -->
    <div class="header">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="javascript:;" class="back-btn"> <i class="icon-left"></i> </a>
                <h3><?=$name ?> Ledger Creation</h3>
            </div>
        </div>
    </div>
    <div class="mt-5" style="padding-bottom: 70px;">
        <div class="tf-container">
            
            <form class="tf-form mt-5" action="" id="form-data">
                <div class="group-input">
                    <label>State:</label>
                    <select name="state" required class="state-id state_id">
                        <option value="" selected>Select State</option>
                        <?php
                        $state = $this->crud->selectDataByMultipleWhere('state',array('status'=>1));
                        foreach($state as $data)
                            { ?>
                        <option <?php if(!empty($table_id)) if($olddata->state_id==$data->id) echo "selected"; ?>  value="<?=$data->id ?>"><?=$data->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="group-input">
                    <label>City:</label>
                    <select class="city-list city_id" name="city">
                        <option value="" selected>Select City</option>
                        <?php
                        $city = $this->crud->selectDataByMultipleWhere('city',array('status'=>1));
                        foreach($city as $data)
                            { ?>
                        <option <?php if(!empty($table_id)) if($olddata->city_id==$data->id) echo "selected"; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="group-input">
                    <label>Enter Distric</label>
                    <input type="text" placeholder="Enter Distric.." class="distric_id" value="<?php if(!empty($table_id)) echo $olddata->distric_id; ?>">
                </div>

                <div class="group-input">
                    <label>Select Distributor Name:</label>
                    <select class="distributer_id" >
                        <option value="" selected>Select Distributor Name</option>
                        <?php
                        $city = $this->crud->selectDataByMultipleWhere('users',array('status'=>1,'role'=>5));
                        foreach($city as $data)
                            { ?>
                        <option <?php if(!empty($table_id)) if($olddata->distributer_id==$data->id) echo "selected"; ?> value="<?=$data->id ?>"><?=$data->name ?> &nbsp; [<?=currency_simble($data->wallet) ?>]</option>
                        <?php } ?>
                    </select>
                </div>

                <?php
                if(!empty($table_id))
                    { ?>
                <div class="group-input">
                    <label>Select Date</label>
                    <input type="date" placeholder="Enter Mobile.." class="select_date" value="<?php if(!empty($table_id)) echo $olddata->select_date; ?>">
                </div> 

                <div class="group-input">
                    <label>Document Type</label>
                    <select class="document_type" >
                        <option value="" selected>Select Document Type</option>
                        <option value="Credit Note">Credit Note</option>
                        <option value="Billing">Billing</option>
                        <option value="Invoice">Invoice</option>
                    </select>
                </div>

                <div class="group-input">
                    <label>Document No</label>
                    <input type="text" placeholder="Enter Document No.." class="document_no" value="<?php if(!empty($table_id)) echo $olddata->document_no; ?>">
                </div> 


                <div class="group-input">
                    <label>Enter Quantity</label>
                    <input type="text" placeholder="Enter Quantity.." class="quantity" value="<?php if(!empty($table_id)) echo $olddata->quantity; ?>">
                </div> 


                <div class="group-input">
                    <label>Enter IMPS/UPI Number</label>
                    <input type="text" placeholder="Enter IMPS/UPI Number.." class="imp_no" value="<?php if(!empty($table_id)) echo $olddata->imp_no; ?>">
                </div> 

                <div class="group-input">
                    <label>Enter Amount</label>
                    <input type="text" placeholder="Enter Amount.." class="amount" value="<?php if(!empty($table_id)) echo $olddata->amount; ?>">
                </div> 

                <div class="group-input">
                    <label>Message</label>
                    <textarea class="message" rows="5" placeholder="Enter Message.."><?php if(!empty($table_id)) echo $olddata->message; ?></textarea>
                </div>


            <?php } ?>

               
                <div class="bottom-navigatio4n-bar bottom-btn-fix4ed st2 mt-5">
                    <button type="button" class="tf-btn accent large submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>


<?php $this->load->view('app/include/bottom-menus'); ?>
<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>


<script>


    $(document).on("click", ".submit-btn",(function(e) {
      update_profile();
    }));

    function update_profile()
    {
        var table_id = '<?=$table_id ?>';
        var state_id = $(".state_id").val();
        var city_id = $(".city_id").val();
        var imp_no = $(".imp_no").val();
        var distric_id = $(".distric_id").val();
        var distributer_id = $(".distributer_id").val();
        var select_date = $(".select_date").val();
        var document_type = $(".document_type").val();
        var document_no = $(".document_no").val();
        var quantity = $(".quantity").val();
        var amount = $(".amount").val();
        var message = $(".message").val();

        if(state_id=='')
        {
            toaster('Select State..', 'success');
            return false;
        }
        if(city_id=='')
        {
            toaster('Select City.', 'success');
            return false;
        }
       
        var form = new FormData();
       
        form.append("table_id", table_id);
        form.append("state_id", state_id);
        form.append("city_id", city_id);
        form.append("imp_no", imp_no);
        form.append("distric_id", distric_id);
        form.append("distributer_id", distributer_id);
        form.append("select_date", select_date);
        form.append("document_type", document_type);
        form.append("document_no", document_no);
        form.append("quantity", quantity);
        form.append("amount", amount);
        form.append("message", message);

        var settings = {
          "url": "<?=base_url() ?>api/accountteam/add_upadate_ledger",
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
          if(response.status == 200) 
            {
              toaster(response.message, 'success');
              setTimeout(function() {
                window.location.href = response.url;
              }, 2000); 
            } 
            else  
            {
              toaster(response.message, 'success');
            }
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>