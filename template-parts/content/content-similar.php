<div class="similar">
	<?php
	$categories = get_the_category(get_the_ID());

	if ($categories) {
		$category_ids = array();
		foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		$args = array(
			'category__in' => $category_ids,
			'post__not_in' => array(get_the_ID()),
			'showposts' => 5,
			'orderby' => rand,
			'caller_get_posts' => 1);
		$my_query = new wp_query($args);

		if ($my_query->have_posts()) {
			echo '<h3 class="similar__title pre-title pre-title_color_black">Похожие записи:</h3>';

			echo '<div class="similar__content">';

			while ($my_query->have_posts()) {
				$my_query->the_post();
				?>
				<div class="similar__item">
					<div class="article-preview">
						<div class="article-preview__container">

							<?php if (has_post_thumbnail()) { ?>
								<a class="article-preview__picture picture-preview"
								   href="<?php the_permalink(); ?>"
								   title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail('medium', array(
										'class' => "picture-preview__img",
										'alt' => trim(strip_tags(get_post_meta(get_post_thumbnail_id(),
											'_wp_attachment_image_alt', TRUE))),
									));
									?>
								</a>
							<?php } else { ?>
								<a class="article-preview__picture picture-preview"
								   href="<?php the_permalink(); ?>">
									<img class="picture-preview__img"
										 src="https://fakeimg.pl/360x360"
										 alt="post picture">
								</a>
							<?php } ?>

							<a href="" class="article-preview__label label">
								Сервис World Sci Publ
							</a>

							<?php
							the_title(sprintf('<h2 class="article-preview__title">
<a class="article-preview__title-link text text_color_black text_type_link" href="%s">',
								esc_url(get_permalink())), '</a></h2>');
							?>

							<h5 class="article-preview__timestamp">
								11 мая 18:55
							</h5>
						</div>
					</div>
				</div>
				<?php
			}
			echo '</div>';
		}
		wp_reset_query();
	}
	?>
</div>
