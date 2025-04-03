<?php
$currentURL = current_url();
$sitesetting = $this->crud->fetchdatabyid('1','site_setting');
?>
<sidebar id="sidebar" class="app-sidebar">
   <div data-scrollbar="true" data-height="100%">
      <ul class="nav">
         <li class="nav-profile">
            <div class="profile-img11 text-center">
               <img src="<?php echo base_url(); ?>media/uploads/site_setting/<?php echo $sitesetting[0]->logo; ?>" alt="<?=website_name ?>" style="width: 50%;">
            </div>
           
         </li>
         
         
         <li class="nav-divider"></li>
         <li class="nav-header">Admin Panel</li>

         <li class="<?php if($currentURL==base_url('admin/dashboard')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin/dashboard'); ?>">
            <span class="nav-icon"><i class="fa fa-home bg-black text-white"></i></span>
            <span class="nav-text">Dashboard</span>
            </a>
         </li>

         <li class="<?php if($currentURL==base_url('admin_con/site_setting/edit/1')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/site_setting/edit/1'); ?>">
               <span class="nav-icon"><i class="fa fa-cog bg-black text-white"></i></span>
               <span class="nav-text">Site Setting</span>
            </a>
         </li>



         <li class="nav-divider"></li>
         <li class="nav-header">Games</li>

         <li class="<?php if($currentURL==base_url('admin_con/all_times/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/all_times/listing');?>">
               <span class="nav-icon"><i class="fa fa-bell bg-black text-white"></i></span>
               <span class="nav-text">All Times</span>
            </a>
         </li>


         <li class="<?php if($currentURL==base_url('admin_con/game/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/game/listing');?>">
               <span class="nav-icon"><i class="fa fa-bell bg-black text-white"></i></span>
               <span class="nav-text">Games</span>
            </a>
         </li>

        
         <li class="<?php if($currentURL==base_url('admin_con/game_times/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/game_times/listing');?>">
               <span class="nav-icon"><i class="fa fa-bell bg-black text-white"></i></span>
               <span class="nav-text">Games Times</span>
            </a>
         </li>

        
         <li class="<?php if($currentURL==base_url('admin_con/number/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/number/listing');?>">
               <span class="nav-icon"><i class="fa fa-bell bg-black text-white"></i></span>
               <span class="nav-text">Number</span>
            </a>
         </li>

         <li class="has-sub">
            <a href="#">
            <span class="nav-icon"><i class="fa fa-cog bg-gradient-orange text-white"></i></span>
            <span class="nav-text">Policy & Content</span>
            <span class="nav-caret"><b class="caret"></b></span>
            </a>
            <ul class="nav-submenu">
               <li class="active"><a href="<?php echo base_url('admin_con/content/edit/1'); ?>"><span class="nav-text">About Us</span></a></li>
               <!-- <li class="active"><a href="<?php echo base_url('admin_con/content/edit/2'); ?>"><span class="nav-text">Privacy Policy</span></a></li> -->
               <!-- <li class="active"><a href="<?php echo base_url('admin_con/content/edit/3'); ?>"><span class="nav-text">How to Play</span></a></li> -->
               
               <li class="active"><a href="<?php echo base_url('admin_con/content/edit/5'); ?>"><span class="nav-text">Headline</span></a></li>
               
            </ul>
         </li> 

         

         <!-- <li class="nav-divider"></li>
         <li class="nav-header">Sub Admin</li>

         <li class="<?php if($currentURL==base_url('admin_con/role/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/role/listing');?>">
               <span class="nav-icon"><i class="fa fa-wrench bg-black text-white"></i></span>
               <span class="nav-text">Create Role</span>
            </a>
         </li>

         <li class="<?php if($currentURL==base_url('admin_con/tbl_admin/listing')) echo 'active'; ?>">
            <a href="<?php echo base_url('admin_con/tbl_admin/listing');?>">
               <span class="nav-icon"><i class="fa fa-user-astronaut bg-black text-white"></i></span>
               <span class="nav-text">Assign Role</span>
            </a>
         </li> -->





         

        
         
       
         <li class="nav-divider"></li>
         
         <li class="">
            <a href="<?php echo base_url('admin/logout');?>">
               <span class="nav-icon"><i class="fa fa-sign-out-alt bg-gradient-red text-white"></i></span>
               <span class="nav-text">Logout </span>
            </a>
         </li>
         <li class="nav-copyright">&copy; <?=date('Y'); ?> <?=website_name ?>. All Right Reserved</li>
      </ul>
   </div>
</sidebar>