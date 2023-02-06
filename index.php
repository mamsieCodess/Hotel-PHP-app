<?php
include "includes/header.php";

session_start();

/*if there is no session variable storing the email data, then redirect the user to
the login page*/
/*if (!isset($_SESSION['email'])) {
    header('location:login.php');
}*/
//if the email is set and found, then include these the database and the hotel class file
include "./model/hotel.php";
include "./includes/config/db.php";

/*then create and make a query hotels table in the database and after the results are found
 make an associative array of all the rows of data found on the table using the function of the
 results object called fecth_all() */
$sql = "SELECT `*` FROM `hotels` ";
$result = mysqli_query($conn, $sql);
$hotels = $result->fetch_all(MYSQLI_BOTH);
?>
<section class="home-hero">
    <div class="hero-background">
        <img src="./includes/images/manuel-moreno-DGa0LQ0yDPc-unsplash.jpg" />
        <p class="hero-heading">Book your next hotel with us ...</p>
    </div>
    <div class="hero-btns">
        <form action="index.php">
            <input type="submit" href="#" value="Read More" id="about-btn" />
            <input type="submit" href="#" value="Contact Us" id="contact-btn" />
        </form>
    </div>
</section>
<section class="hotel-section" id="hotel-section">
    <div class="capetown-section">
        <div class="section-heading-wrapper">
            <p class="section-subheading">Hotels in Cape Town</p>
        </div>

        <div class="hotel-products">
            <?php
            $_SESSION['hotels'] = [];
            foreach ($hotels as $hotel) {
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
                array_push($_SESSION['hotels'], $newHotel);
            }

            foreach ($_SESSION['hotels'] as $hotel) : ?>
                <div class="hotel-product">
                    <img src="<?php echo $hotel->getThumbnail() ?>">
                    <p class="product-name"><?php echo $hotel->getName() ?></p>
                    <p class="product-description"><?php echo $hotel->getDescription() ?></p>
                    <div class="overlay">
                        <div class="text">
                            <h2><?php echo $hotel->getLocation() ?></h2>
                            <h4><?php echo $hotel->getDescription() ?></h4>
                            <div>
                                <p>Popular amenities:</p>
                                <ul class="amenities">

                                    <?php foreach (explode(',', $hotel->getamenities()) as $amenity) : ?>
                                        <li> <?php echo $amenity; ?> </li>
                                    <?php endforeach; ?>
                                </ul>

                                <p class="overlay-price"> <?php echo $hotel->getdaily_rate() ?> <span>pppn</span></p>
                                <div class="overlay-btn">
                                    <form action="homepage.php">
                                        <button class="overlay-view-btn" id="view-button"><a href="views/viewing.php?id=<?php echo htmlspecialchars($hotel->getId()) ?>">View</a></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            <?php endforeach; ?>


</section>
<section class="about-section" id="about">
    <div class="section-heading-wrapper">
        <p class="section-heading">
            About <a href="index.php" class="logo">HOTEL LOBBY</a>
        </p>
    </div>
    <div class="about-page" id="about-section">
        <div id="team">
            <div>
                <h6>Amancio Ortega <span>founder</span></h6>
                <img src="https://assets.entrepreneur.com/content/3x2/2000/20190215114938-Funding-African-american-business-woman.jpeg?format=pjeg&auto=webp&crop=16:9&width=675&height=380" alt="" />
            </div>
            <div>
                <h6>Rosalia Mera <span>co-founder</span></h6>
                <img src="https://media.gettyimages.com/id/831902150/photo/ive-solidified-my-name-in-the-business-world.jpg?s=2048x2048&w=gi&k=20&c=zajbxqgcyLEhKdhwwHo0bHIcsyP0WEEefTsZnxSfe14=" alt="" />
            </div>
        </div>
        <div id="mission_vision">
            <h2>MISSION AND VISION STATEMENT</h2>
            <p>
                Hotel Lobby declares in the first part of its mission statement that
                it intends to give customers what they want, and Slay Dragons
                definitely means it. Other high fashion brands do not really make an
                effort to identify the preferences of the target market. This has
                actually been the culture in high fashion for decades. The designers
                simply come up with apparel that matches their own tastes and styles
                and expect that people will buy it simply because it is high
                fashion. The approach of Hotel Looby is exactly the opposite. While
                Hotel Lobby does have a strong team of designers with impeccable
                talent, it also listens carefully to what the customers want. Slay
                Dragons has a very interactive social media presence, and it
                utilizes this to reach out to its client base, communicating with it
                to get a feel of what the market is going to buy. Even in physical
                stores, Slay Dragons staff take note of what customers like and do
                not like. The information is relayed to the design team, who makes
                sure that the client's requests and suggestions are incorporated
                into the brand's next collections.
            </p>
            <h2>BUSINESS BRIEF</h2>
            <p>
                Hotel Lobby is one of the largest international hotel companies. It
                belongs to Inditex, one of the world's largest distribution groups.
                The customer is at the heart of our unique business model, which
                includes design, production, distribution and sales through our
                extensive retail network. For more information, please visit the
                Inditex Group website: www.inditex.com
            </p>
        </div>
    </div>
</section>
<section class="services">
    <!--services found on in the hotels-->
    <div class="section-heading-wrapper">
        <p class="section-heading">Popular services</p>
    </div>
    <div class="services-wrapper">
        <ul class="services-list">
            <li>
                <i class="fa-solid fa-jug-detergent"></i><span>
                    <p>Laundry Services</p>
                </span>
            </li>
            <li>
                <i class="fa-solid fa-wifi"></i><span>
                    <p>Free Wifi</p>
                </span>
            </li>
            <li>
                <i class="fa-solid fa-square-parking"></i>
                <span>
                    <p>Parking Area</p>
                </span>
            </li>
            <li>
                <i class="fa-solid fa-utensils"></i><span>
                    <p>Restuarant</p>
                </span>
            </li>
            <li>
                <i class="fa-solid fa-umbrella-beach"></i><span>
                    <p>Private Beach</p>
                </span>
            </li>
            <li>
                <i class="fa-solid fa-display"></i><span>
                    <p>TV</p>
                </span>
            </li>
        </ul>
    </div>
</section>
<section class="contact-section" id="contact-section">
    <div class="section-heading-wrapper">
        <p class="section-heading">For enquiries</p>
    </div>
    <div class="contact-container">
        <div></div>
        <div class="contact-form">
            <form>
                <label for="name">Name<span>*</span></label><br />
                <input type="text" required /><br />
                <label for="name">Email<span>*</span></label><br />
                <input type="email" name="email" required /><br />
                <label for="message">Message<span>*</span></label><br />
                <textarea name="message" id="" cols="30" rows="10" required></textarea>
                <input type="submit" value="SEND" id="enquiries-btn" />
            </form>
        </div>
    </div>
</section>
<?php include "includes/footer.php"; ?>