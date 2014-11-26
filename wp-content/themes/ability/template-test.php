<?php
/*
Template Name: Test
*/
?>

<?php get_header(); ?>


	<?php
	
		$layout = $data['ab_one_page_blocks']['enabled'];
		$showcase = $data['ab_show_showcase'];
		$portfolio_filtering = $data['ab_portfolio_filtering'];
		
		if ($layout):

		    ?>

		  <!-- /////// HOME SECTION /////// -->
		 <section class="section clearfix" id="home">
         	<div class="container" id="homepage">
            	<div id="home-left" class="eleven columns">
                       

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

							    	</ul><!--slides-->
								</div><!-- CLOSE #home-slider .flexslider -->
							</div><!--home-slider-wrap-->

							<?php rewind_posts(); ?>

						<?php endif; ?>

						<?php } ?>


                        
                        <!-- /////// Hardcoded Text /////// -->
							<div id="tagline">
                            Goodness Gracious provides daily nutritious plant based, vegan and macrobiotic recipes, wellness tips, motivational thoughts, and inspiration to help you live a healthier lifestyle by balancing the three elements of body, mind and spirit. 
                            </div>

                        <!-- //////// END Hardcoded /////// -->
						<div class="divider">
							<a class="back-to-top">back to top</a>
						</div>
		

				<div class="page-text eleven columns">
                <!-- /////// START BODY /////// -->
                <div class="eleven columns good-news-posts" >
                    	<div class="section-posts">

                        
<?php 
		
		$cat=2;
		$taxonomy = 'category';
		$cats = get_term_children( $cat, $taxonomy );
		$cats[]=$cat;
		$good_news_posts = new WP_Query( array(
			'category__in' => $cats, 
			'post_status' => 'publish',
			'posts_per_page' => '1'
		  
		) );
		
		if ( $good_news_posts->have_posts() ) {
			
			?>
			<ul>
			<?php while ( $good_news_posts->have_posts() ) : $good_news_posts->the_post(); ?>
        
        <li>
        	<div class="hp-image">
		<?php 
			if ( has_post_thumbnail()) {
			echo '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '" >';
			echo get_the_post_thumbnail($post->ID, 'medium' ); 
			echo '</a>';
			}
			?> 
			</div><!--hp-image-->
            
            <div class="hp-post-right">
          	  	<h2 class="hp-cat-title">Body</h2>		
           		<h3 class="hp-post-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
				<?php 
				$excerpt = get_the_excerpt();
				echo im_short_excerpt($excerpt,30)."...";?>
				
                <div class="hp-meta"><?php the_time('F j, Y'); ?>&nbsp;//&nbsp; <?php comments_popup_link( '0 comments', '1 comment', '% comments');?></div>
 
 			</div><!--hp-post-right-->

				
          </li>
        </ul>
                
                
			<?php 
			endwhile;
			wp_reset_postdata();	
		}//if $good_news_posts     ?>  
              
              <span class="clear-all"></span>   
                        
					</div><!--section-posts-->

				</div><!--eleven columns-->
                <!-- /////// END BODY /////// -->
                
                <!-- ///////////// MIND //////////////// -->
                
                
                <div class="eleven columns good-news-posts">
                    	<div class="section-posts" >
                       
