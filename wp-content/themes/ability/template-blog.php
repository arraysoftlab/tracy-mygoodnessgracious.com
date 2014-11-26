<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<?php
	global $data;
	$older_entries_text = $data['ab_older_entries_btn_str'];
	$newer_entries_text = $data['ab_newer_entries_btn_str'];
?>

<!-- OPEN #blog -->
<section class="section clearfix" id="blog">

	<div class="section-heading blog-heading clearfix">
		<div class="container">
        
        		<div id="search-bar-cat">
		 	<form method="get" action="<?php bloginfo('url'); ?>">
				    <div><label class="screen-reader-text" for="s">Search</label>					
				    <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />					
					<?php						
					    wp_dropdown_categories(array('show_option_all' => 'All categories'));						
					?>						
						    <input type="submit" id="searchsubmit" value="Go" />				
				    	</div>
				</form>
            </div>

        
			<div class="section-heading-content sixteen columns">
				<h1><?php echo do_shortcode(stripslashes($data['ab_blog_title_str'])); ?></h1>
				<div class="sub-heading">
					<span class="section-desc"><?php echo do_shortcode(stripslashes($data['ab_blog_tag_str'])); ?></span>
				</div>
			</div>
		</div>
	</div>

	<div class="section-content container">

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

		<?php if(have_posts()) : ?>
			
			<!-- OPEN .blog-items -->
			<ul class="blog-items eleven columns">

			<?php while (have_posts()) : the_post();
				// The following determines what the post format is and shows the correct file accordingly
				$format = get_post_format();
				get_template_part( 'includes/post-type/'.$format );

				if($format == '')
				get_template_part( 'includes/post-type/standard' );
			endwhile; ?>
					
			<!-- CLOSE .blog-items -->
			</ul>

			<?php rewind_posts(); ?>

		<?php endif; ?>
				
				
		<?php get_sidebar(); ?>



		<?php if ( has_previous_posts() || has_next_posts() ) { ?>

			<!-- OPEN .navigation .blog-navigation -->
			<div class="navigation blog-navigation sixteen columns">
			
				<div class="nav-previous eight columns alpha"><?php next_posts_link($older_entries_text); ?></div>
				<?php wp_link_pages(); ?>
				<div class="nav-next eight columns omega"><?php previous_posts_link($newer_entries_text); ?></div>		
				
			<!-- CLOSE .navigation .blog-navigation -->
			</div>

		<?php } ?>

	</div>

<!-- CLOSE #blog -->
</section>

<!-- WordPress Hook -->
<?php get_footer(); ?>