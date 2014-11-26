<?php if (is_single()) { ?>

    <?php
        $args = array(
            'orderby'        => 'menu_order',
            'post_type'      => 'attachment',
            'post_parent'    => get_the_ID(),
            'post_mime_type' => 'image',
            'post_status'    => null,
            'numberposts'    => -1,
        );
        $attachments = get_posts($args);
        $attachments_count = count($attachments);
    ?>
            
    <!-- OPEN .flexslider -->
    <div class="flexslider">
        
        <ul class="slides">

            <?php foreach ($attachments as $attachment) : ?>
        
                <?php $src = wp_get_attachment_image_src( $attachment->ID, 'showcase-image'); ?>
                <?php $lightbox_img_src = wp_get_attachment_image_src( $attachment->ID, 'large'); ?>

                <li>
                    <a class="figure-img gallery-post" data-gal="prettyPhoto[gallery_<?php the_ID(); ?>]" href="<?php echo $lightbox_img_src[0]; ?>" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>">
                        <img height="<?php echo $src[2]; ?>" width="<?php echo $src[1]; ?>" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>" alt="<?php echo apply_filters('the_title', $attachment->post_title); ?>" src="<?php echo $src[0]; ?>" />
                    </a>
                </li>
            
            <?php endforeach; ?>

        </ul>

    <!-- CLOSE .flexslider -->
    </div>

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

    <?php
        $args = array(
            'orderby'        => 'menu_order',
            'post_type'      => 'attachment',
            'post_parent'    => get_the_ID(),
            'post_mime_type' => 'image',
            'post_status'    => null,
            'numberposts'    => -1,
        );
        $attachments = get_posts($args);
        $attachments_count = count($attachments);
    ?>

    <li class="blog-item sixteen columns" >
        
        <!-- OPEN .flexslider -->
        <div class="flexslider six columns alpha">
            
            <ul class="slides">

                <?php foreach ($attachments as $attachment) : ?>
            
                    <?php $src = wp_get_attachment_image_src( $attachment->ID, 'showcase-image'); ?>
                    <?php $lightbox_img_src = wp_get_attachment_image_src( $attachment->ID, 'large'); ?>

                    <li>
                        <a class="figure-img gallery-post" data-gal="prettyPhoto[gallery_<?php the_ID(); ?>]" href="<?php echo $lightbox_img_src[0]; ?>" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>">
                            <img height="<?php echo $src[2]; ?>" width="<?php echo $src[1]; ?>" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>" alt="<?php echo apply_filters('the_title', $attachment->post_title); ?>" src="<?php echo $src[0]; ?>" />
                        </a>
                    </li>
                
                <?php endforeach; ?>

            </ul>

        <!-- CLOSE .flexslider -->
        </div>

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