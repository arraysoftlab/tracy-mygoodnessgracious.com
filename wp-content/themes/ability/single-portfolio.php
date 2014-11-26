<?php get_header(); ?>

<section id="portfolio" class="section">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php
		global $data;
		$portfolio_page = $data['ab_portfolio_page'];
		$portfolio_page_title = get_page_by_path( $portfolio_page );
		$portfolio_page_id = $portfolio_page_title->ID;
		$number_portfolio_items = $data['ab_prortfolio_items_home'];
	?>

	<div class="section-heading blog-heading clearfix">
		<div class="container">
			<div class="section-heading-content sixteen columns">
				<h1><?php echo do_shortcode(stripslashes($data['ab_portfolio_title_str'])); ?></h1>
				<div class="sub-heading">
					<span class="section-desc"><?php echo do_shortcode(stripslashes($data['ab_portfolio_tag_str'])); ?></span>
					<div class="controls-wrap">
						<?php if ($portfolio_page != "") { ?>
						<span class="view-all">
							<a href="<?php echo get_permalink( $portfolio_page_id ); ?>"><?php echo do_shortcode(stripslashes($data['ab_portfolio_view_btn_str'])); ?></a>
						</span>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $portfolio_data = get_post_meta( $post->ID, 'Portfolio', true ); ?>

	<div class="container">

		<!-- OPEN article -->
		<article <?php post_class('clearfix sixteen columns'); ?> id="<?php the_ID(); ?>">
			
			<?php
				$disable_gallery = get_post_meta( $post->ID, 'all-images', true );
				$external_link = get_post_meta( $post->ID, 'external-link', true );
				$youtube = get_post_meta( $post->ID, 'youtube-id', true );
				$vimeo = get_post_meta( $post->ID, 'vimeo-id', true );

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
	        ?>

			<?php if ($youtube != '' || $vimeo != '') { ?>
				
				<div class="video-player">

					<?php if ($youtube != '') { ?>
											
						<iframe width="800" height="448" src="http://www.youtube.com/embed/<?php echo $youtube; ?>?wmode=transparent" frameborder="0" allowfullscreen></iframe>
					
					<?php } else if ($vimeo != '') { ?>
						
						<iframe src="http://player.vimeo.com/video/<?php echo $vimeo; ?>?title=0&amp;byline=0&amp;portrait=0?wmode=transparent" width="800" height="448" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

					<?php } ?>

				</div>
				
			<?php } elseif ($attachments_count > 1 && $disable_gallery == "off") { ?>
			    
			    <!-- OPEN .flexslider -->
				<div class="flexslider">
	        		
	        		<ul class="slides">

					    <?php foreach ($attachments as $attachment) : ?>
		            
			                <?php
			                	$src = wp_get_attachment_image_src( $attachment->ID, 'portfolio-gallery-image');
				                $caption = $attachment->post_excerpt;
	                   			$lightbox_img_src = wp_get_attachment_image_src( $attachment->ID, 'full');
			                ?>
			                
			                <li>
			                	<a class="figure-img image-post" href="<?php echo $lightbox_img_src[0] ?>" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>" data-gal="prettyPhoto[pp_gal_article_<?php echo $post->ID; ?>]">
			                    	<img height="<?php echo $src[2]; ?>" width="<?php echo $src[1]; ?>" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>" alt="<?php echo apply_filters('the_title', $attachment->post_title); ?>" src="<?php echo $src[0]; ?>" />
			                    </a>
			                </li>
			            
			            <?php endforeach; ?>

	            	</ul>

	            <!-- CLOSE .flexslider -->
				</div>
			
			<?php } else { ?>
				
				<?php if (has_post_thumbnail()) { ?>
				<?php $lightbox_img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

					<figure class="portfolio-display fourteen columns">
						<a class="figure-img image-post" href="<?php echo $lightbox_img_src[0] ?>" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>" data-gal="prettyPhoto">
							<?php the_post_thumbnail('portfolio-gallery-image'); ?>
						</a>
					</figure>

				<?php } ?>

			<?php } ?>

			<section class="portfolio-detail-description fourteen columns">
				<div class="portfolio-heading">
					<h2><?php the_title(); ?></h2>
				</div>
				<div class="skills-wrap">
					<p class="skills"><?php echo get_the_term_list( $post->ID, 'skills', '', ', ', '' ); ?></p>
				</div>
				<div class="body-text">
					<?php the_content(); ?>
				</div>
				<div class="meta">
				<?php if( has_tag() ) { ?>
					<span class="tags"><?php the_tags(''); ?></span>
				<?php } ?>
				<?php if($external_link) { ?>
					<span class="link"><a href="<?php echo $external_link; ?>" target="_blank"><?php echo $external_link; ?></a></span>
				<?php } ?>
				</div>
			</section>

		<!-- CLOSE article -->
		</article>

	</div>
		
<?php endwhile; endif; ?>

</section>

<!-- WordPress Hook -->
<?php get_footer(); ?>