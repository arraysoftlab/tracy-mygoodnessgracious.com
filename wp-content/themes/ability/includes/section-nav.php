<div class="container">
	<nav class="section-nav sixteen columns">
	<?php
		$backup_query = $wp_query;$wp_query = new WP_Query(array('post_type' => 'post'));
		if(function_exists('wp_nav_menu')) {
		wp_nav_menu(array(
		'theme_location' => 'Main_Navigation',
		'fallback_cb' => ''
		)); }
		$wp_query = $backup_query;
	?>
	</nav>
</div>