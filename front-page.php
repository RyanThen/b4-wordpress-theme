<?php
get_header();
?>

<main role="main">
	
<!--	<section class="jumbotron text-center" style="background-image: url("--><?php //echo site_url('/img/main-stage.jpg'); ?><!--")">-->
	<?php while(have_posts()) {
		the_post();
		$site_intro = get_field('site_intro'); ?>
	<section class="jumbotron text-left" style="background-size: cover; background-position: 50% 75%; background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
		<div class="container">
			<h1 class="text-white"><?php echo ($site_intro ? $site_intro : 'Welcome!'); ?></h1>
			<div class="lead text-white"><?php the_content(); ?></div>
			<p>
				<a href="<?php echo esc_url(site_url('/tickets')) ?>" class="btn btn-info my-2">Buy Tickets</a>
<!--				<a href="#" class="btn btn-secondary my-2">Secondary action</a>-->
			</p>
		</div>
	</section>
	<?php } ?>
	
	<div class="album py-5 bg-light">
		<div class="container">
			<div class="text-center mb-2">
				<h2 class="headline--medium">Upcoming Shows</h2>
			</div>
			<p class="headline-subtext lead text-center mb-4">Cronut farm-to-table tattooed meditation. Four loko succulents single-origin coffee.</p>
			
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
								<h5><a class="card-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></h5></a>
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
					<a class="btn btn-info anchor-regular" href="<?php echo site_url('/shows'); ?>">See All Shows</a>
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="text-center mb-2">
				<h2 class="headline--medium">From Our Blog</h2>
			</div>
			<p class="headline-subtext lead text-center mb-4">Cronut farm-to-table tattooed meditation. Four loko succulents single-origin coffee tattooed air plant shoreditch bicycle rights bespoke cray freegan lo-fi live-edge meditation bespoke pork.</p>
			<div class="row">
				<div class="col">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
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
					<a class="btn btn-info anchor-regular" href="<?php echo site_url('/blog'); ?>">View Blog</a>
				</div>
			</div>
		</div>
	</div>

	<div class="text-center mt-5">
		<h2 class="headline--medium">Explore more</h2>
	</div>
	
	<?php echo get_search_form(); ?>

</main>

<!-- Sticky Notification -->
<div id="stickyNotification" class="sticky-notification">
	<div class="notification-inner container text-center">
		<p>View source code for this theme <a href="https://github.com/RyanThen/b4-wordpress-theme" target="_blank">here</a></p>
	</div>
	<div id="x" class="x">x</div>
</div>



<?php
get_footer();
wp_footer();
?>

</body>
</html>