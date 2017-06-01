<?php
/**
 * Main template for displaying a post within a feed
 *
 * @package aLaCode
 */
?>
<?php

$aLaCode_blog_feed_meta_show = aLaCode_get_option('aLaCode_blog_feed_meta_show');
$aLaCode_blog_feed_date_show = aLaCode_get_option('aLaCode_blog_feed_date_show');
$aLaCode_blog_feed_category_show = aLaCode_get_option('aLaCode_blog_feed_category_show');
$aLaCode_blog_feed_author_show = aLaCode_get_option('aLaCode_blog_feed_author_show');
$aLaCode_blog_feed_comments_show = aLaCode_get_option('aLaCode_blog_feed_comments_show');

$aLaCode_example_content = aLaCode_get_option('aLaCode_example_content');

if($aLaCode_entry == 'small')    { $aLaCode_post_class = 'entry-small'; $aLaCode_image_size = 'aLaCode-thumbnail'; }
if($aLaCode_entry == 'full')    { $aLaCode_post_class = 'entry-full'; $aLaCode_image_size = 'full'; }

#variables passed from calling pages
if(!isset($aLaCode_frontpage_large_post)) $aLaCode_frontpage_large_post = 'no';
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('entry ' . $aLaCode_post_class); ?>>
    
    <div class="entry-content">
        
        <div class="entry-thumb">
            <?php if(has_post_thumbnail()) { ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $aLaCode_image_size, array( 'alt' => get_the_title(), 'class'=>'img-responsive' ) ); ?></a>
            <?php } else if($aLaCode_example_content == 1) { ?>
            <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url(aLaCode_get_sample($aLaCode_image_size)) ?>" alt="<?php the_title_attribute() ?>" class="img-responsive" /></a>
            <?php } ?>
        </div>
        
        <?php if($aLaCode_blog_feed_meta_show == 1 && $aLaCode_blog_feed_date_show == 1) { ?>
        <div class="entry-date date updated"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></div>
        <?php } ?>
        
        <?php if(get_the_title() != '') { ?>
        <h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
        <?php } else { ?>
        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Post ID: ', 'aLaCode'); the_ID(); ?></a></h3>
        <?php } ?>
        
        <?php if($aLaCode_entry == 'full' ) { ?>
        <div class="entry-summary"><?php the_content(); ?><?php wp_link_pages(); ?></div>
        <?php } else { ?>
        <div class="entry-summary"><?php the_excerpt(); ?><?php wp_link_pages(); ?></div>
        <?php } ?>
        
        <?php if($aLaCode_blog_feed_meta_show == 1) { ?>
        <div class="entry-meta">
            <?php 
            $aLaCode_temp = array();
            if($aLaCode_blog_feed_category_show == 1)  $aLaCode_temp[] = '<div class="entry-category">' . get_the_category_list(', '). '</div>';
            if($aLaCode_blog_feed_author_show == 1)    $aLaCode_temp[] = '<div class="entry-author">' . __('by ', 'aLaCode') 
														. '<span class="vcard author"><span class="fn">' 
														. get_the_author() 
														. '</span></span>' 
														. '</div>';
            if($aLaCode_blog_feed_date_show == 1 && $aLaCode_entry == 'vertical')     
                                                    $aLaCode_temp[] = '<br /><div class="entry-date date updated">' . get_the_date() . '</div>';
            if ( ! post_password_required() && comments_open() && $aLaCode_blog_feed_comments_show == 1)  
                                                    $aLaCode_temp[] = '<div class="entry-comments"><a href="'.esc_url(get_comments_link()).'">'. sprintf( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'aLaCode' ), number_format_i18n( get_comments_number() ) ) .'</a></div>';
            if($aLaCode_temp) $aLaCode_str = implode('<span class="sep"> - </span>', $aLaCode_temp);
            echo $aLaCode_str;
            ?>
        </div>
        <?php } ?>
        
    </div>
</div>