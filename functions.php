<?php

function remove_core_updates()
{
    global $wp_version;
    return (object)array('last_checked' => time(), 'version_checked' => $wp_version,);
}

add_filter('pre_site_transient_update_core', 'remove_core_updates');
add_filter('pre_site_transient_update_plugins', 'remove_core_updates');
add_filter('pre_site_transient_update_themes', 'remove_core_updates');


if (!isset($content_width)) {
    $content_width = 1440;
}

if (!function_exists('Setup')) :
    function Setup()
    {

        load_theme_textdomain('dentone', get_template_directory() . '/languages');

        add_theme_support('title-tag');

        add_post_type_support('page', 'post-formats');
        add_post_type_support('services', 'post-formats');

        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(825, 510, true);

        register_nav_menus(array(
            'primary-menu' => __('Primary Menu', 'dentone'),
            'footer-menu' => __('Footer Menu', 'dentone'),
        ));

        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));

        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ));

    }
endif;
add_action('after_setup_theme', 'Setup');

/**
 * Add support for core custom logo.
 *
 * @link https://codex.wordpress.org/Theme_Logo
 */
$logo_width = 300;
$logo_height = 100;

add_theme_support(
    'custom-logo',
    array(
        'height' => $logo_height,
        'width' => $logo_width,
        'flex-width' => true,
        'flex-height' => true,
        'unlink-homepage-logo' => true,
    )
);

