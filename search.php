<?php
get_header();
?>
	
	<div class="container"> <!-- Start Page Container Div -->
		
		<?php
		if(have_posts()) {
			while(have_posts()) {
				the_post(); ?>
<!--				get_template_part('template-parts/content', get_post_type());-->
				<p>here is a search hit!!!!!!</p>
			<?php };
			echo paginate_links();
		} else {
			echo '<h2 class="headline headline--small-plus">No results match that search</h2>';
		}
		
		get_search_form();
		?>
	</div> <!-- End Page Container Div -->


<?php get_footer(); ?>