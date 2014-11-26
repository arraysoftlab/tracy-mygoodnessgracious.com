<?php if (is_single()) { ?>

	<div class="article-content clearfix">

		<?php get_template_part( 'includes/blog-post-meta' ); ?>

		<section class="detail-body eight columns omega">
			<h2><a href="<?php echo get_post_meta( $post->ID, 'link-url', true ); ?>"><?php the_title(); ?></a></h2>
			<div class="body-content">
				<?php the_content(); ?>
			</div>
		</section>
		
	</div>

		
<?php } else { ?>
				
	<li class="blog-item sixteen columns" >
		<figure class="six columns alpha">
			<?php if (has_post_thumbnail()) { ?>
				<a class="link-post" href="<?php echo get_post_meta( $post->ID, 'link-url', true ); ?>">
					<?php the_post_thumbnail('blog-image'); ?>
				</a>
			<?php } else { ?>
				<a class="link-post holder" href="<?php echo get_post_meta( $post->ID, 'link-url', true ); ?>"> </a>
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