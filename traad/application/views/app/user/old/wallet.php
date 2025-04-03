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
        <h3 class="middle-title text-white">Wallet</h3>
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->
<style>
  i.ri-notification-2-line222 {
    color: white;
    position: relative;
    left: 29px;
    bottom: 17px;
    background: black;
    padding: 5px;
    border-radius: 50%;
}
.order-listing li {
    display: grid;
    justify-content: center !important;
        text-align: center;
}


 table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #1e1e1e; /* Dark mode friendly */
        box-shadow: 0px 4px 8px rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        padding: 6px;
        text-align: center;
        border-bottom: 1px solid #333;
        font-size: 13px;
    }

    th {
        background-color: #007bff;
        color: white;
        text-transform: uppercase;
    }

    tr:hover {
        background-color: #2a2a2a; /* Lighter hover effect */
    }

    td {
        color: #ddd;
    }

    /* Responsive Design */
    @media (max-width: 600px) {
        table {
            width: 100%;
        }
    }

    a.add-wallet-load-more-btn
    {
      background: white;
      color: black;
      font-weight: 800;
      padding: 5px;
      border-radius: 6px;
    }
</style>



  <!-- setting section start -->
  <span id="copyResult"></span>
 

  
  <section class="section-t-space section-lg-b-space mt-2">
    <div class="custom-container">

      <ul class="order-listing ">
        <li>
          <div class="product-details">
            <div class="product-content">
              <div>
                <h4 style="color:black;"><span class="wallet-amount"><?=currency_simble($full_detail->wallet) ?></span></h4>
                <h4 class="product-item ">Total Amount</h4>
              </div>
            </div>
          </div>
        </li>
      </ul>




      <form class="auth-form create-form mt-5" target="_blank">
        <div class="form-group mb-3">
          <label for="inputname" class="form-label">Enter Coupen Code</label>
          <div class="form-input">
            <input type="text" class="form-control" id="inputname" placeholder="Enter Coupen Code" />
            <i class="ri-user-line user"></i>
          </div>
        </div>
        <div class="submit-btn mt-0 mb-0">
          <a href="javascript:void(0);" class="btn theme-btn mt-0 wallet-btn">Submit</a>
        </div>
      </form>


      <div class="text-center mt-4">
        <h3 class="middle-title text-white">Wallet History</h3>
      </div>

      <table>
        <thead>
          <tr>
            <th>S.no</th>
            <th>Coupon Name</th>
            <th>Amount</th>
            <th>Date</th>
          </tr>
        </thead>

        <tbody class="add-wallet-load-more">
          
        </tbody>
      </table>


      <div style="text-align: center;margin-top: 8px;margin-bottom: 5px;">
          <a href="javascript:void(0);" class="add-wallet-load-more-btn">Load More</a>
      </div>

    

    </div>
  </section>











  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

  <!-- bottom navbar start -->
 <?php include('include/bootom-menu.php'); ?>
  <!-- bottom navbar end -->

  <!-- bootstrap js -->
 <?php include('include/allscipt.php'); ?>
 
 <script>

      /**/

   $(document).on("click", ".wallet-btn", function (e) {
    update_profile();
});

function update_profile() {
    var name = $("#inputname").val();

    if (name == "") {
        toaster("Enter Coupon Code", 'error');
        return false;
    }

    var form = new FormData();
    form.append("name", name);

    var settings = {
        "url": "<?=base_url()?>api/wallet/add_amount_from_coupon",
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
        if (response.status == 200) {
            toaster(response.message, 'success');
            $('#inputname').val("");
            $('.wallet-amount').html(response.update_wallet_amount);
            $('.add-wallet-load-more').html(response.html);

            // Reload the table list
            page = 0;  // Reset pagination
            add_wallet_data();
        } else {
            toaster(response.message, 'error');
        }
    });
}

/* Load list */
$(document).on("click", ".add-wallet-load-more-btn", function (e) {
    add_wallet_data();
});

var page = 0;
function add_wallet_data() {
    var click_btn = '.add-wallet-load-more-btn';

    $(click_btn).text('Wait..');
    $(click_btn).attr('disabled', true);

    var form = new FormData();
    form.append("page", page);

    var settings = {
        "url": "<?=base_url()?>api/wallet/add_amount_from_coupon_data",
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
        if (response.status == 200) {
            if (page == 0)
                $('.add-wallet-load-more').html(response.data); // Replace list
            else
                $(".add-wallet-load-more").append(response.data); // Append more data
            
            page++;
            $(click_btn).show();
        } else {
            $(click_btn).hide();
            toaster(response.message, 'error');
        }
        $(click_btn).text('Load More');
        $(click_btn).attr('disabled', false);
    });
}

// Load list on page load
add_wallet_data();
























</script>

