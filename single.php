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
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="post-preview">                    
                            <h1 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>        
                            <!-- post details -->
                            <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
                            <span class="author"><?php _e( 'Published by', 'TelkomEdu' ); ?> <?php the_author_posts_link(); ?></span>
                            <span class="comments"><?php _e( ' , ', 'TelkomEdu' ); ?><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( '0 Comment', 'TelkomEdu' ), __( '1 Comment', 'TelkomEdu' ), __( '% Comments', 'TelkomEdu' )); ?></span>
                            <hr>
                            <p>
                                <?php the_content(); ?>
                            </p>                
                            <p><?php the_tags( __( 'Tags: ', 'TelkomEdu' ), ', ', '<br>'); ?></p>
                            
                            <!-- Post Social Sharing icons -->
                            <hr>
                            <div class="post-social-share">
                                <h3>Bagikan</h3>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-google-plus fa-2x" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-linkedin fa-2x" aria-hidden="true"></i>
                                </a>
                            </div>                                            
                        </div>
                        <hr>
                        <?php comments_template(); ?>
                    </article>
                <?php endwhile; ?>
                <?php else: ?>
                <!-- article -->
                <article>
                    <h2><?php _e( 'Sorry, nothing to display.', 'TelkomEdu' ); ?></h2>
                </article>
                <!-- /article -->
                <?php endif; ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>        
</section>
<?php get_footer(); ?>