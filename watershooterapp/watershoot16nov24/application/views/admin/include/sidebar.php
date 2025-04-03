<?php
$currentURL = current_url();
$sitesetting = $this->crud->fetchdatabyid('1','site_setting');
?>

      <div id="sidebar" class="app-sidebar">
            <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
               <div class="menu">
                  <div class="menu-profile">
                     <a href="<?php echo base_url(); ?>" target="_blank" class="menu-profile-link">
                        <div class="menu-profile-cover with-shadow"></div>
                        <div class="menu-profile-image">
                           <img src="<?php echo base_url(); ?>media/uploads/site_setting/<?php echo $sitesetting[0]->logo; ?>" alt="" />
                        </div>
                        <div class="menu-profile-info">
                           <!-- <div class="d-flex align-items-center">
                              <div class="flex-grow-1">
                                <?php echo website_name; ?>
                              </div>
                           </div> -->
                           <small><?php echo website_name; ?></small>
                        </div>
                     </a>
                  </div>
                 
                  <div class="menu-header">Admin Panels</div>

                  <div class="menu-item <?php if($currentURL==base_url('admin/dashboard')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin/dashboard');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-dashboard"></i>
                        </div>
                        <div class="menu-text">Dashboard</div>
                     </a>
                  </div>


                  <!-- <div class="menu-item <?php if($currentURL==base_url('admin_con/site_setting/edit/1')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/site_setting/edit/1');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-cogs"></i>
                        </div>
                        <div class="menu-text">Site Setting</div>
                     </a>
                  </div> -->


                  <div class="menu-item has-sub ">
                     <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-first-order"></i>
                        </div>
                        <div class="menu-text">Home Data </div>
                        <div class="menu-badge"><?php
                                 $query = $this->db->get('water_form');
                                 echo $query->num_rows(); ?></div>
                        <div class="menu-caret"></div>
                     </a>
                     <div class="menu-submenu">
                        
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/water_form/listing?type=1');?>" class="menu-link">
                              <div class="menu-text">STP</div>
                              <div class="menu-badge">
                                 <?php $this->db->where('type',1);
                                 $query = $this->db->get('water_form');
                                 echo $query->num_rows(); ?>
                              </div>
                           </a>
                        </div>
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/water_form/listing?type=2');?>" class="menu-link">
                              <div class="menu-text">ETP</div>
                              <div class="menu-badge">
                                 <?php $this->db->where('type',2);
                                 $query = $this->db->get('water_form');
                                 echo $query->num_rows(); ?>
                              </div>
                           </a>
                        </div>
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/water_form/listing?type=3');?>" class="menu-link">
                              <div class="menu-text">WTP</div>
                              <div class="menu-badge">
                                 <?php $this->db->where('type',3);
                                 $query = $this->db->get('water_form');
                                 echo $query->num_rows(); ?>
                              </div>
                           </a>
                        </div>
                        <!-- <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/water_form/listing?type=4');?>" class="menu-link">
                              <div class="menu-text">Other</div>
                              <div class="menu-badge">
                                 <?php $this->db->where('type',4);
                                 $query = $this->db->get('water_form');
                                 echo $query->num_rows(); ?>
                              </div>
                           </a>
                        </div> -->
                                                
                       
                        
                     </div>
                  </div>

                 

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/notification/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/notification/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-bell"></i>
                        </div>
                        <div class="menu-text">Notification</div>
                        <div class="menu-badge"><?php echo $this->db->count_all('notification'); ?></div>
                     </a>
                  </div>


                  <div class="menu-item <?php if($currentURL==base_url('admin_con/registration/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/registration/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-users"></i>
                        </div>
                        <div class="menu-text">All User</div>
                        <div class="menu-badge"><?php $this->db->where('role',1);
                                 $query = $this->db->get('registration');
                                 echo $query->num_rows(); ?></div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/clientregistration/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/clientregistration/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-user"></i>
                        </div>
                        <div class="menu-text">All Clients</div>
                        <div class="menu-badge"><?php $this->db->where('role',2);
                                 $query = $this->db->get('registration');
                                 echo $query->num_rows(); ?></div>
                     </a>
                  </div>



                  <div class="menu-item <?php if($currentURL==base_url('admin_con/contact/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/contact/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-contact-card"></i>
                        </div>
                        <div class="menu-text">Contact Enquiry</div>
                        <div class="menu-badge"><?php echo $this->db->count_all('contact'); ?></div>
                     </a>
                  </div>


                  <div class="menu-item has-sub ">
                     <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-first-order"></i>
                        </div>
                        <div class="menu-text">Terms & Policy </div>
                        <div class="menu-caret"></div>
                     </a>
                     <div class="menu-submenu">

                        <!-- <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/site_setting/about_us/2');?>" class="menu-link">
                              <div class="menu-text">About Us</div>
                           </a>
                        </div> -->
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/site_setting/about_us/2');?>" class="menu-link">
                              <div class="menu-text">Privacy Policy</div>
                           </a>
                        </div>
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/site_setting/about_us/3');?>" class="menu-link">
                              <div class="menu-text">Terms & Conditions</div>
                           </a>
                        </div>
                        
                        

                     </div>
                  </div>
                



                























                  <!-- ----single dropdown--------- -->
                  <!-- <div class="menu-item has-sub ">
                     <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-server"></i>
                        </div>
                        <div class="menu-text">Slider</div>
                        <div class="menu-caret"></div>
                     </a>
                     <div class="menu-submenu">
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/slider/add');?>" class="menu-link">
                              <div class="menu-text">Add Slider</div>
                           </a>
                        </div>
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/slider/listing');?>" class="menu-link">
                              <div class="menu-text">All Slider</div>
                           </a>
                        </div>
                     </div>
                  </div> -->
                  <!-- --------with number show------- -->
                  <!-- <div class="menu-item">
                     <a href="widget.html" class="menu-link">
                        <div class="menu-icon">
                           <i class="fab fa-simplybuilt"></i>
                        </div>
                        <div class="menu-text">Widgets <span class="menu-label">NEW</span></div>
                     </a>
                  </div> -->

                  <!-- ------sub sub menu lavel---- -->
                  <!-- <div class="menu-item has-sub">
                     <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-align-left"></i>
                        </div>
                        <div class="menu-text">Menu Level</div>
                        <div class="menu-caret"></div>
                     </a>
                     <div class="menu-submenu">
                        <div class="menu-item has-sub">
                           <a href="javascript:;" class="menu-link">
                              <div class="menu-text">Menu 1.1</div>
                              <div class="menu-caret"></div>
                           </a>
                           <div class="menu-submenu">
                              <div class="menu-item has-sub">
                                 <a href="javascript:;" class="menu-link">
                                    <div class="menu-text">Menu 2.1</div>
                                    <div class="menu-caret"></div>
                                 </a>
                                 <div class="menu-submenu">
                                    <div class="menu-item">
                                       <a href="javascript:;" class="menu-link">
                                          <div class="menu-text">Menu 3.1</div>
                                       </a>
                                    </div>
                                    <div class="menu-item">
                                       <a href="javascript:;" class="menu-link">
                                          <div class="menu-text">Menu 3.2</div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="menu-item">
                                 <a href="javascript:;" class="menu-link">
                                    <div class="menu-text">Menu 2.2</div>
                                 </a>
                              </div>
                              <div class="menu-item">
                                 <a href="javascript:;" class="menu-link">
                                    <div class="menu-text">Menu 2.3</div>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="menu-item">
                           <a href="javascript:;" class="menu-link">
                              <div class="menu-text">Menu 1.2</div>
                           </a>
                        </div>
                        <div class="menu-item">
                           <a href="javascript:;" class="menu-link">
                              <div class="menu-text">Menu 1.3</div>
                           </a>
                        </div>
                     </div>
                  </div> -->




                  <div class="menu-item d-flex">
                     <a href="javascript:;" class="app-sidebar-minify-btn ms-auto d-flex align-items-center text-decoration-none" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
                  </div>
               </div>
            </div>
         </div>


         <div class="app-sidebar-bg"></div>
         <!-- -------Azmal Ansari----------- -->
         <div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>