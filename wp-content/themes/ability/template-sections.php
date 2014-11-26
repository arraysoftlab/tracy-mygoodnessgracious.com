<?php
/*
Template Name: Sections
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
					<div class="section-heading-content sixteen columns" style="margin:0;padding:0">
						<!--h1><?php the_title(); ?></h1-->
						<div class="sub-heading" style="border:none !important">
                        <div style="float:right"> 
                            <form method="get" action="<?php bloginfo('url'); ?>">
                            <div><label class="screen-reader-text" for="s">Search</label>
                            <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
                            <?php
                            wp_dropdown_categories(array('show_option_all' => 'All categories'));
                            ?>
                            <input type="submit" id="searchsubmit" value="Go" />
                            </div>
                            </form>
</div>
                        
                       


							<span class="section-desc"><?php echo $page_tagline; ?></span>
                            
						</div>
					</div>
				</div>
			</div>
<?php 
 	//$page_content=get_the_content(); 
//endwhile; endif; ?>
			<div class="section-content container">

				<div class="page-text sixteen columns">
                <!-- /////// START BODY /////// -->
                <div class="five columns good-news-posts" style="overflow:hidden">
                    	<div class="section-posts">
                        <h2>Body</h2>
                        <p style="color:#7c8e4a">Body Tip of the Day</p>
						
                        
<?php 
		
		$cats=array(2);
		$good_news_posts = new WP_Query( array(
			'category__in' => $cats, 
			'post_status' => 'publish',
			'posts_per_page' => '1'
		  
		) );
		
		if ( $good_news_posts->have_posts() ) {
			
			?>
			<ul>
            
            
           
			<?php while ( $good_news_posts->have_posts() ) : $good_news_posts->the_post(); ?>
             <div style="width:100%; text-align:center"> 
			</div>

 
        
        <li><?php 
			if ( has_post_thumbnail()) {
			echo '<a href="'. get_permalink( $thumbnail->ID ) . '" title="' . the_title_attribute('echo=0') . '" >';
			echo get_the_post_thumbnail($post->ID, 'medium' ); 
			echo '</a>';
			}
			?> 
			<?php endwhile; ?>
			
                <h2 style="margin-bottom:0"> <?php the_title(); ?></h2>
				<?php 
					global $more;    // Declare global $more (before the loop).
					$more = 0;       // Set (inside the loop) to display content above the more tag.
					the_content("View Full Article...");
					?>
				
                </li>
                <!--li><a href="<?php the_permalink();?>">View Article</a>
                </li-->
                </ul>
                
                
			<?php 
			wp_reset_postdata();	
		}//if $good_news_posts     ?>  
                 
                        
					</div>
                    	<!--section-posts-->
                    <a href="<?php echo get_category_link('2' ); ?>" title="View All Body" class="view-all">View All Body</a>

				</div>
                <!-- /////// END BODY /////// -->
                
                <!-- ///////////// MIND //////////////// -->
                
                
                <div class="five columns good-news-posts">
                    	<div class="section-posts" >
                        <h2>Mind</h2>
							<p style="color:#7c8e4a">Motivational Thought of the Day</p>
                        
<?php 
		
		$cats=array(7);
		$good_news_posts = new WP_Query( array(
			'category__in' => $cats, 
			'post_status' => 'publish',
			'posts_per_page' => '1'
		  
		) );
		
		if ( $good_news_posts->have_posts() ) {
			
			?>
			<ul style="overflow:hidden">
            
			<?php while ( $good_news_posts->have_posts() ) : $good_news_posts->the_post(); ?>      
			  <li>
           
              <?php 
			if ( has_post_thumbnail()) {
			echo '<a href="'. get_permalink( $thumbnail->ID ) . '" title="' . the_title_attribute('echo=0') . '" >';
			echo get_the_post_thumbnail($post->ID, 'medium' ); 
			echo '</a>';
			}
			?> 
			
               <li>
               <?php 
					global $more;    // Declare global $more (before the loop).
					$more = 0;       // Set (inside the loop) to display content above the more tag.
					the_content("View Full Article...");
					?>
				
                </li>
                <!--li><a href="<?php the_permalink();?>">View Article</a>
             
              </li-->
			<?php endwhile; ?>
			</ul>
			<?php 
			wp_reset_postdata();	
		}//if $good_news_posts     ?>                   
                        
					</div>
                    	<!--section-posts-->
                    <a href="<?php echo get_category_link('7' ); ?>" title="View All Motivational Thoughts" class="view-all">View All Mind</a>

				</div>
                
                
                <!-- ///////////// SPIRIT //////////////// -->
                
                <div class="five columns good-news-posts">
                    	<div class="section-posts" style="overflow:hidden">
                        <h2>Spirit</h2>
							<p style="color:#7c8e4a">Daily Affirmations &amp; Weekly Inspiration </p>
                        
		<?php 
            
            $cats=array(12);
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
				       <?php 
			if ( has_post_thumbnail()) {
			echo '<a href="'. get_permalink( $thumbnail->ID ) . '" title="' . the_title_attribute('echo=0') . '" >';
			echo get_the_post_thumbnail($post->ID, 'medium' ); 
			echo '</a>';
			}
			?> 
				 <?php 
					global $more;    // Declare global $more (before the loop).
					$more = 0;       // Set (inside the loop) to display content above the more tag.
					the_content("View Full Article...");
					?>
			
                </li>
                <!--li><a href="<?php the_permalink();?>">View Article</a>
                </li-->
			<?php endwhile; ?>
			</ul>
            </div>
			<?php 
			wp_reset_postdata();	
		}//if $good_news_posts     ?>                   
                        
		</div>
                     <a href="<?php echo get_category_link('12' ); ?>" title="View All Motivational Thoughts" class="view-all">View All Spirit</a>
                    <!--section-posts-->
                        </div>
                         </div>
                
                      <!-- ///////////// ROW BREAK //////////////// -->
             
						<div class="divider sixteen columns" style="margin-bottom:20px !important">
							&nbsp;
						</div>
                        <br />
                        
                        
			
              <div class="page-text sixteen columns">
              
              <!-- ///////////// THE GOOD NEWS //////////////// -->
              <div class="five columns good-news-posts">
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
                        
					</div>
                    	<!--section-posts-->
                    <a href="<?php echo get_category_link('4' ); ?>" title="View All Good News Posts" class="view-all">View All</a>

				</div>
					<!--one_third good-news-posts-->

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
        			</div>
                    <!--section-posts--> 
                 	<a href="<?php echo get_category_link('6' ); ?>" title="View All Good News Posts" class="view-all">View All</a>    
				</div>
				<!--one_third interesting-facts-posts-->
                
                <div class="five columns">
                <div class="newsletter" style="background:#6e75b6;padding:10px">
                    <div style="border:1px #fff solid; padding:10px">
                    <h2 style="color:#fff">Sign Up For <br />My Newsletter</h2>
                    
                    <!-- Begin MailChimp Signup Form -->
                    <link href="http://cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
                    
                    <div id="mc_embed_signup">
                    <form action="http://mygoodnessgracious.us1.list-manage.com/subscribe/post?u=07897d6b39a131bd870f10240&amp;id=08ab8e8ecb" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    
                    <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required style="width:90%">
                    <div><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                    </form>
                    </div>
                    
                    <!--End mc_embed_signup-->
                    
                    </div>
                    </div>
                </div>

	
                
       
           
        
             
           
            <?php //echo $page_content 
				  the_content();?>
				</div>
	 		
	 		</div>

	 	</div>

	<!-- CLOSE .section -->
	</section>
<?php 
 	//$page_content=get_the_content(); 
endwhile; endif; ?>


<!-- WordPress Hook -->
<?php get_footer(); ?>