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
    padding: 5px 20px;
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
                margin-bottom: 35px;
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
            width: 54%;
		    background: linear-gradient(to bottom, #ff9966, #cc3300);
		    color: white;
		    font-size: 16px;
		    padding: 12px;
		    border: none;
		    border-radius: 5px;
		    cursor: pointer;
		    margin-bottom: 16px;
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

        <div class="home-button" style="display: flex;justify-content: space-evenly;">
            <a href="index.php" class="yellow-btn" style="background: blue;color: white;">Menu</a>
            <a href="index.php" class="yellow-btn" style="background: red;color: white;">Logout</a>
        </div>

        <div class="menu-title" style="background: linear-gradient(to bottom, #66cc66, #339933);">Bible Study</div>


        <div class="menu-container">
            <a class="menu-btn">Bible Books</a>
            <a class="menu-btn">Bible Subjects</a>
            <a class="menu-btn">Bible Reading</a>
            <a class="menu-btn">Bible Drama</a>
           
        </div>

     
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