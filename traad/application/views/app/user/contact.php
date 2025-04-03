<?php include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>

  <!-- side bar start -->
<?php include('include/sidebar.php'); ?>

  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="ri-menu-line"></i>
        </button>
        <h3 class="middle-title text-white">Send Feedback</h3>
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->


  
  <section class="section-t-space section-lg-b-space">
    <div class="custom-container">
      <form class="auth-form create-form" target="_blank">

        <input type="hidden" id="name" value="<?=$full_detail->name ?>">
        <input type="hidden" id="email" value="<?=$full_detail->email ?>">
        <input type="hidden" id="mobile" value="<?=$full_detail->mobile ?>">

        <div class="form-group mb-3">
          <label for="subject" class="form-label">Subject</label>
          <div class="form-input">
            <input type="text" class="form-control" id="subject" placeholder="Enter Your Subject" />
            <i class="ri-door-lock-line"></i>
          </div>
        </div>

        <div class="form-group mb-3">
          <label for="inputPassword" class="form-label">Message</label>
          <div class="form-input">
            <textarea  class="form-control" placeholder="Write Something..." rows="5" id="message"></textarea>
            <i class="ri-door-lock-line"></i>
          </div>
        </div>

        

        <div class="submit-btn mb-0">
          <a href="javascript:void(0);" class="btn theme-btn contact-btn">Submit</a>
        </div>
      </form>
    </div>
  </section>

  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

  <!-- bottom navbar start -->
 <?php include('include/bootom-menu.php'); ?>
  <!-- bottom navbar end -->

  <!-- bootstrap js -->
 <?php include('include/allscipt.php'); ?>

 <script>
    $(document).on("click", ".contact-btn", function (e) {
    update_profile();
});

function update_profile() {
    var name = $("#name").val();
    var email = $("#email").val();
    var mobile = $("#mobile").val();
    var subject = $("#subject").val();
    var message = $("#message").val();

    if (subject == "") {
        toaster("Enter Your Subject", 'error');
        return false;
    }
    if (message == "") {
        toaster("Enter Your Message", 'error');
        return false;
    }

    var form = new FormData();
    form.append("name", name);
    form.append("email", email);
    form.append("mobile", mobile);
    form.append("subject", subject);
    form.append("message", message);

    var settings = {
        "url": "<?=base_url()?>api/user/contact_enquiry",
        "method": "POST",
        "dataType": "json",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
    };

    $.ajax(settings).done(function (response) {
        console.log(response);
        if (response.status == 200) {
            toaster(response.message, 'success');
            $('#subject').val("");
            $('#message').val("");
            
        } else {
            toaster(response.message, 'error');
        }
    });
}
 </script>
 