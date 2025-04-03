<?php include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>

  <!-- side bar start -->
<?php include('include/sidebar.php'); ?>

  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="ri-menu-line"></i>
        </button>
        <h3 class="middle-title">Notifications</h3>
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- <header class="section-t-space">
    <div class="custom-container">
      <div class="head-content">
        <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="ri-menu-line"></i>
        </button>
        <h3 class="middle-title">Statistics</h3>
      </div>
    </div>
  </header> -->
  <!-- header end -->

  <!-- Notification starts -->
  <section class="section-b-space pt-0">
    <div class="custom-container">
      <div class="tab-content w-100" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" tabindex="0">
          <div class="general-tab">
            <ul class="notification-listing">
              <?php
                    $this->db->select('n.*, ns.status as read_status');
                    $this->db->from('notification n');
                    $this->db->join('notification_status ns', 'n.id = ns.notification_id AND ns.user_id = '.$full_detail->id, 'left');
                    $this->db->order_by('n.id desc');
                    $notifications = $this->db->get()->result();

                    foreach($notifications as $data) { ?>

              <li>
                <div class="notification-details">
                  <div class="notification-image">
                    <svg>
                      <use xlink:href="<?=base_url() ?>assets/images/svg/icons/security.svg#security"></use>
                    </svg>
                  </div>
                  <div class="notification-content">
                    <div>
                      <h4><?=$data->title ?></h4>
                      <h6 style="color: white;"><?=$data->message ?></h6>
                      <span style="color: green;"><?=date('d M, Y',strtotime($data->addeddate)) ?></span>
                    </div>
                    <?php if($data->read_status == 0): ?>
                    <div class="timeing">
                      <input class="form-check-input hide0btn<?=$data->id ?> mark-as-read" type="checkbox " id="jodiCutCheckbox" data-id="<?=$data->id ?>">
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
              </li>
              <?php } ?>


             

             
            </ul>
          </div>
        </div>

      
      </div>
    </div>
  </section>
  <!-- notification end -->
 <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

  <!-- bottom navbar start -->
 <?php include('include/bootom-menu.php'); ?>
  <!-- bottom navbar end -->

  <!-- bootstrap js -->
 <?php include('include/allscipt.php'); ?>
 
 <script>
   const user_id = '<?=$full_detail->id ?>';
   var id = 0;
   var type = 0;
   $(document).on("click", ".mark-as-read",(function(e) {
    id = $(this).data('id');
    clciktoupdateticket_status();
    }));



   function clciktoupdateticket_status()
    {      
        var form = new FormData();
        form.append("user_id", user_id);
        form.append("id", id);

        var settings = {
          "url": "<?=base_url() ?>api/notification/clciktoupdatenotification_status",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
          console.log(response);
          toaster(response.message, 'success');
          $(".status-value"+id).html(response.status);
          $(".hide0btn"+id).hide();
        });
    }

</script>