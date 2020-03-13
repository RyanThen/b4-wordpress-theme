<?php
get_header();
?>

<main role="main">
	
<!--	<section class="jumbotron text-center" style="background-image: url("--><?php //echo site_url('/img/main-stage.jpg'); ?><!--")">-->
	
	<section class="jumbotron text-left" style="background-image: url(<?php echo get_template_directory_uri() . '/img/main-stage.jpg'; ?>); background-size: cover; background-position: 50% 75%;">
		<div class="container">
			<h1 class="text-white">Welcome to Songbird Music Hall</h1>
			<p class="lead text-white">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
			<p>
				<a href="#" class="btn btn-primary my-2">Main call to action</a>
<!--				<a href="#" class="btn btn-secondary my-2">Secondary action</a>-->
			</p>
		</div>
	</section>
	
	<div class="album py-5 bg-light">
		<div class="container">
			<div class="text-center mb-4">
				<h2 class="headline--medium">Upcoming Shows</h2>
			</div>
			
			<div class="row">
				<?php
				$today = date('Y-m-d H:i:s');
				$homepageShows = new WP_Query(array(
					'post_type' => 'show',
					'posts_per_page' => 9,
					'meta_key' => 'show_date',
					'orderby' => 'meta_value',
					'order' => 'ASC',
					'meta_query' => array(
						array(
							'key' => 'show_date',
							'compare' => '>=',
							'value' => $today,
							'type' => 'DATETIME'
						)
					)
				));
				
				while($homepageShows->have_posts()) {
					$homepageShows->the_post(); ?>
					
					<div class="col-md-4">
						<div class="card mb-4 shadow-sm">
							<?php
							if ( has_post_thumbnail() ) { ?>
								<div class="card-img-top show-thumbnail">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('imageLandscapeSmall'); ?></a>
								</div>
							<?php } else { ?>
								<a href="<?php the_permalink(); ?>"><svg class="bd-placeholder-img card-img-top" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg></a>
							<?php } ?>

							<div class="card-body">
								<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h5></a>
								<p><?php
									$get_show_date = get_field('show_date');
									echo $get_show_date;
									?></p>
								<p class="card-text"><?php echo wp_trim_words(get_the_content(), 15); ?></p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<a href="<?php echo site_url('/Tickets'); ?>"><button type="button" class="btn btn-sm btn-outline-secondary">Tickets</button></a>
										<button type="button" class="btn btn-sm btn-outline-secondary">Music Sample</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				<?php } wp_reset_postdata(); ?>
				
			</div>
			
			<div class="row mb-5">
				<div class="col text-center">
					<a class="anchor-regular" href="<?php echo site_url('/shows'); ?>">See All Shows</a>
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="text-center mb-4">
				<h2 class="headline--medium">From Our Blog</h2>
			</div>
			<div class="row">
				<div class="col">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<?php
							$firstSlide = true;
							$blogQuery = new WP_Query(array(
								'post_type' => 'post',
								'posts_per_page' => 6
							));
							
							while($blogQuery->have_posts()) {
								$blogQuery->the_post();
								
								// get the ID of the featured image
								$thumbnail_id = get_post_thumbnail_id( $post_id );
								?>
								<div class="carousel-item <?php if ($firstSlide == true) {
									echo 'active';
									$firstSlide = false;
								} else {
									$firstSlide = false;
								} ?>">
									<a href="<?php the_permalink(); ?>"><img class="d-block w-100" src="<?php the_post_thumbnail_url('imagePortraitLarge'); ?>" alt="<?php echo esc_url( get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true) ); ?>"></a>
									<div class="carousel-caption d-none d-md-block">
										<h5><?php the_title(); ?></h5>
										<p><?php echo wp_trim_words(get_the_content(), 15); ?></p>
									</div>
								</div>
							<?php } ?>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>

			<div class="row mt-4 mb-5">
				<div class="col text-center">
					<a class="anchor-regular" href="<?php echo site_url('/blog'); ?>">View Blog</a>
				</div>
			</div>
		</div>
	</div>

</main>



<?php
get_footer();

wp_footer();
?>

</body>
</html>