<?php get_header(); ?>

<div class="container mt-4">
	<?php
	while (have_posts()) {
		the_post(); ?>
		
		<h2 class="mt-5"><?php the_title(); ?></h2>
		
		<div class="mt-5 pb-5">
			<?php the_content(); ?>
		</div>
	<?php }; ?>
</div>

<?php get_footer(); ?>