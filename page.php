<?php
get_header();
?>
	
	<div class="container mt-5"> <!-- Start Page Container Div -->
		<?php
			while(have_posts()) {
				the_post(); ?>
			
				<p><?php the_content(); ?></p>
				
			<?php } ?>
		
	</div> <!-- End Page Container Div -->


<?php get_footer(); ?>