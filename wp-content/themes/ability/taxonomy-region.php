<?php get_header(); ?>

<?php
	$region_id=get_queried_object()->term_id;
	$region_title=get_queried_object()->name;
	$region_parent_id=get_queried_object()->parent;
	if ($region_parent_id > 0) {
		$region_parent=get_term_by('id', $region_parent_id, 'region');
		$region_parent_name=$region_parent->name;
		$region_title=$region_parent_name." > ".$region_title;
	}
 ?>


	<!-- OPEN .section -->
	<div id="spas-overview" class="section clearfix">
		<div class="ajax-load-content">
			<div class="section-heading clearfix">
				<div class="container">
					<div id="spa-heading" class="section-heading-content sixteen columns">
						<h1><?php echo get_the_title('13439'); ?></h1>
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
  
<h2 class="region"><?php echo $region_title;?></h2>

				</section><!--sixteen columns-->
           </div><!--container-->

           <div id="spas-main" class="section-content container">
                <section class="thirteen columns" id="spa-list">

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
<?php include('spas/spa-posts.php');       ?>    	
<?php  endwhile; ?>
    
<?php else : /* NOT FOUND */ ?>
				
<p>Sorry, there are no Spas &amp; Retreats for this region yet.</p>
			
			<?php endif; ?>



				</section><!--spa-list-->
           
				<?php get_sidebar('spa'); ?>

           </div><!--container-->
	

		</div><!--ajax-load-content-->

	<!-- CLOSE .section -->
	</div>


<!-- WordPress Hook -->
<?php get_footer(); ?>























