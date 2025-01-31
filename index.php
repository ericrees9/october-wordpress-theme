<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1><?php the_title(); ?></h1>
                    </header>

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
</div>

<?php get_footer(); ?>
