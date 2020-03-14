<?php
get_header();
?>
	
	<div class="container mt-5"> <!-- Start Page Container Div -->
		<div class="text-left mb-5">
			<h2 class="headline-underline">View Search Results:</h2>
		</div>

		<div class="row">
		<?php
		if(have_posts()) {
			while(have_posts()) {
				the_post(); ?>
<!--				get_template_part('template-parts/content', get_post_type());-->
			
				<div class="col-md-6">
					<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
						<div class="col p-4 d-flex flex-column position-static">
							<strong class="d-inline-block mb-2 text-primary"><?php $category = get_the_category();
								echo $category[0]->cat_name; ?></strong>
							<h3 class="mb-0"><?php the_title(); ?></h3>
							<p class="card-text mb-auto"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
							<a href="<?php the_permalink(); ?>" class="stretched-link">More info</a>
						</div>
						<div class="col-auto d-none d-lg-block">
							<?php
							if ( has_post_thumbnail() ) { ?>
								<div class="show-thumbnail blog-thumbnails">
									<?php the_post_thumbnail(); ?>
								</div>
							<?php } else { ?>
								<svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></svg>
							<?php } ?>
						</div>
					</div>
				</div>
			
			<?php }; ?>
			<div class="col-12 text-center">
				<?php echo paginate_links(); ?>
			</div>
		<?php } else {
			echo '<h2 class="headline">No results match that search</h2>';
		}	?>
		</div>
		
		<div class="row mt-5">
			<div class="col"><?php get_search_form(); ?></div>
		</div>
	</div> <!-- End Page Container Div -->


<?php get_footer(); ?>