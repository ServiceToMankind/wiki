<!DOCTYPE html>
<html lang="<?php echo HTML::lang() ?>">
<head>
<?php include(THEME_DIR_PHP.'head.php'); ?>
</head>
<body>

	<!-- Load Bludit Plugins: Site Body Begin -->
	<?php execPluginsByHook('siteBodyBegin'); ?>

	<!-- Navbar -->
	<?php include(THEME_DIR_PHP.'navbar.php'); ?>

	<!-- Content -->
	<div class="container">
		<div class="row">

			<!-- Blog Posts -->
			<div class="col-md-9">
			<?php
				// Bludit content are pages
				// But if you order the content by date
				// These pages works as posts

				// $WHERE_AM_I variable detect where the user is browsing
				// If the user is watching a particular page/post the variable takes the value "page"
				// If the user is watching the frontpage the variable takes the value "home"
				if ($WHERE_AM_I == 'page') {
					$template = $page->template();
					if (($template) && file_exists(THEME_DIR_TEMPLATES.$template)) {
						include(THEME_DIR_TEMPLATES.$template);
					} else {
						include(THEME_DIR_PHP.'page.php');
					}
				} else {
					include(THEME_DIR_PHP.'home.php');
				}
			?>
			</div>

			<!-- Right Sidebar -->
			<div class="col-md-3">
			<?php include(THEME_DIR_PHP.'sidebar.php'); ?>
			</div>

		</div>
	</div>

	<!-- Footer -->
	<?php include(THEME_DIR_PHP.'footer.php'); ?>

	<!-- Javascript -->
	<?php
		// Include Jquery file from Bludit Core
		echo HTML::jquery();

		// Include javascript Bootstrap file from Bludit Core
		echo HTML::jsBootstrap();
	?>

	<!-- Load Bludit Plugins: Site Body End -->
	<?php execPluginsByHook('siteBodyEnd'); ?>

</body>
</html>