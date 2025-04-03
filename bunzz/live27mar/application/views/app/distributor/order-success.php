<?php

$this->load->view('app/include/header'); 
$order_id = $this->input->get('order_id');
?>
    
    <div class="wrap-success">
        
            
            <div class="success_box">
                <div class="icon-1 ani3">
                    <span class="circle-box lg bg-circle check-icon"></span>
                </div>
                <div class="icon-2 ani5">
                    <span class="circle-box md bg-circle"></span>
                </div>
                <div class="icon-3 ani8">
                    <span class="circle-box md bg-circle"></span>
                </div>
                <div class="icon-4 ani2">
                    <span class="circle-box sm bg-circle"></span>
                </div>
                

                <div class="content">
                        <div class="top">
                            <h2>Successful!</h2>
                            <p class="fw_4">Your Order has been Placed!</p>
                        </div>
                        <div class="tf-spacing-16"></div>
                        <div class="inner">
                            <p class="on_surface_color fw_6">Order Id</p>
                            <h1><?=$order_id ?></h1>
                        </div>
                       <!--  <div class="tf-spacing-16"></div>
                        <div class="bottom">
                            <p class="on_surface_color fw_6">Message</p>
                            <p>Our Team Will be contact U S</p>
                        </div> -->
                        
                </div>
                <a href="home.php" class="tf-btn accent large">Done</a>
                
            </div>

            <span class="line-through through-1"></span>
            <span class="line-through through-2"></span>
            <span class="line-through through-3"></span>
            <span class="line-through through-4"></span>
            <span class="line-through through-5"></span>
            <span class="line-through through-6"></span>

    </div>


   
<?php $this->load->view('app/include/bottom-menus'); ?>
<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>
