<?php
/*
Template Name: Event Mini Game
Author: Web 3 Suga
Author URI: https://www.w3suga.com/
Description: A WordPress theme for event mini games.
Version: 1.0
*/
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Mini Game</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/assets/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/event-mini-game.css" rel="stylesheet">
</head>

<body class="home-page" id="top">

    <main>
        <section class="wrapper">
            <div class="container">
                <div class="row logo align-items-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-nhonho.svg" alt="">
                </div>
                <div class="row hero-banner">
                    <div class="col-md-6 hero-banner__left text-center">
                        <h1>Quiz Game</h1>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/true-false-banner.svg" alt="">
                        <button class="start-btn">Start Now</button>
                    </div>
                    <div class="col-md-6 hero-banner__right">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-banner.png" alt="">
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="site-footer section-padding ">
        <div class="container">
            <div class="row">
                <div class="col-12 coppy-right">© NHoNHO 2024. Design by NHoNHO</div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>