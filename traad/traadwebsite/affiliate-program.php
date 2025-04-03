<?php include('header.php'); ?>
<!-- hero section start-->


    <style>




h2 {
    margin-bottom: 15px;
}

label {
    display: block;
    text-align: left;
    font-size: 14px;
    margin: 10px 0 5px;
}

.required {
    color: red;
    font-size: 12px;
}

textarea {
    width: 100%;
    height: 60px;
    padding: 10px;
    border: none;
    outline: none;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
    resize: none;
}

::placeholder {
    color: #ddd;
}

button {
    width: 100%;
    padding: 10px;
    margin-top: 15px;
    border: none;
    border-radius: 5px;
    background: white;
    color: black;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
}

button:hover {
    background: #ddd;
}

    </style>

<section id="#faq" class="faq a2-bg pb-120 pt-120 position-relative z-0 pb-0" style="margin-top: 60px;">    
    <div class="container" style="    text-align: center;">
        <h2>Affiliate Application</h2>

        <form>
            <label>What is your promotion strategy? <span class="required">Required*</span></label>
            <textarea placeholder="Enter your promotion strategy" required></textarea>

            <label>How do you plan to drive traffic to our platform? <span class="required">Required*</span></label>
            <textarea placeholder="Enter your traffic strategy" required></textarea>

            <label>Do you have an existing audience (e.g., website, social media, or trading community) that you will use to drive referrals? If yes, please provide details. <span class="required">Required*</span></label>
            <textarea placeholder="Provide details here" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
</section>

<?php include('footer.php'); ?>
