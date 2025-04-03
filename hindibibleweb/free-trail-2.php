<?php include('include/header.php'); ?>
<style type="text/css">


.home-button {
    margin: 10px 0;
    text-align: center;
}

.yellow-btn {
    background-color: #FFC107;
    color: #000;
    border: none;
    padding: 10px 20px;
    font-size: 14px;
    cursor: pointer;
    border-radius: 5px;
    font-weight: bold;
    text-decoration: none;
}

.form-container {
            width: 330px;
            background-color: #3366cc; /* Blue */
            padding: 30px;
            border-radius: 10px;
            margin: 50px auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }

        .form-container label {
            display: block;
            color: white;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .form-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .submit-btn {
            background: linear-gradient(to bottom, #ff9966, #cc3300); /* Orange Gradient */
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
            transition: 0.3s;
        }

        .submit-btn:hover {
            background: linear-gradient(to bottom, #cc3300, #ff9966);
        }

        .show-password {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1cff1c;
            font-weight: bold;
            cursor: pointer;
            font-size: 20px;
            margin-bottom: 10px;


        }

        .show-password img {
            width: 20px;
            margin-right: 5px;
        }

        .login-btn {
            background: linear-gradient(to bottom, #ff9966, #cc3300); /* Orange Gradient */
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: linear-gradient(to bottom, #cc3300, #ff9966);
        }




</style>
   <div class="container-home">
        <header>
            <img src="img/logo.png" alt="Logo" class="logo">
        </header>

        <div class="home-button">
            <a href="index.php" class="yellow-btn">Home</a>
        </div>

        <form class="form-container" action="free-trail-3.php">

            <h5 style="color:white;">CREATE ACCOUNT (अकाउंट बनाइये)</h5>

            <label for="username">USERNAME</label>
            <input type="text" id="username" placeholder="Enter your username">

            <label for="password">PASSWORD</label>
            <input type="password" id="password" placeholder="Enter your password">

            <div class="show-password" onclick="togglePassword()">
                👁️ <span>Show Password</span>
            </div>

            <button class="submit-btn">LOG IN</button>
        </form>



    </div>

<?php include('include/footer.php'); ?>
      
     
 <script>
        function togglePassword() {
            let passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>