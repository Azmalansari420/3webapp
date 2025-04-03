<!-- <?php
$page_name = basename(current_url());
?>
<style>
  .icon-home222 {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: #1e1e1e;
    border-radius: 50%;
    color: white;
}
.icon-home222:before {
    color: white;
}
a.icon-class>i {
    border: 1px solid #717171;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    position: relative;
    display: inline-flex;
}

.bottom-navigation-bar {
    background: #5f94bf;
  }
  .tf-navigation-bar li a {
    font-size: 16px;
    line-height: 16px;
    color: white;
        font-family: 'icomoon' !important;
  }
  a.icon-class>i {
    border: none;
    justify-content: center;
  }
  .tf-navigation-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 10px 8px;
}


</style>
<div class="bottom-navigation-bar">
    <div class="tf-con5tainer">
      <ul class="tf-navigation-bar"> -->


<!-- RSM -->
<?php if($full_detail->role==2) 
{ 
?>
    <!-- <li class="<?php if($page_name=='category.php') echo 'active'; ?>">
      <a class="icon-class " href="#!">
        <i class="icon-exchange"></i> Teams
      </a> 
    </li>

    <li class="<?php if($page_name=='distributor-history.php') echo 'active'; ?>"><a class="icon-class fw_4 d-flex justify-content-center align-items-center flex-column" href="#!"><i class="icon-face-ID"></i> Distributor</a> </li>

    <li><a class="icon-c4lass fw_4 d-flex justify-content-center align-items-center flex-column" href="home.php"><i class="icon-home222  icon-home2"></i> </a> </li>

    <li>
      <a class="icon-class fw_4 d-flex justify-content-center align-items-center flex-column" href="#!"><i class="icon-calendar3"></i> Monitoring</a> 
    </li>

    <li>
      <a class="icon-class fw_4 d-flex justify-content-center align-items-center flex-column" href="#!"><i class="icon-user-outline"></i> Reporting</a> 
    </li> -->

<?php } ?>

<!-- ASM -->

<?php if($full_detail->role==3) 
{ 
?>
    <!-- <li class="<?php if($page_name=='distributor-list.php') echo 'active'; ?>">
      <a class="icon-class " href="distributor-list.php">
        <i class="icon-exchange"></i> Distributor
      </a> 
    </li>

    <li class="<?php if($page_name=='distributor-history.php') echo 'active'; ?>"><a class="icon-class fw_4 d-flex justify-content-center align-items-center flex-column" href="#!"><i class="icon-face-ID"></i> Task</a> </li>

    
      <a style="color:white" class="icon-class fw_4 d-flex justify-content-center align-items-center flex-column" href="home.php"><i class="icon-home" style="color:white;margin-bottom: 7px;"></i> Home</a> 
    </li>
    <li>
      <a class="icon-class fw_4 d-flex justify-content-center align-items-center flex-column" href="#!"><i class="icon-calendar3"></i> Notifications</a> 
    </li> -->

    <!-- <li>
      <a class="icon-class fw_4 d-flex justify-content-center align-items-center flex-column" href="#!"><i class="icon-user-outline"></i> Reporting</a> 
    </li> -->

<?php } ?>


<!-- Sales Officer -->

<?php if($full_detail->role==4) 
{ 
?>
    <!-- <li class="<?php if($page_name=='distributor-list.php') echo 'active'; ?>">
      <a class="icon-class " href="distributor-list.php">
        <i class="icon-exchange"></i> Distributor
      </a> 
    </li>

    <li class="<?php if($page_name=='distributor-history.php') echo 'active'; ?>"><a class="icon-class fw_4 d-flex justify-content-center align-items-center flex-column" href="#!"><i class="icon-face-ID"></i> Task</a> </li>

    
      <a style="color:white" class="icon-class fw_4 d-flex justify-content-center align-items-center flex-column" href="home.php"><i class="icon-home" style="color:white;margin-bottom: 7px;"></i> Home</a> 
    </li>
    <li>
      <a class="icon-class fw_4 d-flex justify-content-center align-items-center flex-column" href="#!"><i class="icon-calendar3"></i> Notifications</a> 
    </li> -->

    <!-- <li>
      <a class="icon-class fw_4 d-flex justify-content-center align-items-center flex-column" href="#!"><i class="icon-user-outline"></i> Reporting</a> 
    </li> -->

<?php } ?>




<!-- distributor -->
<?php
if($full_detail->role==5)
  { ?>

   <!--  <li class="<?php if($page_name=='category.php') echo 'active'; ?>">
      <a class="icon-class fw_6 d-flex justify-content-center align-items-center flex-column" href="category.php">
        <i class="icon-exchange"></i> Category
      </a> 
    </li>

   
    <li class="<?php if($page_name=='distributor-history.php') echo 'active'; ?>">
      <a class="icon-class fw_4 d-flex justify-content-center align-items-center flex-column" href="distributor-history.php">
        <i class="icon-history"></i> History
      </a> 
    </li>

    <li><a class=" fw_4 d-flex justify-content-center align-items-center flex-column" href="home.php"><i class="icon-home222  icon-home2"></i> </a> </li>

    <li><a class="icon-class fw_4 d-flex justify-content-center align-items-center flex-column" href="#!"><svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="12.25" cy="12" r="9.5" stroke="#717171" />
          <path d="M17.033 11.5318C17.2298 11.3316 17.2993 11.0377 17.2144 10.7646C17.1293 10.4914 16.9076 10.2964 16.6353 10.255L14.214 9.88781C14.1109 9.87213 14.0218 9.80462 13.9758 9.70702L12.8933 7.41717C12.7717 7.15989 12.525 7 12.2501 7C11.9754 7 11.7287 7.15989 11.6071 7.41717L10.5244 9.70723C10.4784 9.80483 10.3891 9.87234 10.286 9.88802L7.86469 10.2552C7.59257 10.2964 7.3707 10.4916 7.2856 10.7648C7.2007 11.038 7.27018 11.3318 7.46702 11.532L9.2189 13.3144C9.29359 13.3905 9.32783 13.5 9.31021 13.607L8.89692 16.1239C8.86027 16.3454 8.91594 16.5609 9.0533 16.7308C9.26676 16.9956 9.6394 17.0763 9.93735 16.9128L12.1027 15.7244C12.1932 15.6749 12.3072 15.6753 12.3975 15.7244L14.563 16.9128C14.6684 16.9707 14.7807 17 14.8966 17C15.1083 17 15.3089 16.9018 15.4469 16.7308C15.5845 16.5609 15.6399 16.345 15.6033 16.1239L15.1898 13.607C15.1722 13.4998 15.2064 13.3905 15.2811 13.3144L17.033 11.5318Z" stroke="#717171" stroke-width="1.25" />
        </svg>
        Rewards</a> </li>

    <li><a class="icon-class fw_4 d-flex justify-content-center align-items-center flex-column" href="#!"><i class="icon-user-outline"></i> Profile</a> </li> -->

<?php } ?>








<!-- 
      </ul>
    </div>
  </div> -->