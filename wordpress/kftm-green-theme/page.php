<?php
/**
 * The template for displaying all pages
 *
 * @package KFTM_Green
 */

get_header();
?>

<div class="page-content-wrapper">
    <?php while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if (has_post_thumbnail()) : ?>
                <header class="page-hero" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(null, 'kftm-hero')); ?>);">
                    <div class="page-hero-overlay"></div>
                    <div class="container">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    </div>
                </header>
            <?php else : ?>
                <header class="page-header">
                    <div class="container">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    </div>
                </header>
            <?php endif; ?>

            <div class="entry-content section">
                <div class="container">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'kftm-green'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>
            </div>

            <?php if (comments_open() || get_comments_number()) : ?>
                <section class="comments-section section bg-light">
                    <div class="container">
                        <?php comments_template(); ?>
                    </div>
                </section>
            <?php endif; ?>
        </article>

    <?php endwhile; ?>
</div>

<?php
get_footer();
