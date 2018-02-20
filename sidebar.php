<?php
/*
 *  Author: Firmansyah Nuralif Rohman
 *  URL: http://github.com/mendoanjoe
 *  Custom functions, support, custom post types and more.
*/


?>
<div class="col-md-4 sidebar">
    <?php get_template_part('searchform'); ?>
    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-widget-1')) ?>
</div>