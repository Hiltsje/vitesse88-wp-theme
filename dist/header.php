<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' : '; } ?><?php bloginfo( 'name' ); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">

		<?php wp_head(); ?>
		<script>
		// conditionizr.com
		// configure environment tests
		conditionizr.config({
			assets: '<?php echo esc_url( get_template_directory_uri() ); ?>',
			tests: {}
		});
		</script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-md-4">

							<div id="mobile-nav-button" class="mobile-nav-button">
									<span></span>
									<span></span>
									<span></span>
							</div>
							<!-- logo -->
							<div class="logo">
								<a href="<?php echo esc_url( home_url() ); ?>">
									<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.png" alt="Logo" class="logo-img">
								</a>
							</div>
							<!-- /logo -->
						</div>
						<div class="col d-none d-md-inline-block align-self-center">
							<!-- nav -->
							<nav class="desktop-nav-container" role="navigation" >
								<?php html5blank_desktop_nav(); ?>
							</nav>
							
						</div>
					</div>
				</div>
				<!-- nav mobile -->

				<nav class="mobile-nav-container" role="navigation" >
					<?php html5blank_nav(); ?>
				</nav>

				<!-- /nav mobile -->
				<!-- /nav -->		
			</header>
			<!-- /header -->
