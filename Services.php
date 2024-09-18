<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="shortcut icon" href="./Image/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./GlobalStyles.css">
    <link rel="stylesheet" href="./Components.css">
    <link rel="stylesheet" href="./Services.css">
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
    
    <!--Services-->
<section>
    <div class = "ser-container">
        <div class = "ser-head">
          <h2>Our Services</h2>
          <p>"Our event planning services at The Outer Clove Restaurant cater to your special occasions with precision and flair. From intimate gatherings to grand celebrations, our experienced team ensures a seamless event experience. Whether it's a corporate event, wedding or private event, we make your vision a reality. Let's appoint. Elaborate, innovative concepts and dedicated staff create unforgettable moments. Elevate your events with our expertise, making every moment extraordinary at Outer Clove - celebrations crafted with passion and perfection."!</p>
        </div>
        <div class = "ser-items">

          <!-- item -->
          <div class = "ser-item featured">
            <div class = "ser-img">
              <img src = "Image/resorts.jpg" alt = "services">
            </div>
            <div class = "ser-content">
              <h2 class = "ser-name">Free time Resorts</h2>
              <div class = "line"></div>
              <h3 class = "ser-dis">"Come to our enchanting resort in Nuwara Eliya and indulge in the luxury of relaxation, tranquility, our haven nestled amidst beautiful landscapes offers a blissful respite for your visit, a haven for tourism and a delightful destination to visit."</h3>
              <p class = "category">Mountain Resorts<br>Ecotourism Resorts<br>2-6 people can stay in one resort</p>
            </div>
          </div>
          <!-- end of item -->  

          <!-- item -->
          <div class = "ser-item featured">
            <div class = "ser-img">
              <img src = "Image/Wedding Planning.jpg" alt = "services">
            </div>
            <div class = "ser-content">
              <h2 class = "ser-name">Wedding Planning</h2>
              <div class = "line"></div>
              <h3 class = "ser-dis">"Join us to elevate your wedding experience at The Outer Clove. Our stunning indoor or outdoor venues feature contrasting attractions. Our versatile spaces accommodate your guest list, providing an intimate or expansive setting. Featuring sophisticated décor, we We ensure a beautiful setting for your special day. We make your wedding a timeless celebration of love and joy."</h3>
              <p class = "category">Indoor & Outdoor Facilities<br>More Seating Area<br>Photo Shoot Area</p>
            </div>
          </div>
          <!-- end of item -->  

          <!-- item -->
          <div class = "ser-item today-special">
            <div class = "ser-img">
              <img src = "Image/Festive Celebration.jpg" alt = "services">
            </div>
            <div class = "ser-content">
              <h2 class = "ser-name">Festive Celebration</h2>
              <div class = "line"></div>
              <h3 class = "ser-dis">"Elevate your festive celebrations at The Outer Clove, where joy comes to life. Immerse in the spirit of Christmas, welcome the New Year with style, and illuminate your Diwali with warmth. Our festive events promise a delightful blend of seasonal flavors, enchanting decor, and joyous moments. Experience the magic of the holidays with us, creating cherished memories in an ambiance filled with festive cheer. Celebrate the most wonderful time of the year with family and friends at The Outer Clove."</h3>
              <p class = "category">Indoor & Outdoor</p>
            </div>
          </div>
          <!-- end of item -->

          <!-- item -->
          <div class = "ser-item today-special">
            <div class = "ser-img">
              <img src = "Image/Meeting Planning.jpg" alt = "services">
            </div>
            <div class = "ser-content">
              <h2 class = "ser-name">Meeting Planning</h2>
              <div class = "line"></div>
              <h3 class = "ser-dis">"Bring joy to family and friendly gatherings at The Outer Clove. Our warm ambiance, delectable menu, and attentive service create the perfect setting for shared moments. Cherish quality time with loved ones in a welcoming environment that ensures your gatherings are filled with laughter, love, and delightful memories."</h3>
              <p class = "category">Indoor & Outdoor Areas</p>
            </div>
          </div>
          <!-- end of item -->

          <!-- item -->
          <div class = "ser-item today-special">
            <div class = "ser-img">
              <img src = "Image/Graduation Ceremony.jpg" alt = "services">
            </div>
            <div class = "ser-content">
              <h2 class = "ser-name">Graduation Ceremony</h2>
              <div class = "line"></div>
              <h3 class = "ser-dis">"Celebrate academic milestones with us! Our graduation services provide an unforgettable and dignified experience. We ensure a joyous occasion for graduates and their families. Join us for a momentous celebration at The Outer Clove of achievement. Honored with pride and warmth."</h3>
              <p class = "category">More Seating Area<br>graduation deco</p>
            </div>
          </div>
          <!-- end of item -->

          <!-- item -->
          <div class = "ser-item today-special">
            <div class = "ser-imgs">
              <img src = "Image/Meeting Banquet Facilities.jpg" alt = "services">
            </div>
            <div class = "ser-content">
              <h2 class = "ser-name">Office Meeting</h2>
              <div class = "line"></div>
              <h3 class = "ser-dis">"Experience a seamless blend of professional ambiance and exceptional service, ensuring productive and successful gatherings. Our dedicated team caters to your business needs, offering a conducive environment for discussions and collaborations. Make your meetings impactful and efficient with The Outer Clove's thoughtfully designed spaces and attentive support."</h3>
              <p class = "category">Sound proof meeting rooms<br>Meeting Rooms for 10 to 100 peoples</p>
            </div>
          </div>
          <!-- end of item -->
          
        </div>
    </div>
</section>

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
