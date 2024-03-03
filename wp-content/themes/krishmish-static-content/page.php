<?php
/**
 * The template for displaying default page template
 *
 * @package WordPress
 * @subpackage KrishMish_Static_Content
 * @since KrishMish_Static_Content 1.0
*/

get_header(); ?>

    <main class="wrap">
        <section class="content-area content-thin">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="article-full">
                    <header>
                    <h2><?php the_title(); ?></h2>
                    By: <?php the_author(); ?>
                    </header>
                    <?php the_content(); ?>
                </article>
            <?php endwhile; else : ?>
                <article>
                    <p>Sorry, no page was found!</p>
                </article>
            <?php endif; ?>
        </section>
        <?php get_sidebar(); ?>
    </main>
<?php get_footer(); ?>