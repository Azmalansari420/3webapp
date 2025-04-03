<?php include('header.php'); ?>
<!-- hero section start-->


    <style type="text/css">


.container4 {
    width: 555px;
    text-align: center;
/*    background: rgba(255, 255, 255, 0.1);*/
    padding: 20px;
    border-radius: 10px;
    backdrop-filter: blur(10px);
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 15px;
    margin: 8px 0;
    border: none;
    outline: none;
    border-radius: 13px;
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
}

::placeholder {
    color: #ddd;
}

.otp-btn, .signup-btn {
    width: 33%;
    padding: 10px;
    margin-top: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    height: 50px;
    font-weight: 700;
    text-align: center;
}

.otp-btn {
    background: #fff;
    color: #000;
}

.signup-btn {
    background: #fff;
    color: #000;
    font-weight: bold;
}

.signup-btn:hover {
    background: #ddd;
}

.checkbox-container {
    display: flex;
    align-items: center;
    margin-top: 10px;
}

.checkbox-container input {
    width: auto;
    margin-right: 10px;
}

.checkbox-container label {
    font-size: 15px;
}

.checkbox-container a {
    color: #3d63ad;
    text-decoration: none;
}

.login-text {
    margin-top: 10px;
    font-size: 20px;
}

.login-text a {
    color: #3d63ad;
    font-weight: bold;
}
</style>

<section id="#faq" class="faq a2-bg pb-120 pt-120 position-relative z-0">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xxl-7">
                <div class="heading__content mb-2 mb-lg-15 text-center">
                    <h3 style="margin-top: 74px;">Let’s Get Started</h3>
                </div>
            </div>
        </div>
        <div class="row gy-10 justify-content-center align-items-center">
            <div class="col-md-12 col-lg-12 col-xxl-12" style="display:flex;justify-content: center;">
               <div class="container4">
                 <form>
                     <input type="text" placeholder="Username" required>
                     <input type="email" placeholder="Email" required>
                     <input type="password" placeholder="Password" required>
                     <input type="tel" placeholder="Contact No." required>
                     
                     <div style="display: flex;gap: 12px;">
                        <input type="tel" placeholder="Enter OTP" required style="    width: 58%;">
                        <button class="otp-btn">Get OTP</button>
                     </div>

                     <div class="checkbox-container">
                         <input type="checkbox" id="terms">
                         <label for="terms">I have read & agree to the <a href="#">Terms & Conditions</a>.</label>
                     </div>

                     <div class="checkbox-container">
                         <input type="checkbox" id="privacy">
                         <label for="privacy">I agree to the processing of my personal data according to our <a href="#">Privacy Policy</a>.</label>
                     </div>

                     <div class="text-center">
                        <button type="submit" class="signup-btn">Sign Up</button>
                     </div>
                 </form>
                 
                 <p class="login-text text-center">Already have an account? <a href="sign-in.php
                  ">Sign in</a></p>
             </div>
            </div>
            
        </div>
    </div>
</section>

<?php include('footer.php'); ?>
