<!DOCTYPE html>
<html lang="en">
<head>
      <title>Login</title>
      <?php $this->load->view('admin/include/allcss'); ?>
      
   </head>
   <body class='pace-top'>
      <div id="snackbar"><?php echo $this->session->flashdata('message'); ?></div>
     <?php if($this->session->flashdata('message')){ ?>
       <script>
         function myFunction() {
           var x = document.getElementById("snackbar");
           x.className = "show";
           setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
         }
         myFunction();
         </script>
  
   <?php } ?>
      <!-- <div id="loader" class="app-loader">
         <span class="spinner"></span>
      </div> -->
      <div id="app" class="app">
         <div class="login login-v1">
            <div class="login-container">
               <div class="login-header">
                  <div class="brand">
                     <div class="d-flex align-items-center">
                        <span class="logo"></span> <b>Create</b>Password
                     </div>
                     <!-- <small><?php echo $this->session->flashdata('message'); ?></small> -->
                  </div>
                  <div class="icon">
                     <i class="fa fa-lock"></i>
                  </div>
               </div>
               <div class="login-body">
                  <div class="login-content fs-13px">
                     <form action="<?=base_url('Admin/create_password?hash_key='.$hash_key) ?>" method="post">
                        <div class="form-floating mb-20px">
                           <input type="password" class="form-control fs-13px h-45px" id="password" placeholder="Password" name="password" required />
                           <label for="password" class="d-flex align-items-center py-0">Password</label>
                        </div>
                    
                        <div class="login-buttons">
                           <button type="submit" name="submit" class="btn h-45px btn-success d-block w-100 btn-lg">Submit</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      
      </div>


     <?php $this->load->view('admin/include/footer'); ?>
   </body>
   </html>