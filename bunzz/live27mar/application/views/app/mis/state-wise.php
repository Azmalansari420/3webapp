<?php
$url = current_url();
// print_r($full_detail->id);


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
    li.nav-item.col-12>label {
    font-size: 15px;
    color: black;
    margin-top: 16px;
    font-weight: 600;
}
    li.nav-item.col-6>label {
    font-size: 15px;
    color: black;
    margin-top: 16px;
    font-weight: 600;
}
.nav-tabs .nav-item {
    text-align: left;
}
</style>
    <!-- /preload -->
    <div class="header">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="javascript:;" class="back-btn"> <i class="icon-left"></i> </a>
                <h3>State Wise</h3>
            </div>
        </div>
    </div>
    <div class="mt-5" style="padding-bottom: 70px;">
        <div class="tf-container">
            
            <form  method="get" class="nav nav-tabs lined row" role="tablist" style="justify-content: space-1around!important;">                  
                  
                  <li class="nav-item col-12" >
                      <label>Select State</label>
                      <select name="state" required class="state-id">
                        <option value="" selected>Select State</option>
                        <?php
                        $state = $this->crud->selectDataByMultipleWhere('state',array('status'=>1));
                        foreach($state as $data)
                            { ?>
                        <option  value="<?=$data->id ?>"><?=$data->name ?></option>
                        <?php } ?>
                    </select>
                  </li>
                  <li class="nav-item col-6" >
                      <label>From Date</label>
                      <input type="date" name="from_date" class="from_date" value="<?= !empty($from_date) ? $from_date : ''; ?>">
                  </li>
                  
                  <li class="nav-item col-6" >
                      <label>To Date</label>
                      <input type="date" name="to_date" class="to_date" value="<?= !empty($to_date) ? $to_date : ''; ?>">
                  </li>

                 
                  <li class="nav-item col-12">
                      <button type="button" class="btn btn-primary btn-sm mt-3 mb-3 submit-btn">Submit</button>
                  </li>                         
              </form>




              <table class="table"> 
                <thead>
                    <tr>
                        <th>Distributer</th>
                        <th>City</th>
                        <th>Ranking</th>
                        <th>MTD Achievement</th>
                    </tr>
                </thead>
                <tbody class="html-data">
                    
                </tbody>
              </table>










        </div>
    </div>


<?php $this->load->view('app/include/bottom-menus'); ?>
<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>


<script>

const rsm_id = '<?=$full_detail->id ?>';



    $(document).on("click", ".submit-btn",(function(e) {
      statewisedata();
    }));

    function statewisedata()
    {
        var state = $(".state-id").val();
        var from_date = $(".from_date").val();
        var to_date = $(".to_date").val();

        
        var form = new FormData();
       
        form.append("state", state);
        form.append("from_date", from_date);
        form.append("to_date", to_date);

        var settings = {
          "url": "<?=base_url() ?>api/rsm/statewisedata",
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
              $(".html-data").html(response.data);
            } 
            else 
            {
              toaster(response.message, 'success');
              $(".html-data").html('');
            }
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>