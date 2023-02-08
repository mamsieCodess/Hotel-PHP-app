<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Lexend+Giga:wght@400;600&family=Montserrat+Alternates&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./includes/css/styles.css">
  <script
      src="https://kit.fontawesome.com/648e6e8434.js"
      crossorigin="anonymous"
    ></script>

</head>

<body>
    <div class="header">
        <div class="logo-wrapper">
            <p><a href="index.php" class="logo">HOTEL LOBBY</a></p>
        </div>
        <div class="nav-bar">
            <div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#about-section">About</a></li>
                    <li><a href="#hotel-section">Hotels</a></li>
                    <li><a href="#contact-section">Contact</a></li>
                </ul>
            </div>
          
                <div style="margin-top:10px;" >
                <?php if (!isset($_SESSION['userId']) ):?>
                <a style="padding:15px;" href="includes/login.php" id="book-btn" >Login</a>
                <?php endif;?>

                <?php if (isset($_SESSION['userId']) ):?>
                    <a style="padding:15px;" href="includes/logout.php"id="book-btn" >Logout</a>
                    <?php endif;?>
                </div>
            <div></div>
        </div>
    </div>
