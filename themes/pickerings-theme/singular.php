<?php

get_header();

/* Start the Loop */
while ( have_posts() ) : the_post();

    if(have_rows('page_content')) : while(have_rows('page_content')) : the_row();

        get_template_part( 'template-parts/content/content', 'page' );

    endwhile; endif; ?>

    <div class="container-fluid pt-2 pt-lg-3">
        <?php the_content(); ?>
    </div>
<?php

endwhile; // End of the loop.

get_footer();