<?php
/**
 * The front page template file
 *
 * @package KFTM_Green
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-bg">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'kftm-hero')); ?>" alt="">
        <?php endif; ?>
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content" data-aos="fade-up">
            <span class="hero-badge"><?php esc_html_e('Depuis 2019 - Kribi, Cameroun', 'kftm-green'); ?></span>
            <h1>
                <?php esc_html_e('Transformons ensemble', 'kftm-green'); ?><br>
                <span class="text-gradient"><?php esc_html_e('la banane plantain', 'kftm-green'); ?></span>
            </h1>
            <p class="hero-text">
                <?php esc_html_e('KFTM Green valorise la banane plantain camerounaise en produits alimentaires de qualité.', 'kftm-green'); ?>
                <strong><?php esc_html_e('Healthy Living, Healthy Farming.', 'kftm-green'); ?></strong>
            </p>
            <div class="hero-cta">
                <a href="<?php echo esc_url(home_url('/produits')); ?>" class="btn btn-primary btn-lg">
                    <?php esc_html_e('Découvrir nos produits', 'kftm-green'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary btn-lg">
                    <?php esc_html_e('Devenir partenaire', 'kftm-green'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="section" id="products">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="section-badge"><?php esc_html_e('Nos produits', 'kftm-green'); ?></span>
            <h2><?php esc_html_e('Des produits 100% naturels', 'kftm-green'); ?></h2>
            <p><?php esc_html_e('Découvrez notre gamme de produits à base de banane plantain.', 'kftm-green'); ?></p>
        </div>

        <div class="products-grid grid grid-3">
            <?php
            $products = new WP_Query(array(
                'post_type'      => 'kftm_product',
                'posts_per_page' => 3,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ));

            if ($products->have_posts()) :
                while ($products->have_posts()) : $products->the_post();
                    $gluten_free = get_post_meta(get_the_ID(), '_kftm_product_gluten_free', true);
                    $format = get_post_meta(get_the_ID(), '_kftm_product_format', true);
            ?>
                <div class="product-card card" data-aos="fade-up">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="product-image">
                            <?php the_post_thumbnail('kftm-product'); ?>
                            <div class="product-badges">
                                <?php if ($gluten_free) : ?>
                                    <span class="badge badge-green"><?php esc_html_e('Sans Gluten', 'kftm-green'); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <h3><?php the_title(); ?></h3>
                        <?php the_excerpt(); ?>
                        <?php if ($format) : ?>
                            <p class="product-format"><strong><?php esc_html_e('Format:', 'kftm-green'); ?></strong> <?php echo esc_html($format); ?></p>
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                            <?php esc_html_e('Découvrir', 'kftm-green'); ?>
                        </a>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <p><?php esc_html_e('Aucun produit pour le moment.', 'kftm-green'); ?></p>
            <?php endif; ?>
        </div>

        <div class="text-center" style="margin-top: 3rem;">
            <a href="<?php echo esc_url(home_url('/produits')); ?>" class="btn btn-secondary btn-lg">
                <?php esc_html_e('Voir tous nos produits', 'kftm-green'); ?>
            </a>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section bg-light" id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-content" data-aos="fade-right">
                <span class="section-badge"><?php esc_html_e('Notre histoire', 'kftm-green'); ?></span>
                <h2><?php esc_html_e('Une vision née de la passion', 'kftm-green'); ?></h2>
                <p>
                    <?php esc_html_e('Fondée en 2019 à Kribi par M. AWONO Landry Gaëtan et Dr. Claude TCHONKO, KFTM Green SARL est née d\'une conviction : le Cameroun possède un trésor agricole sous-exploité dans la banane plantain.', 'kftm-green'); ?>
                </p>
                <p>
                    <?php esc_html_e('Notre mission est de transformer ce produit local en denrées alimentaires de haute qualité, tout en soutenant les producteurs locaux.', 'kftm-green'); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/a-propos')); ?>" class="btn btn-primary">
                    <?php esc_html_e('En savoir plus', 'kftm-green'); ?>
                </a>
            </div>
            <div class="about-image" data-aos="fade-left">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/about-placeholder.jpg" alt="KFTM Green">
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section section-cta bg-gradient">
    <div class="container">
        <div class="cta-content text-center" data-aos="fade-up">
            <h2><?php esc_html_e('Prêt à collaborer avec nous ?', 'kftm-green'); ?></h2>
            <p><?php esc_html_e('Contactez-nous pour explorer les opportunités de partenariat.', 'kftm-green'); ?></p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-accent btn-lg">
                    <?php esc_html_e('Nous contacter', 'kftm-green'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
