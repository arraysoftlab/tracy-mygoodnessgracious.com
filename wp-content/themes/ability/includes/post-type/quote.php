<?php if (is_single()) { ?>

	<div class="article-content clearfix">

		<?php get_template_part( 'includes/blog-post-meta' ); ?>

		<section class="detail-body eight columns omega">
			<h2><?php the_title(); ?></h2>
			<div class="body-content quote">
				<?php the_content(); ?>
				<cite><?php echo get_post_meta( $post->ID, 'quote-cite', true ); ?></cite>
			</div>
		</section>
		
	</div>

<?php } else { ?>

	<li class="blog-item sixteen columns" >
		<figure class="six columns alpha">
			<?php if (has_post_thumbnail()) { ?>
				<a class="quote-post" href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('blog-image'); ?>
				</a>
			<?php } else { ?>
				<a class="quote-post holder" href="<?php the_permalink(); ?>"> </a>
			<?php } ?>
		</figure>
		<div class="item-details ten columns omega">
			<div class="item-heading clearfix">
				<h2><a class="item-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</div>
			<div class="blog-excerpt quote">
				<p><?php echo excerpt(14); ?></p>
				<cite><?php echo get_post_meta( $post->ID, 'quote-cite', true ); ?></cite>
			</div>
			<div class="meta">
                <span class="date"><?php the_time('d F Y'); ?></span>
                <span>//</span>
                <span class="comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
            </div>
		</div>
	</li>

<?php } ?>