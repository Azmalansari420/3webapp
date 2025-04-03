<!DOCTYPE html>
<html lang="en">
<head>
     <?php include('include/allcss.php'); ?>
</head>

<body>

    <!-- header starts -->
    <header id="header" class=" section-t-space main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel contact-panel">
                <div class="d-flex align-items-center gap-2">
                    <a href="home.php">
                        <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                    </a>
                    <div class="d-block">
                        <h4 class="fw-semibold">Select Contact</h4>
                        <h6 class="fw-normal">652 Contact</h6>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-sm-3 gap-2">
                    <a href="#search-offcanvas" data-bs-toggle="offcanvas">
                        <i class="iconsax icon-btn" data-icon="search-normal-2"> </i>
                    </a>
                    <a href="#">
                        <i class="iconsax icon-btn" data-icon="rotate-left"> </i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- new contact section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <div class="scrollbar scrollbar1 mb-0 border-0" id="scrollbar">
                <ul class="contact-list mt-0 pt-0">
                    

                    <?php
                    $this->db->where('id !=', $full_detail->id);
                    $user = $this->db->get_where('users',array('status'=>1,))->result_object();
                    foreach($user as $data)
                        { ?>
                  
                    <li>
                        <a href="private-chat.php?user_id=<?=$data->id ?>" class="contact-box">

                            <div class="contact-details ps-0"> <img class="img-fluid img"
                                    src="<?=base_url() ?>media/uploads/users/<?=$data->profile_image ?>" alt="p1" onerror="this.src='<?=base_url() ?>assets/images/profile/p9.png'">
                                <div>
                                    <h5><?=$data->name ?></h5>
                                    <h6><?=$data->user_status ?>  </h6>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php } ?>
                   
                
                </ul>
            </div>
            <a href="private-chat.html" class="new-chat-icon arrow-icon">
                <i class="iconsax icon" data-icon="arrow-right"> </i>
            </a>
        </div>
    </section>
    <!-- new contact section end -->

    <?php include('include/allscript.php'); ?>
</body>

</html>