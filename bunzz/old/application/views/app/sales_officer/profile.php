<?php
$this->load->view('app/include/header'); 

?>

<style>
    .menu-i
    {
        font-size: 24px;
    }
    .list-profile.outline {
        border-bottom: 1px solid #b8b4b4;
    }
</style>
    <!-- /preload -->
    <div class="header mb-1 is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="#" class="back-btn"> <i class="icon-left"></i> </a>
                <h3><?=$full_detail->name ?></h3>
            </div>
        </div>
    </div>
    <div id="app-wrap">
        <a class="box-profile mt-1" href="update-profile.php">
            <div class="inner d-flex align-items-center">
                <div class="box-avatar">
                    <img src="<?=base_url() ?>media/uploads/distributor/<?=$full_detail->profile_image ?>" alt="image" onerror="this.src='<?=base_url() ?>media/uploads/1725100321.jpg'">
                    <span class="icon-camera-to-take-photos"></span>
                </div>
                <div class="info">
                    <h2 class="fw_8"><?=$full_detail->name ?></h2>
                    <p><?=$full_detail->mobile ?></p>
                </div>
            </div>
            <!-- <span><i class="icon-right"></i></span>                       -->
        </a>  
       
        <ul class="mt-1">
            <li>
                <a href="update-profile.php" class="list-profile outline menu-i">
                    <i class="icon-user text-dark"></i>
                    <p>Update Profile </p>
                    <i class="icon-right"></i></span>
                </a>    
            </li>
            <li>
                <a href="change-password.php" class="list-profile outline menu-i">
                    <i class="icon-union text-dark"></i>
                    <p>Update Password</p>
                    <i class="icon-right"></i></span>
                </a>    
            </li>
            <li>
                <a href="<?=base_url() ?>api/auth/logout" class="list-profile outline menu-i">
                    <i class="icon-sign-in1 text-dark"></i>
                    <p>Logout</p>
                    <i class="icon-right"></i></span>
                </a>    
            </li>

           
        </ul>

    </div>
    
    
  
   
<?php $this->load->view('app/include/bottom-menus'); ?>
<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>