<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if (is_singular()) : ?>
			<?php the_title('<h1 class="entry-title default-max-width">', '</h1>'); ?>
		<?php else : ?>
			<?php the_title(sprintf('<h2 class="entry-title default-max-width"><a href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
		<?php endif; ?>

		<?php twenty_twenty_one_post_thumbnail(); ?>
	</header>

	<div class="entry-content">
		<?php
		the_content();
		?>
	</div>
</article <?php the_ID(); ?>>
