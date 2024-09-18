<?php
include('Connection1.php');

if (isset($_POST['ok'])) {

    $fname = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO feedback0 (fname, surname, email, phone, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $fname, $surname, $email, $phone, $message);

        if (mysqli_stmt_execute($stmt)) {
            echo 'inserted';
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
<link rel="shortcut icon" href="./Image/Logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Feedback</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./GlobalStyles.css">
    <link rel="stylesheet" href="./Components.css">
    <!-- aos css -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<style>

body {
    font-family: 'Lato', sans-serif;
}
h1{
    margin-bottom: 40px;
}
label {
    color: #333;
}
.btn-send {
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 20px;
}

</style>

</head>

<body>

    <!-- Navigation -->
    <div class="nav">
        <div class="container">
            <div class="nav__wrapper">
                <a href="./Home.html" class="logo">
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
                            <li><a href="./Home.php" class="nev__list">Home</a></li>
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



<section>
<div class="container">
    <h1>Feedback Form</h1>
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <form id="contact-form" method="post" role="form">
            <div class="messages"></div>
            <div class="controls">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">Firstname *</label>
                            <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your first name *" required="required" data-error="Firstname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Lastname *</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your last name *" required="required" data-error="Lastname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Email *</label>
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_phone">Phone</label>
                            <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message">Message *</label>
                            <textarea id="form_message" name="message" class="form-control" placeholder="Message for Outer Clove *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" name="ok" class="btn btn-success btn-send" value="Send">
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</section>

    <!-- Store Info Section -->
    <section id="storeInfo" data-aos="fade-up">
        <div class="container">
            <div class="storeInfo__wrapper">
                <div class="storeInfo__item">
                    <div class="storeInfo__icon">
                        <img src="./Image/clock.png" alt="icon">
                    </div>
                    <h3 class="storeInfo__title">8.00AM - 10.00PM
                    </h3>
                    <p class="storeInfo__text">Opening time
                    </p>
                </div>
                <div class="storeInfo__item">
                    <div class="storeInfo__icon">
                        <img src="./Image/location.png" alt="icon">
                    </div>
                    <h3 class="storeInfo__title">No.3, Park Road, Nuwara Eliya.
                    </h3>
                    <p class="storeInfo__text">Address
                    </p>
                </div>
                <div class="storeInfo__item">
                    <div class="storeInfo__icon">
                        <img src="./Image/phone.png" alt="icon">
                    </div>
                    <h3 class="storeInfo__title">0112283050
                    </h3>
                    <p class="storeInfo__text">Call Us
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Store Info Section -->

    <!-- Feedback form -->

    <!-- End Feedback form -->

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
                        <a href="./index.php">Contact Us</a><br>
                        <a href="./Menu.php">Our Menu</a><br>
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

    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="validator.js"></script>
    <script src="contact.js"></script>

        <!-- aos script -->
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!--custom script-->
    <script src="./main.js"></script>
</body>

</html>
