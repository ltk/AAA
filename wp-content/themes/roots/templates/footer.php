<footer id="content-info" class="container" role="contentinfo">
	
	<?php dynamic_sidebar('sidebar-footer'); ?>
	<nav id="nav-main" role="navigation" class="group">
		<?php
			if (has_nav_menu('footer_navigation')) :
				wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav'));
			endif;
		?>
	</nav>

	<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
	<a class="designed-by" href="http://www.thejakegroup.com" target="_blank">Website by The Jake Group</a>
	
</footer>

<?php if (GOOGLE_ANALYTICS_ID) : ?>
<script>
	var _gaq=[['_setAccount','<?php echo GOOGLE_ANALYTICS_ID; ?>'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; ?>

<?php wp_footer(); ?>
