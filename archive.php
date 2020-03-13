<?php get_header(); ?>

<div class="container mt-5">
	<h1><?php the_archive_title(); ?></h1>
	<p class="pt-5 pb-5"><?php echo get_the_archive_description(); ?></p>
</div>

<?php get_footer(); ?>
