<?php

if (!function_exists('athemes_comment')) :
	function athemes_comment($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;

		if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

			<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<div class="comment-body">
				<?php _e('Pingback:', 'hiero'); ?><?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'hiero'), '<span class="edit-link">', '</span>'); ?>
			</div>

		<?php else : ?>

		<li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<footer class="clearfix comment-meta">
					<div class="reply">
						<?php comment_reply_link(array_merge($args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
					</div><!-- .reply -->

					<div class="clearfix comment-author vcard">
						<?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>

						<div class="comment-metadata">
							<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
								<time datetime="<?php comment_time('c'); ?>">
									<?php printf('%1$s', get_comment_date(), get_comment_time()); ?>
								</time>
							</a>
						</div><!-- .comment-metadata -->

						<?php printf('<cite class="fn">%s</cite>', get_comment_author_link()); ?>
					</div><!-- .comment-author -->

					<?php if ('0' == $comment->comment_approved) : ?>
						<p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'hiero'); ?></p>
					<?php endif; ?>
				</footer><!-- .comment-meta -->

				<div class="comment-content">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->
			</article><!-- .comment-body -->

		<?php
		endif;
	}
endif;
