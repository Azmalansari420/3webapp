<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$currentURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

?>
 <div class="navbar-menu">
    <ul>
      <li  class="<?php echo strpos($currentURL, 'discover.php') !== false ? 'active' : ''; ?>">
        <a href="discover.php">
          <div class="icon">
            <i class="ri-search-line unactive"></i>
            <i class="ri-search-fill active"></i>
          </div>
          <span class="active">Discover</span>
        </a>
      </li>
      <li class="<?php echo strpos($currentURL, 'watchlist.php') !== false ? 'active' : ''; ?>">
        <a href="watchlist.php">
          <div class="icon">
            <i class="ri-time-line unactive"></i>
            <i class="ri-time-line active"></i>
          </div>
          <span>Watchlist</span>
        </a>
      </li>
      <li class="<?php echo strpos($currentURL, 'home.php') !== false ? 'active' : ''; ?>">
        <a href="home.php">
          <div class="icon">
            <i class="ri-home-5-line unactive"></i>
            <i class="ri-home-5-fill active"></i>
          </div>
          <span>Positions</span>
        </a>
      </li>

      <!-- <li>
        <a href="create-nft.html" class="plus">
          <i class="ri-add-line plus-icon"></i>
        </a>
      </li> -->

      <li class="<?php echo strpos($currentURL, 'performance.php') !== false ? 'active' : ''; ?>">
        <a href="performance.php">
          <div class="icon">
            <i class="ri-line-chart-line unactive"></i>
            <i class="ri-line-chart-fill active"></i>
          </div>
          <span>Performance</span>
        </a>
      </li>

      <!-- <li>
        <a href="#!">
          <div class="icon">
            <i class="ri-earth-line unactive"></i>
            <i class="ri-earth-line active"></i>
          </div>
          <span>Journal</span>
        </a>
      </li> -->
    </ul>
  </div>