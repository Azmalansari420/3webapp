<?php 
include('include/header.php'); ?>

<style>
	.money-box {
    background: white;
    color: black;
    padding: 12px 15px;
    border-radius: 9px;
    font-weight: 800;
    font-size: 18px;
}
</style>
	<!-- Header -->
		<header class="header shadow header-fixed border-0">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<i class="icon feather icon-menu"></i>
						</a>
					</div>
					<div class="mid-content">
						<h6 class="title">Invitation </h6>
					</div>
					<div class="right-content">
						<a href="notification.php" class="search-icon">
							<i class="icon feather icon-bell"></i>
						</a>
					</div>
				</div>
			</div>
		</header>
	<!-- Header -->
	
	<!-- Sidebar -->
	<?php include('include/sidebar.php'); ?>
    <!-- Sidebar End -->
	
	<!-- Page Content Start -->
	<div class="page-content space-top p-b80">
		<div class="container">
				<div class="row p-1">

					<div class="col-12 mt-3">
					    <div class="card">	                        
					        <div class="card-body text-center">
					            <h2>Invite Your Friends</h2>
					            <img id="qr_code_image" src="" alt="QR Code" width="200">
					            <br>
					            <p id="inviteLink" class="pt-2 text-dark">
    <span class="invite_link"></span>
</p>

					            <div class="total-cart">
					                <a href="javascript:void(0);" class="btn btn-primary w-100" style="color: black;font-size: 17px;font-weight: 800;" onclick="copyToClipboard()">Copy Invitation Link</a>
					            </div>
					        </div>
					    </div>
					</div>

					<script>
					    
					</script>


					

					
					
				</div>
			</div>
	</div>
	<!-- Page Content End -->
	
	<!-- Menubar -->
	<?php include('include/footer-menu.php'); ?>
	
	
</div>  


<?php include('include/footer.php'); ?>
<script>
    function copyToClipboard() {
    var copyText = document.getElementById("inviteLink").innerText;
    navigator.clipboard.writeText(copyText).then(() => {
    	toaster("Invitation link copied!", 'success');

    });
}



	function login_distibuter() {
        var settings = {
            "url": "<?= base_url('Qrcodegenrate/invitationqrcode') ?>",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function (response) {
            console.log(response);

            // Convert JSON string to Object if necessary
            if (typeof response === "string") {
                response = JSON.parse(response);
            }

            // Check if QR code was generated successfully
            if (response.status === 200) {
                $("#qr_code_image").attr("src", response.data);
                $(".invite_link").text(response.invite_link);
            } else {
                alert("Failed to generate QR Code!");
            }
        }).fail(function () {
            alert("Error while fetching QR Code.");
        });
    }

    login_distibuter();
















</script>
