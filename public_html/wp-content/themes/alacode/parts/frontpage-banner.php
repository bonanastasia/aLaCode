<?php
/**
 * Frontpage Banner, Slider
 *
 * @package aLaCode
 */
?>
<!-- Frontpage Banner / Slider -->

<?php $aLaCode_frontpage_banner = aLaCode_get_option('aLaCode_frontpage_banner'); 
$aLaCode_example_content = aLaCode_get_option('aLaCode_example_content'); ?>

<?php 

$force_banner = false;

/*** Posts Slider ***/ 

if ($aLaCode_frontpage_banner == 'Posts') { 
    $aLaCode_frontpage_posts_slider_category = aLaCode_get_option('aLaCode_frontpage_posts_slider_category');
    $aLaCode_frontpage_posts_slider_number = aLaCode_get_option('aLaCode_frontpage_posts_slider_number');
    $args = array( 'posts_per_page' => $aLaCode_frontpage_posts_slider_number, 'category' => $aLaCode_frontpage_posts_slider_category );
    $aLaCode_posts_slider = get_posts( $args ); 
    $n = count($aLaCode_posts_slider);
    if($n > 2) { #own carousel limitation?
    ?>
    <div class="frontpage-slider frontpage-posts-slider">
        <div class="owl-carousel">
        <?php foreach ( $aLaCode_posts_slider as $post ) { 
            setup_postdata( $post );  
            $src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'aLaCode-slider' ) ;
            $featured_image = '';
			if($src) $featured_image = $src[0]; 
            else if($aLaCode_example_content == 1) $featured_image = aLaCode_get_sample('slide'); 
            if($featured_image) { ?>
            <div class="item">
                <img src="<?php echo esc_url($featured_image) ?>" alt="<?php the_title_attribute(); ?>" />
                <div class="caption">
                    <p class="date"><?php echo get_the_date(); ?></p>
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <p class="read-more"><a href="<?php the_permalink(); ?>"><?php printf( _nx('%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'aLaCode' ), number_format_i18n( get_comments_number() ) ); ?></a></p>
                </div>
            </div>
            <?php }
        } wp_reset_postdata(); ?>
        </div>
    </div>
<?php 
    } else { $force_banner = true; }
} 

/*** Banner ***/ 

if($aLaCode_frontpage_banner == 'Banner' || $force_banner) { 
    $header_image = get_header_image(); 
    $aLaCode_banner_heading = aLaCode_get_option('aLaCode_banner_heading');
    $aLaCode_banner_description = aLaCode_get_option('aLaCode_banner_description');
    $aLaCode_banner_url = aLaCode_get_option('aLaCode_banner_url');
    if($header_image != '') { 
?>
    <div class="frontpage-banner">
        <img src="<?php echo $header_image ?>" alt="<?php echo esc_attr($aLaCode_banner_heading); ?>" />
        <div class="caption">
            <?php if($aLaCode_banner_url != '' && $aLaCode_banner_heading != '') { ?>
            <h2><a href="<?php echo esc_url($aLaCode_banner_url); ?>"><?php echo esc_html($aLaCode_banner_heading); ?></a></h2>
            <?php } ?>
            <?php if($aLaCode_banner_url == '' && $aLaCode_banner_heading != '') { ?>
            <h2><?php echo esc_html($aLaCode_banner_heading); ?></h2>
            <?php } ?>
            <?php if($aLaCode_banner_description != '') { ?>
            <p class="read-more"><?php echo esc_html($aLaCode_banner_description); ?></p>
            <?php } ?>
        </div>
    </div>
<?php 
    }
} 
?>

<!-- /Frontpage Banner / Slider -->