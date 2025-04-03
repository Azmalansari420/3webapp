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

.login-container {
            width: 350px;
            background-color: #3b5998; /* Blue */
            padding: 20px;
            margin: 50px auto;
            border-radius: 10px;
            color: white;
        }

        .input-box {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
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
            width: 18px;
            margin-right: 5px;
        }

        .green-btn {
            width: 100%;
            background: linear-gradient(to bottom, #66cc66, #339933); /* Green Gradient */
            color: white;
            font-size: 14px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px 0;
        }

        .orange-btn {
            width: 100%;
            background: linear-gradient(to bottom, #ff9966, #cc3300); /* Orange Gradient */
            color: white;
            font-size: 14px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px 0;
        }

        .login-btn {
            width: 200px;
            background: linear-gradient(to bottom, #ff9966, #cc3300);
            color: white;
            font-size: 16px;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
        }



.container-home {
    text-align: center;
}

.modal {
    display: none; 
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    text-align: center;
    position: relative;
}

.close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    cursor: pointer;
}

.modal p {
    font-size: 18px;
    color: #333;
    margin: 15px 0;
}
</style>
   <div class="container-home">
        <header>
            <img src="img/logo.png" alt="Logo" class="logo">
        </header>

        <div class="home-button">
            <a href="index.php" class="yellow-btn">Home</a>
        </div>

        <div class="login-container">
            <h3>USERNAME</h3>
            <input type="text" class="input-box" placeholder="Enter Username">

            <h3>PASSWORD</h3>
            <input type="password" class="input-box" placeholder="Enter Password" id="password">

            <div class="show-password" onclick="togglePassword()">
                <img src="https://img.icons8.com/ios-filled/50/000000/visible.png"/>
                <span>Show Password</span>
            </div>

            <button class="green-btn">CHANGE USERNAME - PASSWORD</button>
            <button class="orange-btn">Forgot Username / Password</button>
        </div>

        <button class="login-btn" onclick="openModal()">LOG IN</button>



    </div>

<?php include('include/footer.php'); ?>

<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p>Login Successful!</p>
        <button class="green-btn" onclick="closeModal()">OK</button>
    </div>
</div>
      
     
<script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }


        // Open Modal
function openModal() {
    document.getElementById("loginModal").style.display = "flex";
}

// Close Modal
function closeModal() {
    document.getElementById("loginModal").style.display = "none";
}
    </script>