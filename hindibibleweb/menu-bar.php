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
 .menu-title {
            background-color: #3366cc; /* Blue */
            color: white;
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin: 15px auto;
        }

        .menu-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            max-width: 400px;
            margin: 0 auto;
        }

        .menu-btn {
            width: 140px;
            background: linear-gradient(to bottom, #ff9966, #cc3300); /* Orange Gradient */
            color: white;
            font-size: 16px;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .menu-btn:hover {
            background: linear-gradient(to bottom, #cc3300, #ff9966);
        }

        .inactive-btn {
            background: linear-gradient(to bottom, #d3d3d3, #a9a9a9); /* Gray Gradient */
            width: 140px;
            cursor: not-allowed;
        }

        .contact-btn {
            background: linear-gradient(to bottom, #66cc66, #339933); /* Green Gradient */
            color: white;
            font-size: 18px;
            padding: 12px;
            border: none;
            border-radius: 5px;
            margin-top: 15px;
            cursor: pointer;
        }

        .contact-btn:hover {
            background: linear-gradient(to bottom, #339933, #66cc66);
        }

</style>
   <div class="container-home">
        <header>
            <img src="img/logo.png" alt="Logo" class="logo">
        </header>

        <div class="home-button">
            <a href="index.php" class="yellow-btn">Home</a>
        </div>

        <div class="menu-title">MENU</div>

        <div class="menu-container">
            <a href="bible-study.php" class="menu-btn">Bible Study</a>
            <a class="menu-btn">Books</a>
            <a class="menu-btn">Videos</a>
            <a class="menu-btn">Audios</a>
            <a class="menu-btn">Literature</a>
            <a class="menu-btn">Imp. Info.</a>
            <a class="menu-btn">TGC Photos</a>
            <a class="menu-btn">Children Bible School (CBS)</a>
            <a class="menu-btn">DEVOTION</a>
            <a class="inactive-btn"> </a>
        </div>

        <button class="contact-btn">Contact Us</button>



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