<?php
/*
Template Name: Spas&Retreats
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>


	<!-- OPEN .section -->
	<div id="spas-overview" class="section clearfix">
		<div class="ajax-load-content">
			<div class="section-heading clearfix">
				<div class="container">
					<div id="spa-heading" class="section-heading-content sixteen columns">
						<h1><?php the_title(); ?></h1>
                        <div class="sub-heading">
				</div>
					</div>
				</div>
			</div>
            
           <div id="featured-spas" class="section-content container">
           		<section class="sixteen columns">
                	<div id="featured-spa-posts">
<?php 

	$args = array(
			'posts_per_page' => 3,
			'post_type' => 'im_spa',
			'meta_query' => array(
							array(
				'key' => '_spa_sticky',
				'value' => '1'
				)),
			'orderby' => 'title',
			'order' => 'ASC'
			);               

 include('spas/featured-spas.php');               
 ?>
          			</div><!--"featured-spa-posts"-->
  
<h2 class="region">All Regions</h2>

				</section><!--sixteen columns-->
           </div><!--container-->

           <div id="spas-main" class="section-content container">
           			<?php get_sidebar('spa'); ?>
                <section class="eight columns" id="spa-list">
					 <?php  
	   $args = array (
	   		'nopaging' => true,
	   		'post_type' => 'im_spa',
			'orderby' => 'menu_order title',
			'order' => 'ASC'
	   );

$spa_query = new WP_Query( $args ); ?>

<?php if ( $spa_query->have_posts() ) { ?>

  <?php 
  $i=0;
  while ( $spa_query->have_posts() ) : $spa_query->the_post(); 	   

 	include('spas/spa-posts.php');               

  endwhile; ?>
  <?php wp_reset_postdata(); 
}//if posts?>

<?php endif; ?>
				</section><!--spa-list-->
           
				<?php get_sidebar(); ?>

           </div><!--container-->
	

		</div><!--ajax-load-content-->

	<!-- CLOSE .section -->
	</div>


<!-- WordPress Hook -->
<?php get_footer(); ?>