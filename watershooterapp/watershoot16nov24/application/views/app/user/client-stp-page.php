<?php
$type = $this->input->get('type');
$name = "";
if($type==1)
{
	$name = "STP";
}
else if($type==2)
{
	$name = "ETP";
}
else if($type==3)
{
	$name = "WTP";
}
else if($type==4)
{
	$name = "Other";
}

include('include/header.php'); ?>

<body>
<style>
	.page-content.space-top {
	    margin-top: 70px;
	}
	.date-class {
	    background: #283890;
	    color: white!important;
	}
	.form-label {
	    font-weight: 600;
	    color: black;
	}
	.bg-gray{
		background: #d9d9d9!important;
	}
	::-webkit-input-placeholder { /* WebKit, Blink, Edge */
	    color: black!important;
	    font-size: 12px;
	}
	.form-control {
    color: black!important;
	}
	.form-control:focus, .form-control:active, .form-control.active {
	    border-color: var(--primary);
	    background: var(--primary);
	    color: white!important;
	}

	i.icon.feather.icon-check-circle {
	    font-size: 100px;
	    color: #283890;
	}
</style>

<div class="page-wrapper">
    
	<header class="header header-fixed">
		<div class="container">
			<div class="header-content">
				<div class="left-content">
					<a href="javascript:void(0);" class="menu-toggler">
						<i class="icon feather icon-menu"></i>
					</a>
					<h6 class="title font-17"><?=$name ?></h6>
				</div>
				<div class="mid-content header-logo">
				</div>
				<div class="right-content dz-meta">
					
					<a href="#!" class="icon shopping-cart">
						<i class="icon feather icon-settings"></i>
					</a>
				</div>
			</div>
		</div>
	</header>
	
	<?php include('include/sidebar.php'); ?>
	
<input type="hidden" id="water_type" value="<?=$type ?>">

	<div class="page-content space-top p-b80">
		<input type="hidden" name="type" value="<?=$type ?>" id="get_type">
		<div class="container">
			<h6 class="title border-bottom pb-2 mb-4">Search Date Wise</h6>

			<div class="mb-3">
				<label class="form-label" for="water_date">From Date</label>
				<input type="date" class="form-control" id="from_date" >
			</div>
			<div class="mb-3">
				<label class="form-label" for="water_date">To Date</label>
				<input type="date" class="form-control" id="to_date" >
			</div>


		</div>
		<div class="container pt-0">
			<a href="javascript:void(0);"  class="btn btn-primary w-100 enquiry-submit-btn">Save</a>
		</div>
	</div>

	<?php include('include/menu-bar.php'); ?>
</div>  

	<?php include('include/footer.php'); ?>


<script>

      $(document).on("click", ".enquiry-submit-btn",(function(e) {
        register();
      }));
      
      function register()
      {
        var type = $("#get_type").val();
        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();

        if(from_date=="")
        {
        	toast_print(0,"Select From Date");
        	return false;
        }
        if(to_date=="")
        {
        	toast_print(0,"Select To Date");
        	return false;
        }
        
      
        var form = new FormData();        
        form.append("type", type);
        form.append("from_date", from_date);
        form.append("to_date", to_date);

        var settings = {
          "url": "<?php echo base_url('welcome/client_search'); ?>",
          "dataType":"json",
          "method": "POST",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
          console.log(response);
          toast_print(0,response.message);
          window.location.href=response.url;
        });
      }
    </script>

