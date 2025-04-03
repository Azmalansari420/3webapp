<?php include('header.php'); ?>
<!-- hero section start-->


<style type="text/css">




.info-text {
    font-size: 15px;
    margin-bottom: 15px;
    text-align: center;
}

a {
    color: #3d63ad;
    text-decoration: none;
}

input, select {
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

.section-title {
        font-size: 20px;
    margin-top: 15px;
    text-align: center;
    margin-bottom: 15px;
}

.additional-info {
    display: flex;
    flex-direction: column;
}

.small-text {
    font-size: 12px;
    margin-top: 5px;
}

.locked-section {
    position: relative;
    margin-top: 10px;
}

.locked-section input {
    background: rgba(255, 255, 255, 0.2);
    cursor: not-allowed;
}

.lock-icon {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
}

</style>

<section id="#faq" class="faq a2-bg pb-120 pt-120 position-relative z-0 pb-0" style="margin-top: 60px;">    
    <div class="container">
        <p class="info-text">
            For security reasons, these details cannot be changed directly. 
            Please contact our <a href="#">Support Team</a> for any updates or modifications.
        </p>

        <form>
            <input type="text" placeholder="Username" required>
            <input type="email" placeholder="Email" required>
            <input type="tel" placeholder="Phone No." required>

            <h3 class="section-title">Additional Information</h3>

            <div class="additional-info">
                
                
                <input type="text" placeholder="My Plan" required>
                
                <input type="date" required>
            </div>

            <p class="small-text">Upgrade Plan</p>
            <p class="small-text">To Change Date Please contact our <a href="#">support team</a></p>

            <div class="locked-section">
                <input type="text" placeholder="My Test" disabled>
                <span class="lock-icon">🔒</span>
            </div>

            <p class="small-text">This section will be accessible on the scheduled test date.</p>
        </form>
    </div>
</section>

<?php include('footer.php'); ?>
