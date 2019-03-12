<div class="footer-404">
		<div class="cpy">
			<a href="/"><span>M</span>ephi<span>G</span>a</a>
			<p>MephiGa.tk<br />
			Все права защишены.<br />
			Email: <?php bloginfo('admin_email'); ?></p>
		</div>

<?php if(!dynamic_sidebar('footer')): ?>
	<div class="menu-foot">
		<h2>Категории</h2>
		<ul>
			<?php wp_list_categories(array('title_li' => '')); ?>
		</ul>
	</div>
<?php endif; ?>

		<div class="menu-foot">
			<h2>Страницы</h2>
<?php wp_nav_menu(array(
				'theme_location' => 'menu',
				'container' => false,
				'menu_class' => '',
				'before' => '- '
				)); ?>
		</div>				
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>