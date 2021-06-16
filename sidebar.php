<?php
if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<aside id="secondary" class="sidebar widget-area" role="complementary">
	<div class="sidebar__inner">
		<!--		--><?php //dynamic_sidebar('sidebar-1'); ?>
				<?php wp_nav_menu(); ?>

		<div class="sidebar__nav">
			<ul class="nav-menu">
				<li class="nav-menu__item-container">
					<a class="nav-menu__item-link text text_color_black text_type_link"
					   href="#">
						Все статьи
					</a>
				</li>

				<li class="nav-menu__item-container">
					<a class="nav-menu__item-link text text_color_black text_type_link"
					   href="#">Все статьи</a>
				</li>

				<li class="nav-menu__item-container">
					<a class="nav-menu__item-link text text_color_black text_type_link"
					   href="#">Все статьи</a>
				</li>

				<li class="nav-menu__item-container">
					<a class="nav-menu__item-link text text_color_black text_type_link"
					   href="#">Все статьи</a>
				</li>
			</ul>
		</div>


		<img
			src="<?php echo get_template_directory_uri() ?>/assets/images/characters/client.svg"
			alt="characters: client" class="character">
	</div>
</aside>

