<?php
$url = $this->uri->segment(3);
// print_r($url);

?>

 <div class="main-footer-bottom d-block text-center">
                <ul>
                    <li>
                        <a class="<?php if($url=='home.php') echo 'active'; ?>" href="home.php">
                            <img src="<?=base_url() ?>assets/img/icon/svg/home.svg" alt="icon">
                            Home
                        </a>
                    </li>
                    <li>
                        <a class="<?php if($url=='invite.php') echo 'active'; ?>" href="invite.php">
                            <img src="<?=base_url() ?>assets/img/icon/svg/sports.svg" alt="img">
                            Earn
                        </a>
                    </li>
                    <li>
                        <a class="<?php if($url=='winners.php') echo 'active'; ?>" href="winners.php">
                            <img src="<?=base_url() ?>assets/img/icon/svg/ticket.svg" alt="img">
                            Winners
                        </a>
                    </li>
                   <!--  <li>
                        <a href="blog.html">
                            <img src="<?=base_url() ?>assets/img/icon/svg/document.svg" alt="img">
                            News
                        </a>
                    </li> -->
                    <li>
                        <a class="<?php if($url=='profile.php') echo 'active'; ?>" href="profile.php">
                            <img src="<?=base_url() ?>assets/img/icon/svg/profile.svg" alt="img">
                            Profile
                        </a>
                    </li>
                </ul>
            </div>