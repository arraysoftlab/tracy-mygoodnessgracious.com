<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

<!-- OPEN #portfolio -->
<section class="section clearfix" id="portfolio">

	<div class="section-heading portfolio-heading clearfix">
		<div class="container">
			<div class="section-heading-content sixteen columns">
				<h1><?php echo do_shortcode(stripslashes($data['ab_portfolio_title_str'])); ?></h1>
				<div class="sub-heading">
					<span class="section-desc"><?php echo do_shortcode(stripslashes($data['ab_portfolio_tag_str'])); ?></span>
					<div class="controls-wrap">
						<span class="small-loading"></span>
						<span class="controls">
							<a href="#" id="portfolio-prev">&larr;</a>
							<a href="#" id="portfolio-next">&rarr;</a>
							<a href="#" id="portfolio-close">x</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section-content container">
					
		<!-- /////// PORTFOLIO AJAX HOLDER /////// -->

		<div class="loading"> </div>
		<div class="portfolio-ajax-drawer sixteen columns"> </div>
		<div class="loading-bay"> </div>

		<!-- /////// PORTFOLIO ITEMS /////// -->

		<?php
			$type = 'portfolio';
			$per_page = -1;
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
			$count = 0;
		  	$portfolio_filtering = $data['ab_portfolio_filtering'];
		?>

		<?php if(have_posts()) : ?>
		
		<?php if ($portfolio_filtering) { ?>
	   	<div class="filter-wrap sixteen columns">
			<ul id="portfolio-filter" class="clearfix">
				<li class="selected"><a data-value="all" href="#">All</a></li>
				<?php 
					$taxonomy = 'skills';
					$query = array(
						'orderby' => 'name',
						'hide_empty' => 0
						);
					$tax_terms = get_terms($taxonomy,$query);
					foreach ($tax_terms as $tax_term) {
						$term_slug = strtolower(preg_replace('/\s+/', '-', $tax_term->slug));
						echo '<li class=""><a href="#" title="View all ' . $tax_term->name . ' items" data-value="' . $term_slug . '">' . $tax_term->name . '</a></li>';
					}
				?>
		    </ul>
	    </div>
	    <?php } ?>

		<!-- OPEN .portfolio-items .clearfix -->
		<ul class="portfolio-items clearfix">

			<?php while (have_posts()) : the_post(); ?>
			<?php $post_terms = get_the_terms( $post->ID, 'skills' ); ?>
			<li data-id="id-<?php echo $count; ?>" class="clearfix item three columns <?php if ($post_terms) { foreach ($post_terms as $post_term) { echo strtolower(preg_replace('/\s+/', '-', $post_term->slug)). ' '; } } ?>" >

				<?php get_template_part( 'includes/portfolio-index-item' ); ?>

			</li>

			<?php $count++; endwhile; ?>

		<!-- CLOSE . portfolio-items .clearfix -->
		</ul>
		
		<?php rewind_posts(); ?>

		<?php endif; ?>

	</div>

<!-- CLOSE #portfolio -->
</section>

<!-- WordPress Hook -->
<?php get_footer(); ?>