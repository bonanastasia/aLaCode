<?php
/**
 * aLaCode functions and definitions
 *
 * @package aLaCode
 */
?>
<?php

/*------------------------------
 Customizer
 ------------------------------*/
 
if ( ! class_exists( 'Kirki' ) ) {
    include_once( dirname( __FILE__ ) . '/inc/kirki/kirki.php' );
}
require get_template_directory() . '/customize/theme-defaults.php';
require get_template_directory() . '/customize/kirki-config.php';
require get_template_directory() . '/customize/customizer.php';

function aLaCode_customize_register( $wp_customize ) {
    $wp_customize->remove_control('header_textcolor');
    $wp_customize->get_section('colors')->title = esc_html__( 'Custom Colors', 'aLaCode' );
    $wp_customize->get_section('colors')->priority = 75;
}
add_action( 'customize_register', 'aLaCode_customize_register' );

if(is_admin())  add_action( 'customize_controls_enqueue_scripts', 'aLaCode_custom_customize_enqueue' );
function aLaCode_custom_customize_enqueue() {
    wp_enqueue_style( 'aLaCode-customizer', get_template_directory_uri() . '/customize/style.css' );
}

/*------------------------------
 Setup
 ------------------------------*/

function aLaCode_setup() {
    
    global $aLaCode_defaults;
    
    load_theme_textdomain( 'aLaCode', get_template_directory() . '/languages' ); 
    
    register_nav_menus( array('header' => esc_html__( 'Main Menu', 'aLaCode' )) );
    
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo', array('height' => 150, 'width' => 300,'flex-height' => true,'flex-width'  => true ) );
    add_theme_support( 'custom-background');
	add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    
    $args = array(
        'flex-width'    => true,
        'width'         => 1200,
        'flex-height'    => true,
        'height'        => 550,
        'default-image' => $aLaCode_defaults['aLaCode_custom_header'],
    );
    add_theme_support( 'custom-header', $args );

    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 760, 400, true );
    add_image_size( 'aLaCode-slider', 1200, 550, true );
    add_image_size( 'aLaCode-thumbnail', 760, 400, true );

    add_post_type_support('page', 'excerpt');
    
    #https://make.wordpress.org/core/2016/11/26/extending-the-custom-css-editor/
    if ( function_exists( 'wp_update_custom_css_post' ) ) {
        $css = aLaCode_get_option('aLaCode_advanced_css');
        if ( $css ) {
            $core_css = wp_get_custom_css(); 
            $return = wp_update_custom_css_post( $core_css . $css );
            if ( ! is_wp_error( $return ) ) {
                remove_theme_mod( 'aLaCode_advanced_css' );
            }
        }
    }
	
	#WooCommerce
	if ( class_exists( 'WooCommerce' ) ) {
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'woocommerce' );
	}
}
add_action( 'after_setup_theme', 'aLaCode_setup' );

/*------------------------------
 Styles and Scripts
 ------------------------------*/

function aLaCode_scripts() {
    
    /* Styles */
    
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_register_style('bootstrap-select', get_template_directory_uri() . '/assets/css/bootstrap-select.min.css' );
    wp_register_style('font-awesome', get_template_directory_uri().'/assets/css/font-awesome.min.css' );
    wp_register_style('owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.css' );

    //fonts
    wp_enqueue_style('aLaCode-googlefont1', '//fonts.googleapis.com/css?family=Montserrat:400,700'); #headings
    wp_enqueue_style('aLaCode-googlefont2', '//fonts.googleapis.com/css?family=Lato:400,700,300,300italic,400italic,700italic'); #body
    wp_enqueue_style('aLaCode-googlefont3', '//fonts.googleapis.com/css?family=Raleway:200'); #logo
    wp_enqueue_style('aLaCode-googlefont4', '//fonts.googleapis.com/css?family=Caveat'); #tagline
    
    //default stylesheet
    $deps = array('bootstrap', 'bootstrap-select', 'font-awesome', 'owl-carousel');
    wp_enqueue_style('aLaCode-style', get_stylesheet_uri(), $deps );
    wp_style_add_data( 'aLaCode-style', 'rtl', 'replace' );
	
    /* Scripts */
    
    // Load html5shiv.min.js
	wp_enqueue_script( 'aLaCode-html5', get_template_directory_uri() . '/assets/js/html5shiv.min.js', array(), '3.7.0' );
	wp_script_add_data( 'aLaCode-html5', 'conditional', 'lt IE 9' );
    // Load respond.min.js
	wp_enqueue_script( 'aLaCode-respond', get_template_directory_uri() . '/assets/js/respond.min.js', array(), '1.3.0' );
	wp_script_add_data( 'aLaCode-respond', 'conditional', 'lt IE 9' );
    
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), '', true );
    wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/assets/js/bootstrap-select.min.js', array('jquery','bootstrap'), '', true );
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '', true );
    wp_enqueue_script('aLaCode-js', get_template_directory_uri() . '/assets/js/aLaCode.js', array('jquery'), '', true );
    
    //comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
}
add_action( 'wp_enqueue_scripts', 'aLaCode_scripts' );

