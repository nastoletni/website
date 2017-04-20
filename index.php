<?php get_header();
while ( have_posts() ) : the_post();
if ( is_page() ) :
	get_template_part( 'content', 'page' );
else :
	get_template_part( 'content' );
endif;
endwhile;
the_posts_pagination( array(
	'prev_text' => '&larr; Poprzednia',
	'next_text' => 'Następna &rarr;',
	'screen_reader_text' => 'Strony'
) );
get_footer(); ?>