<?php
get_header();
?>

<main role="main">

	<section class="jumbotron text-center" style="background-image: url(/wp-content/uploads/2021/05/shows-bg-dark.png); background-size: cover;">
		<div class="container">
			<h1 style="color: white; text-shadow: 2px 2px 2px black;">Shows at Serapin Music Hall</h1>
			<p style="color: white; text-shadow: 2px 2px 2px black;" class="lead">We've got a ton of great show coming up.  Take a look at the groups that have already scheduled to join the unadulterated good time!</p>
		</div>
	</section>

	<div class="album py-5 bg-light">
		<div class="container">
			<div class="text-center">
				<h2 style="margin-bottom: 35px;">Upcoming Shows</h2>
			</div>

			<div class="row">
				<?php
				while(have_posts()) {
					the_post(); ?>

					<div class="col-md-4">
						<div class="card mb-4 shadow-sm">
							<?php
							if ( has_post_thumbnail() ) { ?>
								<div class="card-img-top show-thumbnail">
									<?php the_post_thumbnail(); ?>
								</div>
							<?php } else { ?>
								<svg class="bd-placeholder-img card-img-top" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php the_title(); ?></text></svg>
							<?php } ?>

							<div class="card-body">
								<h5><?php the_title(); ?></h5>
								<p><?php
									$the_show_date = get_field('show_date');
									echo $the_show_date;
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
		</div>
	</div>

	<div class="album py-5 bg-light">
		<div class="container">
			<div class="text-center">
				<h2 style="margin-bottom: 35px;">Past Shows</h2>
			</div>

			<div class="row">
				<?php
				$today = date('Y-m-d H:i:s');
				$pastShows = new WP_Query(array(
					'post_type' => 'show',
					'posts_per_page' => -1,
					'meta_key' => 'show_date',
					'orderby' => 'meta_value',
					'order' => 'DESC',
					'meta_query' => array(
						array(
							'key' => 'show_date',
							'compare' => '<=',
							'value' => $today,
							'type' => 'DATETIME'
						)
					)
				));
				
				while($pastShows->have_posts()) {
					$pastShows->the_post(); ?>
					
					<div class="col-md-4">
						<div class="card mb-4 shadow-sm">
							<?php
							if ( has_post_thumbnail() ) { ?>
								<div class="card-img-top show-thumbnail">
									<?php the_post_thumbnail(); ?>
								</div>
							<?php } else { ?>
								<svg class="bd-placeholder-img card-img-top" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php the_title(); ?></text></svg>
							<?php } ?>

							<div class="card-body">
								<h5><?php the_title(); ?></h5>
								<p><?php
									$the_show_date = get_field('show_date');
									echo $the_show_date;
									?></p>
								<p class="card-text"><?php echo wp_trim_words(get_the_content(), 15); ?></p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<a href="<?php the_permalink(); ?>"><button type="button" class="btn btn-sm btn-outline-secondary">More info</button></a>
										<button type="button" class="btn btn-sm btn-outline-secondary">Music Sample</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				<?php } wp_reset_postdata(); ?>

			</div>
			
			<div class="text-center mt-5 mb-3">
				<h3>Explore More</h3>
				<?php get_search_form(); ?>
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