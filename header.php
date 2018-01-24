<!doctype html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>

    <style>
        <?php include 'header-style.css'; ?>
    </style>

</head>

<body <?php body_class(); ?>>

    <div id="site-container" class="site-container">
        <header id="site-header" class="l-header header">
            <div class="l-container">
                <div class="l-col-12">

                    <!-- logo -->
                    <a class="site-logo" href="<?php echo home_url(); ?>" rel="nofollow">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/lekker-kontje.svg" alt="Logo"/>
                    </a>

                    <!-- mobile button menu -->
                    <button class="btn js-menu-toggle menu-btn">Menu</button>

                    <!-- menu -->
                    <nav class="site-nav">
                        <?php wp_nav_menu(array(
                            'container' => false,
                            'theme_location' => 'main-nav',
                        )); ?>
                    </nav>

                </div>

            </div>
        </header>
        <div class="site-content">
