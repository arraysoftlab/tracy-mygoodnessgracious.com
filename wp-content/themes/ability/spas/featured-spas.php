
<?php
                
   	$featured_query = new WP_Query( $args ); ?>

<?php if ( $featured_query->have_posts() ) { ?>

  <?php 
  $a=0;
  $featured_spa_ids=array();
  while ( $featured_query->have_posts() ) : $featured_query->the_post();  
  	array_push($featured_spa_ids, $post->ID);   
    $custom = get_post_custom($post->ID);
	$spa_address = $custom["_spa_address"][0];
	$spa_website = $custom["_spa_website"][0];
	$spa_phone = $custom["_spa_phone"][0];
  
  	switch ($a) {
		case 0:
			$featured_class="first";
			$a++;
			break;
			
		case 1:
			$featured_class="second";
			$a++;
			break;
			
		case 2:
			$featured_class="third";
			$a=0;
			break;	
	}
  ?>           
                
 <div class="featured-spa-post  <?php echo $featured_class;?>">
  		<div class="featured-spa-image">
        	<div class="featured-spa-thumb-container">
			  <?php if ( has_post_thumbnail() ) {?>
				  <a href="<?php the_permalink(); ?>">
                	<?php the_post_thumbnail('spa-image');?>
                  </a>
              <?php  } ?>
             </div>
         </div>
         <div class="featured-spa-text">
         	<div class="featured-line">Featured Spa of the Month</div>
	    	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	   		<p><?php echo excerpt(10); ?></p>
            <p>
            <?php if ($spa_address) { echo $spa_address."<br/>";} ?>
            <?php if ($spa_phone) { echo "p: ".$spa_phone."<br/>";}  ?>
            <?php if ($spa_website) { 
			 	$parsed = parse_url($spa_website);
				if (empty($parsed['scheme'])) {
					$spa_website = 'http://' . ltrim($spa_website, '/');
				}
				$spa_website_display=str_replace('http://','',$spa_website);
				echo '<a href="'.$spa_website.'" target="_blank">'.$spa_website_display.'</a>';
				} //if website?>
          	</p>

         </div>
        <span class="clear-all"></span>
  </div><!--featured-spa-post-->

  <?php endwhile; ?>
  <?php wp_reset_postdata(); 
}//if featured posts?>
        				<span class="clear-all"></span>
