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
			<div class="similar">
				<div class="similar__item">
					<div class="article-preview">
						<div class="article-preview__container">

							<a class="article-preview__picture picture-preview" href="">
								<img class="picture-preview__img"
									 src="https://fakeimg.pl/360x360"
									 alt="post picture">
							</a>

							<a href="" class="article-preview__label label">
								Сервис World Sci Publ
							</a>

							<h2 class="article-preview__title">
								<a class="article-preview__title-link text text_color_black text_type_link"
								   href="">
									Почему давать гарантию на успешную публикацию
									не может давать ни одна компания
								</a>
							</h2>

							<h5 class="article-preview__timestamp">
								11 мая 18:55
							</h5>
						</div>
					</div>
				</div>
				<div class="similar__item">
					<div class="article-preview">
						<div class="article-preview__container">

							<a class="article-preview__picture picture-preview" href="">
								<img class="picture-preview__img"
									 src="https://fakeimg.pl/360x360"
									 alt="post picture">
							</a>

							<a href="" class="article-preview__label label">
								Сервис World Sci Publ
							</a>

							<h2 class="article-preview__title">
								<a class="article-preview__title-link text text_color_black text_type_link"
								   href="">
									Почему давать гарантию на успешную публикацию
									не может давать ни одна компания
								</a>
							</h2>

							<h5 class="article-preview__timestamp">
								11 мая 18:55
							</h5>
						</div>
					</div>
				</div>
				<div class="similar__item">
					<div class="article-preview">
						<div class="article-preview__container">

							<a class="article-preview__picture picture-preview" href="">
								<img class="picture-preview__img"
									 src="https://fakeimg.pl/360x360"
									 alt="post picture">
							</a>

							<a href="" class="article-preview__label label">
								Сервис World Sci Publ
							</a>

							<h2 class="article-preview__title">
								<a class="article-preview__title-link text text_color_black text_type_link"
								   href="">
									Почему давать гарантию на успешную публикацию
									не может давать ни одна компания
								</a>
							</h2>

							<h5 class="article-preview__timestamp">
								11 мая 18:55
							</h5>
						</div>
					</div>
				</div>
				<div class="similar__item">
					<div class="article-preview">
						<div class="article-preview__container">

							<a class="article-preview__picture picture-preview" href="">
								<img class="picture-preview__img"
									 src="https://fakeimg.pl/360x360"
									 alt="post picture">
							</a>

							<a href="" class="article-preview__label label">
								Сервис World Sci Publ
							</a>

							<h2 class="article-preview__title">
								<a class="article-preview__title-link text text_color_black text_type_link"
								   href="">
									Почему давать гарантию на успешную публикацию
									не может давать ни одна компания
								</a>
							</h2>

							<h5 class="article-preview__timestamp">
								11 мая 18:55
							</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
