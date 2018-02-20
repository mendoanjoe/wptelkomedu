<?php
/*
 *  Author: Firmansyah Nuralif Rohman
 *  URL: http://github.com/mendoanjoe
 *  Custom functions, support, custom post types and more.
*/

if (get_option('edu_need_sa_konten')) {
?>
    <!-- Sambutan -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-heading">Sambutan</h2>
                    <div class="template-space"></div>
                </div>
                <div class="col-md-9">
                    <h2 class="para-heading"><?php echo get_option('edu_need_sa_judul'); ?></h2>
                    <p><?php echo get_option('edu_need_sa_konten'); ?></p>
                    <a href="<?php echo get_option('edu_need_sa_link'); ?>" class="service-box-button">Selengkapnya</a>
                </div>
                <div class="col-md-3">
                    <img src="<?php echo get_option('edu_need_sa_fotourl'); ?>" class="img-responsive img-hide-sm"
                        alt="Company">
                </div>
            </div>
        </div>
    </section>
<?php } ?>