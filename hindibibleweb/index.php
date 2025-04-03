<?php include('include/header.php'); ?>
<style type="text/css">

</style>
   <div class="container-home">
        <header>
            <img src="img/logo.png" alt="Logo" class="logo">
        </header>

        <h2 class="subheading">TGC <span class="highlight">HINDI BIBLE STUDY APP</span></h2>

        <div class="buttons d-flex justify-content-center">
            <a class="btn-class-home yellow-btn">Subscribers</a>
            <a href="blog.php" class="btn-class-home blue-btn">LATEST NEWS</a>
            <a href="contact.php" class="btn-class-home green-btn">Contact Us</a>
        </div>

<style type="text/css">
    .video-btn {
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
        }
        .video-btn:hover {
            background-color: #003d82;
        }
        .video-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            justify-content: center;
            align-items: center;
        }
        .video-container video {
            width: 90%;
            height: auto;
            max-height: 90%;
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            color: white;
            cursor: pointer;
        }
        .orange-btn
        {
            text-decoration: none;
        }
</style>

        <div class="intro-boxx">
            <a class="intro-video" onclick="openVideo()">INTRO VIDEO</a>
        </div>

        <div class="video-container" id="videoContainer">
            <span class="close-btn" onclick="closeVideo()">×</span>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/7RqwWn_U-Qo?si=fjSgb1ojUD6U2gDm&amp;start=3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <!-- <video id="newsVideo" controls>
                <source src="https://www.youtube.com/watch?v=cF1Na4AIecM" type="video/mp4">
            </video> -->
        </div>


        <div style="display: flex;flex-direction: column;align-items: center;">
           <a href="free-trail-1.php" class="orange-btn">1 Day free trial <br> <span>Ek din ka free trial</span></a>
           <a href="" class="orange-btn">Your Contribution <br> <span class="underline">Aapka Arthik Yogdaan</span></a>
           <a href="" class="orange-btn">New Sign up</a>
           <a href="member-login.php" class="orange-btn">Member Log in</a>
        </div>

        <div class="footer" style="display: flex;flex-direction: column;align-items: center;">
            <a href="https://hindibiblestudy.com/">hindibiblestudy.com</a>
        </div>
    </div>

<?php include('include/footer.php'); ?>
      
     
<script>
        function openVideo() {
            let videoContainer = document.getElementById('videoContainer');
            let video = document.getElementById('newsVideo');

            videoContainer.style.display = "flex";
            video.requestFullscreen().catch(err => console.log(err));
            video.play();
        }

        function closeVideo() {
            let videoContainer = document.getElementById('videoContainer');
            let video = document.getElementById('newsVideo');

            videoContainer.style.display = "none";
            video.pause();
            video.currentTime = 0;
            if (document.fullscreenElement) {
                document.exitFullscreen();
            }
        }
    </script>
