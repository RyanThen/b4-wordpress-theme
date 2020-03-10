<?php get_header(); ?>

<div class="container">
	
	<?php
	// Query Featured Post
	$args = [
		'post_type' => 'post',
		'meta_key' => 'featured_post',
		'orderby' => 'meta_value post_date',
		'post_status' => 'publish',
		'posts_per_page' => 1,
		'paged' => $paged
	];
	$featured_blog_post = new WP_Query( $args );
	?>
	
	<?php if ( $featured_blog_post->have_posts() ) : ?>
		<?php while ( $featured_blog_post->have_posts() ) : $featured_blog_post->the_post(); ?>
			
			<?php if ( get_field( 'featured_post' ) ): ?>
				<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
					<div class="col-md-6 px-0">
						<h1 class="display-4 font-italic"><?php the_title() ?></h1>
						<p class="lead my-3"><?php echo wp_trim_words(get_the_content(), 30); ?></p>
						<p class="lead mb-0"><a href="<?php the_permalink(); ?>" class="text-white font-weight-bold">Continue reading...</a></p>
					</div>
				</div>
			<?php else: ?>
				<p>here is the else statement for the featured post</p>
			<?php endif; ?>
		
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>


	<div class="row mb-2">
	<?php
	while(have_posts()) {
		the_post(); ?>
		
		<div class="col-md-6">
			<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
				<div class="col p-4 d-flex flex-column position-static">
<!--					<strong class="d-inline-block mb-2 text-primary">World</strong>-->
					<h3 class="mb-0"><?php the_title(); ?></h3>
					<div class="mb-1 text-muted"><?php echo get_the_date(); ?></div>
					<p class="card-text mb-auto"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
					<a href="<?php the_permalink(); ?>" class="stretched-link">Continue reading</a>
				</div>
				<div class="col-auto d-none d-lg-block">
					<?php
					if ( has_post_thumbnail() ) { ?>
						<div class="show-thumbnail blog-thumbnails">
							<?php the_post_thumbnail(); ?>
						</div>
					<?php } else { ?>
						<svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Placeholder</text></svg>
					<?php } ?>
				</div>
			</div>
		</div>
	
	<?php }
	wp_reset_postdata(); ?>
	
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col text-center mt-3 mb-4">
			<?php echo paginate_links(); ?>
		</div>
	</div>
</div>

<main role="main" class="container">
	<div class="row">
		<div class="col-md-8 blog-main">
			<h3 class="pb-4 mb-4 font-italic border-bottom">Most Recent Post</h3>
			
			<?php
			if (have_posts()) {
				the_post(); ?>
				<div class="blog-post">
					<h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p class="blog-post-meta">Published on <?php echo get_the_date(); ?> by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></p>
					<?php the_content(); ?>
				</div><!-- /.blog-post -->
			<?php } ?>
			
<!--			<nav class="blog-pagination">-->
<!--				<a class="btn btn-outline-primary" href="#">Older</a>-->
<!--				<a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>-->
<!--			</nav>-->
		
		</div><!-- /.blog-main -->
		
		<aside class="col-md-4 blog-sidebar">
			<div class="p-4 mb-3 bg-light rounded">
				<h4 class="font-italic">About</h4>
				<p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
			</div>
			
			<div class="p-4">
				<h4 class="font-italic">Archives</h4>
				<ol class="list-unstyled mb-0">
					<li><a href="#">March 2014</a></li>
					<li><a href="#">February 2014</a></li>
					<li><a href="#">January 2014</a></li>
					<li><a href="#">December 2013</a></li>
					<li><a href="#">November 2013</a></li>
					<li><a href="#">October 2013</a></li>
					<li><a href="#">September 2013</a></li>
					<li><a href="#">August 2013</a></li>
					<li><a href="#">July 2013</a></li>
					<li><a href="#">June 2013</a></li>
					<li><a href="#">May 2013</a></li>
					<li><a href="#">April 2013</a></li>
				</ol>
			</div>
			
			<div class="p-4">
				<h4 class="font-italic">Elsewhere</h4>
				<ol class="list-unstyled">
					<li><a href="#">GitHub</a></li>
					<li><a href="#">Twitter</a></li>
					<li><a href="#">Facebook</a></li>
				</ol>
			</div>
		</aside><!-- /.blog-sidebar -->
	
	</div><!-- /.row -->

</main><!-- /.container -->

<?php get_footer(); ?>