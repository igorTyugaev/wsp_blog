<div class="page">
	<div class="page__inner">
		<div class="page__article">
			<article class="article" id="post-<?php the_ID(); ?>">
				<div class="article__header">
					<div class="article-meta">
						<div class="article-meta__inner">
							<div class="article-meta__row">
								<div class="article-meta__item">
									<a href="" class="label label_align_center">
										Сервис World Sci Publ
									</a>
								</div>
								<div class="article-meta__item">
									<div class="meta-option" aria-label="star">
										<div class="meta-option__figure">
											<img class="meta-option__img"
												 src="<?php echo
												 get_template_directory_uri()
												 ?>/assets/images/icons/star.svg"
												 alt="star">
										</div>
										<div
											class="meta-option__txt text text_color_deep-gray">
											4.4 / 5
										</div>
									</div>
								</div>
								<div class="article-meta__item">
									<div class="meta-option" aria-label="eye">
										<div class="meta-option__figure">
											<img class="meta-option__img"
												 src="<?php echo
												 get_template_directory_uri()
												 ?>/assets/images/icons/eye.svg"
												 alt="star">
										</div>
										<div
											class="meta-option__txt text text_color_deep-gray">
											1941
										</div>
									</div>
								</div>
								<div class="article-meta__item">
									<div class="meta-option" aria-label="like">
										<div class="meta-option__figure">
											<img class="meta-option__img"
												 src="<?php echo
												 get_template_directory_uri()
												 ?>/assets/images/icons/like_with_bg.svg"
												 alt="star">
										</div>
										<div
											class="meta-option__txt text text_color_deep-gray">
											140
										</div>
									</div>
								</div>
								<div class="article-meta__item">
									<div class="meta-option" aria-label="share">
										<div class="meta-option__figure">
											<img class="meta-option__img"
												 src="<?php echo
												 get_template_directory_uri()
												 ?>/assets/images/icons/share_with_bg.svg"
												 alt="star">
										</div>
										<div
											class="meta-option__txt text text_color_deep-gray">
											42
										</div>
									</div>
								</div>
								<div class="article-meta__item">
									<div class="meta-option" aria-label="date">
										<div class="meta-option__figure">
											<img class="meta-option__img"
												 src="<?php echo
												 get_template_directory_uri()
												 ?>/assets/images/icons/calendar_with_bg.svg"
												 alt="star">
										</div>
										<div
											class="meta-option__txt text text_color_deep-gray">
											01.06.2021
										</div>
									</div>
								</div>
							</div>
							<div class="article-meta__row">
								<div class="article-meta__item">
									<a class="tag tag_align_center" href="">
										<span>#</span>WorldSciPubl
									</a>
								</div>
								<div class="article-meta__item">
									<a class="tag tag_align_center" href="">
										<span>#</span>WorldSciPubl
									</a>
								</div>
								<div class="article-meta__item">
									<a class="tag tag_align_center" href="">
										<span>#</span>WorldSciPubl
									</a>
								</div>
								<div class="article-meta__item">
									<a class="tag tag_align_center" href="">
										<span>#</span>WorldSciPubl
									</a>
								</div>
								<div class="article-meta__item">
									<a class="tag tag_align_center" href="">
										<span>#</span>WorldSciPubl
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="article__content">
					<?php the_title('<h1 class="article__title title title_color_black">', '</h1>'); ?>
					<?php the_content(); ?>
				</div>
				<div class="article__actions actions-article">
					<div class="actions-article__actions">
						<div class="actions-article__action">
							<button class="button">
								<img class="button__img"
									 src="<?php echo
									 get_template_directory_uri()
									 ?>/assets/images/icons/like.svg"
									 alt="like">
							</button>
						</div>
						<div class="actions-article__action">
							<button class="button">
								<img class="button__img"
									 src="<?php echo
									 get_template_directory_uri()
									 ?>/assets/images/icons/share.svg"
									 alt="share">
								<span class="button__txt">
							Поделиться
						</span>
							</button>
						</div>
					</div>
					<div class="actions-article__rate">
						<div class="rate">
							<h4 class="rate__title">Оцените материал</h4>
							<h5 class="rate__score">0.0</h5>
							<div class="rate__stars">
								<img class="rate__star"
									 src="<?php echo
									 get_template_directory_uri()
									 ?>/assets/images/icons/star.svg"
									 alt="star">
								<img class="rate__star"
									 src="<?php echo
									 get_template_directory_uri()
									 ?>/assets/images/icons/star.svg"
									 alt="star">
								<img class="rate__star"
									 src="<?php echo
									 get_template_directory_uri()
									 ?>/assets/images/icons/star.svg"
									 alt="star">
								<img class="rate__star"
									 src="<?php echo
									 get_template_directory_uri()
									 ?>/assets/images/icons/star.svg"
									 alt="star">
								<img class="rate__star"
									 src="<?php echo
									 get_template_directory_uri()
									 ?>/assets/images/icons/star.svg"
									 alt="star">
							</div>
						</div>
					</div>
				</div>
				<div class="article__comments">
					<div class="reviews">
						<div class="reviews__sender sender">
							<div class="sender__avatar">
								<div class="avatar">
									<img class="avatar__img"
										 src="<?php echo
										 get_template_directory_uri()
										 ?>/assets/images/icons/user.svg"
										 alt="user">
								</div>
							</div>
							<input class="sender__input" id="message" name="message"
								   placeholder="Оставьте комментарий" type="text" value=""
								   size="240" required/>
							<button class="sender__submit button button_type_main">
								Отправить
							</button>
						</div>

						<div class="reviews__comments">

						</div>
					</div>
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
