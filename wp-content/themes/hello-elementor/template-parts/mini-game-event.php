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
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/event-mini-game.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- section header -->
        <section class="logo-container">
            <div class="container-fluid">
                <div class="row pt-3">
                    <div class="logo__box text-center">
                        <img class="logo__left" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-nhonho.svg" alt="">
                        <img class="logo_right d-none" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-quiz-game.svg" alt="">
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
        <!-- Seclect card Section -->
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
                                <div class="card-content d-flex justify-content-center align-items-center">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $team['imageSrc']; ?>" class="card-img-team" alt="...">
                                    <a class="card__btn card__btn--<?php echo $team['className']; ?>" href="#"><?php echo $team['teamName']; ?></a>
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
        <!-- Q&A Section -->
        <section id="qa-card" class="d-none">
            <div class="qa-card__container">
                <div class="row">
                    <h1 class="qa-card__title">Team Name</h1>
                    <div class="qa-card__content d-flex flex-row justify-content-between">
                        <div class="qa-card__img-team">
                            <img src="" alt="IMG by Team Name" class="qa-card__img">
                        </div>
                        <div class="qa-card__content-qa">
                            Q&A content in here
                        </div>
                    </div>
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
                $('.logo_right').removeClass("d-none");
                $('.logo__box').addClass("d-flex flex-row justify-content-between");
            });
            // Get data name team and show q&a question
            $('.card__btn').click(function(event) {
                event.preventDefault(); // Prevent default link behavior
                var teamName = $(this).text();
                console.log("Team Name:", teamName);

                $.ajax({
                    url: "<?php echo admin_url('admin-ajax.php') ?>", // `ajaxurl` should be defined in your WordPress theme
                    type: 'POST',
                    data: {
                        action: 'get-data-q&a',
                        team_name: teamName
                    },
                    success: function(response) {
                        if (response.success) {
                            var data = response.data;
                            console.log("QA Content:", data['Q&A']);

                            // Update the team name in the title
                            $('#qa-card .qa-card__title').text(data.teamName);

                            // Update the Q&A content
                            var qaContent = "";
                            data['Q&A'].forEach(function(qa) {
                                qaContent += '<div class="qa-item">';
                                qaContent += '<p>' + qa.content + '</p>';
                                qaContent += '<p><strong>True:</strong> ' + qa.answers.true + '</p>';
                                qaContent += '<p><strong>False:</strong> ' + qa.answers.false + '</p>';
                                qaContent += '</div>';
                            });
                            $('#qa-card .qa-card__content-qa').html(qaContent);

                            // Update the image
                            var imgSrc = '<?php echo get_template_directory_uri(); ?>/assets/images/' + data.imageSrc;
                            $('#qa-card .qa-card__img').attr('src', imgSrc);
                            // Show the QA card section
                            $('#select-team').addClass('d-none');
                            $('#qa-card').removeClass('d-none');
                        } else {
                            console.log('Error:', response.data);
                        }
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            });

        });
    </script>
</body>

</html>