<?php get_header(); ?>

	<div id="content" class="col_content">
	
		<?php //breadcrumb_trail('echo=1&separator=/'); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'templates/content', 'page' ); ?>
		<?php endwhile; endif; ?>

	</div><!-- /content -->

	<?php //get_sidebar(); ?>

<?php get_footer(); ?>