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
    <!-- Frontpage Featured Posts -->
    <div class="frontpage-featured-posts col-md-8">
        <h2 class="block-title"><img class="sprinkle-icon" src="http://i36.photobucket.com/albums/e26/anagoodwin/beforeSprinkle_zpsm6ktozfp.png"><span><?php echo esc_html($aLaCode_frontpage_featured_posts_heading); ?></span><img class="sprinkle-icon" src="http://oi36.photobucket.com/albums/e26/anagoodwin/e54a5f48-ba34-4156-af86-67bd7979c43a_zpskrrwhgxm.png"></h2>
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