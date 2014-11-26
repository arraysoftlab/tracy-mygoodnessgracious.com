<?php
/*
Template Name: Page without Image
*/
?>
<?php get_header(); ?>





	<!-- OPEN .section -->
	<div class="section clearfix">

		<div class="ajax-load-content">

			<div class="section-heading clearfix">
				<div class="container">
					<div class="section-heading-content sixteen columns">
						<h1><?php the_title(); ?></h1>
						<div class="sub-heading">
							<span class="section-desc"><?php echo $page_tagline; ?></span>
						</div>
					</div>
				</div>
			</div>

			<div class="section-content container">

				<?php while (have_posts()) : the_post(); ?>

				<!-- OPEN article -->
				<article <?php post_class('eleven columns'); ?> id="<?php the_ID(); ?>">

					<?php if (($youtube) || ($vimeo) || ($m4v) || ($ogv)) { ?>

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
				                                
				            <iframe width="618" height="380" src="http://www.youtube.com/embed/<?php echo $youtube; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
				        
				        <?php } else if ($vimeo != '') { ?>
				            
				            <iframe src="http://player.vimeo.com/video/<?php echo $vimeo; ?>?title=0&amp;byline=0&amp;portrait=0" width="618" height="380" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

				        <?php } ?>

				    </div>

				    <?php } else if ($audio_file) { ?>

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

				    <?php } else if ($attachments_count > 1) { ?>

					  

				    <?php } else if (has_post_thumbnail()) { ?>
				    	
				    	<figure>
							<a class="figure-img image-post" data-gal="prettyPhoto" href="<?php echo $lightbox_img_src[0]; ?>" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>">
								<?php the_post_thumbnail('detail-image'); ?>
							</a>
						</figure>
				    
				    <?php } ?>
					
					<div class="article-content clearfix">

						<section class="detail-body">
							<div class="body-content">
								<?php the_content(); ?>
							</div>
						</section>
						
					</div>	
				
				<!-- CLOSE article -->
				</article>

				<?php get_sidebar(); ?>

				<?php endwhile; ?>
			
			</div>

		</div>

	<!-- CLOSE .section -->
	</div>



<!-- WordPress Hook -->
<?php get_footer(); ?>