<?php
$sitesetting = $this->crud->fetchdatabyid('1','site_setting');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=website_name ?></title>
<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
	<meta name="theme-color" content="#283890">
	<meta name="author" content="<?=website_name ?>">
	<meta name="robots" content="index, follow"> 
	<meta name="keywords" content="<?=website_name ?>">
	<meta name="description" content="<?=website_name ?>">
	<meta property="og:title" content="<?=website_name ?>">
	<meta property="og:description" content="<?=website_name ?>">
	<meta property="og:image" content="<?=website_name ?>">
	<meta name="format-detection" content="telephone=no">

	<!-- Favicons Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>">
	
	<!-- PWA Version -->
	<link rel="manifest" href="<?=base_url() ?>assets/manifest.json">
    
    <!-- Global CSS -->
	<link href="<?=base_url() ?>assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url() ?>assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
	<link rel="stylesheet" href="<?=base_url() ?>assets/vendor/swiper/swiper-bundle.min.css">
    
	<!-- Stylesheets -->
    <link rel="stylesheet" class="main-css" type="text/css" href="<?=base_url() ?>assets/css/style.css">
	
    <!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&amp;family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
</head>   
<style>
	.dz-media>img {
	    padding: 10px;
	}
</style>