<?php if (has_post_thumbnail()) { ?>

	<figure>
		<a href="<?php the_permalink(); ?>" class="link" title="<?php the_title(); ?>">
			<?php the_post_thumbnail('four-column-image'); ?>
		</a>
	</figure>

<?php } ?>