<?php
/**
 * The template for displaying all single posts
 *
 * @package KFTM_Green
 */

get_header();
?>

<div class="single-content-wrapper">
    <?php while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if (has_post_thumbnail()) : ?>
                <header class="post-hero" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(null, 'kftm-hero')); ?>);">
                    <div class="post-hero-overlay"></div>
                    <div class="container">
                        <div class="post-hero-content">
                            <?php the_title('<h1 class="post-title">', '</h1>'); ?>
                            <div class="post-meta">
                                <span class="posted-on"><?php kftm_green_posted_on(); ?></span>
                                <span class="byline"><?php esc_html_e('par', 'kftm-green'); ?> <?php kftm_green_posted_by(); ?></span>
                            </div>
                        </div>
                    </div>
                </header>
            <?php else : ?>
                <header class="post-header section">
                    <div class="container">
                        <?php the_title('<h1 class="post-title">', '</h1>'); ?>
                        <div class="post-meta">
                            <span class="posted-on"><?php kftm_green_posted_on(); ?></span>
                            <span class="byline"><?php esc_html_e('par', 'kftm-green'); ?> <?php kftm_green_posted_by(); ?></span>
                        </div>
                    </div>
                </header>
            <?php endif; ?>

            <div class="entry-content section">
                <div class="container">
                    <div class="content-wrapper">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'kftm-green'),
                            'after'  => '</div>',
                        ));
                        ?>

                        <footer class="entry-footer">
                            <?php
                            $categories_list = get_the_category_list(', ');
                            if ($categories_list) {
                                printf('<span class="cat-links">%s %s</span>', esc_html__('Catégories:', 'kftm-green'), $categories_list);
                            }

                            $tags_list = get_the_tag_list('', ', ');
                            if ($tags_list) {
                                printf('<span class="tags-links">%s %s</span>', esc_html__('Tags:', 'kftm-green'), $tags_list);
                            }
                            ?>
                        </footer>
                    </div>
                </div>
            </div>

            <!-- Post Navigation -->
            <nav class="post-navigation section bg-light">
                <div class="container">
                    <?php
                    the_post_navigation(array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__('Précédent:', 'kftm-green') . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__('Suivant:', 'kftm-green') . '</span> <span class="nav-title">%title</span>',
                    ));
                    ?>
                </div>
            </nav>

            <!-- Comments -->
            <?php if (comments_open() || get_comments_number()) : ?>
                <section class="comments-section section">
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
