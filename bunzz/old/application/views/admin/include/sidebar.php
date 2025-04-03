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


                  <div class="menu-item <?php if($currentURL==base_url('admin_con/site_setting/edit/1')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/site_setting/edit/1');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-cogs"></i>
                        </div>
                        <div class="menu-text">Site Setting</div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/about_us/edit/1')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/about_us/edit/1');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-cogs"></i>
                        </div>
                        <div class="menu-text">About Us</div>
                     </a>
                  </div>


                  <div class="menu-item <?php if($currentURL==base_url('admin_con/role/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/role/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Role </div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/tbl_admin/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/tbl_admin/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Users</div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/slider/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/slider/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Slider</div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/gallery/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/gallery/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Gallery</div>
                     </a>
                  </div>


                  <div class="menu-item <?php if($currentURL==base_url('admin_con/videos/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/videos/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Videos</div>
                     </a>
                  </div>
                  
                  <div class="menu-item <?php if($currentURL==base_url('admin_con/youtube/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/youtube/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Youtube</div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/team/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/team/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Team</div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/testimonials/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/testimonials/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Testimonials</div>
                     </a>
                  </div>


                  <div class="menu-item <?php if($currentURL==base_url('admin_con/web_contact/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/web_contact/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Website Enquiry</div>
                     </a>
                  </div>






















                   <div class="menu-item <?php if($currentURL==base_url('admin_con/finalorder/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/finalorder/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">All Orders</div>
                     </a>
                  </div>


                  <div class="menu-item has-sub ">
                     <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-server"></i>
                        </div>
                        <div class="menu-text">Products Management</div>
                        <div class="menu-caret"></div>
                     </a>
                     <div class="menu-submenu">
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/categories/listing');?>" class="menu-link">
                              <div class="menu-text">Categories</div>
                           </a>
                        </div>
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/sub_categories/listing');?>" class="menu-link">
                              <div class="menu-text">Sub Categories</div>
                           </a>
                        </div>
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/product/listing');?>" class="menu-link">
                              <div class="menu-text">Product</div>
                           </a>
                        </div>
                     </div>
                  </div>

                  <div class="menu-item has-sub ">
                     <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-server"></i>
                        </div>
                        <div class="menu-text">Employees</div>
                        <div class="menu-caret"></div>
                     </a>
                     <div class="menu-submenu">
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/employees/listing');?>" class="menu-link">
                              <div class="menu-text">Employees</div>
                           </a>
                        </div>
                        
                     </div>
                  </div>




                  <div class="menu-item <?php if($currentURL==base_url('admin_con/nsm/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/nsm/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">NSM </div>
                     </a>
                  </div>
                  <div class="menu-item <?php if($currentURL==base_url('admin_con/rsm/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/rsm/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">RSM </div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/asm/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/asm/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">ASM </div>
                     </a>
                  </div>
                  <div class="menu-item <?php if($currentURL==base_url('admin_con/sales_officer/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/sales_officer/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Sales Officer </div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/add_distributer/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/add_distributer/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Distributor  </div>
                     </a>
                  </div>
                  <div class="menu-item <?php if($currentURL==base_url('admin_con/kyc_records/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/kyc_records/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Distributor  KYC</div>
                     </a>
                  </div>
                  
                  <div class="menu-item <?php if($currentURL==base_url('admin_con/warning_nsm/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/warning_nsm/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Performance Notices</div>
                     </a>
                  </div>



                  

                 <!--  <div class="menu-item <?php if($currentURL==base_url('admin_con/contact/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/contact/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-contact-card"></i>
                        </div>
                        <div class="menu-text">Contact Enquiry</div>
                        <div class="menu-badge"><?php echo $this->db->count_all('contact'); ?></div>
                     </a>
                  </div>
 -->

                



                























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