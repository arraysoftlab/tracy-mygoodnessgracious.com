<?php 
    $audio_file = get_post_meta( $post->ID, 'audio-url', true );
    $audio_name = get_post_meta( $post->ID, 'audio-name', true );
?>

<?php if (is_single()) { ?>

    <script type="text/javascript">
    //<![CDATA[
    jQuery(document).ready(function(){
        jQuery("#jquery_jplayer_<?php the_ID(); ?>").jPlayer({
            ready: function (event) {
                jQuery(this).jPlayer("setMedia", {
                    mp3:"<?php echo $audio_file; ?>"
                });
            },
            play: function() { // To avoid instances playing together.
                jQuery(this).jPlayer("pauseOthers");
            },
            swfPath: "<?php echo bloginfo('template_directory'); ?>/js",
            supplied: "mp3",
            cssSelectorAncestor: "#jp_container_<?php the_ID(); ?>",
            wmode: "window"
        });
    });
    //]]>
    </script>

    <div class="audio-player clearfix">

        <div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer"></div>

        <div id="jp_container_<?php the_ID(); ?>" class="jp-audio">
            <div class="jp-title">
                <div class="cover-art">
                    <span class="cover-shine"></span>
                    <?php the_post_thumbnail('covert-art-image'); ?>
                </div>
                <ul>
                    <li class="title"><?php echo $audio_name; ?></li>
                    <li>
                        <div class="jp-time-holder">
                            <span class="jp-current-time"></span>
                            <span>-</span>
                            <span class="jp-duration"></span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="jp-type-single">
                <div class="jp-gui jp-interface">
                    <div class="spacer-1"></div>
                    <ul class="jp-controls">
                        <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                        <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                        <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                        <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                    </ul>
                    <div class="jp-progress">
                        <div class="jp-seek-bar">
                            <div class="jp-play-bar"></div>
                        </div>
                    </div>
                    <div class="spacer-2"></div>
                    <div class="jp-volume-bar">
                        <div class="jp-volume-bar-value"></div>
                    </div>
                </div>
                <div class="jp-no-solution">
                    <span>Update Required</span>
                    To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                </div>
            </div>
        </div>

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
            <a class="audio-post" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail('blog-image'); ?>
            </a>
        <?php } else { ?>
            <a class="audio-post holder"> </a>
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