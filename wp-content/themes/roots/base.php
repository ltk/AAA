<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

	<!--[if lt IE 7]><div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</div><![endif]-->

	<?php
		// Use Bootstrap's navbar if enabled in config.php
		if (current_theme_supports('bootstrap-top-navbar')) {
			get_template_part('templates/header-top-navbar');
		} else {
			get_template_part('templates/header');
		}
	?>

	<div id="home-slides" class="stretch">
		<div class="container">
			<div class="banner-content">
				<?php echo apply_filters( 'the_content', $post->post_content ); ?>
			</div>
		</div>
	</div>

	<?php if ( !function_exists( "dynamic_sidebar" ) || !dynamic_sidebar( "Homepage: Top Bar" ) ) : ?>
		<!-- Default if No Widgets -->
	<?php endif; ?>

	<div id="wrap" class="container" role="document">
		<div id="content" class="row">
			<div id="main" class="<?php echo roots_main_class(); ?>" role="main">
				<div class="row">
					<div class="featured-box span3">
						<img src="/assets/adopt.png" alt="" />
						<h2>Animals for Adoption</h2>
						<p>Lorem ipsum dolor sit amet dolor consectetur</p>
						<a href="#" class="more-link">{ view more }</a>
					</div>
					<div class="featured-box span3">
						<img src="/assets/events.png" alt="" />
						<h2>Upcoming Events</h2>
						<p>Lorem ipsum dolor sit amet dolor consectetur</p>
						<a href="#" class="more-link">{ find out more }</a>
					</div>
					<div class="featured-box span3">
						<img src="/assets/about.png" alt="" />
						<h2>Who We Are</h2>
						<p>Lorem ipsum dolor sit amet dolor consectetur</p>
						<a href="#" class="more-link">{ learn more }</a>
					</div>
					<div class="featured-box span3">
						<img src="/assets/donate.png" alt="" />
						<h2>Help &amp; Donate Today</h2>
						<p>Lorem ipsum dolor sit amet dolor consectetur</p>
						<a href="#" class="more-link">{ help us today }</a>
					</div>
				</div>
			</div>
			<?php if (roots_display_sidebar()) : ?>
			<aside id="sidebar" class="<?php echo roots_sidebar_class(); ?>" role="complementary">
				<?php get_template_part('templates/sidebar'); ?>
			</aside>
			<?php endif; ?>
		</div><!-- /#content -->
	</div><!-- /#wrap -->

	<?php get_template_part('templates/footer'); ?>

</body>
</html>
