<?php
/**
 * Frontpage - Large/Highlight Post
 *
 * @package kale
 */
?>
<?php 
$kale_frontpage_large_post_show = kale_get_option('kale_frontpage_large_post_show');
if($kale_frontpage_large_post_show == 1) { 
    global $post;
    $kale_frontpage_large_post_heading = kale_get_option('kale_frontpage_large_post_heading');
    $kale_frontpage_large_post = kale_get_option('kale_frontpage_large_post');
    $post = get_post($kale_frontpage_large_post); 
    setup_postdata($post); 
    $kale_entry = 'full';
    $kale_frontpage_large_post = 'yes';?>
    <!-- Frontpage Large Post -->
    <div class="frontpage-large-post">
        
        <h2 class="block-title"><img class="sprinkle-icon" src="http://i36.photobucket.com/albums/e26/anagoodwin/beforeSprinkle_zpsm6ktozfp.png"><span><?php echo esc_html($kale_frontpage_large_post_heading); ?></span><img class="sprinkle-icon" src="http://oi36.photobucket.com/albums/e26/anagoodwin/e54a5f48-ba34-4156-af86-67bd7979c43a_zpskrrwhgxm.png"></h2>
        <?php include(locate_template('parts/entry.php')); ?>
        <hr />

    </div>
    <!-- /Frontpage Large Post -->
<?php wp_reset_postdata();  
}
?>