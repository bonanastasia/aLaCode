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
	<?php get_template_part('parts/frontpage', 'featured'); ?>
    <?php get_sidebar(); ?>
</div>
<!-- /Two Columns -->
<hr />
</div>

<?php get_footer(); ?>