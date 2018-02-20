<?php
/*
 *  Author: Firmansyah Nuralif Rohman
 *  URL: http://github.com/mendoanjoe
 *  Custom functions, support, custom post types and more.
*/


$category1 = get_option('edu_need_bu_category1');
$category2 = get_option('edu_need_bu_category2');
$category3 = get_option('edu_need_bu_category3');
$category4 = get_option('edu_need_bu_category4');
$max_post = get_option('edu_need_bu_max');;
$default_img = get_option('edu_need_noimage');
$status = 'publish';

if(get_option('edu_need_bu_category1')) {
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-heading">Berita Utama</h2>
                <div class="template-space"></div>
            </div>

            <!-- Category -->
            <div class="row">
                <div class="col-md-12 my-3 mx-2">
                    <ul class="nav nav-tabs float-right">
                        <li class="active">
                            <a data-toggle="tab" href="#<?php echo $category1; ?>" aria-expanded="true">
                                <?php echo get_category_by_slug($category1)->name; ?>
                            </a>
                        </li>
                    <?php 
                    if(get_option('edu_need_bu_category2')) { ?>
                        <li>
                            <a data-toggle="tab" href="#<?php echo $category2; ?>" aria-expanded="false">
                                <?php echo get_category_by_slug($category2)->name; ?>
                            </a>
                        </li>
                    <?php 
                    }
                    
                    if(get_option('edu_need_bu_category3')) { ?>
                        <li>
                            <a data-toggle="tab" href="#<?php echo $category3; ?>" aria-expanded="false">
                                <?php echo get_category_by_slug($category3)->name; ?>
                            </a>
                        </li>
                    <?php 
                    }
                    
                    if(get_option('edu_need_bu_category4')) { ?>
                        <li>
                            <a data-toggle="tab" href="#<?php echo $category4; ?>" aria-expanded="false">
                                <?php echo get_category_by_slug($category4)->name; ?>
                            </a>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <div id="<?php echo $category1; ?>" class="tab-pane fade active in">
                    <div class="row">
                    <?php
                        $recent_posts1 = wp_get_recent_posts(array(
                            'numberposts' => $max_post, 
                            'post_status' => $status,
                            'category' => get_cat_ID($category1)
                        ));
                        foreach($recent_posts1 as $post1) : 
                        $default_img = get_option('edu_need_noimage');
                        if ( has_post_thumbnail( $post1["ID"]) ) {
                            $default_img = get_the_post_thumbnail_url($post1["ID"]);
                        }
                    ?>
                        <div class="col-md-4">
                            <div class="post-card">
                                <div class="img-card" style="background:url('<?php echo $default_img; ?>');background-size:cover;"></div>
                                <div class="desc-card">
                                    <a href="<?php echo get_permalink($post1['ID']) ?>"><?php echo wp_trim_words($post1['post_content'], 15,' ...'); ?></a>

                                    <p class="tanggal">
                                        <span class="fa fa-calendar fa-lg"></span> <?php echo $post1['post_date'] ?></p>
                                </div>
                                <div class="hover-card">
                                    <a href="<?php echo get_permalink($post1['ID']) ?>">
                                        <h1><?php echo $post1['post_title'] ?></h1>
                                        <p>
                                        <?php echo wp_trim_words($post1['post_content'], 20,' ...'); ?>
                                        </p>
                                    </a>
                                    <div class="hover-tanggal">
                                        <span class="fa fa-calendar fa-lg"></span>
                                        <p class="tanggal"><?php echo $post1['post_date'] ?></p>
                                        <a href="<?php echo get_permalink($post1['ID']) ?>" class="read-more">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <?php endforeach; wp_reset_query(); ?>
                        <div class="col-md-12" style="text-align: right;">
                            <a href="<?php bloginfo('home'); ?>/category/<?php echo $category1; ?>" class="service-box-button">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <?php 
                    if(get_option('edu_need_bu_category2')) { ?>
                <div id="<?php echo $category2; ?>" class="tab-pane fade">
                    <div class="row">
                    <?php
                        $recent_posts2 = wp_get_recent_posts(array(
                            'numberposts' => $max_post, 
                            'post_status' => $status,
                            'category' => get_cat_ID($category2)
                        ));
                        foreach($recent_posts2 as $post2) : 
                        $default_img = get_option('edu_need_noimage');
                        if ( has_post_thumbnail( $post2["ID"]) ) {
                            $default_img = get_the_post_thumbnail_url($post2["ID"]);
                        }
                    ?>
                        <div class="col-md-4">
                            <div class="post-card">
                                <div class="img-card" style="background:url('<?php echo $default_img; ?>');background-size:cover;"></div>
                                <div class="desc-card">
                                    <a href="<?php echo get_permalink($post2['ID']) ?>"><?php echo wp_trim_words($post2['post_content'], 15,' ...'); ?></a>

                                    <p class="tanggal">
                                        <span class="fa fa-calendar fa-lg"></span> <?php echo $post2['post_date'] ?></p>
                                </div>
                                <div class="hover-card">
                                    <a href="<?php echo get_permalink($post2['ID']) ?>">
                                        <h1><?php echo $post2['post_title'] ?></h1>
                                        <p>
                                        <?php echo wp_trim_words($post2['post_content'], 20,' ...'); ?>
                                        </p>
                                    </a>
                                    <div class="hover-tanggal">
                                        <span class="fa fa-calendar fa-lg"></span>
                                        <p class="tanggal"><?php echo $post2['post_date'] ?></p>
                                        <a href="<?php echo get_permalink($post2['ID']) ?>" class="read-more">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <?php endforeach; wp_reset_query(); ?>
                        <div class="col-md-12" style="text-align: right;">
                            <a href="<?php bloginfo('home'); ?>/category/<?php echo $category2; ?>" class="service-box-button">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <?php 
                }
                    
                if(get_option('edu_need_bu_category3')) { ?>
                <div id="<?php echo $category3; ?>" class="tab-pane fade">
                    <div class="row">
                    <?php
                        $recent_posts3 = wp_get_recent_posts(array(
                            'numberposts' => $max_post, 
                            'post_status' => $status,
                            'category' => get_cat_ID($category3)
                        ));
                        foreach($recent_posts3 as $post3) : 
                        $default_img = get_option('edu_need_noimage');
                        if ( has_post_thumbnail( $post3["ID"]) ) {
                            $default_img = get_the_post_thumbnail_url($post3["ID"]);
                        }
                    ?>
                        <div class="col-md-4">
                            <div class="post-card">
                                <div class="img-card" style="background:url('<?php echo $default_img; ?>');background-size:cover;"></div>
                                <div class="desc-card">
                                    <a href="<?php echo get_permalink($post3['ID']) ?>"><?php echo wp_trim_words($post3['post_content'], 15,' ...'); ?></a>

                                    <p class="tanggal">
                                        <span class="fa fa-calendar fa-lg"></span> <?php echo $post3['post_date'] ?></p>
                                </div>
                                <div class="hover-card">
                                    <a href="<?php echo get_permalink($post3['ID']) ?>">
                                        <h1><?php echo $post3['post_title'] ?></h1>
                                        <p>
                                        <?php echo wp_trim_words($post3['post_content'], 20,' ...'); ?>
                                        </p>
                                    </a>
                                    <div class="hover-tanggal">
                                        <span class="fa fa-calendar fa-lg"></span>
                                        <p class="tanggal"><?php echo $post3['post_date'] ?></p>
                                        <a href="<?php echo get_permalink($post3['ID']) ?>" class="read-more">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <?php endforeach; wp_reset_query(); ?>
                        <div class="col-md-12" style="text-align: right;">
                            <a href="<?php bloginfo('home'); ?>/category/<?php echo $category3; ?>" class="service-box-button">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <?php 
                }
                    
                if(get_option('edu_need_bu_category4')) { ?>
                <div id="<?php echo $category4; ?>" class="tab-pane fade">
                    <div class="row">
                    <?php
                        $recent_posts4 = wp_get_recent_posts(array(
                            'numberposts' => $max_post, 
                            'post_status' => $status,
                            'category' => get_cat_ID($category4)
                        ));
                        foreach($recent_posts4 as $post4) : 
                        $default_img = get_option('edu_need_noimage');
                        if ( has_post_thumbnail( $post4["ID"]) ) {
                            $default_img = get_the_post_thumbnail_url($post4["ID"]);
                        }
                    ?>
                        <div class="col-md-4">
                            <div class="post-card">
                                <div class="img-card" style="background:url('<?php echo $default_img; ?>');background-size:cover;"></div>
                                <div class="desc-card">
                                    <a href="<?php echo get_permalink($post4['ID']) ?>"><?php echo wp_trim_words($post4['post_content'], 15,' ...'); ?></a>

                                    <p class="tanggal">
                                        <span class="fa fa-calendar fa-lg"></span> <?php echo $post4['post_date'] ?></p>
                                </div>
                                <div class="hover-card">
                                    <a href="<?php echo get_permalink($post4['ID']) ?>">
                                        <h1><?php echo $post4['post_title'] ?></h1>
                                        <p>
                                        <?php echo wp_trim_words($post4['post_content'], 20,' ...'); ?>
                                        </p>
                                    </a>
                                    <div class="hover-tanggal">
                                        <span class="fa fa-calendar fa-lg"></span>
                                        <p class="tanggal"><?php echo $post4['post_date'] ?></p>
                                        <a href="<?php echo get_permalink($post4['ID']) ?>" class="read-more">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <?php endforeach; wp_reset_query(); ?>
                        <div class="col-md-12" style="text-align: right;">
                            <a href="<?php bloginfo('home'); ?>/category/<?php echo $category4; ?>" class="service-box-button">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
</section>
<?php } ?>