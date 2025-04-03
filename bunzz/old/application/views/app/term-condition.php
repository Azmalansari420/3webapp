<?php
$url = current_url();


$this->load->view('app/include/header'); 

?>

<style>
    .group-input>label {
        font-size: 14px;
        font-weight: 600;
        color: black;
    }
    .group-input {
        margin-bottom: 30px;
    }
    li.ul-li {
    color: black;
    font-size: 14px;
        margin-bottom: 12px;
}
</style>
    <!-- /preload -->
    <div class="header">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="javascript:;" class="back-btn"> <i class="icon-left"></i> </a>
                <h3>Terms and Conditions</h3>
            </div>
        </div>
    </div>
    <div class="mt-5" style="padding-bottom: 70px;">
        <div class="tf-container">
            <ul>
                <li class="ul-li"><strong>1. Acceptance of Terms</strong><br> By accessing or using  website, you agree to be bound by these Terms </li>
                <li class="ul-li"><strong>2. User Conduct</strong><br> You agree not to engage in any activity that disrupts or interferes with the functioning of the website or its services. </li>
                <li class="ul-li"><strong>3. Intellectual Property</strong><br> All content and materials available on the website are protected by intellectual property laws. </li>

                <li class="ul-li"><strong>4. Limitation of Liability </strong><br> shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of your access to or use of the website.  </li>
                <li class="ul-li"><strong>5. Indemnification </strong><br> You agree to indemnify and hold  harmless from any claims, losses, liabilities, damages, costs, and expenses arising out of or relating to your use of the website.  </li>
                <li class="ul-li"><strong>6. Governing Law </strong><br> These Terms and Conditions shall be governed by and construed in accordance with the laws.  </li>
            </ul>
        </div>
    </div>

<?php $this->load->view('app/include/footer'); ?>


