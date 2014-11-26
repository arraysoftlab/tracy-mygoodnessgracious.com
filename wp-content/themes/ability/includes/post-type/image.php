<!-- VARIABLES -->
<?php $lightbox_img_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', false); ?>


<?php if (is_single()) { ?>

	<?php if (has_post_thumbnail()) { ?>
		<figure>
			<a class="figure-img image-post" data-gal="prettyPhoto" href="<?php echo $lightbox_img_src[0]; ?>" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>">
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
				
	<li class="blog-item sixteen columns" >
		<figure class="six columns alpha">
		<?php if (has_post_thumbnail()) { ?>
			<a class="figure-img image-post" data-gal="prettyPhoto" href="<?php echo $lightbox_img_src[0]; ?>" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>">
				<?php the_post_thumbnail('blog-image'); ?>
			</a>
		<?php } else { ?>
			<a class="image-post holder"> </a>
		<?php } ?>
		</figure>
		<div class="item-details ten columns omega">
			<div class="item-heading clearfix">
				<h2><a class="item-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</div>
			<div class="blog-excerpt">
				<?php echo excerpt(28); ?>
			</div>
			<div class="meta">
                <span class="date"><?php the_time('d F Y'); ?></span>
                <span>//</span>
                <span class="comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
            </div>
		</div>
	</li>

<?php } ?>