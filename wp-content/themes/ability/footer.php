			<!-- CLOSE #content -->
			</div>
			
		<!-- CLOSE #main-container -->
		</div>

		<!-- OPEN #footer -->
		<section id="footer">
			
			<div class="footer-widgets container">

				<div class="eight columns">
				<?php if ( function_exists('dynamic_sidebar') ) { ?>
					<?php dynamic_sidebar('Footer Column 1'); ?>
				<?php } ?>
				</div>
				<div class="four columns">
				<?php if ( function_exists('dynamic_sidebar') ) { ?>
					<?php dynamic_sidebar('Footer Column 2'); ?>
				<?php } ?>
				</div>
				<div class="four columns">
				<?php if ( function_exists('dynamic_sidebar') ) { ?>
					<?php dynamic_sidebar('Footer Column 3'); ?>
				<?php } ?>
				</div>
                
				<div class="sixteen columns">
                <div class="divide container"> </div>
				<?php if ( function_exists('dynamic_sidebar') ) { ?>
					<?php dynamic_sidebar('Footer Column 4'); ?>
              
				<?php } ?>
				</div>

			</div>

			<div class="divide container"> </div>

			<footer id="copyright" class="container clearfix">
				<a class="back-to-top"> </a>
				<?php global $data; ?>
				<p><?php echo do_shortcode(stripslashes($data['ab_footer_text'])); ?></p>
			</footer>		
		
		<!-- CLOSE #footer -->
		</section>

		<?php $tracking = $data['ab_google_analytics'];?>
		<?php if ($tracking) { ?>
		<script type="text/javascript">
			<?php echo $tracking; ?>
		</script>
		<?php } ?>

		<!-- WordPress Footer Hook -->
		<?php wp_footer(); ?>

	<!-- CLOSE body -->
	</body>

<!-- CLOSE html -->
</html>