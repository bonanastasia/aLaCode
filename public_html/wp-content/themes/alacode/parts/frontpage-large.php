<?php
/**
 * Frontpage - Large/Highlight Post
 *
 * @package aLaCode
 */
?>
<?php 
$aLaCode_frontpage_large_post_show = aLaCode_get_option('aLaCode_frontpage_large_post_show');
if($aLaCode_frontpage_large_post_show == 1) { 
    global $post;
    $aLaCode_frontpage_large_post_heading = aLaCode_get_option('aLaCode_frontpage_large_post_heading');
    $aLaCode_frontpage_large_post = aLaCode_get_option('aLaCode_frontpage_large_post');
    $post = get_post($aLaCode_frontpage_large_post); 
    setup_postdata($post); 
    $aLaCode_entry = 'full';
    $aLaCode_frontpage_large_post = 'yes';?>
    <!-- Frontpage Large Post -->
    <div class="frontpage-large-post">
        
        <h2 class="block-title"><img class="sprinkle-icon" src="http://i36.photobucket.com/albums/e26/anagoodwin/beforeSprinkle_zpsm6ktozfp.png"><span><?php echo esc_html($aLaCode_frontpage_large_post_heading); ?></span><img class="sprinkle-icon" src="http://oi36.photobucket.com/albums/e26/anagoodwin/e54a5f48-ba34-4156-af86-67bd7979c43a_zpskrrwhgxm.png"></h2>
        <?php include(locate_template('parts/entry.php')); ?>
        <hr />

    </div>
    <!-- /Frontpage Large Post -->
<?php wp_reset_postdata();  
}
?>