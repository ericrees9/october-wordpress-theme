<?php get_header(); ?>

<div id="main-content" class="content-area">
    <main id="main" class="site-main">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">

                    <div class="entry-content" itemprop="articleBody">
                        <?php the_content(); ?>
                    </div>

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
