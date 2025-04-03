<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=website_name ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
	<meta name="theme-color" content="#FE4487">
	<meta name="author" content="<?=website_name ?>">
	<meta name="robots" content="index, follow"> 
	<meta name="keywords" content="<?=website_name ?>">
	<meta name="description" content="<?=website_name ?>">
	<meta property="og:title" content="<?=website_name ?>">
	<meta property="og:description" content="<?=website_name ?>">
	<meta property="og:image" content="social-image.png">
	<meta name="format-detection" content="telephone=no">
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&amp;family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
	<!-- css -->
	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url() ?>media/uploads/site_setting/<?=$site_setting[0]->logo ?>">
	
    <link href="<?=base_url() ?>assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url() ?>assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
	<link rel="stylesheet" href="<?=base_url() ?>assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" class="main-css" type="text/css" href="<?=base_url() ?>assets/css/style.css">

	<?php  
		$device_id = $this->input->get('device_id');
		if(empty($device_id)) $device_id = $this->session->userdata("device_id");
	?>
	
</head>   
<body>
<style>
	.toaster {
	  position: fixed;
	  top: 86%;
	  left: 50%;
	  transform: translate(-50%, -50%);
	  background-color: #850a0e;
	  border-radius: 10px;
	  padding: 10px 15px;
	  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
	  display: none;
	  color: white;
	}

	.toaster.success {
	  background-color: #850a0e;
	    color: #fff;
	    font-size: 16px;
	    width: max-content;
	    z-index: 9999;
	}
	.form-label {
	    font-size: 0.975rem;
	    font-weight: 600;
	    color: #000000;
	    margin-bottom: 5px;
	    font-family: var(--font-family-base);
	}

</style>
<div class="page-wrapper">
	<!-- Preloader -->
	<!-- <div id="preloader">
		<div class="loader">
			<div class="load-circle"><div></div><div></div></div>
		</div>
	</div> -->
    <!-- Preloader end-->