		<div class="sidebar">
			<?php if(!dynamic_sidebar('sidebar')): ?>
				<div class="vidget">
					<h2>Категории</h2>
					<ul>
						<?php wp_list_categories(array('title_li' => '')); ?>
					</ul>

				</div>
			<?php endif; ?>
		</div>	

<!--form class="search-main" action="<?php echo home_url('/'); ?>" method="">
	<input class="serch-txt" type="text" name="s" /> 
	<input class="serch-btn" type="image" src="<?php bloginfo('template_url') ?>/images/serach-btn.jpg" />
</form>-->