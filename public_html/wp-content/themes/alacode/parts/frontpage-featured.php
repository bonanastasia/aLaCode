<?php
/**
 * Frontpage - Featured Posts
 *
 * @package aLaCode
 */
?>
<?php 
$aLaCode_frontpage_featured_posts_show = aLaCode_get_option('aLaCode_frontpage_featured_posts_show');
if($aLaCode_frontpage_featured_posts_show == 1) { 
    global $post;
    $aLaCode_frontpage_featured_posts_heading = aLaCode_get_option('aLaCode_frontpage_featured_posts_heading');
    $aLaCode_frontpage_featured_posts_post_1 = aLaCode_get_option('aLaCode_frontpage_featured_posts_post_1');
    $aLaCode_frontpage_featured_posts_post_2 = aLaCode_get_option('aLaCode_frontpage_featured_posts_post_2');
    $aLaCode_frontpage_featured_posts_post_3 = aLaCode_get_option('aLaCode_frontpage_featured_posts_post_3'); 
    $aLaCode_entry = 'small'; ?>
    <!-- Frontpage Featured Posts TESTING!!-->
    <div class="frontpage-featured-posts col-sm-12 col-md-8">
        <h2 class="block-title"><img class="sprinkle-icon" src="http://alacode.io/wp-content/uploads/2017/06/beforeSprinkle.png"><span><?php echo esc_html($aLaCode_frontpage_featured_posts_heading); ?></span><img class="sprinkle-icon" src="http://alacode.io/wp-content/uploads/2017/06/afterSprinkle.png"></h2>
        <div class="row" data-fluid=".entry-title">
            <div class="col-md-4">
                <?php 
                $post = get_post($aLaCode_frontpage_featured_posts_post_1); 
                if($post) {
                    setup_postdata($post); 
                    include(locate_template('parts/entry.php'));
                    wp_reset_postdata(); 
                }
                ?>
            </div>
            <div class="col-md-4">
                <?php 
                $post = get_post($aLaCode_frontpage_featured_posts_post_2); 
                if($post) {
                    setup_postdata($post); 
                    include(locate_template('parts/entry.php'));
                    wp_reset_postdata(); 
                }
                ?>
            </div>
            <div class="col-md-4">
                <?php 
                $post = get_post($aLaCode_frontpage_featured_posts_post_3); 
                if($post) {
                    setup_postdata($post); 
                    include(locate_template('parts/entry.php'));
                    wp_reset_postdata(); 
                }
                ?>
            </div>
        </div>
    </div>
    <!-- /Frontpage Featured Posts -->
<?php } ?>