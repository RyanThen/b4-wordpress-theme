<?php get_header(); ?>

<div class="container mt-4">
	<?php
	while (have_posts()) {
		the_post(); ?>
		
		<h2><?php the_title(); ?></h2>
		
		<?php the_content();
	}; ?>
</div>

<?php get_footer(); ?>