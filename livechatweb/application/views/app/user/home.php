<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('include/allcss.php'); ?>
  
</head>

<body>
  <!-- header starts -->
  <header id="header" class="main-header section-b-space">
    <div class="custom-container">
      <div class="header-panel">
        <div class="d-flex align-items-center gap-2">
          <a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
            <i class="iconsax icon-btn" data-icon="text-align-left"> </i>
          </a>
        </div>
        <div class="d-flex align-items-center gap-2">
          <img class="img-fluid logo" src="<?=base_url() ?>assets/images/logo/mini-logo.png" alt="logo">
          <span class="fw-bold dark-text">Chatzy</span>
        </div>

        <div class="d-flex align-items-center gap-sm-3 gap-2">
          <a href="#search-offcanvas" data-bs-toggle="offcanvas">
            <i class="iconsax icon-btn" data-icon="search-normal-2"> </i>
          </a>
          <div class="dropdown more-options dropdown-menu-end">
            <a class="btn dropdown-toggle mt-0 p-0" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
              <i class="iconsax icon-btn" data-icon="menu-meatballs"> </i>
            </a>

            <ul class="dropdown-menu">
              <li><a href="new-group-contact.html" class="dropdown-item"> <i class="iconsax icon" data-icon="group"></i>
                  New Group</a> </li>
              <li><a href="new-broadcast-contact.html" class="dropdown-item"><img class="icon"
                    src="<?=base_url() ?>assets/images/svg/megaphone.svg" alt="megaphone"> New Broadcast </a>
              </li>
              <li><a href="starred-message.html" class="dropdown-item"> <i class="iconsax icon" data-icon="star"></i>
                  Starred Message</a>
              </li>
              <li><a href="invite-people.html" class="dropdown-item"> <i class="iconsax icon" data-icon="add-square">
                  </i>Invite a Friend</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- sidebar starts -->
  <?php include('include/sidebar.php'); ?>
  <!-- sidebar end -->

  
  <!-- chat section starts -->
  <section class="chat-section">
    <div class="custom-container">
      <h6 class="content-color fw-medium">Chat (2)</h6>

      <ul class="chat-list">
        
        <li>
          <a href="group-chat.html" class="chat-list-box">
            <div class="chat-list-image">
              <img class="img-fluid img" src="<?=base_url() ?>assets/images/profile/p8.png" alt="p2">
            </div>
            <div class="chat-details">
              <div class="d-flex align-items-center justify-content-between">
                <h5 class="name">Weekend Plan</h5>
                <h6>11:30 PM</h6>
              </div>
              <div class="content">
                <div class="d-flex align-items-center justify-content-between gap-2">
                  <p><span>Sima : </span> is there any plan on this Weekend </p>
                  <img class="img-fluid icon" src="<?=base_url() ?>assets/images/svg/pin.svg" alt="pin">
                </div>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="private-chat.php" class="chat-list-box">
            <div class="chat-list-image">
              <img class="img-fluid img with-story" src="<?=base_url() ?>assets/images/profile/p2.png" alt="p2">
            </div>
            <div class="chat-details">
              <div class="d-flex align-items-center justify-content-between">
                <h5 class="name">Albert Flores</h5>
                <h6 class="success-color">Just Now</h6>
              </div>
              <div class="content">
                <div class="d-flex align-items-center justify-content-between gap-2">
                  <p><span> <img class="img-fluid icon" src="<?=base_url() ?>assets/images/svg/tick-all.svg" alt="pin"></span>
                    This
                    is nice, i love it <span> <img class="img-fluid icon" src="<?=base_url() ?>assets/images/svg/heart.svg"
                        alt="pin"></span> </p>
                  <img class="img-fluid icon" src="<?=base_url() ?>assets/images/svg/mute.svg" alt="pin">
                </div>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="private-chat.php" class="chat-list-box">
            <div class="chat-list-image online">
              <img class="img-fluid img" src="<?=base_url() ?>assets/images/profile/p3.png" alt="p2">

            </div>
            <div class="chat-details">
              <div class="d-flex align-items-center justify-content-between">
                <h5 class="name">Ann Thomas</h5>
                <h6 class="success-color">12:55 AM</h6>
              </div>
              <div class="content">
                <div class="d-flex align-items-center justify-content-between gap-2">
                  <p>What are you doing now ?</p>
                  <h6 class="count">1</h6>
                </div>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="private-chat.php" class="chat-list-box">
            <div class="chat-list-image online">
              <img class="img-fluid img" src="<?=base_url() ?>assets/images/profile/p9.png" alt="p2">

            </div>
            <div class="chat-details">
              <div class="d-flex align-items-center justify-content-between">
                <h5 class="name">Guy Hawkins</h5>
                <h6>Yesterday</h6>
              </div>
              <div class="content">
                <p class="typing success-color fw-semibold">
                  Typing
                  <span></span>
                  <span></span>
                  <span></span>
                </p>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="private-chat.php" class="chat-list-box">
            <div class="chat-list-image">
              <img class="img-fluid img with-story" src="<?=base_url() ?>assets/images/profile/p5.png" alt="p2">

            </div>
            <div class="chat-details">
              <div class="d-flex align-items-center justify-content-between">
                <h5 class="name">Edward Turner</h5>
                <h6>13/12/2023</h6>
              </div>
              <div class="content">
                <div class="d-flex align-items-center justify-content-between gap-2">
                  <p><span> <img class="img-fluid icon" src="<?=base_url() ?>assets/images/svg/gallery.svg" alt="gallery">
                    </span>Sent
                    you image </p>
                  <h6 class="count">1</h6>
                </div>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="group-chat.html" class="chat-list-box">
            <div class="chat-list-image">
              <img class="img-fluid img" src="<?=base_url() ?>assets/images/profile/p10.png" alt="p2">
            </div>
            <div class="chat-details">
              <div class="d-flex align-items-center justify-content-between">
                <h5 class="name">Great Thoughts</h5>
                <h6>11:30 PM</h6>
              </div>
              <div class="content">
                <div class="d-flex align-items-center justify-content-between gap-2">
                  <p><span>You : </span> This is COOL </p>
                </div>
              </div>
            </div>
          </a>
        </li>

        <li>
          <a href="private-chat.php" class="chat-list-box">
            <div class="chat-list-image">
              <img class="img-fluid img" src="<?=base_url() ?>assets/images/profile/p6.png" alt="p2">
            </div>
            <div class="chat-details">
              <div class="d-flex align-items-center justify-content-between">
                <h5 class="name">Joseph James</h5>
                <h6>11/12/2023</h6>
              </div>
              <div class="content">
                <div class="d-flex align-items-center justify-content-between gap-2">
                  <p><span> <img class="img-fluid icon" src="<?=base_url() ?>assets/images/svg/tick.svg" alt="pin"></span> This
                    is
                    COOL </p>
                </div>
              </div>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </section>
  <!-- chat section end -->

  <div class="new-part">
    <a href="add-chat.php" class="new-chat-icon">
      <img class="img-fluid icon" src="<?=base_url() ?>assets/images/svg/messages.svg" alt="messages">
    </a>
  </div>

  
  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

  <!-- bottom navbar start -->
  
  <?php include('include/bootom-menu.php'); ?>
  <!-- bottom navbar end -->

  <!-- search offcanvas starts -->
  <?php include('include/search.php'); ?>
  <!-- search offcanvas end -->

  <!-- add story modal starts -->
  <?php include('include/add-story.php'); ?>
  <!-- add story modal end  -->

  

   <?php include('include/allscript.php'); ?>
</body>
</html>