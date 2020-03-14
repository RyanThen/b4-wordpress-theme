<?php get_header(); ?>

<div class="container mt-4">
	<?php
	while (have_posts()) {
		the_post(); ?>
		
		<h2 class="mt-5"><?php the_title(); ?></h2>
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="card-img-top show-thumbnail mt-4">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php } else { ?>
			<svg class="bd-placeholder-img card-img-top mt-4" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php the_title(); ?></text></svg>
		<?php } ?>
		<div class="mt-5 pb-5">
			<?php the_content(); ?>
		</div>
	<?php }; ?>
</div>

<?php get_footer(); ?>