<?php
/**
* The main template file.
* 
* @package aLaCode
*/
?>
<?php get_header(); ?>

<div class="blog-feed">
	
<!-- Two Columns -->
<div class="row two-columns">
	<div class="col-xs-12 col-md-8">
		<?php get_template_part('parts/frontpage', 'aboutALC'); ?>
		<?php get_template_part('parts/frontpage', 'feed'); ?>
	</div>
    <?php get_sidebar('services'); ?>
</div>
<!-- /Two Columns -->
<hr />
</div>

<?php get_footer(); ?>