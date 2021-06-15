<!-- Begin Hero Section -->
<section class="hero">
	<div class="container">
		<h1 class="section-title">
		<?php the_field('title'); ?>
		</h1>
	</div>
</section>
<!-- End Hero Section -->
<!-- Begin Article Section -->
<section class="article">
	<div class="container">
		<div class="article-meta">
			<div class="article-meta-artinfo">
				<p class="article-meta__date"><?php echo get_the_date( 'F Y' ); ?></p>
				<?php $post_tags = get_the_category(); ?>
				<p class="article-meta__field"><?php echo $post_tags[0]->name; ?></p>
				<ul class="article-meta__share__items">
				<li class="article-meta__share__item">
					<a href="#"
					><img src="<?php echo get_template_directory_uri(); ?>/assets/images/branch.svg" alt="branch"
					/></a>
				</li>
				<li class="article-meta__share__item">
					<a href="<?php echo 'https://twitter.com/intent/tweet?url=' . get_the_permalink(get_the_ID()) . '&text='.get_the_title() ; ?>"
					><img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter-yellow.svg" alt="branch"
					/></a>
				</li>
				<li class="article-meta__share__item">
					<a href="<?php echo 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink(get_the_ID()) . '&title='. get_the_title(); ?>"
					><img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin-yellow.svg" alt="branch"
					/></a>
				</li>
				</ul>
			</div>
		</div>
		<?php the_content(); ?>
	</div>
</section>
<!-- End Article Section -->
<?php $prev_post = get_previous_post();?>
<?php $next_post = get_next_post();?>
<!-- start Transfer Section -->
<section class="transfer">
	<div class="container">
		<div class="transfer-left"></div>
		<div class="transfer-right">
		<div class="transfer-direction">
			<div class="transfer-direction__prev">
			<?php if ( $prev_post ): ?>
			<a href="<?php echo get_permalink( $prev_post->ID ); ?>"><h5 class="size-medium">Previous</h5></a>
			<p class="size-small"><?php echo apply_filters( 'the_title', $prev_post->post_title ); ?></p>
			<?php endif; ?>
			</div>
			<div class="transfer-direction__next">
			<?php if ( $next_post ): ?>
			<a href="<?php echo get_permalink($next_post->ID); ?>"><h5 class="size-medium">Next</h5></a>
			<p class="size-small"><?php echo apply_filters( 'the_title', $next_post->post_title ); ?></p>
			<?php endif; ?>
			</div>
		</div>
		</div>
	</div>
</section>
<!-- End Transfer Section -->
