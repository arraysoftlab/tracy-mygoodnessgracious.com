<?php get_header(); ?>

<?php if (have_posts()) : ?>
    
	<?php
		$page_tagline = get_post_meta( $post->ID, 'page-tagline', true );
	    $youtube = get_post_meta( $post->ID, 'youtube-id', true );
	    $vimeo = get_post_meta( $post->ID, 'vimeo-id', true );
	    $m4v = get_post_meta( $post->ID, 'm4v-url', true );
	    $ogv = get_post_meta( $post->ID, 'ogv-url', true );
	    $poster = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'video-poster-image' );
	    $audio_file = get_post_meta( $post->ID, 'audio-url', true );
    	$audio_name = get_post_meta( $post->ID, 'audio-name', true );

    	$args = array(
            'orderby'        => 'menu_order',
            'post_type'      => 'attachment',
            'post_parent'    => get_the_ID(),
            'post_mime_type' => 'image',
            'post_status'    => null,
            'numberposts'    => -1,
        );
        $attachments = get_posts($args);
        $attachments_count = count($attachments);

        $lightbox_img_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', false);
	?>

	<!-- OPEN .section -->
	<div class="section clearfix">

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

				<?php while (have_posts()) : the_post(); ?>

				<!-- OPEN article -->
				<article <?php post_class('sixteen columns'); ?> id="<?php the_ID(); ?>">
					
					<div class="article-content clearfix">
						<!-- OPEN .detail-info -->
						<section class="detail-info three columns alpha">
						<?php edit_post_link( 'Edit this Item', '<ul><li class="link"><p>', '</p></li></ul>'); ?> 
							<div>
								<a href="/boutique/" title="Back to Boutique" class="view-all">Back to Boutique</a>
							</div>
	
							<ul style="clear: both;">
								<li style="margin: 0 0 10px -24px">
									<span class='st_facebook_hcount' displayText='Facebook' style="padding-bottom:10px;display: block;"></span>
									<span class='st_pinterest_hcount' displayText='Pinterest' style="padding-bottom:10px;display: block;"></span>
									<span class='st_twitter_hcount' displayText='Tweet' style="padding-bottom:10px;display: block;"></span>
									<span class='st_email_hcount' displayText='Email' style="padding-bottom:10px;display: block;"></span>
								</li>
							</ul>
						</section>
						<!-- CLOSE .detail-info -->
						
						<section class="detail-body thirteen columns omega">
							<div class="body-content">
								<?php the_content(); ?>
							</div>
						</section>
						
						<!--Connected Boutique-->
							<?php
							// Find connected pages
							$connected = new WP_Query( array(
							  'connected_type' => 'Boutique',
							  'connected_items' => get_queried_object(),
							  'nopaging' => true,
							) );
							
							// Display connected pages
							if ( $connected->have_posts() ) :
							?>
							<hr>
							<h3>Related Items</h3>
							<ul class="related">
							<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
								<li class="boutique five columns" style="border-top:0px solid;" >
		<figure class="five columns alpha">
		<?php if (has_post_thumbnail()) { ?>
			<a class="standard-post thumbnail" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('full'); ?>
			</a>
		<?php } else { ?>
			<a class="standard-post holder"> </a>
		<?php } ?>
		</figure>
		<div class="item-details five columns omega" style="margin:0;padding:0;color:#bab5ac">
			<h3></h3>
			<div class="two_third">
			<?php the_title(); ?>
			<a target="_self" href="<?php the_permalink(); ?>"><em>details</em></a>
			
			</div><div class="one_third last" style="color:#bab5ac">
			<?php the_excerpt();?>
		</div>       
		</div>
	</li>

							<?php endwhile; ?>
							</ul>
							
							<?php 
							// Prevent weirdness
							wp_reset_postdata();
							
							endif;
							?>
							<!--END Connected Boutique-->

						
					</div>	
				
				<!-- CLOSE article -->
				</article>

				<?php //get_sidebar(); ?>

				<?php endwhile; ?>
			
			</div>

		</div>

	<!-- CLOSE .section -->
	</div>

<?php endif; ?>

<!-- WordPress Hook -->
<?php get_footer(); ?>