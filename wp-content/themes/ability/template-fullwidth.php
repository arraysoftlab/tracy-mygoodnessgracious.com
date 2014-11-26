<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>

<?php
	$page_tagline = get_post_meta( $post->ID, 'page-tagline', true );
?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

	<!-- OPEN .section -->
	<section class="section clearfix" id="<?php the_title(); ?>">
		
		<div class="ajax-load-content">

			<div class="section-heading clearfix">
				<div class="container">
					<div class="section-heading-content sixteen columns">
						<h1><?php the_title(); ?></h1>
						<div class="sub-heading">
							<span class="section-desc"><?php echo $page_tagline; ?></span>
						</div>
					</div>
				</div>
			</div>

			<div class="section-content container">

				<div class="page-text sixteen columns">
				  <?php the_content(); ?>
				</div>
	 		
	 		</div>

	 	</div>

	<!-- CLOSE .section -->
	</section>

<?php endwhile; endif; ?>

<!-- WordPress Hook -->
<?php get_footer(); ?>