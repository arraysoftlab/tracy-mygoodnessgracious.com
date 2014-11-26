<?php get_header(); ?>
	
	<!-- OPEN #archive -->
	<section id="archive" class="section">

		<div class="section-heading clearfix">
			<div class="container">
				<div class="section-heading-content sixteen columns">
				<!-- Conditional Statements for .page-heading -->
				<?php $post = $posts[0]; ?>
				<?php /* If this is a tag archive */ if( is_tag() ) { ?>
					<h1>Posts tagged with &#8216;<?php single_tag_title(); ?>&#8217;</h1>
				<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
					<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
				<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
					<h1>Archive for <?php the_time('F, Y'); ?></h1>
				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
					<h1>Archive for <?php the_time('Y'); ?></h1>
				<?php /* If this is an author archive */ } elseif (is_author()) { ?>
					<?php $author = get_userdata( get_query_var('author') );?>
			  		<h1>Author archive for <?php echo $author->display_name;?></h1>
				<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					<h1>Blog Archives</h1>
				<?php } else { ?>
					<h1><?php wp_title(''); ?></h1>
				<?php } ?>
				</div>
			</div>
		</div>

		<div class="section-content container">
		
			<?php if (have_posts()) : ?>
				
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