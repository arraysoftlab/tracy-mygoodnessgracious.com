<?php get_header(); ?>
	
<?php if ( is_front_page() ) : ?>

	<?php
		$type = 'post';
		$per_page = 8;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args=array(
		'post_type' => $type,
		'post_status' => 'publish',
		'paged' => $paged,
		'posts_per_page' => $per_page,
		'ignore_sticky_posts'=> 1
		);
		$wp_query = NULL;
		$wp_query = new WP_Query();
		$wp_query->query($args);
	?>

	<!-- OPEN #front-page -->
	<section id="front-page" class="section clearfix">

		<div class="section-content container">

			<!-- OPEN .blog-items -->
			<ul class="blog-items">
			
				<?php while (have_posts()) : the_post();
				   // The following determines what the post format is and shows the correct file accordingly
				   $format = get_post_format();
				   get_template_part( 'includes/post-type/'.$format );

				   if($format == '')
				   get_template_part( 'includes/post-type/standard' );
				endwhile; ?>
			
			<!-- CLOSE . blog-items -->
			</ul>

		    <?php if ( has_previous_posts() || has_next_posts() ) { ?>
			
			<!-- OPEN .navigation .blog-navigation .clearfix -->
			<div class="navigation blog-navigation clearfix">
			
				<div class="nav-previous"><?php next_posts_link('<span>&larr;</span> Older Entries'); ?></div>
				<?php wp_link_pages(); ?>
				<div class="nav-next"><?php previous_posts_link('Newer Entries <span>&rarr;</span>'); ?></div>		
				
			<!-- CLOSE .navigation .blog-navigation .clearfix -->
			</div>
			
			<?php } ?>
		
		</section>

	<!-- CLOSE #front-page -->
	</section>

<?php elseif (is_search()) : ?>

	<!-- OPEN #search-results -->
	<section id="search-results" class="section clearfix">

		<div class="section-heading clearfix">
			<div class="container">
				<div class="section-heading-content sixteen columns">
					<?php $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = esc_html($s, 1); $count = $allsearch->post_count; _e(''); wp_reset_query(); ?>
					<?php if ($count == 1) : ?>
						<?php echo "<h1>{$count} result for '{$key}'</h1>" ?>
					<?php else : ?>
						<?php echo "<h1>{$count} results for '{$key}'</h1>" ?>	
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="section-content container">

			<!-- OPEN .blog-items -->
			<ul class="blog-items">
			
				<?php while (have_posts()) : the_post();
				   // The following determines what the post format is and shows the correct file accordingly
				   $format = get_post_format();
				   get_template_part( 'includes/post-type/'.$format );

				   if($format == '')
				   get_template_part( 'includes/post-type/standard' );
				endwhile; ?>
			
			<!-- CLOSE . blog-items -->
			</ul>

		    <?php if ( has_previous_posts() || has_next_posts() ) { ?>
			
			<!-- OPEN .navigation .blog-navigation .clearfix -->
			<div class="navigation blog-navigation clearfix">
			
				<div class="nav-previous"><?php next_posts_link('<span>&larr;</span> Older Entries'); ?></div>
				<?php wp_link_pages(); ?>
				<div class="nav-next"><?php previous_posts_link('Newer Entries <span>&rarr;</span>'); ?></div>		
				
			<!-- CLOSE .navigation .blog-navigation .clearfix -->
			</div>
			
			<?php } ?>

		</div>
		
	<!-- CLOSE #search-results -->
	</section>

<?php endif; ?>

<!-- WordPress Hook -->
<?php get_footer(); ?>