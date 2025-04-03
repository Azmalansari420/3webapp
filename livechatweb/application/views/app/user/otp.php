<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('include/allcss.php'); ?>
</head>

<body>
    <!-- login page start -->
    <div class="login-img">
        <img class="img-fluid img" src="assets/images/login-vector.svg" alt="login-img">
    </div>

    <div class="custom-container">
        <h2 class="login-title">OTP Verification</h2>
        <h3 class="login-content">Let’s start again to chat with friends</h3>

        <h4 class="dark-text fw-semibold otp-name">OTP</h4>
        <form class="otp-form">
            <div class="form-input dark-border-gradient">
                <input type="number" class="form-control active" placeholder="0" id="five1"
                    onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)">
            </div>
            <div class="form-input dark-border-gradient">
                <input type="number" class="form-control" placeholder="0" id="five2" onkeyup="onKeyUpEvent(2, event)"
                    onfocus="onFocusEvent(2)">
            </div>
            <div class="form-input dark-border-gradient">
                <input type="number" class="form-control" placeholder="0" id="five3" onkeyup="onKeyUpEvent(3, event)"
                    onfocus="onFocusEvent(3)">
            </div>
            <div class="form-input dark-border-gradient">
                <input type="number" class="form-control" placeholder="0" id="five4" onkeyup="onKeyUpEvent(4, event)"
                    onfocus="onFocusEvent(4)">
            </div>
            <div class="form-input dark-border-gradient">
                <input type="number" class="form-control" placeholder="0" id="five5" onkeyup="onKeyUpEvent(5, event)"
                    onfocus="onFocusEvent(5)">
            </div>
        </form>
        <a href="profile-setup.php" class="btn theme-btn w-100 mt-4" role="button">Get OTP</a>
        <h6 class="content-color pt-2 pb-3 text-center">Not Received Yet ? <span> <a href="#!" class="dark-text fw-semibold">Resend it</a></span></h6>
    </div>

   <?php include('include/allscript.php'); ?>
</body>
</html>