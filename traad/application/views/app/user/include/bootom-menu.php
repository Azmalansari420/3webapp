<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$currentURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

?>

<style type="text/css">
  .navbar-menu ul li.active .icon {
      color: rgb(255 255 255);
  }

  .navbar-menu ul li a .icon {
      width: 24px;
      font-size: 26px;
      margin-left: auto;
      margin-right: auto;
  }
  .navbar-menu ul li.active span {
      color: rgb(250 251 255);
  }

  .navbar-menu ul li a span {
      font-size: 15px;
  }

  .navbar-menu {
    position: fixed;
    width: 100%;
    bottom: 0;
    left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    padding: 17px 20px;
    z-index: 2;
    max-width: 600px;
    background-color: black !important;
    -webkit-backdrop-filter: blur(27px);
    backdrop-filter: blur(27px);
    border: 1px solid;
    border-radius: 25px 36px 10px 11px;
}
.navbar-menu::before {
    background: linear-gradient(to bottom, #222, #111);
}
</style>
 <div class="navbar-menu">
    <ul>
      <li  class="<?php echo strpos($currentURL, 'home.php') !== false ? 'active' : ''; ?>">
        <a href="home.php">
          <div class="icon">
            <i class="ri-home-5-line unactive"></i>
            <i class="ri-home-5-line active"></i>
          </div>
          <span class="active">Home</span>
        </a>
      </li>

      <li class="<?php echo strpos($currentURL, 'watchlist.php') !== false ? 'active' : ''; ?>">
        <a href="watchlist.php">
          <div class="icon">
            <i class="ri-star-fill unactive"></i>
            <i class="ri-star-fill active"></i>
          </div>
          <span>Watchlist</span>
        </a>
      </li>

      <li class="<?php echo strpos($currentURL, 'position.php') !== false ? 'active' : ''; ?>">
        <a href="position.php">
          <div class="icon">
            <i class="ri-ticket-line unactive"></i>
            <i class="ri-ticket-line active"></i>
          </div>
          <span>Positions</span>
        </a>
      </li>

    

      <li class="<?php echo strpos($currentURL, 'performance.php') !== false ? 'active' : ''; ?>">
        <a href="performance.php">
          <div class="icon">
            <i class="ri-line-chart-line unactive"></i>
            <i class="ri-line-chart-fill active"></i>
          </div>
          <span>Performance</span>
        </a>
      </li>

    </ul>
  </div>