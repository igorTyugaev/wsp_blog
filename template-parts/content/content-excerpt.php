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

<article id="post-<?php the_ID(); ?>" class="articles__item article-preview">
	<div class="article-preview">
		<div class="article-preview__container">

			<a class="article-preview__picture picture-preview" href="">
				<img class="picture-preview__img" src="https://fakeimg.pl/360x360"
					 alt="post picture">
			</a>


			<h5 class="article-preview__label label">
				<a href="" class="label__link">
					Сервис World Sci Publ
				</a>
			</h5>


			<p class="article-preview__description">
				Почему давать гарантию на успешную публикацию
				не может давать ни одна компания
			</p>

			<h5 class="article-preview__timestamp">
				11 мая 18:55
			</h5>
		</div>
	</div>


	<!--	<div class="entry-content">-->
	<!--		--><?php //get_template_part('template-parts/excerpt/excerpt', get_post_format()); ?>
	<!--	</div>-->
</article>

