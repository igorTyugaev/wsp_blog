/*
Single Post Template: single-custom-tamplate-for-posts
Description: This part is optional, but helpful for describing the Post Template
*/

<?php

get_header();

/* Start the Loop */
while (have_posts()) :
	the_post();

	get_template_part('template-parts/content/content-single');
endwhile; // End of the loop.

get_footer();
