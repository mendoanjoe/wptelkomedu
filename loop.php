<?php
/*
 *  Author: Firmansyah Nuralif Rohman
 *  URL: http://github.com/mendoanjoe
 *  Custom functions, support, custom post types and more.
*/


if (have_posts()): while (have_posts()) : the_post();
?>
<!-- article -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-preview">
    <?php 
        $default_img = get_option('edu_need_noimage');
        if (has_post_thumbnail()) : 
            $default_img = get_the_post_thumbnail_url();
        endif;
    ?>
        <a href="<?php the_permalink(); ?>">
            <div class="list-thumb" style="background-image: url(<?php echo $default_img; ?>);">
                <div></div>
            </div>
            <h2 class="post-title"><?php the_title(); ?></h2>
            <p>
            <?php edu_excerpt('edu_index'); // Build your custom callback length in functions.php ?>
            </p>
        </a>
        <p class="post-meta">
            <?php _e( 'Published by', 'TelkomEdu' ); ?> <?php the_author_posts_link(); ?>
            <?php _e( 'on', 'TelkomEdu' ); ?> <?php the_date(); ?>
            <?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( '0 Comment', 'TelkomEdu' ), __( '1 Comment', 'TelkomEdu' ), __( '% Comments', 'TelkomEdu' )); ?>
        </p>
    </div>
    <hr>
</article>
<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

<!-- article -->
<article>
    <div class="col-md-12">
        <h1 class="para-heading"><?php _e( 'Sorry, nothing to display.', 'TelkomEdu' ); ?></h1>
    </div>
</article>
<!-- /article -->

<?php endif; ?>
