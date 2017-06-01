<?php
/**
* The template for displaying the footer
*
* @package aLaCode
*/
?>

        <?php if(is_front_page() && !is_paged() ) { 
            get_template_part('parts/frontpage', 'large'); 
        } ?>

        <?php get_sidebar('footer'); ?>
        
        <!-- Footer -->
        <div class="footer">
            
            <?php if ( is_active_sidebar( 'footer-row-3-center' ) ) { ?>
            <div class="footer-row-3-center"><?php dynamic_sidebar( 'footer-row-3-center' ); ?>
            <?php } ?>
            
            <?php $aLaCode_footer_copyright = aLaCode_get_option('aLaCode_footer_copyright'); ?>
            <?php if($aLaCode_footer_copyright) { ?>
            <div class="footer-copyright"><?php echo wp_kses_post($aLaCode_footer_copyright); ?></div>
            <?php } ?>
            
            <div class="footer-copyright">
                <ul class="credit">
                    <li><a href="https://www.lyrathemes.com/aLaCode/"><?php esc_html_e('aLaCode', 'aLaCode'); ?></a> <?php esc_html_e('by LyraThemes.com', 'aLaCode'); ?></a>.</li>
                </ul>
            </div>
            
        </div>
        <!-- /Footer -->
        
    </div><!-- /Container -->
</div><!-- /Main Wrapper -->

<?php wp_footer(); ?>
</body>
</html>
