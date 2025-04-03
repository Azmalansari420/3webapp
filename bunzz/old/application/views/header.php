<?php 
$search = $this->input->get('search');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?=website_name ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="<?=website_name ?>" name="keywords">
  <meta content="<?=website_name ?>" name="description">
  <link rel="icon" href="img/bunzz-logo-fnl.png" type="image/png" />
  <link rel="shortcut icon" href="img/bunzz-logo-fnl.png">
  <link href="https://db.onlinewebfonts.com/c/450fdebcd9b47d4e245c0272405e0cf2?family=MarkOT-Medium" rel="stylesheet">
  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <!-- Libraries Stylesheet -->
  <link href="<?=base_url() ?>lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="<?=base_url() ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="<?=base_url() ?>css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
  <!-- Template Stylesheet -->
  <link href="<?=base_url() ?>css/style.css" rel="stylesheet">
  
  
  <style>
      
     #product-carda-1,#product-carda-3 {
    filter: blur(3px);
}
  .vision{
   background-color: #efdbdb !important;
    box-shadow: 0px 1px 16px -7px #0000006b;
}
.vision h2 {
  
    color: #000 !important;

}
.our-mission {
    background: #e1c3c3 !important;
    width: 100%;
    height: auto;
}
.vision p {
   
    color: #000 !important;
    font-weight: 500 !important;
}

.bg-img{
    position: relative !important;
}

@media only screen and (max-width: 600px) {
  .vision {
      height: auto !important;
    width: auto !important; 
  }
  
  footer .footer-links {

  margin: 40px 0 10px !important;
}
.social-footer .icons-footer {
  
    top: 74px !important;
  }
  .slide-avatar img{
      width: 116px !important;
  }
}
  </style>

</head>

<body>

  <!-- Spinner Start -->
  <!-- <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div> -->
  <!-- Spinner End -->


  <!-- Navbar start -->
  <div class="fix-header">
    
    <div class="container px-4">
      <nav class="navbar navbar-light navbar-expand-xl">
        <a href="<?=base_url() ?>" class="navbar-brand"><img src="<?=base_url() ?>img/logo.gif" width="150px" alt="Logo"></a>



        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarCollapse">
          <span class="fa fa-bars text-primary"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarCollapse">
          <div class="navbar-nav">
            <a href="<?=base_url() ?>" class="nav-item nav-link">Home</a>

            <div class="nav-item dropdown dropdown-hover position-static">

              <a data-mdb-dropdown-init class="nav-link dropdown-toggle" href="./product" id="navbarDropdown"
                role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                Products
              </a>
              <!-- Dropdown menu -->
              <div class="dropdown-menu w-60 p-0 m-0" aria-labelledby="navbarDropdown" style="border-top-left-radius: 0;border-top-right-radius: 0;">

                <div class="container">
                  <div class="row justify-content-center">

                    <?php
                    $category = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));
                    foreach($category as $data)
                      { ?>
                    <div class="col-md-6 col-lg-4 mb-3 mb-lg-0 p-0 d-flex justify-content-center">
                      <div class="product-carda swiper-slide"id="product-carda-<?=$data->id?>" data-aos="fade-up" data-aos-delay="100">
                          <a href="product-list?id=<?=$data->id ?>">
                            <div class="image-container">
                              <img src="<?=base_url() ?>media/uploads/categories/<?=$data->image ?>" alt="<?=$data->name ?>" class="main-image">
                              <img src="<?=base_url() ?>media/uploads/categories/<?=$data->image ?>" alt="<?=$data->name ?>" class="hover-image">

                            </div>
                        <div class="bottom pt-2 text-center">
                          <h6 class="m-0"><a href="product-list"><?=$data->name ?></a> </h6>


                        </div>
                        </a>
                      </div>
                    </div>
                  <?php } ?>



                  </div>
                </div>
              </div>


            </div>
          </div>
          <a href="<?=base_url() ?>gallery" class="nav-item nav-link">Gallery</a>
          <a href="<?=base_url() ?>about-us" class="nav-item nav-link">About Us</a>
          <a href="<?=base_url() ?>our-process" class="nav-item nav-link">Our Process</a>
          <!-- <a href="<?=base_url() ?>blog-list" class="nav-item nav-link">Our Stories</a> -->
          <a href="<?=base_url() ?>contact" class="nav-item nav-link">Contact Us</a>



          <div class="d-flex" style="margin: 0 0 0 auto;">
            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
              data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
          </div>
        </div>

    </div>
    </nav>
  </div>
  </div>
  <!-- Navbar End -->


  <!-- Modal Search Start -->
  <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex align-items-center">
          <form class="input-group w-75 mx-auto d-flex" action="<?=base_url('welcome/serch') ?>">
            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1" name="search" value="<?php if(!empty($search)) echo $search ?>">
            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Search End -->