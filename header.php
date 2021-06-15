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

		<div class="header__bread-crumbs">
			<ul class="bread-crumbs">
				<div class="bread-crumbs__inner">
					<li class="bread-crumbs__item">
						<a class="text text_type_link text_color_gray-blue" href="#">
							/ Все статьи
						</a>
					</li>
					<li class="bread-crumbs__item">
						<a class="text text_type_link text_color_gray-blue" href="#">
							/ Сервис World Sci Publ
						</a>
					</li>
					<li class="bread-crumbs__item">
						<a class="text text_type_link text_color_gray-blue" href="#">
							/ Почему давать гарантию...
						</a>
					</li>
				</div>
			</ul>
		</div>

		<div class="header__action">
			<div class="action-header">
				<div class="action-header__item">
					<a class="text text_type_link text_color_black" href="tel:84951277926">+7
						(495) 127 - 79 - 26
					</a>
				</div>

				<div class="action-header__item">
					<a class="text text_type_link text_color_black"
					   href="<?php echo esc_url(home_url('/admin'));
					   ?>">
						Войти
					</a>
				</div>
			</div>
		</div>
	</div>
</header>

<main id="primary" class="site-main" role="main">
