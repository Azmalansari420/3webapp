<?php

$this->crud->app_activity_record();
$sitesetting = $this->crud->fetchdatabyid('1','site_setting'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <title><?=website_name ?></title>
    <link rel="shortcut icon" href="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>" />
    <link rel="apple-touch-icon-precomposed" href="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>" />
    <link rel="stylesheet" href="<?=base_url() ?>fonts/fonts.css" />
    <link rel="stylesheet" href="<?=base_url() ?>fonts/icons-alipay.css">
    <link rel="stylesheet" href="<?=base_url() ?>styles/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url() ?>styles/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?=base_url() ?>styles/data-picker.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url() ?>styles/styles.css" />
    <link rel="apple-touch-icon" sizes="192x192" href="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>">

<?php  
    $device_id = $this->input->get('device_id');
    if(empty($device_id)) $device_id = $this->session->userdata("device_id");
?>
<script>
    <?php if(!empty($this->session->userdata('user'))){ ?>
    sessionStorage.setItem("token", "<?=$this->session->userdata('user')['access_token'] ?>");
    <?php } ?>
</script>

</head>
<style>
    .toaster {
      position: fixed;
      top: 75%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #5f94bf;
      border-radius: 10px;
      padding: 10px 15px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      display: none;
      color: white;
      width: max-content;
    }

    .toaster.success {
      background-color: #fca725;
        color: #fff;
        font-size: 16px;
        width: max-content;
    }

      .app-header {
    background: linear-gradient(45deg, #febd25, #f46324)!important;
}
.btn-primary {
    color: #fff;
    background-color: #fa4530!important;
    border-color: #fa4530!important;
}
a.download-btn {
    background: #fa4530!important;
  }

    td {
    border: none!important;
}
th {
    background: #5f94bf !important;
    color: white;

    /*background: #7a91c0 !important;
    color: black;*/
    border: 1px solid;
    text-align: center;
}

.tf-btn.accent {
    background-color: #fa4530!important;
    border: 1px solid #fa4530!important;
    color: #ffffff;
}
a.nav-link>i {
    color: #fa4530 !important;
}

</style>
<body>
    <!-- preloade -->
    <!-- <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div> -->