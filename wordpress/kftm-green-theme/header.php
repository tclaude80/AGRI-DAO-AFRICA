<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Aller au contenu', 'kftm-green'); ?></a>

<header id="masthead" class="site-header">
    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <svg class="logo-icon" width="48" height="48" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="30" cy="30" r="28" fill="url(#logoGrad)"/>
                        <path d="M30 12c-4 8-2 16 4 22 2-8 1-16-4-22z" fill="#fff" opacity="0.9"/>
                        <path d="M22 18c0 10 4 18 12 22-2-10-4-18-12-22z" fill="#fff" opacity="0.7"/>
                        <path d="M38 20c-2 8 0 16 6 20-1-8-2-14-6-20z" fill="#fff" opacity="0.8"/>
                        <defs>
                            <linearGradient id="logoGrad" x1="0" y1="0" x2="60" y2="60">
                                <stop offset="0%" stop-color="#4CAF50"/>
                                <stop offset="100%" stop-color="#8BC34A"/>
                            </linearGradient>
                        </defs>
                    </svg>
                <?php endif; ?>
                <div class="logo-text">
                    <span class="site-title"><?php bloginfo('name'); ?></span>
                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) :
                    ?>
                        <span class="site-tagline"><?php echo $description; ?></span>
                    <?php endif; ?>
                </div>
            </a>

            <!-- Navigation -->
            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                ));
                ?>
            </nav>

            <!-- Header CTA -->
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary header-cta">
                <?php esc_html_e('Nous contacter', 'kftm-green'); ?>
            </a>

            <!-- Mobile Menu Toggle -->
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="screen-reader-text"><?php esc_html_e('Menu', 'kftm-green'); ?></span>
                <span class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
        </div>
    </div>
</header>

<main id="main" class="site-main">
