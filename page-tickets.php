<?php
get_header();
?>
	
	<div class="container mt-5"> <!-- Start Page Container Div -->
		
		<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
			<h1 class="display-4"><?php the_title(); ?></h1>
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
							<li>20 users included</li>
							<li>10 GB of storage</li>
							<li>Priority email support</li>
							<li>Help center access</li>
						</ul>
						<button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
					</div>
				</div>
				<div class="card mb-4 box-shadow">
					<div class="card-header">
						<h4 class="my-0 font-weight-normal">Pavilion</h4>
					</div>
					<div class="card-body">
						<h1 class="card-title pricing-card-title">$<?php echo $ticket_price_2; ?></h1>
						<ul class="list-unstyled mt-3 mb-4">
							<li>20 users included</li>
							<li>10 GB of storage</li>
							<li>Priority email support</li>
							<li>Help center access</li>
						</ul>
						<button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
					</div>
				</div>
				<div class="card mb-4 box-shadow">
					<div class="card-header">
						<h4 class="my-0 font-weight-normal">VIP</h4>
					</div>
					<div class="card-body">
						<h1 class="card-title pricing-card-title">$<?php echo $ticket_price_3; ?></h1>
						<ul class="list-unstyled mt-3 mb-4">
							<li>20 users included</li>
							<li>10 GB of storage</li>
							<li>Priority email support</li>
							<li>Help center access</li>
						</ul>
						<button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
					</div>
				</div>
				<?php }; ?>
			</div>
		</div>
	
	</div> <!-- End Page Container Div -->


<?php get_footer(); ?>