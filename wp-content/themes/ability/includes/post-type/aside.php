<?php if (is_single()) { ?>

	<div class="article-content clearfix">

		<?php get_template_part( 'includes/blog-post-meta' ); ?>

		<section class="detail-body eight columns omega">
			<div class="body-content aside">
				<?php the_content(); ?>
			</div>
		</section>
		
	</div>
		
<?php } else { ?>
	
	<li class="blog-item sixteen columns" >
		<figure class="six columns alpha">
			<?php if (has_post_thumbnail()) { ?>
				<a class="aside-post" href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('blog-image'); ?>
				</a>
			<?php } else { ?>
				<a class="aside-post holder" href="<?php the_permalink(); ?>"> </a>
			<?php } ?>
		</figure>
		<div class="item-details ten columns omega">
			<div class="aside-excerpt">
				<?php echo excerpt(50); ?>
			</div>
			<div class="meta">
                <span class="date"><?php the_time('d F Y'); ?></span>
                <span>//</span>
                <span class="comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
            </div>
		</div>
	</li>

<?php } ?>