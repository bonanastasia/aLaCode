<?php
/**
 * Widgets
 *
 * @package aLaCode
 */
?>
<?php

function aLaCode_widgets_init() {
    
    /* Sidebar Widgets */
    
    register_sidebar( array(
		'name'          => esc_html__( 'Sidebar - Default', 'aLaCode' ),
		'id'            => 'sidebar-default',
		'before_widget' => '<div id="%1$s" class="default-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Sidebar - Default - Bordered', 'aLaCode' ),
		'id'            => 'sidebar-default-bordered',
		'before_widget' => '<div id="%1$s" class="default-widget widget widget-bordered %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar - Default - Bordered - About', 'kale' ),
		'id'            => 'sidebar-default-bordered-about',
		'before_widget' => '<div id="%1$s" class="default-widget widget widget-bordered %2$s widget-bordered-about">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="about-widget-title widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar - Default - Bordered - Services', 'kale' ),
		'id'            => 'sidebar-default-bordered-services',
		'before_widget' => '<div id="%1$s" class="default-widget widget widget-bordered %2$s widget-bordered-services">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="services-widget-title widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
    
    /* Header Widgets */
    
	register_sidebar( array(
		'name'          => esc_html__( 'Header - Left', 'aLaCode' ),
		'id'            => 'header-row-1-left',
		'description'   => esc_html__( 'Add widgets here to appear in the top left area.', 'aLaCode' ),
		'before_widget' => '<div id="%1$s" class="header-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="header-widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Header - Right', 'aLaCode' ),
		'id'            => 'header-row-1-right',
		'description'   => esc_html__( 'Add widgets here to appear in the top right area.', 'aLaCode' ),
		'before_widget' => '<div id="%1$s" class="header-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="header-widget-title">',
		'after_title'   => '</h3>',
	) );
    
    /* Footer Widgets */
        
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Secondary - Col 1', 'aLaCode' ),
		'id'            => 'footer-row-2-col-1',
		'before_widget' => '<div id="%1$s" class="footer-row-2-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Secondary - Col 2', 'aLaCode' ),
		'id'            => 'footer-row-2-col-2',
		'before_widget' => '<div id="%1$s" class="footer-row-2-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Secondary - Col 3', 'aLaCode' ),
		'id'            => 'footer-row-2-col-3',
		'before_widget' => '<div id="%1$s" class="footer-row-2-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Secondary - Col 4', 'aLaCode' ),
		'id'            => 'footer-row-2-col-4',
		'before_widget' => '<div id="%1$s" class="footer-row-2-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Secondary - Col 5', 'aLaCode' ),
		'id'            => 'footer-row-2-col-5',
		'before_widget' => '<div id="%1$s" class="footer-row-2-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer - Last', 'aLaCode' ),
		'id'            => 'footer-row-3-center',
		'before_widget' => '<div id="%1$s" class="footer-row-3-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    
    
}
add_action( 'widgets_init', 'aLaCode_widgets_init' );

?>