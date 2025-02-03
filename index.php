<?php get_header(); ?>

<div id="main-content" class="content-area">
    <main id="main" class="site-main">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <?php if ( is_singular() ) : ?>
                        <!-- <div class="post-navigation">
                            <?php
                                previous_post_link('<span class="prev">%link</span>', '← Previous Post');
                                next_post_link('<span class="next">%link</span>', 'Next Post →');
                            ?>
                        </div> -->
                    <?php endif; ?>

                </article>

            <?php endwhile; ?>
        <?php else : ?>
            <article class="no-posts">
                <h2>No content available</h2>
                <p>Sorry, there is nothing to display.</p>
            </article>
        <?php endif; ?>
    </main>
    <?php get_footer(); ?>
</div>
