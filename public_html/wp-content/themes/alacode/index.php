<?php
/**
* The main template file.
* 
* @package aLaCode
*/
?>
<?php get_header(); ?>

<div class="blog-feed">
<div>
	<img src="https://www.fillmurray.com/200/300" alt="phil-ler image">
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima excepturi magni ipsam at praesentium laboriosam illum suscipit, adipisci esse odit non provident eveniet iusto id fugiat aliquid facere molestiae perspiciatis!</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus facilis eveniet laudantium rerum! Cupiditate illo molestiae harum vel deleniti dignissimos accusamus quas. Unde harum velit quos rerum, optio praesentium quibusdam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias natus ut consequuntur repellendus asperiores et officiis id delectus rem hic ipsam illo quisquam iusto consequatur, itaque nihil, perferendis quam facere!</p>
</div>
<!-- Two Columns -->
<div class="row two-columns">
    <?php get_template_part('parts/feed'); ?>
    <?php get_sidebar(); ?>
</div>
<!-- /Two Columns -->
<hr />
</div>

<?php get_footer(); ?>