	<!-- -->
	
	<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
	<div id="totop"><i class="fa fa-angle-up fa-3x" aria-hidden="true"></i></div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					&copy; <?= date('Y') ?> - All right reserved
				</div>
				<div class="col-sm-4 col-sm-push-4 text-right">
					<a class="myweb" href="http://nikiponce.com" target="_blank">>NIKI_</a>
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