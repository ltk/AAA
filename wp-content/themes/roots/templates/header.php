<header id="banner" role="banner">
	<div class="container">
		<a class="brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
		<nav id="nav-main" role="navigation" class="group">
			<?php
				if (has_nav_menu('primary_navigation')) :
					wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav'));
				endif;
			?>
		</nav>
	</div>
</header>