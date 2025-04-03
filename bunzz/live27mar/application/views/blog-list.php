<?php include 'header.php'; ?>

<div class="container rounded fruite py-5">
    <div class=" bg-light p-5">
        <h1 class="mb-4 text-start text-ctm text-dark ">Our Stories</h1>
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-xl-12">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords"
                                aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <div class="col-6"></div>

                </div>
                <div class="row g-4">

                    <div class="col-lg-12">
                        <div class="row g-4 justify-content-center">
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="rounded position-relative fruite-item border border-secondary">
                                    <div class="fruite-img">
                                        <img src="<?=base_url() ?>img/namkin-removebg-preview.png" width="200px"
                                            class="img-fluid rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">Namkeen</div>
                                    <div class="p-4 about-content  rounded-bottom">
                                        <h4 class="text-dark">Namkeen</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                            incididunt</p>
                                        <div class="d-flex justify-content-start flex-lg-wrap">

                                            <a href="<?=base_url() ?>blog-detail.php"
                                                class="btn border border-secondary rounded-pill px-3 text-primary">
                                                Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="rounded position-relative fruite-item border border-secondary">
                                    <div class="fruite-img">
                                        <img src="<?=base_url() ?>img/daiet-removebg-preview.png" width="200px"
                                            class="img-fluid rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">All Season</div>
                                    <div class="p-4 about-content  rounded-bottom">
                                        <h4 class="text-dark">All Season</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                            incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">

                                            <a href="<?=base_url() ?>blog-detail.php"
                                                class="btn border border-secondary rounded-pill px-3 text-primary">
                                                Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="rounded position-relative fruite-item border border-secondary">
                                    <div class="fruite-img">
                                        <img src="<?=base_url() ?>img/peanut-removebg-preview.png" width="200px"
                                            class="img-fluid rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">Nut Cracker</div>
                                    <div class="p-4 about-content rounded-bottom">
                                        <h4 class="text-dark">Nut Cracker</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                            incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">

                                            <a href="<?=base_url() ?>blog-detail.php"
                                                class="btn border border-secondary rounded-pill px-3 text-primary">
                                                Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="pagination d-flex justify-content-center mt-5">
                                    <a href="#" class="rounded">&laquo;</a>
                                    <a href="#" class="active rounded">1</a>
                                    <a href="#" class="rounded">2</a>
                                    <a href="#" class="rounded">3</a>
                                    <a href="#" class="rounded">4</a>
                                    <a href="#" class="rounded">5</a>
                                    <a href="#" class="rounded">6</a>
                                    <a href="#" class="rounded">&raquo;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End-->

<?php include 'footer.php'; ?>