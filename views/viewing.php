<?php
session_start();

include "/MAMP/htdocs/Hotel-PHP-app/model/hotel.php";

/*if there is no post varibale storing the id data, to to the database and get a row of data 
where it's id matches this id of the object from the previous page*/
if (isset($_GET['id'])) {
  $_SESSION['bookedHotel'] = [];
  include "/MAMP/htdocs/Hotel-PHP-app/includes/config/db.php";
  $id = mysqli_escape_string($conn, $_GET['id']);
  $sql = "SELECT `hotel_id`, `name`, `location`, `amenities`, `daily_rate`, `thumbnail`, `images`, `hotel_description`, `refund_avaialbility` FROM `hotels` WHERE `hotel_id` = $id";

  $result = mysqli_query($conn, $sql);
  $hotel = $result->fetch_assoc(); //an associative array of a row returend from the database that can be used


  $newHotel = new Hotel(
    $hotel['hotel_id'],
    $hotel['name'],
    $hotel['location'],
    $hotel['amenities'],
    $hotel['daily_rate'],
    $hotel['thumbnail'],
    $hotel['images'],
    $hotel['hotel_description'],
    $hotel['refund_avaialbility']
  );
  array_push($_SESSION['bookedHotel'], $newHotel);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Viewing Page</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Lexend+Giga:wght@400;600&family=Montserrat+Alternates&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../includes/css/styles.css">
  <style>
   
    .reservation-btn a{
    width: 150px;
    border: none;
    font-size: 18px;
    text-align: center;
    font-weight: 900;
    color: white;
    float:left;
    padding: 18px;
    text-decoration: none;
    background-color: #ff1e00;
    margin-bottom: 50px;
  }
  
  .reservation-btn a:hover{
    border: 3px solid white;
    cursor: pointer;
  }
  </style>

</head>

<body>
  <?php include "/MAMP/htdocs/Hotel-PHP-app/includes/header.php"; ?>

  <h2 style="text-align: center;">Your hotel of choice:</h2>

  <div class="viewing-section">
    <img src="<?php echo $newHotel->getThumbnail() ?>">
    <div class="viewing-information">
      <p class="section-heading"><?php echo $newHotel->getName(); ?></p>
      <p class="viewing-description"><?php echo $newHotel->getDescription(); ?></< /p>
      <p class="viewing-refund"><?php echo $newHotel->displayRefundability(); ?></p>
      <div>
        <p class="section-subheading">Amenities:</p>
        <ul class="amenities">
          <?php foreach (explode(',', $newHotel->getamenities()) as $amenity) : ?>
            <li>
              <span>
                <p><?php echo $amenity; ?></p>
              </span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>


    <?php
    //store data form this page in session variables so that it can be accessed on the next page
    $_SESSION['startDate'] = $_POST['startDate'];
    $_SESSION['endDate'] = $_POST['endDate'];

    //if the submit button is clicked, then perform this code
    if (array_key_exists('submit', $_POST)) {
      $calculate =  $newHotel->calculateDays($_SESSION['startDate'], $_SESSION['endDate']);
      $amount = $newHotel->getdaily_rate() * $calculate;
      $_SESSION['amount-due'] = $amount;
    }
    ?>
    <div class="resevation-btn-row">
      <form action="" method="POST" style="text-align: center" id="calculator-form">
        <label>Check-in:</label>
        <input type="date" name="startDate" required />
        <label>Check-out:</label>
        <input type="date" name="endDate" required />
        <h4>Total amount due is: R <?php echo $newHotel->getdaily_rate() * $calculate . ' for ' . $calculate . ' nights' ?> </h4>
        <input type="submit" id="calculate-button" value="Calculate" name="submit" />
      </form>

      <div class="reservation-btn">
        <a href="booking.php?id=<?php echo htmlspecialchars($newHotel->getId()) ?>">Book</a>
      </div>



      </form>
    </div>
  </div>

</body>

</html>