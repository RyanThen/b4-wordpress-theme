<?php
get_header();
?>
	
	<div class="container mt-5"> <!-- Start Page Container Div -->
		
		<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
			<h1 class="display-4"><?php the_title(); ?></h1>
			<p class="headline-subtext lead text-center mb-4">Cronut farm-to-table tattooed meditation. Four loko succulents single-origin coffee tattooed air plant shoreditch bicycle rights bespoke cray freegan lo-fi live-edge meditation bespoke pork.</p>
			<?php
			$ticket_price_1 = get_field('ticket_price_1');
			$ticket_price_2 = get_field('ticket_price_2');
			$ticket_price_3 = get_field('ticket_price_3');
			
			while(have_posts()) {
				the_post();?>
				<p class="lead"><?php the_content(); ?></p>
		</div>
		
		<div class="container">
			<div class="card-deck mb-3 text-center">
				<div class="card mb-4 box-shadow">
					<div class="card-header">
						<h4 class="my-0 font-weight-normal">General</h4>
					</div>
					<div class="card-body">
						<h1 class="card-title pricing-card-title">$<?php echo $ticket_price_1; ?></h1>
						<ul class="list-unstyled mt-3 mb-4">
							<li>Lawn Seats</li>
							<li>General Access</li>
							<li>General Discounts</li>
						</ul>
						<a href="#"><button type="button" class="btn btn-lg btn-block btn-info">Buy Now</button></a>
					</div>
				</div>
				<div class="card mb-4 box-shadow">
					<div class="card-header">
						<h4 class="my-0 font-weight-normal">Pavilion</h4>
					</div>
					<div class="card-body">
						<h1 class="card-title pricing-card-title">$<?php echo $ticket_price_2; ?></h1>
						<ul class="list-unstyled mt-3 mb-4">
							<li>Pavillion Seating</li>
							<li>Free Drink</li>
							<li>Early Entry</li>
						</ul>
						<a href="#"><button type="button" class="btn btn-lg btn-block btn-info">Buy Now</button></a>
					</div>
				</div>
				<div class="card mb-4 box-shadow">
					<div class="card-header">
						<h4 class="my-0 font-weight-normal">VIP</h4>
					</div>
					<div class="card-body">
						<h1 class="card-title pricing-card-title">$<?php echo $ticket_price_3; ?></h1>
						<ul class="list-unstyled mt-3 mb-4">
							<li>Front Row</li>
							<li>Access to Band</li>
							<li>Early Entry</li>
						</ul>
						<a href="#"><button type="button" class="btn btn-lg btn-block btn-info">Buy Now</button></a>
					</div>
				</div>
				<?php }; ?>
			</div>
		</div>
	
	</div> <!-- End Page Container Div -->


<?php get_footer(); ?>