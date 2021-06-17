<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" class="articles__item">
	<div class="article-preview">
		<div class="article-preview__container">

			<?php if (has_post_thumbnail()) { ?>
				<a class="article-preview__picture picture-preview"
				   href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
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
					<img class="picture-preview__img" src="https://fakeimg.pl/360x360"
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
</article>

