<?php include "includes/nav-items.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL LOBBY</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Lexend+Giga:wght@400;600&family=Montserrat+Alternates&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./includes/css/styles.css">
</head>

<body>
    <div class="header">
        <div class="logo-wrapper">
            <p><a href="index.php" class="logo">HOTEL LOBBY</a></p>
        </div>
        <div class="nav-bar">
            <div>
                 <?php include "includes/nav.php";?>
            </div>
            <form action="index.php" method="post">
                <div>
                    <input type="submit" value="BOOK NOW" id="book-btn" />
                </div>
            </form>
            <div></div>
        </div>
    </div>