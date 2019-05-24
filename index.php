<?php
get_header();

while ( have_posts() ) :
    the_post();

    get_template_part( 'template-items/content', 'page' );

endwhile;

get_footer();