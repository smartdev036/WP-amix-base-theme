<?php get_header(); ?>

	<div id="content" class="col_content">
		
		<h1 class="page-title"><?php _e('Search for: ','am'); echo get_search_query(); ?></h1>
	
		<?php breadcrumb_trail('echo=1&separator=/'); ?>

		<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'templates/content', 'post' ); ?>
		<?php endwhile; ?>
		
		<?php get_template_part( 'templates/pagination', 'post' ); ?>
		
	<?php else : ?>
		<?php get_template_part( 'templates/content', 'none' ); ?>
	<?php endif; ?>

	</div><!-- /content -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>