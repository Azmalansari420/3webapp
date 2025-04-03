<?php
	session_start();
    $session_admin  =  @$_SESSION['session_admin']; 
	if(isset($session_admin)){
		echo "<script>location.href='welcome.php';</script>";
	}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Panel</title> 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="assets/login_bg.css">
  
  <!-- Ionicons -->            
         
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="../assets/css/animate.css">
</head>

<body>

<body> 
	<div class="container"> 
		<div class="row">
		<h2 class="user_title">Admin Login Panel</h2>
		
			<div class="col-sm-4 col-sm-offset-4 login_bg">
				<form action="" method="POST" id="form_submit">
				<div class="form-group">
					<input type="text" placeholder="User Email or Name" name="login_user_name" id="login_user_name" class="form-control">
					<input type="hidden" value="" id="hidden_email"/>
				</div>
				<div class="form-group">
				    <input type="password" placeholder="User Password"  name="login_user_password" id="login_user_password" class="form-control">
				</div> 
				<div class="form-group">
				<input type="submit" name="login_btn" id="login_btn" class="btn btn-block login_btn" value="Submit"/>
			</div>
				</form>
			</div>
		</div>
	</div>
 
 
 

<!-- jQuery 3 -->
<script src="assets/jquery.js"></script>
<script src="assets/bootstrap/css/js/bootstrap.min.js"></script>
<script src="assets/login_js.js" type="text/javascript"></script>

</body>
</html>
