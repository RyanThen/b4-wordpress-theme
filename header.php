<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Jekyll v3.8.6">
	<title>Album example · Bootstrap</title>
	
	
	
	<?php
	
	if( is_home() ) {
		echo '<link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/blog/">';
	} elseif( is_front_page() || get_post_type('show') ) {
		echo '<link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/album/">';
	};
	
	wp_head();
	
	?>
	
	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
		
		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}
	</style>
</head>

<body>
<header>
	<div class="collapse bg-dark" id="navbarHeader">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-md-7 py-4">
					<h4 class="text-white">About</h4>
					<p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
				</div>
				<div class="col-sm-4 offset-md-1 py-4">
					<h4 class="text-white">Contact</h4>
					<ul class="list-unstyled">
						<li><a href="<?php echo site_url('/shows') ?>">Shows</a></li>
						<li><a href="<?php echo site_url('/events') ?>">Events</a></li>
						<li><a href="<?php echo site_url('/blog') ?>">Blog</a></li>
						<li><a href="<?php echo site_url('/directions') ?>">Directions</a></li>
						<li><a href="<?php echo site_url('/contact') ?>">Contact</a></li>
				</div>
			</div>
		</div>
	</div>
	<div class="navbar navbar-dark bg-dark shadow-sm">
		<div class="container d-flex justify-content-between">
			<a href="<?php echo site_url(); ?>" class="navbar-brand d-flex align-items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
				<strong>SMH</strong>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</div>
</header>