function Widgets()
{
    register_sidebar(array(
        'name' => __('Widget Area', 'dentone'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'dentone'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'Widgets');

add_action('init', 'excerpt_page');
function excerpt_page()
{
    add_post_type_support('page', 'excerpt');
}

function Install_Scripts()
{
    wp_enqueue_style('awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('swiper-theme', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
    wp_enqueue_style('slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css');
    wp_enqueue_style('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
    wp_enqueue_style('flatpickr', '//cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css');
    wp_enqueue_style('fancy', '//cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css');
    wp_enqueue_style('awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css');

    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.7.1.min.js', array('jquery'), '', true);
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), '', true);
    wp_enqueue_script('slick-min', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '', true);
    wp_enqueue_script('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr', array('jquery'), '', true);
    wp_enqueue_script('flatpickr-ro', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ro.js', array('jquery'), '', true);
    wp_enqueue_script('gsap', '//cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array('jquery'), '', true);
    wp_enqueue_script('gsap-trigger', '//cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('jquery'), '', true);
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'Install_Scripts');


add_action('tgmpa_register', 'Required_Plugins');
add_action('admin_menu', 'Remove_Unused_Pages');
function Remove_Unused_Pages()
{
    remove_menu_page('edit-comments.php');
}

add_action('admin_bar_menu', 'Remove_Nodes', 999);
function Remove_Nodes()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('updates');
    $wp_admin_bar->remove_node('wpseo-menu');
    $wp_admin_bar->remove_node('new-content');
    $wp_admin_bar->remove_node('wp-logo');
}


// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '6.6.1') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}

add_action('admin_head', 'fix_svg');

function custom_post_type_services()
{
    $labels = array(
        'name' => _x('Services', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Service', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Services', 'text_domain'),
        'name_admin_bar' => __('Service', 'text_domain'),
        'archives' => __('Service Archives', 'text_domain'),
        'attributes' => __('Service Attributes', 'text_domain'),
        'parent_item_colon' => __('Parent Service:', 'text_domain'),
        'all_items' => __('All Services', 'text_domain'),
        'add_new_item' => __('Add New Service', 'text_domain'),
        'add_new' => __('Add New', 'text_domain'),
        'new_item' => __('New Service', 'text_domain'),
        'edit_item' => __('Edit Service', 'text_domain'),
        'update_item' => __('Update Service', 'text_domain'),
        'view_item' => __('View Service', 'text_domain'),
        'view_items' => __('View Services', 'text_domain'),
        'search_items' => __('Search Service', 'text_domain'),
        'not_found' => __('Not found', 'text_domain'),
        'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
        'featured_image' => __('Featured Image', 'text_domain'),
        'set_featured_image' => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image' => __('Use as featured image', 'text_domain'),
        'insert_into_item' => __('Insert into service', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this service', 'text_domain'),
        'items_list' => __('Services list', 'text_domain'),
        'items_list_navigation' => __('Services list navigation', 'text_domain'),
        'filter_items_list' => __('Filter services list', 'text_domain'),
    );

    $args = array(
        'label' => __('Service', 'text_domain'),
        'description' => __('Post Type Description', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields',),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'rewrite' => array(
            'slug' => '',
            'with_front' => false,
        ),
    );


    register_taxonomy(
        'category-taxonomy',
        'service',
        array(
            'labels' => array(
                'name' => 'Categories',
                'add_new_item' => 'Add new category',
                'new_item_name' => 'New Category',
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
        )
    );
    register_post_type('service', $args);
}

add_action('init', 'custom_post_type_services', 0);

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Common Settings',
        'menu_title' => 'Common Settings',
        'menu_slug' => 'common-settings',
        'capability' => 'edit_posts',
        'redirect' => false,
        'icon_url' => 'dashicons-admin-settings',
    ));
}

function register_my_menus()
{
    register_nav_menus(
        array(
            'top-menu' => __('Top Menu'), // Locația meniului
        )
    );
}

add_action('init', 'register_my_menus');

add_filter('wpcf7_autop_or_not', '__return_false');

function na_remove_slug($post_link, $post, $leavename)
{

    // Apply to both 'services' and 'package' post types
    if (!in_array($post->post_type, array('service')) || 'publish' != $post->post_status) {
        return $post_link;
    }

    // Remove the custom post type slug
    $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);

    return $post_link;
}

add_filter('post_type_link', 'na_remove_slug', 10, 3);

function na_parse_request($query)
{

    if (!$query->is_main_query() || 2 != count($query->query) || !isset($query->query['page'])) {
        return;
    }

    if (!empty($query->query['name'])) {
        // Add support for 'services', 'package', and other types in the query
        $query->set('post_type', array('service', 'category-taxonomy', 'post'));
    }
}

add_action('pre_get_posts', 'na_parse_request');

add_action('wp_enqueue_scripts', 'enqueue_ajax_add_to_cart_script');
function enqueue_ajax_add_to_cart_script()
{
    wp_enqueue_script('wc-add-to-cart');
    wp_enqueue_script('wc-cart-fragments');
}

function custom_breadcrumbs()
{
    // Setări
    $home_title = 'Prima pagină';
    $back_text = 'Înapoi';

    // Obține postul global
    global $post;

    echo '<ol class="breadcrumb">';

    // Acasă (Prima pagină)
    echo '<li class="breadcrumb-item"><a href="' . esc_url(home_url()) . '">' . esc_html($home_title) . '</a></li>';

    // Dacă nu e pagina principală
    if (!is_front_page()) {
        // Postări/blog
        if (is_category() || is_single() || is_tag()) {
            // Categorie
            if (is_category()) {
                $category = get_queried_object();
                echo '<li class="breadcrumb-item active">' . esc_html($category->name) . '</li>';
            } // Postare individuală
            elseif (is_single()) {
                // Link "Înapoi" folosind istoric JavaScript
//                echo '<li class="breadcrumb-item"><a href="javascript:history.go(-1)" class="back-link">' . esc_html($back_text) . '</a></li>';

                // Categorie postare (dacă există)
                $categories = get_the_category();
                if (!empty($categories)) {
                    echo '<li class="breadcrumb-item"><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a></li>';
                }

                // Titlul postării
                echo '<li class="breadcrumb-item active">' . esc_html(get_the_title()) . '</li>';
            } // Etichetă
            elseif (is_tag()) {
                $tag = get_queried_object();
                echo '<li class="breadcrumb-item active">' . esc_html($tag->name) . '</li>';
            }
        } // Pagini
        elseif (is_page()) {
            // Link "Înapoi"
//            echo '<li class="breadcrumb-item"><a href="javascript:history.go(-1)" class="back-link">' . esc_html($back_text) . '</a></li>';

            // Verifică dacă $post există și are părinte
            if (isset($post) && $post->post_parent) {
                $ancestors = array_reverse(get_post_ancestors($post->ID));
                foreach ($ancestors as $ancestor) {
                    echo '<li class="breadcrumb-item"><a href="' . esc_url(get_permalink($ancestor)) . '">' . esc_html(get_the_title($ancestor)) . '</a></li>';
                }
            }

            // Titlul paginii curente
            echo '<li class="breadcrumb-item active">' . esc_html(get_the_title()) . '</li>';
        } // 404
        elseif (is_404()) {
            echo '<li class="breadcrumb-item active">Eroare 404</li>';
        }
    }

    echo '</ol>';
}

add_action('wp_ajax_load_favorites', 'load_favorites_callback');
add_action('wp_ajax_nopriv_load_favorites', 'load_favorites_callback');

function load_favorites_callback()
{
    if (!isset($_GET['ids']) || empty($_GET['ids'])) {
        wp_die();
    }

    $ids = array_map('intval', explode(',', $_GET['ids']));

    $args = array(
        'post_type' => array('product'),
        'post__in' => $ids,
        'posts_per_page' => -1,
        'post_status' => 'publish'
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="products_content">';
        while ($query->have_posts()) {
            $query->the_post();
            global $product;
            ?>
            <div class="product_item">
                <div class="image_product">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('full'); ?>
                        </a>
                    <?php endif; ?>
                    <div class="overlay">
                        <a href="<?php the_permalink(); ?>">
                            <span>Vezi mai mult</span>
                        </a>
                    </div>
                </div>
                <h5 class="text-center">
                    <a class="text-decoration-none text-black fw-bold" href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h5>
                <div class="price_list d-flex justify-content-center align-items-center">
                    <a href="?add-to-cart=<?php echo esc_attr($product->get_id()); ?>"
                       data-product_id="<?php echo esc_attr($product->get_id()); ?>"
                       data-product_sku="<?php echo esc_attr($product->get_sku()); ?>"
                       class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                       rel="nofollow">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping.svg"
                             alt="Adaugă în coș">
                    </a>

                    <a href="#" class="favorite-toggle" data-id="<?php echo get_the_ID(); ?>">
                        <img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/heart.svg"
                                data-original="<?php echo get_template_directory_uri(); ?>/assets/images/heart_full.svg"
                                data-alt="<?php echo get_template_directory_uri(); ?>/assets/images/heart.svg"
                                alt="Adaugă la favorite"
                        >
                    </a>

                    <div class="price__item">
                        <?php
                        $regular_price = (int)$product->get_regular_price();
                        $sale_price = (int)$product->get_sale_price();
                        ?>

                        <?php if ($sale_price && $sale_price < $regular_price): ?>
                            <span class="price-sale"><?php echo $sale_price; ?> MDL</span>
                            <del class="price-regular"><?php echo $regular_price; ?> MDL</del>
                        <?php else: ?>
                            <span class="price-normal"><?php echo $regular_price; ?> MDL</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
        }
        echo '</div>'; // end .products_content
        wp_reset_postdata();
    } else {
        echo '<p class="no-favorites">Nu ai adăugat niciun produs la favorite.</p>';
    }

    wp_die();
}


add_filter('woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments');

function iconic_cart_count_fragments($fragments)
{
    ob_start(); ?>
    <div class="count__cart"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
    <?php
    $fragments['.count__cart'] = ob_get_clean();
    return $fragments;
}

add_action('after_setup_theme', function () {
    add_theme_support('woocommerce');
});

add_action('wp_ajax_add_to_cart_redirect', 'custom_add_to_cart_redirect');
add_action('wp_ajax_nopriv_add_to_cart_redirect', 'custom_add_to_cart_redirect');

function custom_add_to_cart_redirect() {
    $product_id = intval($_POST['product_id']);
    $quantity = max(1, intval($_POST['quantity'] ?? 1));

    if ($product_id && $quantity) {
        $url = add_query_arg([
            'add-to-cart' => $product_id,
            'quantity'    => $quantity
        ], wc_get_cart_url());

        wp_send_json_success([
            'redirect_url' => $url
        ]);
    }

    wp_send_json_error(['message' => 'Parametri lipsă.']);
}

add_shortcode('wishlist_button', function($atts) {
    $atts = shortcode_atts([
        'id' => get_the_ID()
    ], $atts);

    if (!class_exists('WT_Wishlist_Singlepage')) return '';

    global $product;
    $product = wc_get_product($atts['id']);

    ob_start();
    $wishlist = new WT_Wishlist_Singlepage();
    $wishlist->render_webtoffee_wishlist_button();
    return ob_get_clean();
});

register_nav_menus(array(
    'footer-menu' => __('Footer Menu'),
));
function custom_pre_get_posts($query) {
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('product')) {
        $query->set('paged', get_query_var('paged'));
    }
}
add_action('pre_get_posts', 'custom_pre_get_posts');



