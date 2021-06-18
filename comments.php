<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}

$wsb_blog_comment_count = get_comments_number();
?>

<div id="comments"
	 class="comments <?php echo get_option('show_avatars') ? 'show-avatars' : ''; ?>">

	<?php
	add_filter('comment_form_fields', 'wsp_reorder_comment_fields');
	function wsp_reorder_comment_fields($fields)
	{
		$new_fields = array(); // сюда соберем поля в новом порядке
		$myorder = array('email', 'author', 'comment'); // нужный порядок

		foreach ($myorder as $key) {
			$new_fields[$key] = $fields[$key];
			unset($fields[$key]);
		}

		// 1. полностью перезадаём HTML поля
		$new_fields['author'] = '<p class="comment-form-author">
		<input class="comments__input" id="author" name="author" placeholder="Имя*" type="text" value="" size="30" /></p>';

		$new_fields['email'] = '<p class="comment-form-email">
<input class="comments__input" id="email" name="email" placeholder="Email*" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required="required"></p>';

		return $new_fields;
	}

	?>

	<div class="comments__form">
		<?php
		comment_form(
			array(
				'logged_in_as' => null,
				'title_reply_before' => '<h2 id="reply-title" class="subtitle subtitle_color_black">',
				'title_reply_after' => '</h2>',
				'comment_notes_before' => '<p class="text text_color_black">
Когда другой человек ответит на ваш комментарий – на указанную почту придет письмо.
</p>',
				'comment_field' => '<p class="comment-form-comment">
<textarea id="comment" name="comment" class="comments__input" cols="45" rows="8" aria-required="true" placeholder="Ваш комментарий"></textarea>
</p>',
				'label_submit' => 'Оставить комментарий',
				'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="comments__submit" value="%4$s" />',
			)
		);
		?>
	</div>

	<div class="comments__list comments-list">
		<?php
		if (have_comments()) : ; ?>
			<h2 class="comments-list__title text text_color_black
			text_weight_bold">Комментарии:</h2>

			<ol class="comments-list__content">
				<?php
				wp_list_comments(
					array(
						'avatar_size' => 60,
						'style' => 'ol',
						'short_ping' => true,
					)
				);
				?>
			</ol>

			<?php get_the_comments_pagination() ?>

			<?php if (!comments_open()) : ?>
				<p class="no-comments"><?php esc_html_e('Comments are closed.', 'wsb_blog'); ?></p>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
