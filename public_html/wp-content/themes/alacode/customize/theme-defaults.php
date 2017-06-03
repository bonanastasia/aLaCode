<?php
/**
 * aLaCode theme defaults
 *
 * @package aLaCode
 */
?>
<?php 
$aLaCode_defaults['aLaCode_custom_header']                    = esc_url( get_template_directory_uri() ) . '/sample/images/header.jpg';

$aLaCode_defaults['aLaCode_footer_copyright']                 = esc_html__('Copyright &copy; ', 'aLaCode'). date('Y') .' <a href="https://www.lyrathemes.com/aLaCode/">aLaCode</a>';
$aLaCode_defaults['aLaCode_nav_search_icon']                  = 1;
$aLaCode_defaults['aLaCode_example_content']					= 1;

$aLaCode_defaults['aLaCode_image_logo_show']                  = 0;
$aLaCode_defaults['aLaCode_text_logo']                        = get_bloginfo('name');

$aLaCode_defaults['aLaCode_banner_heading']                   = get_bloginfo('name');
$aLaCode_defaults['aLaCode_banner_description']               = get_bloginfo('description');
$aLaCode_defaults['aLaCode_banner_url']                       = '#';

$aLaCode_defaults['aLaCode_frontpage_banner']                 = 'Banner';
$aLaCode_defaults['aLaCode_frontpage_banner_overlay_show']	= 1;
$aLaCode_defaults['aLaCode_frontpage_banner_overlay_color']   = '#555555';

$aLaCode_defaults['aLaCode_frontpage_posts_slider_category']  = 1; //Uncategorized
$aLaCode_defaults['aLaCode_frontpage_posts_slider_number']    = '3';

$aLaCode_defaults['aLaCode_frontpage_featured_posts_show']    = 1;
$aLaCode_defaults['aLaCode_frontpage_featured_posts_heading'] = esc_html__('Featured Posts', 'aLaCode');
$aLaCode_defaults['aLaCode_frontpage_featured_posts_post_1']  = 1;
$aLaCode_defaults['aLaCode_frontpage_featured_posts_post_2']  = 1;
$aLaCode_defaults['aLaCode_frontpage_featured_posts_post_3']  = 1;

$aLaCode_defaults['aLaCode_frontpage_large_post_show']        = 0;
$aLaCode_defaults['aLaCode_frontpage_large_post_heading']     = esc_html__('My Diary', 'aLaCode');
$aLaCode_defaults['aLaCode_frontpage_large_post']             = 1;

$aLaCode_defaults['aLaCode_frontpage_blog_posts_heading'] 	  = esc_html__('Recent Posts', 'aLaCode');

$aLaCode_defaults['aLaCode_blog_feed_meta_show']              = 1;
$aLaCode_defaults['aLaCode_blog_feed_date_show']              = 1;
$aLaCode_defaults['aLaCode_blog_feed_category_show']          = 1;
$aLaCode_defaults['aLaCode_blog_feed_author_show']            = 1;
$aLaCode_defaults['aLaCode_blog_feed_comments_show']          = 0;
$aLaCode_defaults['aLaCode_blog_feed_post_format']            = 'Mixed';
$aLaCode_defaults['aLaCode_blog_feed_label']                  = __('Recent Posts', 'aLaCode');

$aLaCode_defaults['aLaCode_posts_meta_show']                  = 1;
$aLaCode_defaults['aLaCode_posts_date_show']                  = 1;    
$aLaCode_defaults['aLaCode_posts_category_show']              = 1;
$aLaCode_defaults['aLaCode_posts_author_show']                = 1;
$aLaCode_defaults['aLaCode_posts_tags_show']                  = 1;
$aLaCode_defaults['aLaCode_posts_sidebar']                    = '1';
$aLaCode_defaults['aLaCode_posts_featured_image_show']        = 1;

$aLaCode_defaults['aLaCode_pages_sidebar']                    = '1';
$aLaCode_defaults['aLaCode_pages_featured_image_show']        = 1;

$aLaCode_defaults['aLaCode_sidebar_size']						= 0;

/* sample images */

$aLaCode_defaults['aLaCode_slide_sample'][]                   = esc_url( get_template_directory_uri() ) . '/sample/images/slide1.jpg';
$aLaCode_defaults['aLaCode_slide_sample'][]                   = esc_url( get_template_directory_uri() ) . '/sample/images/slide2.jpg';
$aLaCode_defaults['aLaCode_slide_sample'][]                   = esc_url( get_template_directory_uri() ) . '/sample/images/slide3.jpg';

$aLaCode_defaults['aLaCode_thumbnail_sample'][]               = esc_url( get_template_directory_uri() ) . '/sample/images/thumb1.jpg';
$aLaCode_defaults['aLaCode_thumbnail_sample'][]               = esc_url( get_template_directory_uri() ) . '/sample/images/thumb2.jpg';
$aLaCode_defaults['aLaCode_thumbnail_sample'][]               = esc_url( get_template_directory_uri() ) . '/sample/images/thumb3.jpg';
$aLaCode_defaults['aLaCode_thumbnail_sample'][]               = esc_url( get_template_directory_uri() ) . '/sample/images/thumb4.jpg';
$aLaCode_defaults['aLaCode_thumbnail_sample'][]               = esc_url( get_template_directory_uri() ) . '/sample/images/thumb5.jpg';

$aLaCode_defaults['aLaCode_full_sample'][]                    = esc_url( get_template_directory_uri() ) . '/sample/images/full1.jpg';
$aLaCode_defaults['aLaCode_full_sample'][]                    = esc_url( get_template_directory_uri() ) . '/sample/images/full2.jpg';
$aLaCode_defaults['aLaCode_full_sample'][]                    = esc_url( get_template_directory_uri() ) . '/sample/images/full3.jpg';
?>