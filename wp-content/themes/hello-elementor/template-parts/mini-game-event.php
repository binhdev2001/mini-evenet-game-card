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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/event-mini-game.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- section header -->
        <section class="logo_container">
            <div class="container-fluid">
                <div class="row ">
                    <div class="logo">
                        <img src=" <?php echo get_template_directory_uri(); ?>/assets/images/logo-nhonho.svg" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="hero-box d-flex flex-row">
                        <div class="hero-banner__left d-flex flex-column flex-fill align-items-center justify-content-start">
                            <h1 class="animate__animated animate__fadeInDown">Quiz Game</h1>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/true-false-banner.svg" alt="" class="animate__animated animate__fadeInUp">
                            <button class="start-btn btn btn-primary animate__animated  animate__fadeInDown">Start Now</button>
                        </div>
                        <div class="hero-banner__right d-flex flex-column flex-fill align-items-center justify-content-start">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-banner.png" alt="" class="animate__animated animate__fadeInRight">
                            <button class="start-btn btn btn-primary animate__animated  animate__pulse animate__infinite">Start Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features Section -->
        <section id="select-team" class="features d-none">
            <div class="container">
                <div class="row">
                    <h2 class="select-team__title">Choose your team to start</h2>
                </div>
                <div class="row select_team__list-card">
                    <?php
                    $team_data = get_team_data();
                    if (is_array($team_data) && !empty($team_data)) {
                        foreach ($team_data as $team) {
                    ?>
                            <div class="card card__<?php echo $team['className']; ?>">
                                <div class="card-content d-flex ">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $team['imageSrc']; ?>" class="card-img-team" alt="...">
                                    <a href="#" class="select-team-btn"><?php echo $team['teamName']; ?></a>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo 'Error: Team data is not available.';
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
    <!-- Footer -->
    <footer class="footer text-center">
        <h4>&copy; 2024 Your Company. All rights reserved.</p>

    </footer>
    <!-- JAVASCRIPT FILES -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.start-btn').click(function() {
                $('.hero').fadeOut('slow');
                $('#select-team').removeClass("d-none");
            });
        });
    </script>
</body>

</html>