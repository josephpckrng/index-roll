<?php

get_header();

/* Start the Loop */
while (have_posts()):
    the_post();

    if (have_rows('flexible_content')):
        while (have_rows('flexible_content')):
            the_row();
            get_template_part('template-parts/content/content', 'page');
        endwhile;
    endif;

    ?>

    <div class="container-fluid container d-flex flexible-artists ">

        <div class="row my-5">
            <?php $query_args = array(
                'post_type' => 'artists',
                'posts_per_page' => -1,
            );

            $query = new WP_Query($query_args); ?>
            
            <?php if ($query->have_posts()):
                while ($query->have_posts()):
                    $link = get_the_permalink(get_the_ID());
                    ?>
                    <a href="<?= $link ?>" class="card-wrapping col-lg-3">
                        <?php
                        $query->the_post(); ?>
                        <?php if (have_rows('images')):
                            while (have_rows('images')):
                                the_row();
                                echo '<img class="w-100" src="';
                                the_sub_field('image');
                                echo '"></img>';
                            endwhile;
                        endif; ?>

                        <h3>
                            <?php the_title(); ?>
                        </h3>

                        <?php
                        echo '<h6 class="location-title-posts">';
                        echo 'Location(s) :';
                        echo '</h6>';
                        echo '<div class="d-flex">';
                        if (have_rows('locations')):
                            while (have_rows('locations')):
                                the_row();
                                echo '<div class="location">';
                                the_sub_field('location');
                                echo '</div>';
                            endwhile;
                        endif;
                        echo '</div>';
                        echo '<h6 class="genre-title">';
                        echo 'Genre(s) :';
                        echo '</h6>';
                        echo '<div class="genre-wrapper d-flex">';
                        if (have_rows('genres')):
                            while (have_rows('genres')):
                                the_row();
                                echo '<div class="genre">';
                                the_sub_field('genre');
                                echo '</div>';
                            endwhile;
                        endif;
                        echo '</div>';
                        ?>
                    </a>
                <?php endwhile; // end of the loop. ?>

            <?php wp_reset_query(); ?>

        <?php else: ?>
            No results found.
        <?php endif; ?>
        </div>
        <?php
endwhile; // End of the loop. ?>
</div>
<?php

get_footer();