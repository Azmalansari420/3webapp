<?php
$url = $this->uri->segment(3);
// print_r($url);

?>

<style>
    .main-footer-bottom ul li {
    width: 19% !important;
    margin: 9px 0px 0;
}
.main-footer-bottom ul li a {
    font-size: 10px!important;
}
</style>

 <div class="main-footer-bottom d-block text-center">
    <ul>
        <li>
            <a class="<?php if($url=='home.php') echo 'active'; ?>" href="home.php">
                <img src="<?=base_url() ?>assets/img/icon/svg/home.svg" alt="icon">
                Home
            </a>
        </li>
        <li>
            <a class="" href="#!">
                <img src="<?=base_url() ?>assets/play.svg" alt="icon">
                How To Play
            </a>
        </li>
        <li>
            <a data-bs-toggle="modal" data-bs-target="#user-add-model">
                <img src="<?=base_url() ?>assets/plus.svg" alt="img">
                Create Challenge
            </a>
        </li>
        <li>
            <a class="location-reload" style="cursor: pointer;">
                <img src="<?=base_url() ?>assets/refresh.svg" alt="img">
                Refreh
            </a>
        </li>
        <li>
            <a class="<?php if($url=='profile.php') echo 'active'; ?>" href="ludo-user-list">
                <img src="<?=base_url() ?>assets/img/icon/svg/profile.svg" alt="img">
                My Challenge
            </a>
        </li>
    </ul>
</div>