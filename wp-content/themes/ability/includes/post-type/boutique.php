<!-- VARIABLES -->
<?php $lightbox_img_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', false); ?>


<?php if (is_single()) { ?>

	<?php if (has_post_thumbnail()) { ?>
		<figure>
			<a class="figure-img standard-post" data-gal="prettyPhoto" href="<?php echo $lightbox_img_src[0]; ?>" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>">
				<?php the_post_thumbnail('detail-image'); ?>
			</a>
		</figure>
	<?php } ?>

	<div class="article-content clearfix">
		
		<?php get_template_part( 'includes/blog-post-meta' ); ?>

		<section class="detail-body eight columns omega">
			<h2><?php the_title(); ?></h2>
			<div class="body-content">
				<?php the_content(); ?>
			</div>
		</section>
		
	</div>

		
<?php } else { ?>
				
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

<?php } ?>