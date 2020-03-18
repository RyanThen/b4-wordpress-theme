<?php get_header(); ?>

<?php //while(have_posts()){
//	the_post(); ?>
<div class="container mt-5">
	<h1 class="mb-4"><?php the_archive_title(); ?></h1>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="card-img-top show-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php } else { ?>
		<svg class="bd-placeholder-img card-img-top" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php the_title(); ?></text></svg>
	<?php } ?>
	<p class="pt-5 pb-5"><?php echo get_the_archive_description(); ?></p>
</div>

<?php //}

get_footer(); ?>
