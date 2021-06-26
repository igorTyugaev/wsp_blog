<div class="page">
	<div class="page__inner">
		<div class="page__article">
			<article class="article" id="post-<?php the_ID(); ?>">
				<div class="article__header">
					Header page
				</div>

				<div class="article__content">
					<?php the_title('<h1 class="article__title title title_color_black">', '</h1>'); ?>
					<?php the_content(); ?>
				</div>
				<div class="article__comments">
					<?php
					if (comments_open() || get_comments_number()) {
						comments_template();
					}
					?>
				</div>

				<img class="article__bg-logo"
					 src="<?php echo get_template_directory_uri() ?>/assets/images/logos/flazhek.png"
					 alt="bg logo">
			</article>
		</div>

		<div class="page__similar">
			<?php get_template_part('template-parts/content/content-similar'); ?>
		</div>
	</div>
</div>
