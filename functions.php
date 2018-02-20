<?php
/*
 *  Author: Firmansyah Nuralif Rohman
 *  URL: http://github.com/mendoanjoe
 *  Custom functions, support, custom post types and more.
*/


/*------------------------------------*\
	Setting
\*------------------------------------*/
if (function_exists('add_theme_support')){
    // Navigasi
    add_theme_support('menus');

    // Post Image
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true);
    add_image_size('medium', 250, '', true);
    add_image_size('small', 120, '', true);
    add_image_size('custom-size', 700, 200, true);

    // Theme Background
    add_theme_support('custom-background', array(
        'default-color' => '#FFF',
        'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));

    // Theme Logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ));

    // Feed Link
    add_theme_support('automatic-feed-links');
}

/*------------------------------------*\
	Style Css Core
\*------------------------------------*/
function edu_header_styles(){
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
    wp_register_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(),'4.7.0', 'all');
    wp_enqueue_style('font-awesome-css'); 

    wp_register_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(),'3.3.7', 'all');
    wp_enqueue_style('bootstrap-css'); 

    wp_register_style('slider-css', get_template_directory_uri() . '/css/slider.css', array(),'1.0.0', 'all');
    wp_enqueue_style('slider-css'); 

    wp_register_style('animate-css', get_template_directory_uri() . '/css/animate.css', array(),'3.6.0', 'all');
    wp_enqueue_style('animate-css'); 

    wp_register_style('theme-css', get_template_directory_uri() . '/css/theme.css', array(),'1.0.0', 'all');
    wp_enqueue_style('theme-css'); 

    wp_register_style('style-css', get_template_directory_uri() . '/style.css', array(),'1.0.0', 'all');
    wp_enqueue_style('style-css'); 
    }
}

/*------------------------------------*\
	Javascript
\*------------------------------------*/
function edu_footer_script(){
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_register_script('jquery-js', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.3.1');
        wp_enqueue_script('jquery-js');

        wp_register_script('popper-js', get_template_directory_uri() . '/js/popper.min.js', array(), '1.12.9');
        wp_enqueue_script('popper-js');

        wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7');
        wp_enqueue_script('bootstrap-js');

        wp_register_script('flexslider-js', get_template_directory_uri() . '/js/jquery.flexslider.min.js', array(), '2.7.0');
        wp_enqueue_script('flexslider-js');

        wp_register_script('jquery-js', get_template_directory_uri() . '/js/holder.min.js', array(), '1.0.0');
        wp_enqueue_script('jquery-js');

        wp_register_script('slider-js', get_template_directory_uri() . '/js/slider.js', array(), '1.0.0');
        wp_enqueue_script('slider-js');

        wp_register_script('default-js', get_template_directory_uri() . '/js/default.js', array(), '1.0.0');
        wp_enqueue_script('default-js');
    }
}

