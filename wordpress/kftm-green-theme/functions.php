<?php
/**
 * KFTM Green Theme Functions
 *
 * @package KFTM_Green
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function kftm_green_setup() {
    // Add default posts and comments RSS feed links
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    add_image_size('kftm-product', 800, 800, true);
    add_image_size('kftm-hero', 1920, 1080, true);
    add_image_size('kftm-card', 600, 400, true);

    // Register menus
    register_nav_menus(array(
        'primary' => __('Navigation Principale', 'kftm-green'),
        'footer'  => __('Navigation Footer', 'kftm-green'),
    ));

    // Add support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Custom logo support
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for Block Styles
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images
    add_theme_support('align-wide');

    // Add support for responsive embedded content
    add_theme_support('responsive-embeds');

    // Editor color palette
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Primary Green', 'kftm-green'),
            'slug'  => 'primary',
            'color' => '#4CAF50',
        ),
        array(
            'name'  => __('Secondary Green', 'kftm-green'),
            'slug'  => 'secondary',
            'color' => '#8BC34A',
        ),
        array(
            'name'  => __('Accent Gold', 'kftm-green'),
            'slug'  => 'accent',
            'color' => '#FFC107',
        ),
        array(
            'name'  => __('Dark', 'kftm-green'),
            'slug'  => 'dark',
            'color' => '#212121',
        ),
        array(
            'name'  => __('Light', 'kftm-green'),
            'slug'  => 'light',
            'color' => '#F9FBF7',
        ),
    ));
}
add_action('after_setup_theme', 'kftm_green_setup');

/**
 * Enqueue scripts and styles
 */
function kftm_green_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'kftm-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // AOS Animation Library
    wp_enqueue_style(
        'aos',
        'https://unpkg.com/aos@2.3.4/dist/aos.css',
        array(),
        '2.3.4'
    );

    // Theme stylesheet
    wp_enqueue_style(
        'kftm-green-style',
        get_stylesheet_uri(),
        array('kftm-fonts', 'aos'),
        wp_get_theme()->get('Version')
    );

    // Custom CSS
    wp_enqueue_style(
        'kftm-green-custom',
        get_template_directory_uri() . '/assets/css/custom.css',
        array('kftm-green-style'),
        wp_get_theme()->get('Version')
    );

    // AOS JS
    wp_enqueue_script(
        'aos',
        'https://unpkg.com/aos@2.3.4/dist/aos.js',
        array(),
        '2.3.4',
        true
    );

    // Theme JS
    wp_enqueue_script(
        'kftm-green-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array('aos'),
        wp_get_theme()->get('Version'),
        true
    );

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'kftm_green_scripts');

/**
 * Register widget areas
 */
