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


.notification-box {
            width: 350px;
            background-color: #3366cc; /* Blue */
            padding: 20px;
            border-radius: 10px;
            margin: 50px auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            color: white;
        }

        .notification-box p {
            font-size: 16px;
            margin: 10px 0;
        }

        .highlight {
            color: yellow;
            font-weight: bold;
        }

        .ok-btn {
            background: linear-gradient(to bottom, #ff9966, #cc3300); /* Orange Gradient */
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 15px;
            transition: 0.3s;
        }

        .ok-btn:hover {
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

        <form class="notification-box" action="menu-bar.php">
            <p>YOUR FREE TRIAL WILL EXPIRE <br> BY <span class="highlight">20:41</span> TOMORROW</p>
            <p>आपका फ्री ट्रायल कल <span class="highlight">20:41</span> को समाप्त हो जाएगा</p>
            <button class="ok-btn">OK</button>
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