/*------------------------------------*\
	Themes Option
\*------------------------------------*/
function edu_theme_option_page() {
    ?>  
    <div class="wrap">
        <h1>Theme Options</h1>
        <form method="post" action="options.php">
    <?php
        settings_fields("theme-options-grp");
        do_settings_sections("theme-options");
        submit_button();
    ?>
        </form>
    </div>
    <?php
    }
    
    // Add Themes
    function edu_add_theme_menu_item() {
        add_theme_page("Option", "Option", "manage_options", "theme-options", "edu_theme_option_page");
    }
    
    // Section Description
    function edu_theme_section_description(){
        echo '';
    }
    
    // Themes Setting
    function edu_theme_settings(){
        // Kontak
        add_settings_section('edu_section_1', 'Kontak','edu_theme_section_description','theme-options');
        add_settings_field('edu_need_email','Email','edu_need_email_callback','theme-options','edu_section_1');
        add_settings_field('edu_need_telp','Telp','edu_need_telp_callback','theme-options','edu_section_1');
        register_setting( 'theme-options-grp', 'edu_need_email');
        register_setting( 'theme-options-grp', 'edu_need_telp');

        // Situs
        add_settings_section('edu_section_2', 'Situs','edu_theme_section_description','theme-options');
        add_settings_field('edu_need_logo','Url Logo','edu_need_logo_callback','theme-options','edu_section_2');
        add_settings_field('edu_need_noimage','Url No-Image','edu_need_noimage_callback','theme-options','edu_section_2');
        register_setting( 'theme-options-grp', 'edu_need_logo');
        register_setting( 'theme-options-grp', 'edu_need_noimage');

        // Slider
        add_settings_section('edu_section_3', 'Slider','edu_theme_section_description','theme-options');
        add_settings_field('edu_need_s_category','Kategori','edu_need_s_category_callback','theme-options','edu_section_3');
        add_settings_field('edu_need_s_max','Max Tampilan','edu_need_s_max_callback','theme-options','edu_section_3');
        register_setting( 'theme-options-grp', 'edu_need_s_category');
        register_setting( 'theme-options-grp', 'edu_need_s_max');

        // Sambutan
        add_settings_section('edu_section_4', 'Sambutan','edu_theme_section_description','theme-options');
        add_settings_field('edu_need_sa_judul','Judul','edu_need_sa_judul_callback','theme-options','edu_section_4');
        add_settings_field('edu_need_sa_konten','Konten','edu_need_sa_konten_callback','theme-options','edu_section_4');
        add_settings_field('edu_need_sa_link','Link Konten','edu_need_sa_link_callback','theme-options','edu_section_4');
        add_settings_field('edu_need_sa_fotourl','Foto Kepala Sekolah','edu_need_sa_fotourl_callback','theme-options','edu_section_4');
        register_setting( 'theme-options-grp', 'edu_need_sa_judul');
        register_setting( 'theme-options-grp', 'edu_need_sa_konten');
        register_setting( 'theme-options-grp', 'edu_need_sa_link');
        register_setting( 'theme-options-grp', 'edu_need_sa_fotourl');

        // Berita Utama
        add_settings_section('edu_section_5', 'Berita Utama','edu_theme_section_description','theme-options');
        add_settings_field('edu_need_bu_category1','Kategori 1','edu_need_bu_category1_callback','theme-options','edu_section_5');
        add_settings_field('edu_need_bu_category2','Kategori 2','edu_need_bu_category2_callback','theme-options','edu_section_5');
        add_settings_field('edu_need_bu_category3','Kategori 3','edu_need_bu_category3_callback','theme-options','edu_section_5');
        add_settings_field('edu_need_bu_category4','Kategori 4','edu_need_bu_category4_callback','theme-options','edu_section_5');
        add_settings_field('edu_need_bu_max','Max Tampilan','edu_need_bu_max_callback','theme-options','edu_section_5');
        register_setting( 'theme-options-grp', 'edu_need_bu_category1');
        register_setting( 'theme-options-grp', 'edu_need_bu_category2');
        register_setting( 'theme-options-grp', 'edu_need_bu_category3');
        register_setting( 'theme-options-grp', 'edu_need_bu_category4');
        register_setting( 'theme-options-grp', 'edu_need_bu_max');

        // Galleri
        add_settings_section('edu_section_6', 'Galleri','edu_theme_section_description','theme-options');
        add_settings_field('edu_need_g_max','Max Tampilan','edu_need_g_max_callback','theme-options','edu_section_6');
        add_settings_field('edu_need_g_link','Link Konten','edu_need_g_link_callback','theme-options','edu_section_6');
        register_setting( 'theme-options-grp', 'edu_need_g_max');
        register_setting( 'theme-options-grp', 'edu_need_g_link');

        // Daftar
        add_settings_section('edu_section_7', 'Banner Pendaftaran','edu_theme_section_description','theme-options');
        add_settings_field('edu_need_bp_konten','Konten','edu_need_bp_konten_callback','theme-options','edu_section_7');
        add_settings_field('edu_need_bp_link','Link Konten','edu_need_bp_link_callback','theme-options','edu_section_7');
        register_setting( 'theme-options-grp', 'edu_need_bp_konten');
        register_setting( 'theme-options-grp', 'edu_need_bp_link');
    }
    
    // Kontak
    function edu_need_email_callback(){
        echo '<input type="text" name="edu_need_email" id="edu_need_email" value="'. get_option('edu_need_email') .'" />';
    }
    function edu_need_telp_callback(){
        echo '<input type="text" name="edu_need_telp" id="edu_need_telp" value="'. get_option('edu_need_telp') .'" />';
    }

    // Situs
    function edu_need_logo_callback(){
        echo '<input type="text" name="edu_need_logo" id="edu_need_logo" value="'. get_option('edu_need_logo') .'" />';
    }
    function edu_need_noimage_callback(){
        echo '<input type="text" name="edu_need_noimage" id="edu_need_noimage" value="'. get_option('edu_need_noimage') .'" />';
    }

    // Slider
    function edu_need_s_category_callback(){
        echo '<input type="text" name="edu_need_s_category" id="edu_need_s_category" value="'. get_option('edu_need_s_category') .'" />';
    }
    function edu_need_s_max_callback(){
        echo '<input type="text" name="edu_need_s_max" id="edu_need_s_max" value="'. get_option('edu_need_s_max') .'" />';
    }

    // Sambutan
    function edu_need_sa_judul_callback(){
        echo '<input type="text" name="edu_need_sa_judul" id="edu_need_sa_judul" value="'. get_option('edu_need_sa_judul') .'" />';
    }
    function edu_need_sa_konten_callback(){
        echo '<input type="text" name="edu_need_sa_konten" id="edu_need_sa_konten" value="'. get_option('edu_need_sa_konten') .'" />';
    }
    function edu_need_sa_link_callback(){
        echo '<input type="text" name="edu_need_sa_link" id="edu_need_sa_link" value="'. get_option('edu_need_sa_link') .'" />';
    }
    function edu_need_sa_fotourl_callback(){
        echo '<input type="text" name="edu_need_sa_fotourl" id="edu_need_sa_fotourl" value="'. get_option('edu_need_sa_fotourl') .'" />';
    }

    // Berita Utama
    function edu_need_bu_category1_callback(){
        echo '<input type="text" name="edu_need_bu_category1" id="edu_need_bu_category1" value="'. get_option('edu_need_bu_category1') .'" />';
    }
    function edu_need_bu_category2_callback(){
        echo '<input type="text" name="edu_need_bu_category2" id="edu_need_bu_category2" value="'. get_option('edu_need_bu_category2') .'" />';
    }
    function edu_need_bu_category3_callback(){
        echo '<input type="text" name="edu_need_bu_category3" id="edu_need_bu_category3" value="'. get_option('edu_need_bu_category3') .'" />';
    }
    function edu_need_bu_category4_callback(){
        echo '<input type="text" name="edu_need_bu_category4" id="edu_need_bu_category4" value="'. get_option('edu_need_bu_category4') .'" />';
    }
    function edu_need_bu_max_callback(){
        echo '<input type="text" name="edu_need_bu_max" id="edu_need_bu_max" value="'. get_option('edu_need_bu_max') .'" />';
    }

    // Galeri
    function edu_need_g_max_callback(){
        echo '<input type="text" name="edu_need_g_max" id="edu_need_g_max" value="'. get_option('edu_need_g_max') .'" />';
    }
    function edu_need_g_link_callback(){
        echo '<input type="text" name="edu_need_g_link" id="edu_need_g_link" value="'. get_option('edu_need_g_link') .'" />';
    }

    // Daftar

    function edu_need_bp_konten_callback(){
        echo '<input type="text" name="edu_need_bp_konten" id="edu_need_bp_konten" value="'. get_option('edu_need_bp_konten') .'" />';
    }
    function edu_need_bp_link_callback(){
        echo '<input type="text" name="edu_need_bp_link" id="edu_need_bp_link" value="'. get_option('edu_need_bp_link') .'" />';
    }
    
    add_action("admin_menu", "edu_add_theme_menu_item");
    add_action('admin_init','edu_theme_settings');

