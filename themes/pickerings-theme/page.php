<?php

get_header();

/* Start the Loop */
while (have_posts()) : the_post();

    if (have_rows('flexible_content')) :
        while (have_rows('flexible_content')) : the_row();
            get_template_part('template-parts/content/content', 'page');
        endwhile;
    endif;

    ?>

    <div class="container-fluid container">
        <?php the_content(); ?>
    </div>

<?php

endwhile; // End of the loop.

get_footer();