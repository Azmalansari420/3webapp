
<!DOCTYPE html>
<html lang="en">

<?php include('include/allcss.php'); ?>
<style>


h1, a{
  margin: 0;
  padding: 0;
  text-decoration: none;
}

.section{
  padding: 4rem 2rem;
}

.section .error{
  font-size: 45px;
    color: black;
    line-height: 1;
    background: white;
    text-align: center;
    padding: 15px 0;
    border-radius: 10px;  
}

.page{
  margin: 5rem 0 2rem 0;
  font-size: 20px;
  font-weight: 600;
  color: #444;
}

.back-home{
  display: inline-block;
  border: 2px solid #222;
  color: #222;
  text-transform: uppercase;
  font-weight: 600;
  padding: 0.75rem 1rem 0.6rem;
  transition: all 0.2s linear;
  box-shadow: 0 3px 8px rgba(0,0,0, 0.3);
}
.back-home:hover{
  background: #222;
  color: #ddd;
}
</style>

<body class="body-bg">
         <!-- preloade -->
        <?php include('include/loader.php'); ?>

        <!-- /preload -->

    <div class="header">
        <div class="title-header-bar fixed-top bg-white">
            <a href="#" class="back-btn"><i class="icon-left"></i></a>
            <h1>Comming Soon</h1>
            <span class="btn-sidebar">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 7H21" stroke="#033f38" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M3 12H21" stroke="#033f38" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M3 17H21" stroke="#033f38" stroke-width="1.5" stroke-linecap="round"></path>
                </svg>
            </span>
        </div>
    </div>
    <div class="app pt-60 pb-70">
        <div class="tf-container">
            
            
            
          <div class="section">
            <h1 class="error">COMMING SOON</h1>
          </div>




        </div>
   </div>


       


</body>

<?php include('include/allscript.php'); ?>
</html>


