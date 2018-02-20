<?php
/*
 *  Author: Firmansyah Nuralif Rohman
 *  URL: http://github.com/mendoanjoe
 *  Custom functions, support, custom post types and more.
*/

$query_images_args = array(
    'post_type'      => 'attachment',
    'post_mime_type' => 'image',
    'post_status'    => 'inherit',
    'posts_per_page' => get_option('edu_need_g_max'), //-1 itu buat all
);

$query_images = new WP_Query( $query_images_args );
?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-heading text-dark">Galeri</h2>
                    <div class="template-space"></div>
                </div>
            </div>
            <div class="row">
            <?php foreach ($query_images->posts as $image) : ?>
                <div class="col-sm-2 gallery-box">
                    <a href="#" data-toggle="modal" data-target=".pop-up-<?php echo $image->ID; ?>">
                        <img src="<?php echo wp_get_attachment_url($image->ID);?>" class="img-responsive center-block">
                    </a>
                </div>
            
                <div class="modal fade pop-up-<?php echo $image->ID; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <img src="<?php echo wp_get_attachment_url($image->ID);?>" class="img-responsive center-block">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; wp_reset_query(); ?>                
            </div>
            <div class="col-md-12 text-center margin-10">
                <a href="<?php echo get_option('edu_need_g_link'); ?>" class="service-box-button">Selengkapnya</a>
            </div>
        </div>
    </section>