<!-- <form class="search-form text-center pt-5 pb-5" method="get" action="<?php echo esc_url(site_url('/')); ?>">
	<label class="headline-medium" for="s">Perform your search</label>
	<div class="input-group mb-3 search-input-group">
		<input type="text" class="s form-control the-search" type="search" name="s" id="s" placeholder="What are you looking for?">
		<div class="input-group-append">
			<input class="btn btn-outline-secondary" type="submit" value="Submit">
		</div>
	</div>
</form> -->

<form class="search-form text-center pt-5 pb-5" method="get" action="<?php echo esc_url(site_url('/')); ?>">
	<label class="headline-medium" for="s">Perform your search</label>
	
	<div class="input-group mb-3 search-input-group">
	<input type="text" class="s form-control the-search" type="search" name="s" id="s" placeholder="What are you looking for?">
		<div class="input-group-append">
			<input class="btn btn-outline-secondary submit-search" type="submit" value="Submit">
			<button class="btn btn-outline-secondary clear-search" type="button">Clear Form</button>
		</div>
	</div>

</form>