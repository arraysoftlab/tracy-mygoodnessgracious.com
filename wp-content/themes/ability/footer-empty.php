			<!-- CLOSE #content -->
			</div>
			
		<!-- CLOSE #main-container -->
		</div>

		<!-- OPEN #footer -->
	

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