<?php
get_header();
?>

<main role="main">

	<section class="jumbotron text-center">
		<div class="container">
			<h1>Welcome to Songbird Music Hall</h1>
			<p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
			<p>
				<a href="#" class="btn btn-primary my-2">Main call to action</a>
				<a href="#" class="btn btn-secondary my-2">Secondary action</a>
			</p>
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
										<button type="button" class="btn btn-sm btn-outline-secondary">Tickets</button>
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
										<button type="button" class="btn btn-sm btn-outline-secondary">More info</button>
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

</main>



<?php
get_footer();

wp_footer();
?>

</body>
</html>