<?php 
		
		$cat=7;
		$taxonomy = 'category';
		$cats = get_term_children( $cat, $taxonomy );
		$cats[]=$cat;

		$good_news_posts = new WP_Query( array(
			'category__in' => $cats, 
			'post_status' => 'publish',
			'posts_per_page' => '1'
		  
		) );
		
		if ( $good_news_posts->have_posts() ) {
			
			?>
			<ul>
            
			<?php while ( $good_news_posts->have_posts() ) : $good_news_posts->the_post(); ?>      
			  <li>
           
           	<div class="hp-image">
		<?php 
			if ( has_post_thumbnail()) {
			echo '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '" >';
			echo get_the_post_thumbnail($post->ID, 'medium' ); 
			echo '</a>';
			}
			?> 
			</div><!--hp-image-->
            
            <div class="hp-post-right">
          	  	<h2 class="hp-cat-title">Mind</h2>
			
           		<h3 class="hp-post-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
				<?php 
				$excerpt = get_the_excerpt();
				echo im_short_excerpt($excerpt,30)."...";?>
				
                <div class="hp-meta"><?php the_time('F j, Y'); ?>&nbsp;//&nbsp; <?php comments_popup_link( '0 comments', '1 comment', '% comments');?></div>
 
 			</div><!--hp-post-right-->

                </li>
			<?php endwhile; ?>
			</ul>
			<?php 
			wp_reset_postdata();	
		}//if $good_news_posts     ?>                   
                   <span class="clear-all"></span>   
                   
					</div><!--section-posts-->

				</div><!--eleven columns-->
                
                
                <!-- ///////////// SPIRIT //////////////// -->
                
                <div class="eleven columns good-news-posts">
                    	<div class="section-posts last" >
                       
		<?php 
		$cat=12;
		$taxonomy = 'category';
		$cats = get_term_children( $cat, $taxonomy );
		$cats[]=$cat;

            $good_news_posts = new WP_Query( array(
                'category__in' => $cats, 
                'post_status' => 'publish',
                'posts_per_page' => '1'
              
            ) );
		
		if ( $good_news_posts->have_posts() ) {
			
			?>
			<div><ul>
          
			<?php while ( $good_news_posts->have_posts() ) : $good_news_posts->the_post(); ?>      
				<li>
			     	<div class="hp-image">
		<?php 
			if ( has_post_thumbnail()) {
			echo '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '" >';
			echo get_the_post_thumbnail($post->ID, 'medium' ); 
			echo '</a>';
			}
			?> 
			</div><!--hp-image-->
            
            <div class="hp-post-right">
          	  	<h2 class="hp-cat-title">Spirit</h2>
			
           		<h3 class="hp-post-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
				<?php 
				$excerpt = get_the_excerpt();
				echo im_short_excerpt($excerpt,30)."...";?>
				
                <div class="hp-meta"><?php the_time('F j, Y'); ?>&nbsp;//&nbsp; <?php comments_popup_link( '0 comments', '1 comment', '% comments');?></div>
 
 			</div><!--hp-post-right-->
                </li>
			<?php endwhile; ?>
			</ul>
            </div>
			<?php 
			wp_reset_postdata();	
		}//if $good_news_posts     ?>                   
                    <span class="clear-all"></span>   
                       
		</div><!--section-posts-->

                                    <span class="clear-all"></span>   
    
                        </div><!--eleven columns-->                    <span class="clear-all"></span>   

                         </div><!--page-text sixteen columns-->
                
                      <!-- ///////////// ROW BREAK //////////////// -->
                     <span class="clear-all"></span>   
            
						<div class="divider">
							<a class="back-to-top">back to top</a>
						</div>
                        
                        
			
              <div class="page-text eleven columns">
              
              <!-- ///////////// THE GOOD NEWS //////////////// -->
              <div id="good-news" class="five columns good-news-posts">
                    	<div class="section-posts">
							<h2>The Good News</h2>
                        
		<?php 
		
		$cats=array(4);
		$good_news_posts = new WP_Query( array(
			'category__in' => $cats, 
			'post_status' => 'publish',
			'posts_per_page' => '5'
		  
		) );
		
		if ( $good_news_posts->have_posts() ) {
			
			?>
			<ul>
			<?php while ( $good_news_posts->have_posts() ) : $good_news_posts->the_post(); ?>      
				<li><a href="<?php the_permalink();?>"> <?php the_title(); ?></a></li>
			<?php endwhile; ?>
			</ul>
			<?php 
			wp_reset_postdata();	
		}//if $good_news_posts     ?>                   
                        
					</div><!--section-posts-->
                    <a href="<?php echo get_category_link('4' ); ?>" title="View All Good News Posts" class="view-all">View All</a>

				</div><!--ofive columns good-news-posts-->

				<div class="five columns interesting-facts-posts">
                    <div class="section-posts">
						<h2>Interesting Facts</h2>
<?php 
		$cats=array('6');
		$interesting_facts_posts = new WP_Query( array(
			'category__in' => $cats, 
			'post_status' => 'publish',
			'posts_per_page' => '5'
		  
		) );
		
		if ( $interesting_facts_posts->have_posts() ) {
			?>
			<ul>
			<?php while ( $interesting_facts_posts->have_posts() ) : $interesting_facts_posts->the_post(); ?>      
			<li><a href="<?php the_permalink();?>"> <?php the_title(); ?></a></li>
			<?php endwhile; ?>
			</ul>
			<?php 
			wp_reset_postdata();	
		}//if $good_news_posts     ?>
        			</div><!--section-posts--> 
                 	<a href="<?php echo get_category_link('6' ); ?>" title="View All Good News Posts" class="view-all">View All</a>    
				</div><!--one_third interesting-facts-posts-->

				</div><!--page-text sixteen columns-->
	 		

						<div class="divider eleven columns">
							<a class="back-to-top">back to top</a>
						</div>

		</div><!--home-left-->
        <?php get_sidebar(); ?>
	</div><!--container-->
</section><!-- HOME-->

		  
		    <?php

		endif;
	?>



<!-- WordPress Hook -->
<?php get_footer(); ?>