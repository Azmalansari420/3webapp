<?php
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
    .icon-plus:before {
        font-size: 24px;
    }
    a.download-btn {
        background: transparent!important;
        padding: 0px!important;
    }

    .btn-sm-new {
        padding: .10rem 0.3rem;
        font-size: .875rem;
        border-radius: .2rem;
    }

        
        .icon-home:before {
        font-size: 24px;
    }
    .tf-statusbar .back-btn2 {
        left: 16px;
        position: absolute;
    }
    .back-btn2, .icon-close {
        min-width: 44px;
        height: 50px;
        display: flex;
        align-items: center;
    }

    
</style>
    <div class="header is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="home.php" class="back-btn2"> <i class="icon-home"></i> </a>
                <h3>Scheme</h3>
                <a href="add-scheme.php" class="action-right"><i class="icon-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="tf-container">
            <div class="">
                <div class="tf-tab box-components">
                    <ul class="nav nav-tabs lined" role="tablist">
                        <li class="nav-item" >
                          <a href="#!" class="nav-link  active" data-bs-toggle="tab" data-bs-target="#tabIcon1" role="tab" aria-controls="tabIcon1" aria-selected="true">
                                All Scheme
                            </a>
                        </li>
                        <li class="nav-item">
                           <a href="#!" class="nav-link" data-bs-toggle="tab" data-bs-target="#tabIcon2" role="tab" aria-controls="tabIcon2" aria-selected="false">
                                Active Scheme
                           </a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link" data-bs-toggle="tab" data-bs-target="#tabIcon3" role="tab" aria-controls="tabIcon3" aria-selected="false">
                                DeActive Scheme
                            </a>
                         </li>
                    </ul>

                    <div class="tab-content mt-4">

                        <div class="tab-pane fade show active" id="tabIcon1" role="tabpanel">
                            <ul class="mt-3 mb-5">
                              <?php
                              $this->db->order_by('id desc');
                              $users = $this->crud->selectDataByMultipleWhere('scheme',array('nsm_id'=>$full_detail->id,));

                              if(!empty($users))
                              {
                              foreach($users as $data)
                                {
                                  
                                 ?>
                                <li class="list-card-invoice">
                                    <div class="content-right">
                                        <h4>
                                          <a href="<?=('nsm/edit-schema.php?id='.$data->id) ?>"><?=$data->name ?> 
                                            <?=schema_status($data->status) ?>
                                          </a>
                                        </h4>
                                        <?php
                                        if(!empty($data->pdf))
                                            { ?>
                                        <a download class="download-btn" href="<?=base_url('media/uploads/schema/'.$data->pdf) ?>" style="font-weight: 700;color: green;">Download PDF</a>
                                    <?php } ?>
                                        <div class="d-flex">
                                            <a href="<?=('nsm/edit-schema.php?id='.$data->id) ?>" class="btn btn-primary btn-sm-new" style="background: green;color: white;">Update</a>
                                            <a data-id="<?=$data->id ?>" class="btn btn-primary btn-sm-new delete-btn" style="background: red;color: white;">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                        <!-- Active -->
                        <div class="tab-pane fade" id="tabIcon2" role="tabpanel">
                            <ul class="mt-3 mb-5">
                              <?php
                              $this->db->order_by('id desc');
                              $users = $this->crud->selectDataByMultipleWhere('scheme',array('nsm_id'=>$full_detail->id,'status'=>1));
                              foreach($users as $data)
                                {

                                 
                                 ?>
                                <li class="list-card-invoice">
                                    <div class="content-right">
                                        <h4>
                                          <a href="<?=('nsm/edit-schema.php?id='.$data->id) ?>"><?=$data->name ?> 
                                            <?=schema_status($data->status) ?>
                                          </a>
                                        </h4>
                                        <?php
                                        if(!empty($data->pdf))
                                            { ?>
                                        <a download class="download-btn" href="<?=base_url('media/uploads/schema/'.$data->pdf) ?>" style="font-weight: 700;color: green;">Download PDF</a>
                                    <?php } ?>
                                        <div class="d-flex">
                                            <a href="<?=('nsm/edit-schema.php?id='.$data->id) ?>" class="btn btn-primary btn-sm-new" style="background: green;color: white;">Update</a>
                                            <a data-id="<?=$data->id ?>" class="btn btn-primary btn-sm-new delete-btn" style="background: red;color: white;">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- Deactive -->
                        <div class="tab-pane fade" id="tabIcon3" role="tabpanel">
                            <ul class="mt-3 mb-5">
                              <?php
                              $this->db->order_by('id desc');
                              $users = $this->crud->selectDataByMultipleWhere('scheme',array('nsm_id'=>$full_detail->id,'status'=>0));
                              foreach($users as $data)
                                {

                                 
                                 ?>
                                <li class="list-card-invoice">
                                    <div class="content-right">
                                        <h4>
                                          <a href="<?=('nsm/edit-schema.php?id='.$data->id) ?>"><?=$data->name ?> 
                                            <?=schema_status($data->status) ?>
                                          </a>
                                        </h4>
                                        <?php
                                        if(!empty($data->pdf))
                                            { ?>
                                        <a download class="download-btn" href="<?=base_url('media/uploads/schema/'.$data->pdf) ?>" style="font-weight: 700;color: green;">Download PDF</a>
                                    <?php } ?>
                                        <div class="d-flex">
                                            <a href="<?=('nsm/edit-schema.php?id='.$data->id) ?>" class="btn btn-primary btn-sm-new" style="background: green;color: white;">Update</a>
                                            <a data-id="<?=$data->id ?>" class="btn btn-primary btn-sm-new delete-btn" style="background: red;color: white;">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>

                       


                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    
    
    


<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>

<script>
    var id = 0; 
    $(document).on("click", ".delete-btn",(function(e) {
       id = $(this).data('id');
      delete_schema();
    }));

    function delete_schema()
    {
        var form = new FormData();
        form.append("id", id);

        var settings = {
          "url": "<?=base_url() ?>api/nsm/delete_schema",
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
              }, 200); 
            } 
            else 
            {
              toaster(response.message, 'success');
            }
        });
    }

</script>
