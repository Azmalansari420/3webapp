<?php include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>

  <!-- header Start -->
  <header>
    <div class="custom-container">
      <div class="auth-title">
        <h1 style="color:black;">Enter Pin Code</h1>
        <h4 style="color:black;">Create a Pin Code</h4>
        <p class="m-0">Create a 5 Digit PIN code that will be used every time you login.</p>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- otp section Start -->
  <div class="custom-container">
    <form class="auth-form otp-form">
      <div class="form-input">
        <input type="number" class="form-control" placeholder="0" id="five1" onkeyup="onKeyUpEvent(1, event)"
          onfocus="onFocusEvent(1)" />
        <input type="number" class="form-control" placeholder="0" id="five2" onkeyup="onKeyUpEvent(2, event)"
          onfocus="onFocusEvent(2)" />
        <input type="number" class="form-control" placeholder="0" id="five3" onkeyup="onKeyUpEvent(3, event)"
          onfocus="onFocusEvent(3)" />
        <input type="number" class="form-control" placeholder="0" id="five4" onkeyup="onKeyUpEvent(4, event)"
          onfocus="onFocusEvent(4)" />
        <input type="number" class="form-control" placeholder="0" id="five5" onkeyup="onKeyUpEvent(5, event)"
          onfocus="onFocusEvent(5)" />
      </div>
      <div class="submit-btn">
        <a href="reset-password.php" class="btn theme-btn">Confirm</a>
      </div>
    </form>
  </div>
  <!-- otp section end -->

   <?php include('include/allscipt.php'); ?>