/*------------------------------
 Custom CSS
 ------------------------------*/

if ( ! function_exists( 'aLaCode_custom_css_banner_overlay' ) ) :
function aLaCode_custom_css_banner_overlay(){ 
	global $aLaCode_defaults;
    $aLaCode_frontpage_banner_overlay_color = aLaCode_get_option('aLaCode_frontpage_banner_overlay_color');
	$aLaCode_frontpage_banner_overlay_show = aLaCode_get_option('aLaCode_frontpage_banner_overlay_show');
    if($aLaCode_frontpage_banner_overlay_show == 0){
		echo "<style>";
		echo ".frontpage-banner:before, .frontpage-slider .item:before{content:none;}";
		echo "</style>";
	} else if($aLaCode_frontpage_banner_overlay_color != $aLaCode_defaults['aLaCode_frontpage_banner_overlay_color']) {
		echo "<style>";
		echo ".frontpage-banner:before, .frontpage-slider .item:before{background-color:".esc_attr($aLaCode_frontpage_banner_overlay_color).";}"; 
		echo "</style>";
	}
} 
endif;
add_action('wp_head','aLaCode_custom_css_banner_overlay', 98);

if ( ! function_exists( 'aLaCode_custom_css' ) ) :
function aLaCode_custom_css() {
    $aLaCode_advanced_css = aLaCode_get_option('aLaCode_advanced_css');
    if($aLaCode_advanced_css != '') {    
        echo '<!-- Custom CSS -->';
        $output = "<style>" . wp_strip_all_tags($aLaCode_advanced_css) . "</style>";
        echo $output;
        echo '<!-- /Custom CSS -->';
    }
}
endif;
add_action('wp_head','aLaCode_custom_css', 99);


/*------------------------------
 Widgets
 ------------------------------*/
require_once get_template_directory() . '/widgets/widgets.php';

/*------------------------------
 Content Width 
 ------------------------------*/
if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}

/*------------------------------
 wp_bootstrap_navwalker
 ------------------------------*/
