<?php
/*
 *  Author: Firmansyah Nuralif Rohman
 *  URL: http://github.com/mendoanjoe
 *  Custom functions, support, custom post types and more.
*/


get_header();
?>
<section class="section-bottom-border">
    <div class="container">
        <div class="row">
            <div class="col-md-8 list-container">
                <?php get_template_part('loop'); ?>
                <ul class="pager">
                    <li class="prev">
                    <?php previous_posts_link( '&larr; Artikel Terbaru' ); ?>
                    </li>
                    <li class="next">
                    <?php next_posts_link( 'Artikel Lama &rarr;' ); ?>
                    </li>
                </ul>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>        
</section>
<?php get_footer(); ?>