<?php
/*
 *  Author: Firmansyah Nuralif Rohman
 *  URL: http://github.com/mendoanjoe
 *  Custom functions, support, custom post types and more.
*/


?>

<div class='edu-carousel carousel-image carousel-image-pagination carousel-image-arrows flexslider'>
    <ul class='slides'>
        <?php
        $recent_posts = wp_get_recent_posts(array(
            'numberposts' => get_option('edu_need_s_max'), // Number of recent posts thumbnails to display
            'post_status' => 'publish', // Show only the published posts
            'category' => get_cat_ID(get_option('edu_need_s_category')) //get by slug
        ));

        foreach($recent_posts as $post) : 
            $image_url = get_option('edu_need_noimage');
            if ( has_post_thumbnail( $post["ID"]) ) {
                $image_url = get_the_post_thumbnail_url($post["ID"]);
            }
        ?>

        <!--Slider Start-->
        <li class='item'>
            <div class='container'>
                <div class='row pos-rel'>
                    <div class='col-sm-12 col-md-6 animate'>
                        
                        <h1 class='big fadeInDownBig animated'><?php echo $post['post_title'] ?></h1>
                        <p class='normal fadeInUpBig animated delay-point-five-s'><?php echo wp_trim_words($post['post_content'], 35,'...'); ?></p>
                        <a class='btn btn-bordered btn-white btn-lg fadeInRightBig animated delay-one-s' href='<?php echo get_permalink($post['ID']) ?>'> Selengkapnya </a>
                    </div>
                    <div class='col-md-6 animate pos-sta hidden-xs hidden-sm'>
                        <img class="img-responsive img-right fadeInUpBig animated delay-one-point-five-s" alt="iPhone" src="<?php echo $image_url; ?>"/> 
                    </div>
                </div>
            </div>
        </li>
        <?php endforeach; wp_reset_query(); ?>        
        <!--Slider End-->
    </ul>
</div>