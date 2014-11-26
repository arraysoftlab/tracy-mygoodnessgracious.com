<?php get_header(); ?>
	
	<!-- OPEN #archive -->
	<section id="archive" class="section">

		<div class="section-heading clearfix">
			<div class="container">
				<div class="section-heading-content sixteen columns">
					<h1><?php wp_title(''); ?></h1>
				</div>
			</div>
		</div>

		<div class="section-content container">
		
			<?php if (have_posts()) : ?>
				
				<!-- OPEN .blog-items -->
				<ul class="blog-items">
				
					<?php while (have_posts()) : the_post();
					   get_template_part( 'includes/post-type/boutique' );
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
			    
			
			<?php else : /* NOT FOUND */ ?>
				
				<div class="page-text">
				  <?php echo do_shortcode(stripslashes($data['ab_404_message_str'])); ?>
				</div>
			
			<?php endif; ?>

		</div>

	<!-- CLOSE #archive -->
	</section>

<!-- WordPress Hook -->
<?php get_footer(); ?>