<?php
/*
 *  Author: Firmansyah Nuralif Rohman
 *  URL: http://github.com/mendoanjoe
 *  Custom functions, support, custom post types and more.
*/


?>
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <img src="<?php echo get_template_directory_uri(); ?>/img/menu.png" alt="menu" width="40">
            </button>
            <!-- Logo -->
            <?php 
            if (get_option('edu_need_logo')) {?>
            <a class="navbar-brand" href="<?php bloginfo('home'); ?>">
                <img class="logo-brand" src="<?php echo get_option('edu_need_logo'); ?>" alt="<?php bloginfo('name'); ?>">
            </a>
            <?php } else { ?>
            <a class="navbar-brand float-none" href="<?php bloginfo('home'); ?>">
                <img class="logo-brand" src="logo.png" alt="SMP 7 Purwokerto">
            </a>
            <?php } ?>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php edu_header_nav(); ?>
        </div>
    </div>
</nav>