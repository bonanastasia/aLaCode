<?php
/**
* The category template file.
* 
* @package aLaCode
*/
?>
<?php get_header(); ?>

<!-- Full Width Category -->
<div class="full-width-category">
    <h1 class="block-title"><img class="sprinkle-icon" src="http://alacode.io/wp-content/uploads/2017/06/beforeSprinkle.png"><span><?php single_cat_title(); ?></span><img class="sprinkle-icon" src="http://alacode.io/wp-content/uploads/2017/06/afterSprinkle.png"></h1>
    
    <!-- Blog Feed -->
    <div class="blog-feed">
        <?php $aLaCode_i = 0; 
        if ( have_posts() ) { 
            while ( have_posts() ) : the_post(); ?>
            <?php if($aLaCode_i%3 == 0) { ?><div class="row" data-fluid=".entry-title"><?php } ?>
            <div class="col-md-4"><?php $aLaCode_entry = 'small'; include(locate_template('parts/entry.php')); $aLaCode_i++; ?></div>
            <?php if($aLaCode_i%3 == 0) { ?></div><?php } ?>
            <?php 
            endwhile; 
        }?>
        
    </div>
    <!-- /Blog Feed -->
    <?php if(get_next_posts_link() || get_previous_posts_link()) { ?>
    <hr />
    <div class="pagination-blog-feed">
        <?php if( get_next_posts_link() ) { ?><div class="previous_posts"><?php next_posts_link( esc_html__('Previous Posts', 'aLaCode') ); ?></div><?php } ?>
        <?php if( get_previous_posts_link() ) { ?><div class="next_posts"><?php previous_posts_link( esc_html__('Next Posts', 'aLaCode') ); ?></div><?php } ?>
    </div>
    <?php } ?>
</div>
<!-- /Full Width Category -->
<hr />

<?php get_footer(); ?>