<?php
get_header();
?>
	
	<div class="container mt-5"> <!-- Start Page Container Div -->
		<?php
			while(have_posts()) {
				the_post();
			
				the_content();
			}
		?>
		
	</div> <!-- End Page Container Div -->


<?php get_footer(); ?>