<?php
/**
 * The main template file
 *
 * @package KFTM_Green
 */

get_header();
?>

<div class="container">
    <div class="content-area">
        <?php if (have_posts()) : ?>

            <?php if (is_home() && !is_front_page()) : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header>
            <?php endif; ?>

            <div class="posts-grid grid grid-3">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                <?php the_post_thumbnail('kftm-card'); ?>
                            </a>
                        <?php endif; ?>

                        <div class="card-body">
                            <header class="entry-header">
                                <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>

                                <div class="entry-meta">
                                    <span class="posted-on"><?php kftm_green_posted_on(); ?></span>
                                    <span class="byline"><?php kftm_green_posted_by(); ?></span>
                                </div>
                            </header>

                            <div class="entry-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <footer class="entry-footer">
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">
                                    <?php esc_html_e('Lire la suite', 'kftm-green'); ?>
                                </a>
                            </footer>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php the_posts_pagination(array(
                'prev_text' => '&larr;',
                'next_text' => '&rarr;',
            )); ?>

        <?php else : ?>

            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Aucun contenu trouvé', 'kftm-green'); ?></h1>
                </header>

                <div class="page-content">
                    <p><?php esc_html_e('Désolé, aucun contenu ne correspond à votre recherche.', 'kftm-green'); ?></p>
                </div>
            </section>

        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
