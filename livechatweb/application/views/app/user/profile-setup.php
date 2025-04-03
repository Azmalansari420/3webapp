<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('include/allcss.php'); ?>
</head>

<body>
    <!-- header starts -->
    <header id="header" class=" section-t-space main-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="choose-country.html">
                    <i class="iconsax icon-btn" data-icon="chevron-left"> </i>
                </a>
                <h3>Profile Setup</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- profile section starts -->
    <section class="section-b-space pt-0">
        <div class="custom-container">
            <div class="profile-pic-section">
                <div class="profile-pic upload-image rounded-image">
                    <input id="file" type="file" onchange="loadFile(event)">
                    <img src="assets/images/profile/profile-pic.png" id="output" class="output-img" alt="">
                    <a href="#add-profile" data-bs-toggle="modal">
                        <i class="iconsax upload-icon" data-icon="add-square"></i>
                    </a>
                </div>
            </div>

            <form class="auth-form profile-form">
                <div class="form-group">
                    <label class="form-label mb-2" for="Inputname">User Name</label>
                    <input type="text" class="form-control" id="Inputname" placeholder="Enter your name">
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="Inputemail">Email</label>
                    <input type="email" class="form-control" id="Inputemail" placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label class="form-label mb-2" for="Inputstatus">Add Status</label>
                    <input type="text" class="form-control" id="Inputstatus" placeholder="Enter your status">
                </div>

                <a href="home.php" class="btn theme-btn w-100 mt-sm-5 mt-4" role="button">Submit</a>
            </form>
        </div>
    </section>
    

<?php include('include/allscript.php'); ?>
</body>

</html>