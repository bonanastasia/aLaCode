<?php
/**
 * The template for displaying WooCommerce pages
 *
 * @package aLaCode
 */
?>
<?php get_header(); ?>

<?php 
$aLaCode_pages_sidebar = aLaCode_get_option('aLaCode_pages_sidebar'); 
$aLaCode_pages_featured_image_show = aLaCode_get_option('aLaCode_pages_featured_image_show');
$aLaCode_sidebar_size = aLaCode_get_option('aLaCode_sidebar_size');
?>


<!-- Two Columns -->
<div class="row two-columns">
    <!-- Main Column -->
    <?php if($aLaCode_pages_sidebar == 1) { ?>
    <div class="main-column <?php if($aLaCode_sidebar_size == 0) { ?> col-md-8 <?php } else { ?> col-md-9 <?php } ?>">
    <?php } else { ?>
    <div class="main-column col-md-12">
    <?php } ?>
        
        <!-- Page Content -->
        <div id="page-woocommerce" <?php post_class('entry entry-page'); ?>>
        
            <?php woocommerce_content(); ?>
            
        </div>
        <!-- /Page Content -->
        
        <!-- Page Comments -->
        <?php if ( comments_open() ) : ?>
        <hr />
        <?php comments_template(); ?>
        <?php endif; ?>  
        <!-- /Page Comments -->  
        
    </div>
    <!-- /Main Column -->

    <?php if($aLaCode_pages_sidebar == 1)  get_sidebar();  ?>

</div>
<!-- /Two Columns -->

<hr />

<?php get_footer(); ?>