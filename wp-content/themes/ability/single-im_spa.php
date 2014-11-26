<?php get_header(); ?>

<?php if (have_posts()) : ?>
<?php
	  $custom = get_post_custom($post->ID);
	  $spa_address = $custom["_spa_address"][0];
	  $spa_website = $custom["_spa_website"][0];
	  $spa_phone = $custom["_spa_phone"][0];
?>		
	<div class="section clearfix">

		<div class="section-heading blog-heading clearfix">
			<div class="container">
				<div class="section-heading-content sixteen columns">
				<h1><?php the_title(); ?></h1>
					<div class="sub-heading">
					</div>
				</div>
			</div>
		</div>

		<?php while (have_posts()) : the_post(); ?>

		<div class="container">
           		<section id="featured-spas" class="sixteen columns">
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

				</section><!--featured-spas sixteen columns-->

			<!-- OPEN article -->
			<article <?php post_class('clearfix eleven columns'); ?> id="<?php the_ID(); ?>">
			<?php if (has_post_thumbnail()) { ?>
            <figure>
                  <?php the_post_thumbnail('detail-image'); ?>
            </figure>
        <?php } ?>

	<div class="article-content clearfix">

	<section class="detail-info three columns alpha">
	<ul>
	
	<?php edit_post_link( 'Edit This Post', '<li class="link"><p>', '</p></li>'); ?> 
    
    <li style="margin: 0 0 10px -24px">
    	<span class='st_facebook_hcount' displayText='Facebook' style="padding-bottom:10px;display: block;"></span>
    	<span class='st_pinterest_hcount' displayText='Pinterest' style="padding-bottom:10px;display: block;"></span>
    	<span class='st_twitter_hcount' displayText='Tweet' style="padding-bottom:10px;display: block;"></span>
    	<span class='st_email_hcount' displayText='Email' style="padding-bottom:10px;display: block;"></span>
    </li>
   	</ul>
   
<!-- CLOSE .detail-info -->
</section>

		<section class="detail-body eight columns omega">
			<div class="body-content">
				<?php the_content(); ?>
                <h4>Contact</h4>
                <p>
                <?php 
                if ($spa_website) { 
                    $parsed = parse_url($spa_website);
                    if (empty($parsed['scheme'])) {
                        $spa_website = 'http://' . ltrim($spa_website, '/');
                    } 
                    echo '<a href="'.$spa_website.'" target="_blank">';
                 } ?>
                <?php the_title(); ?>
                <?php if ($spa_website) { echo '</a>';} ?>
                <br />
                <?php if ($spa_address) { echo $spa_address."<br/>";} ?>
                <?php if ($spa_phone) { echo "phone: ".$spa_phone;}  ?>
                </p>
                
                
			</div>
		</section>
		
	</div>
	<span class="clear-all"></span>

     			
			<!-- CLOSE article -->
			</article>

			<?php get_sidebar(); ?>

		</div>

		<?php endwhile; ?>


	</div>

	
	
	</div>

<?php endif; ?>

<!-- WordPress Hook -->
<?php get_footer(); ?>