<?php
/**
 * The loop / blog feed
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
$aLaCode_blog_feed_post_format = aLaCode_get_option('aLaCode_blog_feed_post_format');
$aLaCode_sidebar_size = aLaCode_get_option('aLaCode_sidebar_size');
?>

<!-- Main Column -->
<div class="main-column <?php if($aLaCode_sidebar_size == 0) { ?> col-md-8 <?php } else { ?> col-md-9 <?php } ?>">
    <!-- Blog Feed -->
    <div class="blog-feed">
        <h2><?php echo get_the_archive_title(); ?></h2>
        
        <div class="blog-feed-posts">
        
        <?php
        $aLaCode_i = 1; $aLaCode_ad = 0; $aLaCode_flag = true; $aLaCode_div_open = 0;
        if ( have_posts() ) { 
            while ( have_posts() ) : the_post(); 
                /*** Mixed:  2 Small Posts, Followed by 1 Full ***/
                if($aLaCode_blog_feed_post_format == 'Mixed') { 
                    if ($aLaCode_i == 1 && $aLaCode_flag) { ?><div class="row" data-fluid=".entry-title"><div class="col-md-6"><?php $aLaCode_entry = 'small'; include(locate_template('parts/entry.php')); $aLaCode_i = 2; $aLaCode_flag = false; ?></div><?php } 
                    if ($aLaCode_i == 2 && $aLaCode_flag) { ?><div class="col-md-6"><?php $aLaCode_entry = 'small'; include(locate_template('parts/entry.php')); $aLaCode_i = 3; $aLaCode_flag = false; ?></div></div><?php } 
                    if ($aLaCode_i == 3 && $aLaCode_flag) { $aLaCode_entry = 'full'; include(locate_template('parts/entry.php')); $aLaCode_i=1; $aLaCode_flag = false; } 
                } 
                /*** Small: Small Image and Excerpt, 2 in a Row ***/
                else if($aLaCode_blog_feed_post_format == 'Small') {
                    if($aLaCode_i%2 != 0) { $aLaCode_div_open = 1; ?><div class="row"><?php } ?>
                    <div class="col-md-6"><?php $aLaCode_entry = 'small'; include(locate_template('parts/entry.php')); $aLaCode_i++; ?></div>
                    <?php if($aLaCode_i%2 != 0) { ?></div><?php $aLaCode_div_open = 0;} ?><?php 
                }
                 $aLaCode_flag = true;
            endwhile;
            if($aLaCode_i == 2 && $aLaCode_blog_feed_post_format == 'Mixed') { ?></div><?php } else if ($aLaCode_div_open == 1) { ?></div><?php }  
        } else { ?><div class="blog-feed-empty"><p><?php esc_html_e('No posts found.', 'aLaCode'); ?></p></div><?php } ?>
        
        </div>
        <?php if(get_next_posts_link() || get_previous_posts_link()) { ?>
        <div class="pagination-blog-feed">
            <?php if( get_next_posts_link() ) { ?><div class="previous_posts"><?php next_posts_link( esc_html__('Previous Posts', 'aLaCode') ); ?></div><?php } ?>
            <?php if( get_previous_posts_link() ) { ?><div class="next_posts"><?php previous_posts_link( esc_html__('Next Posts', 'aLaCode') ); ?></div><?php } ?>
        </div>
        <?php } ?>
    </div>
    <!-- /Blog Feed -->
</div>
<!-- /Main Column -->