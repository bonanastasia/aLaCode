<?php
/**
Template Name: BlogPg Template
* 
* @package kale
*/
?>

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

<?php get_header(); ?>

	
	<!-- Two Columns -->
	<div class="row two-columns">
		<div class="col-xs-12 col-md-8">
			<?php

			// the query
        $aLaCode_i = 1; $aLaCode_ad = 0; $aLaCode_flag = true; $aLaCode_div_open = 0;

			$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

			<?php if ( $wpb_all_query->have_posts() ) : ?>

			    <!-- the loop -->

			    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); 
			        if($aLaCode_blog_feed_post_format == 'Mixed') { 
                    if ($aLaCode_i == 1 && $aLaCode_flag) { ?><div class="row" data-fluid=".entry-title"><div class="col-12"><?php $aLaCode_entry = 'full'; include(locate_template('parts/entry.php')); $aLaCode_i = 2; $aLaCode_flag = false; ?></div><?php } 
                    if ($aLaCode_i == 2 && $aLaCode_flag) { ?><div class="col-12"><?php $aLaCode_entry = 'full'; include(locate_template('parts/entry.php')); $aLaCode_i = 3; $aLaCode_flag = false; ?></div></div><?php } 
                    if ($aLaCode_i == 3 && $aLaCode_flag) { $aLaCode_entry = 'full'; include(locate_template('parts/entry.php')); $aLaCode_i=1; $aLaCode_flag = false; } ?> <hr><?php 
                } 
                /*** Small: Small Image and Excerpt, 2 in a Row ***/
                else if($aLaCode_blog_feed_post_format == 'Small') {
                    if($aLaCode_i%2 != 0) { $aLaCode_div_open = 1; ?><div class="row"><?php } ?>
                    <div class="col-md-6"><?php $aLaCode_entry = 'small'; include(locate_template('parts/entry.php')); $aLaCode_i++; ?></div>
                    <?php if($aLaCode_i%2 != 0) { ?></div><?php $aLaCode_div_open = 0;} ?><?php 
                }
                 $aLaCode_flag = true;
			     endwhile; ?>
			    <!-- end of the loop -->

			    <?php wp_reset_postdata(); ?>
			<?php else : ?>
			    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

		</div>
	    <?php get_sidebar(); ?>
	</div>
	<!-- /Two Columns -->
	<hr />

<?php get_footer(); ?>