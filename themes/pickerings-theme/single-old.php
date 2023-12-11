<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header();
?>


    <div id="primary" class="content-area">
        <main id="main" class="blog-container site-main container" role="main">
            <?php
            // Start the loop.
            while (have_posts()) :
                the_post();
                ?>
                <div class="post-wrapper row">
                    <div class="col-lg-8">
                        <div class="blog-title--top">
                            <div class="top-section d-flex">
                                <div class="title">
                                    <h2><?= the_title(); ?></h2>
                                </div>
                                <div class="links">
                                    <h4>Links</h4>
                                    <a href="<?= get_field('twitter')?>">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                    <a href="<?= get_field('instagram')?>">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                    <a href="<?= get_field('linkedin')?>">
                                        <i class="fa-brands fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="content">
                                <?php the_content(); ?>
                                <div class="main-content">
                                    <?= get_field('body_content') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 clipping">
                        <div class="background-wrapper" style="background-color: <?= get_field('background_colour')?>">
                            <?php
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part('content', get_post_format());
                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            /* link thumbnail to full size image for use with lightbox*/
                            the_post_thumbnail('large');
                            ?>

                        </div>

                    </div>


                </div>
            <?php


                // End the loop.
            endwhile;
            ?>
        </main><!-- .site-main -->
    </div><!-- .content-area -->

<?php
get_footer(); ?>