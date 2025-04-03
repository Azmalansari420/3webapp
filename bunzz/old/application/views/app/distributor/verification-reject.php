<?php
   $sitesetting = $this->crud->fetchdatabyid('1','site_setting'); 
   $this->load->view('app/include/header'); ?>
<style>
   .circle-box.bg-circle {
   background-color: #5f94bf;
   }
   .icon-close1 {
   position: relative;
   }
   .icon-close1::after {
   position: absolute;
   border: 4px solid #fff;
   border-top: none;
   border-right: none;
   content: "";
   top: 22px;
   left: 22px;
   height: 13px;
   transform: rotate(-45deg);
   width: 22px;
   border-radius: 3px;
   }
</style>
<div class="wrap-success">
   <div class="success_box">
      <div class="icon-1 ani3">
         <!-- <span class=" icon-close1"></span> -->
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
            <h2>Your Request Has Been </h2>
         </div>
         <div class="tf-spacing-16"></div>
         <div class="inner">
            <h1>Rejected</h1>
         </div>
      </div>
   </div>
   <span class="line-through through-1"></span>
   <span class="line-through through-2"></span>
   <span class="line-through through-3"></span>
   <span class="line-through through-4"></span>
   <span class="line-through through-5"></span>
   <span class="line-through through-6"></span>
</div>
<?php $this->load->view('app/include/footer'); ?>