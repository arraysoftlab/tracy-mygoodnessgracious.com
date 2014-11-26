<?php get_header(); ?>
	
	<!-- OPEN #archive -->
	<section id="archive" class="section">

		<div class="section-heading clearfix">
			<div class="container">
				<div class="section-heading-content sixteen columns">
					<h1><?php wp_title(''); ?></h1>
					<div class="sub-heading">
						<span class="section-desc"></span>
						<img src="<?php echo $data['ab_banner_boutique']; ?>" width="100%">
					</div>
				</div>
			</div>
		</div>

		<div class="section-content container">
		
			<?php if (have_posts()) : ?>
				
				<!-- OPEN .blog-items -->
				<ul class="blog-items" style="padding:0 27px">
				
					<?php 
					$count = 0;
					while (have_posts()) : the_post();
					   get_template_part( 'includes/post-type/boutique' );
					   $count++;
					   if($count%3==0) echo '<div class="clearfix"></div>';
					endwhile; 
					
					?>
				
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