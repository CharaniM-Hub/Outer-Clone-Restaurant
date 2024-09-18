<?php
include('Connection1.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have form fields like date and time in your reservation form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $roomtype = $_POST['roomtype'];
    $description = $_POST['description'];

    $sql = "INSERT INTO reservations (name, email, phone, date, time, roomtype, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        // Use "sssssss" because you have seven parameters
        mysqli_stmt_bind_param($stmt, "sssssss", $name, $email, $phone, $date, $time, $roomtype, $description);
    
        if (mysqli_stmt_execute($stmt)) {
            echo 'Reservation successful! Thank you!';
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
    
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }    

    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="shortcut icon" href="./Image/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./GlobalStyles.css">
    <link rel="stylesheet" href="./Components.css">
    <link rel="stylesheet" href="./Reservation.css">
    <!-- aos css -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
</head>
<body>
    <!-- Navigation -->
    <div class="nav">
        <div class="container">
            <div class="nav__wrapper">
                <a href="./Home.php" class="logo">
                    <img src="./Image/Logo0.png" alt="Logo">
                </a>
                <nav>
                    <div class="nav__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-menu">
                            <line x1="3" y1="12" x2="21" y2="12" />
                            <line x1="3" y1="6" x2="21" y2="6" />
                            <line x1="3" y1="18" x2="21" y2="18" />
                        </svg>
                    </div>
                    <div class="nav__bgOverlay"></div>
                    <ul class="nav__list">
                        <div class="nav__close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </div>
                        <div class="nev__list__wrapper">
                            <li><a href="./home.php" class="nev__list">Home</a></li>
                            <li><a href="./About.php" class="nev__list">About</a></li>
                            <li><a href="./Services.php" class="nev__list">Services</a></li>
                            <li><a href="./Menu.php" class="nev__list">Menu</a></li>
                            <li><a href="./Reservation.php" class="nev__list">Reservation</a></li>
                            <li><a href="./index.php" class="nev__list">Feedback</a></li>
                            <li><a href="./SignUp.php"><span class="btn primary-btn">Sign Up</span></a></li>
                            <li><a href="./login.php"><span class="btn primary-btn">Sign In</span></a></li>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
<!-- End Navigation -->


<!-- Reservation Form-->
        <div class="container1 mt-3">
            <h1>Book Your Table</h1>
            <form method="post">

                <div class="mb-3 mt-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                </div>

                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>

                <div class="mb-3">
                    <label for="phone">Phone:</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
                </div>

                <div class="mb-3">
                    <label for="date">Date:</label>
                    <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date">
                </div>

                <div class="mb-3">
                    <label for="time">Time:</label>
                    <input type="time" class="form-control" id="time" placeholder="Enter time" name="time">
                </div>

                <div class="mb-3">
                    <label for="roomtype">Table Type:</label>
                    <input type="roomtype" class="form-control" id="roomtype" placeholder="Enter table Type" name="roomtype">
                </div>
                
                <div class="mb-3">
                    <label for="description">description:</label>
                    <input type="description" class="form-control" id="description" placeholder="Enter the Special Note" name="description">
                </div>

                <br>
                <button type="submit" name="submit" class="btn signup-btn">Submit</button>
            </form>
        </div>
    </div>

<!--End Reservation Form-->

<!--Our Rooms-->
<div class = "room-title">
        <h2 type = "Sub Title" class = "room">today's special</h2>
      </div>

      <div class = "room-items">
       <!-- room -->
       <div class = "room-item featured">
          <div class = "room-img" style="max-width: 350px; margin:auto;">
            <img src = "Image/room1.jpg" alt = "room image">
          </div>
          <div class = "room-content">
            <h2 class = "room-name">Simple Room</h2>
            <div class = "line"></div><br>
            <h2 class = "food-time">Rs.15000 per Night</h2><br>
            <p class = "category">For the simple room you get all the foods and drinks for this package.</p><br>
            <h3 class = "category">Features</h3>
            <h4>1. 2 Beds or 1 Bed<br>2. Bathroom<br>3. Dressing Table</h4><br>
            <form method="post" action="Reserve_Room.php">
            <input type="hidden" name="room_type" value="Simple Room">
            <button type="submit" class="btn second-btn">Book Now</button>
        </form>
    </div>
</div>

        <div class = "room-item featured">
          <div class = "room-img" style="max-width: 350px; margin:auto;">
            <img src = "Image/room2.jpg" alt = "room image">
          </div>
          <div class = "room-content">
            <h2 class = "room-name">Relaxing Room</h2>
            <div class = "line"></div><br>
            <h2 class = "food-time">Rs.20000 per Night</h2><br>
            <p class = "category">For the simple room you get all the foods and drinks for this package.</p><br>
            <h3 class = "category">Features</h3>
            <h4>1. 2 Beds or 1 Bed<br>2. Bathroom<br>3. Balcany</h4><br>
            <form method="post" action="Reserve_Room.php">
            <input type="hidden" name="room_type" value="Simple Room">
            <button type="submit" class="btn second-btn">Book Now</button>
        </form>
    </div>
</div>

        <div class = "room-item featured" style="align-items: center;">
          <div class = "room-img" style="max-width: 350px; margin:auto;">
            <img src = "Image/luxury room.jpg" alt = "room image">
          </div>
          <div class = "room-content">
            <h2 class = "room-name">Luxury Room</h2>
            <div class = "line"></div><br>
            <h2 class = "food-time">Rs.50000 per Night</h2><br>
            <p class = "category">For the simple room you get all the foods and drinks for this package.</p><br>
            <h3 class = "category">Features</h3>
            <h4>1. 2 Beds or 1 Bed<br>2. 2 Bathroom<br>3. Dressing Table <br>4. Free Wifi<br>5. Sofa & Coffee Table<br>6. Balcany </h4><br>
            <form method="post" action="Reserve_Room.php">
            <input type="hidden" name="room_type" value="Simple Room">
            <button type="submit" class="btn second-btn">Book Now</button>
        </form>
    </div>
</div>
</div>
        <!-- end of item -->
<!--End Our Rooms-->

<!-- Footer -->
   <footer>
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__col1">
                <div class="footer__logo">
                    <img src="./Image/Logo0.png" alt="Outer Clove">
                </div>
                <p class="footer__desc">
                    Explore fine dining, seamless reservations, and delectable menus at The Outer Clove Restaurant.
                </p>
                <div class="footer__socials">
                    <h4 class="footer__socials__title">Follow Us</h4>
                    <ol>
                        <li>
                            <a href="#" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-instagram">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-twitter">
                                    <path
                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z" />
                                </svg>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="footer__col2">
                <h3 class="footer__text__title">
                    Links
                </h3>
                <ol class="footer__text">
                        <a href="./Home.php">Home</a><br>
                        <a href="./About.php">About</a><br>
                        <a href="./Services.php">Our Services</a><br>
                        <a href="./Menu.php">Our Menu</a><br>
                        <a href="./index.php">Contact Us</a><br>
                        <a href="./Reservation.php">Reservations</a><br>
                        <a href="./index.php">Feedback</a>
                </ol>
            </div>
            <div class="footer__col3">
                <h3 class="footer__text__title">
                    Support
                </h3>
                <ol class="footer__text">
                        <a href="./Contact.php">Contact</a><br>
                        <a href="./index.php">Support Center</a><br>
                        <a href="./index.php">Feedback</a>
                </ol>
            </div>
            <div class="footer__col4">
                <h3 class="footer__text__title">
                    Contact
                </h3>
                <ol class="footer__text">
                        <a href="tel:0112283050">0112283050</a>
                        <a href="mailto:outerclove@gmail.com">outerclove@gmail.com</a>
                        <a href="Address">No.3, Park Road, Nuwara Eliya.</a>
                </ol>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
    <!-- aos script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!--custom script-->
    <script src="./main.js"></script>
</body>
</html>
