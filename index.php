<?php get_header(); ?>
	<div class="content__inner">
		<div class="articles">
			<h2 class="articles__title subtitle subtitle_color_black">Все статьи:</h2>
			<div class="articles__container">
				<?php
				if (have_posts()) {
					while (have_posts()) {
						the_post();

						get_template_part('template-parts/content/content',
							get_theme_mod('display_excerpt_or_full_post', 'excerpt')); //full
					}
				} else {
					get_template_part('template-parts/content/content-none');
				}
				?>
			</div>
		</div>
	</div>
<?php get_footer();
