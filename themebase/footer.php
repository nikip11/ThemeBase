	<!-- -->
	
	<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					Footer
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	<!-- Bootstrap JavaScript -->
	<script src="<?= get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<script src="<?= get_template_directory_uri(); ?>/js/script.js"></script>
</body>
</html>