/*------------------------------------*\
	Menu List
\*------------------------------------*/
function edu_regist_menu(){
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'TelkomEdu')
    ));
}

/*------------------------------------*\
	Header Menu Setting
\*------------------------------------*/
function edu_header_nav(){
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="nav navbar-nav navbar-right">%3$s</ul>',
		'depth'           => 0,
		'walker'          => new edu_walker_header_menu()
		)
	);
}

/*------------------------------------*\
	Widget
\*------------------------------------*/
if (function_exists('register_sidebar')){
    // Untuk buat widget lagi tambahkan lagi baris register_sidebar

    register_sidebar(array(
        'name' => __('Sidebar', 'TelkomEdu'),
        'description' => __('Add widget, setting style css on editor', 'TelkomEdu'),
        'id' => 'sidebar-widget-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div><hr>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => __('Footer 1', 'TelkomEdu'),
        'description' => __('Add widget, setting style css on editor', 'TelkomEdu'),
        'id' => 'footer-widget-1',
        'before_widget' => '<div class="col-md-4 col-sm-6"><div class="footer-widget"><div id="%1$s" class="%2$s">',
        'after_widget' => '</div></div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer 2', 'TelkomEdu'),
        'description' => __('Add widget, setting style css on editor', 'TelkomEdu'),
        'id' => 'footer-widget-2',
        'before_widget' => '<div class="col-md-4 col-sm-6"><div class="footer-widget"><div id="%1$s" class="%2$s">',
        'after_widget' => '</div></div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer 3', 'TelkomEdu'),
        'description' => __('Add widget, setting style css on editor', 'TelkomEdu'),
        'id' => 'footer-widget-3',
        'before_widget' => '<div class="col-md-4 col-sm-6"><div class="footer-widget"><div id="%1$s" class="%2$s">',
        'after_widget' => '</div></div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}


/*------------------------------------*\
	Pagination
\*------------------------------------*/
function edu_pagination(){
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'before_page_number' => '',
	    'after_page_number'  => ''
    ));
}

