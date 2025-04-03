<?php
$currentURL = current_url();
$sitesetting = $this->crud->fetchdatabyid('1','site_setting');
?>

      <div id="sidebar" class="app-sidebar">
            <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
               <div class="menu">
                  <div class="menu-profile">
                     <a  class="menu-profile-link">
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
                           <!-- <small><?php echo website_name; ?></small> -->
                        </div>
                     </a>
                  </div>
                 
                  <div class="menu-header">Admin Panels</div>
<?php

        if($this->session->userdata('role')==1)
        {
        ?>
                  <div class="menu-item <?php if($currentURL==base_url('admin/dashboard')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin/dashboard');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-dashboard"></i>
                        </div>
                        <div class="menu-text">Dashboard</div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/sub_admin/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/sub_admin/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Create Admin  </div>
                        <div class="menu-badge"><?php
                        // $this->db->where('role',2);
                                //  $query = $this->db->get('tbl_admin');
                           //      echo $query->num_rows(); ?></div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/users/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/users/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">All Users  </div>
                        <div class="menu-badge"><?php //echo $this->db->select('id')->count_all('users'); ?></div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/slider/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/slider/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Slider  </div>
                        <div class="menu-badge"><?php //echo $this->db->select('id')->count_all('slider'); ?></div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/games/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/games/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Games  </div>
                        <div class="menu-badge"><?php //echo $this->db->select('id')->count_all('games'); ?></div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/matches/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/matches/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Matches  </div>
                        <div class="menu-badge"><?php //echo $this->db->select('id')->count_all('matches'); ?></div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/complete_matches/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/complete_matches/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Complete Matches  </div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/match_rule/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/match_rule/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Match Rule  </div>
                        <div class="menu-badge"><?php //echo $this->db->select('id')->count_all('match_rule'); ?></div>
                     </a>
                  </div>


                  <div class="menu-item <?php if($currentURL==base_url('admin_con/announcement/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/announcement/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Announcement  </div>
                        <div class="menu-badge"><?php //echo $this->db->select('id')->count_all('announcement'); ?></div>
                     </a>
                  </div>


                  <div class="menu-item <?php if($currentURL==base_url('admin_con/notification/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/notification/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Notification  </div>
                        <div class="menu-badge"><?php //echo $this->db->select('id')->count_all('notification'); ?></div>
                     </a>
                  </div>


                  <div class="menu-item <?php if($currentURL==base_url('admin_con/withdraw_request/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/withdraw_request/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Withdraw Request  </div>
                        <div class="menu-badge"><?php //echo $this->db->select('id')->count_all('withdraw_request'); ?></div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/user_history/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/user_history/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Transtion Details  </div>
                        <div class="menu-badge"><?php
                                 //$this->db->where('message','Add Money');
                                 //$query = $this->db->select('id')->get('user_history');
                                // echo $query->num_rows(); ?>

                               </div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/contact/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/contact/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-contact-card"></i>
                        </div>
                        <div class="menu-text">Contact Enquiry</div>
                        <div class="menu-badge"><?php //echo $this->db->select('id')->count_all('contact'); ?></div>
                     </a>
                  </div>


                  <div class="menu-item has-sub ">
                     <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-cogs"></i>
                        </div>
                        <div class="menu-text"> Configuration </div>
                        <div class="menu-caret"></div>
                     </a>
                     <div class="menu-submenu">
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/site_setting/upi/1');?>" class="menu-link">
                              <div class="menu-text">UPI IDs</div>
                           </a>
                        </div>

                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/site_setting/edit/1');?>" class="menu-link">
                              <div class="menu-text">Site Setting</div>
                           </a>
                        </div>
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/site_setting/about/2');?>" class="menu-link">
                              <div class="menu-text">About Us</div>
                           </a>
                        </div>
                        
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/site_setting/about/4');?>" class="menu-link">
                              <div class="menu-text">FAQ</div>
                           </a>
                        </div>
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/site_setting/about/5');?>" class="menu-link">
                              <div class="menu-text">Privacy Policy</div>
                           </a>
                        </div>
                        <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/site_setting/about/6');?>" class="menu-link">
                              <div class="menu-text">Terms and Condition</div>
                           </a>
                        </div>
                        <!-- <div class="menu-item">
                           <a href="<?php echo base_url('admin_con/site_setting/about/2');?>" class="menu-link">
                              <div class="menu-text">Push Notification Key</div>
                           </a>
                        </div> -->
                        
                     </div>
                  </div>

   <?php } ?>                



                  <?php

        if($this->session->userdata('role')==2)
        {
        ?>
                  <div class="menu-item <?php if($currentURL==base_url('admin/dashboard')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin/dashboard');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-dashboard"></i>
                        </div>
                        <div class="menu-text">Dashboard</div>
                     </a>
                  </div>

               <div class="menu-item <?php if($currentURL==base_url('admin_con/games/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/games/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Games  </div>
                        <div class="menu-badge"><?php //echo $this->db->select('id')->count_all('games'); ?></div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/matches/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/matches/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Matches  </div>
                        <div class="menu-badge"><?php //echo $this->db->select('id')->count_all('matches'); ?></div>
                     </a>
                  </div>

                  <div class="menu-item <?php if($currentURL==base_url('admin_con/complete_matches/listing')) echo 'active'; ?>">
                     <a href="<?php echo base_url('admin_con/complete_matches/listing');?>" class="menu-link">
                        <div class="menu-icon">
                           <i class="fa fa-sliders"></i>
                        </div>
                        <div class="menu-text">Complete Matches  </div>
                     </a>
                  </div>

     <?php } ?>























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