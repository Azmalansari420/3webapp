<?php
$user = getuserdata();

 include('include/header.php'); ?>
 
<body>
<div class="page-wrapper">
    
	<!-- Preloader -->
			<?php include('include/loader.php'); ?>

    <!-- Preloader end-->
<style>
	.page-content.space-top {
	    padding-bottom: 75px;
	}
	.form-label {
	 color: black;
	}
</style>
	
	<!-- Header -->
		<header class="header header-fixed">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="back-btn">
							<i class="icon feather icon-chevron-left"></i>
						</a>
						<h6 class="title">Plant Information</h6>
					</div>
					<div class="mid-content">
					</div>
					<div class="right-content">
					</div>
				</div>
			</div>
		</header>
	<!-- Header -->

	
	<!-- Page Content Start -->
	<div class="page-content space-top">

		<div class="container">
			<div class="mb-3">
				<label class="form-label" for="name">Name</label>
				<input type="text" id="client_name" class="form-control" value="<?=$user[0]->client_name ?>" >
			</div>
			<div class="mb-3">
				<label class="form-label" for="location">Location</label>
				<input type="text" id="location" class="form-control"value="<?=$user[0]->location ?>"  >
			</div>
			<div class="mb-3">
				<label class="form-label" for="plant_capacity">Plant capacity</label>
				<input type="tel" id="plant_capacity" class="form-control"  value="<?=$user[0]->plant_capacity ?>" >
			</div>
			
			
			<div class="mb-3">
				<label class="form-label" for="address">Operator name </label>
			</div>
			<div class="d-flex align-items-center " style="justify-content: space-between;">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="radioNoLabel" id="opratername" value="1" aria-label="..." <?php if($user[0]->opratername==1) echo 'checked'; ?>>
					Shift A
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="radioNoLabel" id="opratername" value="2" aria-label="..." <?php if($user[0]->opratername==2) echo 'checked'; ?>>
					Shift B
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="radioNoLabel" id="opratername" value="3" aria-label="..." <?php if($user[0]->opratername==3) echo 'checked'; ?>>
					Shift C
				</div>
			</div>
		</div>
		
	</div>
	<!-- Page Content End -->


	<!-- Footer Start -->
	<div class="footer fixed">
		<div class="container">
			<a href="#!" class="btn btn-primary w-100 submit-btn">Save</a>
		</div>
	</div>
	<!-- Footer End -->
</div> 

<?php include('include/footer.php'); ?>


<script>
  $(document).on("click", ".submit-btn",(function(e) {
      plant_info();
    }));


   function plant_info()
   {
    var client_name = $("#client_name").val();
    var location = $("#location").val();
    var plant_capacity = $("#plant_capacity").val();
    var opratername = $("#opratername:checked").val();

    if(client_name=='')
    {
      toast_print(0,'Please Enter Your Name..');
      return false;
    }

    if(location=='')
    {
      toast_print(0,'Please Enter Your Location..');
      return false;
    }
    
    if(plant_capacity=='')
    {
      toast_print(0,"Please Enter Your Plant Capacity..");
      return false;
    }
    

    $(".loader-wrapper").addClass("show");


    var form = new FormData();
    form.append("client_name", client_name);
    form.append("location", location);
    form.append("plant_capacity", plant_capacity);
    form.append("opratername", opratername);

    var settings = {
      "url": "<?php echo base_url('api/user/plant_info'); ?>",
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
      if(response.status==200)
      {
        window.location.href=response.url;
      }
        $(".loader-wrapper").removeClass('show');
        toast_print(0,response.message);
    });
   }
 </script>
