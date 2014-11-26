<?php 
	$args = array(
			'posts_per_page' => 1,
			'post_type' => 'im_spa',
			'meta_query' => array(
							array(
				'key' => '_spa_sticky',
				'value' => '1'
				)),
			'orderby' => 'title',
			'order' => 'ASC'
			);               
               
   	$featured_query = new WP_Query( $args );
if ( $featured_query->have_posts() ) { 
  $featured_spa_ids=array();
  while ( $featured_query->have_posts() ) : $featured_query->the_post();  
  	array_push($featured_spa_ids, $post->ID);   
    $custom = get_post_custom($post->ID);
	$spa_address = $custom["_spa_address"][0];
	$spa_website = $custom["_spa_website"][0];
	$spa_phone = $custom["_spa_phone"][0];
 
  ?>           
                
 <div class="hp-featured-spa-post eleven columns page-text">
   <h2>Featured Spa of the Month</h2>

  		<div class="hp-image">
			  <?php if ( has_post_thumbnail() ) {?>
				  <a href="<?php the_permalink(); ?>">
                	<?php the_post_thumbnail('spa-image');?>
                  </a>
              <?php  } ?>
         </div>
         <div class="featured-spa-text hp-post-right">
         	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	   		<p><?php  echo excerpt(30); ?></p>
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
                 	<a href="<?php echo get_permalink( '13439' ); ?>" title="View All Spas" class="view-all">View All Spas</a>    

         </div><!--spa-text-->
        <span class="clear-all"></span>
        </div><!--hp-featured-spa-post-->
   <?php endwhile; ?>
  <?php wp_reset_postdata(); 
}//if featured posts?>                