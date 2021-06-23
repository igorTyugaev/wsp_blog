<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
	<div class="header__inner">
		<div class="header__burger">
			<div class="hamburger" id="navbar-btn">
				<div class="hamburger__line"></div>
			</div>
		</div>
		<div class="header__logo">
			<a class="logo-header" href="<?php echo esc_url(home_url('/')); ?>">
				<img class="logo-header__img"
					 src="<?php echo get_template_directory_uri() ?>/assets/images/logos/logo_black.svg"
					 alt="Logo: World Sci Publ">
				<h3 class="logo-header__label subtitle subtitle_color_blue">
					<?php bloginfo('name'); ?>
				</h3>
			</a>
		</div>
		<div class="header__breadcrumbs">
			<div class="breadcrumbs">
				<?php wsp_breadcrumbs(); ?>
			</div>
		</div>
		<div class="header__action">
			<div class="action-header">
				<div class="action-header__item action-header__item_tel">
					<a class="text text_type_link text_color_black" href="tel:84951277926">+7
						(495) 127 - 79 - 26
					</a>
				</div>
				<div class="action-header__item action-header__item_link">
					<a class="text text_type_link text_color_black"
					   href="<?php echo esc_url(home_url('/admin'));
					   ?>">
						Войти
					</a>
				</div>
				<div class="action-header__item action-header__item_menu">
					<div class="dropdown-menu">
						<div class="dropdown-menu__btn">
							<div class="doter">
								<div class="doter__dot"></div>
							</div>
						</div>
						<div class="dropdown-menu__content">
							<a class="dropdown-menu__link" href="#">Link 1</a>
							<a class="dropdown-menu__link" href="#">Link 2</a>
							<a class="dropdown-menu__link" href="#">Link 3</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<nav class="navbar" id="navbar">
	<div class="navbar__wrapper">
		<div class="navbar__inner">
			<div class="navbar__content">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_class' => 'nav-menu',
						'container' => '',
						'add_li_class' => 'nav-menu__item-container',
						'link_class' => 'nav-menu__item-link',
						'items_wrap' => '<ul class="%2$s" id="primary-menu-list">%3$s</ul>',
						'fallback_cb' => false,
					)
				); ?>
			</div>
			<img class="navbar__img-bg character"
				 src="<?php echo get_template_directory_uri() ?>/assets/images/characters/client.svg"
				 alt="characters: client">
		</div>
	</div>
</nav>
<?php //get_sidebar(); ?>
<main id="primary" class="content" role="main">

