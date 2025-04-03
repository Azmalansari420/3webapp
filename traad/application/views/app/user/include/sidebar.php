<style>
  .offcanvas.showing, .offcanvas.show:not(.hiding) {
      background: linear-gradient(to bottom, #222, #111) !important;
  }
  .sidebar-offcanvas .sidebar-content .link-section li .pages h3 {
    color: rgb(255 255 255);
}
.sidebar-offcanvas .sidebar-content .link-section li .pages i {
    color: rgb(255 255 255);
    font-size: 28px;
}

/*.offcanvas.showing, .offcanvas.show:not(.hiding) {
    background: linear-gradient(to bottom, #222, #111) !important;
    border-radius: 39px;
}*/
/*.sidebar-offcanvas.show {
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    min-height: 44vh;
    height: 32%;
    visibility: unset;
}*/
.offcanvas-header {
    background: #0b0b0b;
}
</style>

<div class="offcanvas sidebar-offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft" style="background: #0b0b0b;!important">
    <div class="offcanvas-header">
      <img class="img-fluid img" src="<?=base_url() ?>media/uploads/users/<?=$full_detail->profile_image ?>" alt="pro11" />
      <h3>Hello, <?=$full_detail->name ?></h3>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="sidebar-content">
        <ul class="link-section">

          <li>
            <a href="profile.php" class="pages">
              <h3>Profile</h3>
              <i class="ri-arrow-drop-right-line"></i>
            </a>
          </li>

          <li>
            <a href="contact.php" class="pages">
              <h3>Send Feedback</h3>
              <i class="ri-arrow-drop-right-line"></i>
            </a>
          </li>
          <li>
            <a href="about.php" class="pages">
              <h3>About Us</h3>
              <i class="ri-arrow-drop-right-line"></i>
            </a>
          </li>
          <li>
            <a href="privacy-policy.php" class="pages">
              <h3>Privacy Policy</h3>
              <i class="ri-arrow-drop-right-line"></i>
            </a>
          </li>
          <li>
            <a href="term-condition.php" class="pages">
              <h3>Terms & Conditions</h3>
              <i class="ri-arrow-drop-right-line"></i>
            </a>
          </li>

          <!-- <li>
            <a href="change-password.php" class="pages">
              <h3>Update Password</h3>
              <i class="ri-arrow-drop-right-line"></i>
            </a>
          </li> -->
          <!-- <li>
            <a href="option-list.php" class="pages">
              <h3>Option Chain</h3>
              <i class="ri-arrow-drop-right-line"></i>
            </a>
          </li>
 -->
          <!-- <li>
            <a href="wallet.php" class="pages">
              <h3>Wallet</h3>
              <i class="ri-arrow-drop-right-line"></i>
            </a>
          </li> -->

          
          <!-- <li>
            <a href="faq.php" class="pages">
              <h3>FAQ</h3>
              <i class="ri-arrow-drop-right-line"></i>
            </a>
          </li> -->
          

          
          <!-- <li>
            <a href="#social-media" data-bs-toggle="offcanvas" role="button" class="pages">
              <h3>Share App with friends</h3>
              <i class="ri-arrow-drop-right-line"></i>
            </a>
          </li> -->

          <li>
            <a href="<?=base_url('api/auth/logout') ?>" class="pages">
              <h3>Logout</h3>
              <i class="ri-arrow-drop-right-line"></i>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </div>
















<!-- share APP -->
<div class="offcanvas theme-offcanvas share-offcanvas offcanvas-bottom px-4 pb-4 h-auto" tabindex="-1"
    id="social-media">
    <div class="offcanvas-header">
      <h3 class="text-white">Share</h3>
    </div>
    <div class="offcanvas-body">
      <ul class="social-media-list">
        <li>
          <a href="https://www.facebook.com" class="social-media" target="_blank">
            <div class="social-image">
              <img class="img-fluid icons" src="<?=base_url() ?>assets/images/svg/social/fb.svg" alt="facebook" />
            </div>
            <h5>Facebook</h5>
          </a>
        </li>

        <li>
          <a href="https://www.instagram.com" class="social-media" target="_blank">
            <div class="social-media">
              <div class="social-image">
                <img class="img-fluid icons" src="<?=base_url() ?>assets/images/svg/social/insta.svg" alt="instagram" />
              </div>
              <h5>Instagram</h5>
            </div>
          </a>
        </li>

        <li>
          <a href="https://www.twitter.com" class="social-media" target="_blank">
            <div class="social-media">
              <div class="social-image">
                <img class="img-fluid icons" src="<?=base_url() ?>assets/images/svg/social/twitter.svg" alt="twitter" />
              </div>
              <h5>Twitter</h5>
            </div>
          </a>
        </li>

        <li>
          <a href="https://www.whatsapp.com" class="social-media" target="_blank">
            <div class="social-media">
              <div class="social-image">
                <img class="img-fluid icons" src="<?=base_url() ?>assets/images/svg/social/whatsapp.svg" alt="whatsapp" />
              </div>
              <h5>Whatsapp</h5>
            </div>
          </a>
        </li>

        <li>
          <a href="https://www.linkedin.com" class="social-media" target="_blank">
            <div class="social-media">
              <div class="social-image">
                <img class="img-fluid icons" src="<?=base_url() ?>assets/images/svg/social/linkedin.svg" alt="linkedin" />
              </div>
              <h5>Linkedin</h5>
            </div>
          </a>
        </li>

        <li>
          <a href="https://www.messenger.com" class="social-media" target="_blank">
            <div class="social-media">
              <div class="social-image">
                <img class="img-fluid icons" src="<?=base_url() ?>assets/images/svg/social/messanger.svg" alt="messenger" />
              </div>
              <h5>Messenger</h5>
            </div>
          </a>
        </li>

        <li>
          <a href="https://telegram.org/login" class="social-media" target="_blank">
            <div class="social-media">
              <div class="social-image">
                <img class="img-fluid icons" src="<?=base_url() ?>assets/images/svg/social/telegram.svg" alt="telegram" />
              </div>
              <h5>Telegram</h5>
            </div>
          </a>
        </li>

        <li>
          <a href="https://www.wechat.com" class="social-media" target="_blank">
            <div class="social-media">
              <div class="social-image">
                <img class="img-fluid icons" src="<?=base_url() ?>assets/images/svg/social/wechat.svg" alt="wechat" />
              </div>
              <h5>Wechat</h5>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>