/*------------------------------------*\
	Comment
\*------------------------------------*/
function edu_comments($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>

    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	+ Clean Code Start
\*------------------------------------*/
function edu_wp_nav_menu_args($args = ''){
    $args['container'] = false;
    return $args;
}

function edu_remove_category_rel_from_category_list($thelist){
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

function edu_add_slug_to_body_class($classes){
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

function edu_remove_recent_comments_style(){
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

function edu_index($length){
    return 20;
}

function edu_custom_post($length){
    return 40;
}

function edu_excerpt($length_callback = '', $more_callback = ''){
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

function edu_view_article($more){
    global $post;
    return '...';
}

function edu_remove_admin_bar(){
    return false;
}

function edu_style_remove($tag){
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

function edu_remove_thumbnail_dimensions( $html ){
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

function edu_gravatar ($avatar_defaults){
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

function edu_github_gravatar($avatar_default){
    $myavatar = 'https://avatars0.githubusercontent.com/u/'.rand(1, 999999);
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

function edu_enable_threaded_comments(){
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

function edu_blank_view_article($more){
    global $post;
    return '...';
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'edu_header_styles'); // Add Custom Scripts to wp_head
add_action('get_header', 'edu_enable_threaded_comments'); // Enable Threaded Comments
// add_action('wp_enqueue_scripts', 'edu_footer_script'); // Add Theme Stylesheet
add_action('init', 'edu_regist_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'edu_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'edu_pagination'); // Add our HTML5 Pagination
add_action('wp_footer', 'edu_footer_script');

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'edu_github_gravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'edu_add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'edu_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'edu_remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'edu_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'edu_remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'edu_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'edu_remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'edu_remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
// add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
// add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

function html5_shortcode_demo($atts, $content = null){
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>';
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null){
    return '<h2>' . $content . '</h2>';
}

/*------------------------------------*\
	Site Costum Setting
\*------------------------------------*/


/*------------------------------------*\
	Walker Costum Setting
\*------------------------------------*/
class edu_walker_header_menu extends Walker {
    public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );
		$classes = array( 'dropdown-menu' );
		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= "{$n}{$indent}<ul$class_names>{$n}";
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );
		$output .= "$indent</ul>{$n}";
    }
    
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
        }
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
        // var_dump($indent);
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        if (strpos($class_names, 'menu-item-has-children') !== false) {
            // $class_names = $class_names ? ' class="dropdown ' . esc_attr( $class_names ) . '"' : '';
            $class_names = ' class="dropdown"';            
        }else{
            // $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
            $class_names ='';
        }
        
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
		$output .= $indent . '<li' . $class_names .'>';

        $atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );

        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
        
        // var_dump($attributes);

        $item_output = $args->before;
        if (strpos($class_names, 'dropdown') !== false) {
            $item_output .= '<a'. $attributes .' class="dropdown-toggle" data-toggle="dropdown">';
        }else{
            $item_output .= '<a'. $attributes .'>';
        }
		
        $item_output .= $args->link_before . $title . $args->link_after;
        if (strpos($class_names, 'dropdown') !== false) {
            $item_output .= ' <i class="fa fa-angle-down" aria-hidden="true"></i></a>';
        }else{
            $item_output .= '</a>';
        }
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

?>