function kftm_green_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'kftm-green'),
        'id'            => 'sidebar-1',
        'description'   => __('Ajoutez des widgets ici.', 'kftm-green'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 1', 'kftm-green'),
        'id'            => 'footer-1',
        'description'   => __('Zone footer 1.', 'kftm-green'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 2', 'kftm-green'),
        'id'            => 'footer-2',
        'description'   => __('Zone footer 2.', 'kftm-green'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 3', 'kftm-green'),
        'id'            => 'footer-3',
        'description'   => __('Zone footer 3.', 'kftm-green'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'kftm_green_widgets_init');

/**
 * Register Custom Post Type: Produits
 */
function kftm_green_register_product_cpt() {
    $labels = array(
        'name'               => __('Produits', 'kftm-green'),
        'singular_name'      => __('Produit', 'kftm-green'),
        'menu_name'          => __('Produits', 'kftm-green'),
        'add_new'            => __('Ajouter', 'kftm-green'),
        'add_new_item'       => __('Ajouter un produit', 'kftm-green'),
        'edit_item'          => __('Modifier le produit', 'kftm-green'),
        'new_item'           => __('Nouveau produit', 'kftm-green'),
        'view_item'          => __('Voir le produit', 'kftm-green'),
        'search_items'       => __('Rechercher un produit', 'kftm-green'),
        'not_found'          => __('Aucun produit trouvé', 'kftm-green'),
        'not_found_in_trash' => __('Aucun produit dans la corbeille', 'kftm-green'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'produit'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-products',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true,
    );

    register_post_type('kftm_product', $args);
}
add_action('init', 'kftm_green_register_product_cpt');

/**
 * Register Product Taxonomy: Categories
 */
function kftm_green_register_product_taxonomy() {
    $labels = array(
        'name'              => __('Catégories Produits', 'kftm-green'),
        'singular_name'     => __('Catégorie Produit', 'kftm-green'),
        'search_items'      => __('Rechercher une catégorie', 'kftm-green'),
        'all_items'         => __('Toutes les catégories', 'kftm-green'),
        'edit_item'         => __('Modifier la catégorie', 'kftm-green'),
        'update_item'       => __('Mettre à jour la catégorie', 'kftm-green'),
        'add_new_item'      => __('Ajouter une catégorie', 'kftm-green'),
        'new_item_name'     => __('Nouvelle catégorie', 'kftm-green'),
        'menu_name'         => __('Catégories', 'kftm-green'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'categorie-produit'),
        'show_in_rest'      => true,
    );

    register_taxonomy('kftm_product_cat', array('kftm_product'), $args);
}
add_action('init', 'kftm_green_register_product_taxonomy');

/**
 * Add custom meta boxes for products
 */
function kftm_green_add_product_meta_boxes() {
    add_meta_box(
        'kftm_product_details',
        __('Détails du produit', 'kftm-green'),
        'kftm_green_product_meta_box_callback',
        'kftm_product',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'kftm_green_add_product_meta_boxes');

/**
 * Product meta box callback
 */
function kftm_green_product_meta_box_callback($post) {
    wp_nonce_field('kftm_product_meta_box', 'kftm_product_meta_box_nonce');

    $format = get_post_meta($post->ID, '_kftm_product_format', true);
    $weight = get_post_meta($post->ID, '_kftm_product_weight', true);
    $gluten_free = get_post_meta($post->ID, '_kftm_product_gluten_free', true);
    $features = get_post_meta($post->ID, '_kftm_product_features', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="kftm_product_format"><?php _e('Format', 'kftm-green'); ?></label></th>
            <td><input type="text" id="kftm_product_format" name="kftm_product_format" value="<?php echo esc_attr($format); ?>" class="regular-text" placeholder="ex: 1kg, 500g"></td>
        </tr>
        <tr>
            <th><label for="kftm_product_weight"><?php _e('Poids net', 'kftm-green'); ?></label></th>
            <td><input type="text" id="kftm_product_weight" name="kftm_product_weight" value="<?php echo esc_attr($weight); ?>" class="regular-text" placeholder="ex: 1000g"></td>
        </tr>
        <tr>
            <th><label for="kftm_product_gluten_free"><?php _e('Sans gluten', 'kftm-green'); ?></label></th>
            <td><input type="checkbox" id="kftm_product_gluten_free" name="kftm_product_gluten_free" value="1" <?php checked($gluten_free, '1'); ?>></td>
        </tr>
        <tr>
            <th><label for="kftm_product_features"><?php _e('Caractéristiques', 'kftm-green'); ?></label></th>
            <td>
                <textarea id="kftm_product_features" name="kftm_product_features" rows="4" class="large-text" placeholder="Une caractéristique par ligne"><?php echo esc_textarea($features); ?></textarea>
                <p class="description"><?php _e('Une caractéristique par ligne (sera affiché en liste)', 'kftm-green'); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save product meta
 */
function kftm_green_save_product_meta($post_id) {
    if (!isset($_POST['kftm_product_meta_box_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['kftm_product_meta_box_nonce'], 'kftm_product_meta_box')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array(
        'kftm_product_format'      => '_kftm_product_format',
        'kftm_product_weight'      => '_kftm_product_weight',
        'kftm_product_features'    => '_kftm_product_features',
    );

    foreach ($fields as $field => $meta_key) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $meta_key, sanitize_textarea_field($_POST[$field]));
        }
    }

    // Checkbox
    $gluten_free = isset($_POST['kftm_product_gluten_free']) ? '1' : '0';
    update_post_meta($post_id, '_kftm_product_gluten_free', $gluten_free);
}
add_action('save_post', 'kftm_green_save_product_meta');

/**
 * Theme Customizer options
 */
function kftm_green_customize_register($wp_customize) {
    // Company Info Section
    $wp_customize->add_section('kftm_company_info', array(
        'title'    => __('Informations entreprise', 'kftm-green'),
        'priority' => 30,
    ));

    // Phone
    $wp_customize->add_setting('kftm_phone', array(
        'default'           => '+237 654 39 74 50',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('kftm_phone', array(
        'label'   => __('Téléphone', 'kftm-green'),
        'section' => 'kftm_company_info',
        'type'    => 'text',
    ));

    // Email
    $wp_customize->add_setting('kftm_email', array(
        'default'           => 'infos@kftmgreen.cm',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('kftm_email', array(
        'label'   => __('Email', 'kftm-green'),
        'section' => 'kftm_company_info',
        'type'    => 'email',
    ));

    // Address
    $wp_customize->add_setting('kftm_address', array(
        'default'           => 'Kribi, Cameroun',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('kftm_address', array(
        'label'   => __('Adresse', 'kftm-green'),
        'section' => 'kftm_company_info',
        'type'    => 'text',
    ));

    // Social Media Section
    $wp_customize->add_section('kftm_social_media', array(
        'title'    => __('Réseaux sociaux', 'kftm-green'),
        'priority' => 35,
    ));

    $social_networks = array(
        'facebook'  => 'Facebook',
        'linkedin'  => 'LinkedIn',
        'instagram' => 'Instagram',
        'whatsapp'  => 'WhatsApp',
    );

    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting('kftm_' . $network, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('kftm_' . $network, array(
            'label'   => $label,
            'section' => 'kftm_social_media',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'kftm_green_customize_register');

/**
 * Custom template tags
 */
function kftm_green_posted_on() {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

    printf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date())
    );
}

function kftm_green_posted_by() {
    printf(
        '<span class="author">%s</span>',
        esc_html(get_the_author())
    );
}

/**
 * Excerpt length
 */
function kftm_green_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'kftm_green_excerpt_length');

/**
 * Excerpt more
 */
function kftm_green_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'kftm_green_excerpt_more');

/**
 * Add body classes
 */
function kftm_green_body_classes($classes) {
    if (is_singular()) {
        $classes[] = 'singular';
    }

    if (is_front_page()) {
        $classes[] = 'front-page';
    }

    return $classes;
}
add_filter('body_class', 'kftm_green_body_classes');
