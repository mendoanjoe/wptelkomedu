<?php
/*
 *  Author: Firmansyah Nuralif Rohman
 *  URL: http://github.com/mendoanjoe
 *  Custom functions, support, custom post types and more.
*/


?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Meta -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Description -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="<?php bloginfo('author'); ?>">
    <meta name="keywords" content="<?php bloginfo('keywords'); ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon">

    <!-- Title -->
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

    <!-- Stylesheet -->
    <?php wp_head(); ?>

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body <?php body_class(); ?>>
    <!-- Loding -->
    <div class="loading">
        <div class="loader"></div>
    </div>

    <!-- Scroll to Top -->
    <a id="scroll-up">
        <i class="fa fa-angle-up"></i>
    </a>

    <!-- Top Bar  -->
    <div class="edu-info">
        <div class="row m-0">
            <div class="col-md-12 float-right px-3">
                <ul class="edu-float-right">
                    <li>
                        <i class="fa fa-paper-plane" aria-hidden="true"></i> <?php echo get_option('edu_need_email'); ?></li>
                    <li class="li-last">
                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i> <?php echo get_option('edu_need_telp'); ?></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <?php get_template_part('templates/nav-bar'); ?>