require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/*------------------------------
 TGM_Plugin_Activation
 ------------------------------*/

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'aLaCode_register_required_plugins' );
function aLaCode_register_required_plugins() {
	$plugins = array(
        array(
			'name'      => 'Recent Posts Widget With Thumbnails',
			'slug'      => 'recent-posts-widget-with-thumbnails',
			'required'  => false,
		),
	);
	$config = array(
		'id'           => 'aLaCode',                  // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}

/*------------------------------
 Filters
 ------------------------------*/

#move comment field to the bottom of the comments form
function aLaCode_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'aLaCode_move_comment_field_to_bottom' );

#excerpt length
function aLaCode_excerpt_length( $length ) {
	return 45;
}
add_filter( 'excerpt_length', 'aLaCode_excerpt_length', 999 );

#add class to page nav
function aLaCode_wp_page_menu_class( $class ) {
  return preg_replace( '/<ul>/', '<ul class="nav navbar-nav">', $class, 1 );
}
add_filter( 'wp_page_menu', 'aLaCode_wp_page_menu_class' );

//https://gist.github.com/hatsumatsu/e5df3b0bf9ac3389c0b0
#doesn't work?
add_filter('embed_oembed_html', 'aLaCode_embed_oembed_html', 10, 4);
function aLaCode_embed_oembed_html($html, $url, $attr, $post_id) {
	$class = ' ';
	if( strpos( $url, 'youtu' ) || strpos( $url, 'vimeo' ) ) {
		$class .= ' iframe-video';
	}
	return '<div class="' . esc_attr( $class ) . '">' . $html . '</div>';
}



#get_the_archive_title
function aLaCode_archive_title( $title ) {
    if( is_home() && get_option('page_for_posts') ) {
        $title = get_page( get_option('page_for_posts') )->post_title;
    }
    else if( is_home() ) {
        $title = aLaCode_get_option('aLaCode_blog_feed_label');
        $title = esc_html($title);
    }  
    return $title;
}
add_filter( 'get_the_archive_title', 'aLaCode_archive_title' );

/*------------------------------
 Top Navigation
 ------------------------------*/
 
#add search form to nav
function aLaCode_nav_items_wrap() {
    // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
    // open the <ul>, set 'menu_class' and 'menu_id' values
    $wrap  = '<ul id="%1$s" class="%2$s">';
    // get nav items as configured in /wp-admin/
    $wrap .= '%3$s';
    // the static link 
    $wrap .= aLaCode_get_nav_search_item();
    // close the <ul>
    $wrap .= '</ul>';
    // return the result
    return $wrap;
}

function aLaCode_get_nav_search_item(){
    return '<li class="search">
        <a href="javascript:;" id="toggle-main_search" data-toggle="dropdown"><i class="fa fa-search"></i></a>
        <div class="dropdown-menu main_search">
            <form name="main_search" method="get" action="'.esc_url(home_url( '/' )).'">
                <input type="text" name="s" class="form-control" placeholder="'. esc_attr(__('Type here','aLaCode')).'" />
            </form>
        </div>
    </li>';
}

#default nav top level pages
function aLaCode_default_nav(){
    echo '<div class="navbar-collapse collapse">';
    echo '<ul class="nav navbar-nav">';
    $pages = get_pages();  
    $n = count($pages); 
    $i=0;
    foreach ( $pages as $page ) {
        $menu_name = esc_html($page->post_title);
        $menu_link = get_page_link( $page->ID );
        if(get_the_ID() == $page->ID) $current_class = "current_page_item current-menu-item";
        else { $current_class = ''; }
        $menu_class = "page-item-" . $page->ID;
        echo "<li class='page_item ".esc_attr($menu_class)." $current_class'><a href='".esc_url($menu_link)."'>".esc_html($menu_name)."</a></li>";
        $i++;
        if($n == $i){
            echo aLaCode_get_nav_search_item();
        }
    } 
    echo '</ul>';
    echo '</div>';
}

/*------------------------------
 Helper
 ------------------------------*/
 
if ( ! function_exists( 'aLaCode_get_option' ) ) :
function aLaCode_get_option($key){
    global $aLaCode_defaults;
    if (array_key_exists($key, $aLaCode_defaults)) 
        $value = get_theme_mod($key, $aLaCode_defaults[$key]); 
    else
        $value = get_theme_mod($key);
    return $value;
}
endif;

if ( ! function_exists( 'aLaCode_get_bootstrap_class' ) ) :
function aLaCode_get_bootstrap_class($columns){
    switch($columns){
        case 1: return 'col-md-12'; break;
        case 2: return 'col-lg-6 col-md-6 col-sm-6 col-xs-6'; break;
        case 3: return 'col-lg-4 col-md-4 col-sm-4 col-xs-12'; break;
        case 4: return 'col-lg-3 col-md-3 col-sm-6 col-xs-12'; break;
        case 5: return 'col-md-20'; break;
        case 6: return 'col-lg-2 col-md-2 col-sm-2 col-xs-6'; break;
    }
}
endif;

if ( ! function_exists( 'aLaCode_get_sample' ) ) :
function aLaCode_get_sample($what){
    global $aLaCode_defaults;
    switch($what){
        case 'slide':           $images = $aLaCode_defaults['aLaCode_slide_sample']; $rand_key = array_rand($images, 1); return ($images[$rand_key]);
        case 'aLaCode-thumbnail':  $images = $aLaCode_defaults['aLaCode_thumbnail_sample']; $rand_key = array_rand($images, 1); return ($images[$rand_key]);
        case 'full':            $images = $aLaCode_defaults['aLaCode_full_sample']; $rand_key = array_rand($images, 1); return ($images[$rand_key]);
        case 'aLaCode-vertical':   $images = $aLaCode_defaults['aLaCode_vertical_sample']; $rand_key = array_rand($images, 1); return ($images[$rand_key]);    
        case 'aLaCode-index':      $images = $aLaCode_defaults['aLaCode_index_sample']; $rand_key = array_rand($images, 1); return ($images[$rand_key]);    
    }
}
endif;

if ( ! function_exists( 'aLaCode_show_custom_css_field' ) ) :
function aLaCode_show_custom_css_field(){
    if(get_bloginfo('version') >= 4.7){
        $aLaCode_advanced_css = aLaCode_get_option('aLaCode_advanced_css');
        if($aLaCode_advanced_css == '') return false;
        else return true;
    } 
    return true;
}
endif;

#aLaCode_example_sidebar
function aLaCode_example_sidebar(){
    echo '<div class="sidebar-default sidebar-block sidebar-no-borders" >';
    the_widget('WP_Widget_Search', 'title=' . esc_html__('Search', 'aLaCode'), 'before_title=<h3 class="widget-title"><span>&after_title=</span></h3>&before_widget=<div class="default-widget widget widget_search">&after_widget=</div>');
    the_widget('WP_Widget_Pages', 'title=' . esc_html__('Pages', 'aLaCode') , 'before_title=<h3 class="widget-title"><span>&after_title=</span></h3>&before_widget=<div class="default-widget widget">&after_widget=</div>');
    the_widget('WP_Widget_Recent_Posts', 'title=' . esc_html__('Recent Posts', 'aLaCode') , 'before_title=<h3 class="widget-title"><span>&after_title=</span></h3>&before_widget=<div class="default-widget widget">&after_widget=</div>');
    the_widget( 'WP_Widget_Archives', 'title=' . esc_html__('Archives', 'aLaCode'), 'before_title=<h3 class="widget-title"><span>&after_title=</span></h3>&before_widget=<div class="default-widget widget">&after_widget=</div>');
    the_widget( 'WP_Widget_Categories', 'title=' . esc_html__('Categories', 'aLaCode'), 'before_title=<h3 class="widget-title"><span>&after_title=</span></h3>&before_widget=<div class="default-widget widget">&after_widget=</div>');
    echo '</div>';
}
?>