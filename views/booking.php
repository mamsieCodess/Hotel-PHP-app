<?php
session_start();

include "../model/booking.php";
if(!isset($_SESSION['userId'])){
    header('location:.././includes/login.php');
    exit;
}else{

/*if there is no post varibale storing the id data, to to the database and get a row of data 
where it's id matches this id of the object from the previous page*/
if (isset($_GET['id'])) {

    include "../includes/config/db.php";
    $id = mysqli_escape_string($conn, $_GET['id']);
    $sql = "SELECT `hotel_id`, `name`, `location`, `amenities`, `daily_rate`, `thumbnail`, `images`, `hotel_description`, `refund_avaialbility` FROM `hotels` WHERE `hotel_id` = $id";
    $result = $conn->query($sql);
    $hotel = $result->fetch_assoc(); //this the associative array that we can use
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="stylesheet" href="../includes/css/styles.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color:  #ff1e002e;
        }

        .receipt-container {
            width:50%;
            height: 400px;
            margin: 50px auto;
            background-color: white;
            padding: 15px;
            text-align: center;

        }
        .heading-container{
            font-weight: 900;
            font-size: 25px;
            font-family: "Lexend Giga", sans-serif;
        }
        .receipt-container p{
            font-size: 20px;
        }
        .receipt-container span{
            color: #ff1e00;
            font-weight: 700;
            font-family: "Lexend Giga", sans-serif;

        }
        .alert{
            color:black;

        }

    </style>
</head>

<body>
<?php include "../includes/header.php";?>

<div class="alert">
        <?php
        //this for creating the booking
        //assigning session variables to variables then making a booking

        $checkIn = $_SESSION['startDate'];
        $checkOut = $_SESSION['endDate'];
        $customerId = 'cus00' . $_SESSION['firstname'];
        $hotelId = $_GET['id'];
        $totalCost = $_SESSION['amount-due'];

        $newBooking = new Booking($customerId, $hotelId, $checkIn, $checkOut);
        //then using then booking object to insert the data in the database

        $customerId = $newBooking->getCustomerId();
        $hotelId = $newBooking->getHotelId();
        $checkIn = $newBooking->getCheckinDate();
        $checkOut = $newBooking->getCheckoutDate();

        include "./includes/config/db.php";

     //firstly check if the booking exists
     $sql = "SELECT `*` FROM `bookings` WHERE `customer_id` = ' $customerId'";
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
         echo "You have already booked";
     } else {
        $sql = "INSERT INTO `bookings`(`customer_id`, `hotel_id`, `check_in`, `check_out`,`amount_due`) VALUES ($customerId,$hotelId,$checkIn,$checkOut,$totalCost)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'Your hotel has been booked.';
    }
}
        ?>

    </div>

    <h2 style="text-align: center; margin-top:50px">This is your booking confirmation: <?php echo $_SESSION['firstname'];?></h2>

    <div class="receipt-container">
        <h3 class="heading-container">Receipt:</h3>

        <p>This is to confirm that <strong><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname'];?></strong> <?php echo ' has a booking at the <span>' . $hotel['name'] .'</span>'?> </p>

        <p><?php echo $newBooking->getCheckinDate().' until '.$newBooking->getCheckoutDate()?></p>
        <p>Reference: <strong> <?php echo  $newBooking->getCustomerId();?></strong></p>
        <p>Use it as your reference for any inquries</p>
        

    </div>

</body>

</html>
    
</body>
</html>
    
</body>
</html>