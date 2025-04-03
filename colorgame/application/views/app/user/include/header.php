
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=website_name ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="<?=website_name ?>">
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="<?=website_name ?>">   
	<meta name="description" content="<?=website_name ?>">
	<meta property="og:title" content="<?=website_name ?>">
	<meta property="og:description" content="<?=website_name ?>">
	<meta property="og:image" content="<?=base_url() ?>media/uploads/site_setting/<?=$site_setting[0]->logo ?>">
	<meta name="format-detection" content="telephone=no">
	<meta name="twitter:title" content="<?=website_name ?>">
	<meta name="twitter:description" content="<?=website_name ?>">
	<meta name="twitter:image" content="<?=base_url() ?>media/uploads/site_setting/<?=$site_setting[0]->logo ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url() ?>media/uploads/site_setting/<?=$site_setting[0]->logo ?>">
	<link href="<?=base_url() ?>assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url() ?>assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
	<link rel="stylesheet" href="<?=base_url() ?>assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url() ?>assets/css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=McLaren&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url() ?>assets/css/custom.css">
</head>
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
</style>


<body class="theme-dark">
<div class="page-wrapper">
    
	<!-- Preloader -->
	<!-- <div id="preloader">
		<div class="loader">
			<div class="spinner-border text-primary" role="status">
				<span class="visually-hidden">Loading...</span>
			</div>
		</div>
	</div> -->
    <!-- Preloader end-->

