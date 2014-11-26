<?php
    $youtube = get_post_meta( $post->ID, 'youtube-id', true );
    $vimeo = get_post_meta( $post->ID, 'vimeo-id', true );
    $m4v = get_post_meta( $post->ID, 'm4v-url', true );
    $ogv = get_post_meta( $post->ID, 'ogv-url', true );
    $poster = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'video-poster-image' );
?>

<?php if (is_single()) { ?>

    <div class="video-player">
        <?php if (($m4v != '') || ($ogv != '')) { ?>

            <script type="text/javascript">
                //<![CDATA[
                jQuery(document).ready(function(){

                    jQuery("#jquery_jplayer_<?php the_ID(); ?>").jPlayer({
                        ready: function () {
                            jQuery(this).jPlayer("setMedia", {
                                <?php if ($m4v != '') { ?>
                                m4v: "<?php echo $m4v; ?>",
                                <?php } ?>
                                <?php if ($ogv != '') { ?>
                                ogv: "<?php echo $ogv; ?>",
                                <?php } ?>
                                <?php if ($poster[0] !='') { ?>
                                poster: "<?php echo $poster[0]; ?>"
                                <?php } ?>
                            });
                        },
                        swfPath: "<?php echo bloginfo('template_directory'); ?>/js",
                        supplied: " <?php if ($m4v != '') { ?>m4v<?php } ?>, <?php if ($ogv != '') { ?>ogv<?php } ?>, all",
                        size: {
                            width: "640px",
                            height: "360px",
                            cssClass: "jp-video-360p"
                        },
                        cssSelectorAncestor: "#jp_container_<?php the_ID(); ?>"
                    });

                });
                //]]>
            </script>

            <div id="jp_container_<?php the_ID(); ?>" class="jp-video jp-video-360p clearfix">
                <div class="jp-type-single">
                    <div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer"></div>
                    <div class="jp-gui">
                        <div class="jp-interface">
                            <div class="vid-spacer-1"> </div>
                            <div class="vid-spacer-2"> </div>
                            <div class="jp-progress">
                                <div class="jp-seek-bar">
                                    <div class="jp-play-bar"></div>
                                </div>
                            </div>
                            <div class="jp-current-time"></div>
                            <div class="jp-duration"></div>
                            <div class="jp-controls-holder">
                                <ul class="jp-controls">
                                    <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                                    <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                                    <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                                    <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                                </ul>
                                <div class="jp-volume-bar">
                                    <div class="jp-volume-bar-value"></div>
                                </div>
                                <ul class="jp-toggles">
                                    <li><a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full screen</a></li>
                                    <li><a href="javascript:;" class="jp-restore-screen" tabindex="1" title="restore screen">restore screen</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="jp-no-solution">
                        <span>Update Required</span>
                        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                    </div>
                </div>
            </div>

        <?php } else if ($youtube != '') { ?>
                                
            <iframe width="618" height="380" src="http://www.youtube.com/embed/<?php echo $youtube; ?>?wmode=transparent" frameborder="0" allowfullscreen></iframe>
        
        <?php } else if ($vimeo != '') { ?>
            
            <iframe src="http://player.vimeo.com/video/<?php echo $vimeo; ?>?title=0&amp;byline=0&amp;portrait=0?title=0&amp;byline=0&amp;portrait=0?wmode=transparent" width="618" height="380" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

        <?php } ?>

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

    <li class="blog-item sixteen columns" >
        <figure class="six columns alpha">
        <?php if (has_post_thumbnail()) { ?>
            <?php if ($youtube != '') { ?>
            <a class="video-post" href="http://www.youtube.com/watch?v=<?php echo $youtube; ?>?width=800&amp;height=448" data-gal="prettyPhoto" title="<?php the_title(); ?>">
            <?php } else if ($vimeo != '') { ?>
            <a class="video-post" href="http://www.vimeo.com/<?php echo $vimeo; ?>?width=800&amp;height=448" data-gal="prettyPhoto" title="<?php the_title(); ?>">
            <?php } else { ?>
            <a class="video-post" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php } ?>
                <?php the_post_thumbnail('blog-image'); ?>
            </a>
        <?php } else { ?>
            <a class="video-post holder">

            </a>
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