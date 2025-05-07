<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php wp_head(); ?>
    <title><?php the_title(); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>

<div class="navbar__menu">
    <div class="container">
        <div class="main-logo">
            <a href="<?php echo bloginfo('url'); ?>">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                ?>
                <img class="header_logo" src="<?php echo $image[0]; ?>" alt="">
            </a>
        </div>

        <div class="navbar__menu__items">
            <?php
            wp_nav_menu(['theme_location' => 'primary-menu']);
            ?>
        </div>
        <?php $cart_count = wp_kses_data(WC()->cart->get_cart_contents_count()); ?>
        <div class="navbar__client">
            <?php
            global $wpdb;

            // Dacă userul e logat, căutăm în tabela de useri
            if (is_user_logged_in()) {
                $user_id = get_current_user_id();
                $table_name = $wpdb->prefix . 'wt_wishlists';
                $count = $wpdb->get_var($wpdb->prepare(
                    "SELECT COUNT(*) FROM $table_name WHERE user_id = %d",
                    $user_id
                ));
            } else {
                // Pentru guest user, luăm session ID din WooCommerce
                if (!WC()->session) {
                    WC()->session = new WC_Session_Handler();
                    WC()->session->init();
                }

                $session_id = WC()->session->get('sessionid');
                $table_name = $wpdb->prefix . 'wt_guest_wishlists';
                $count = $wpdb->get_var($wpdb->prepare(
                    "SELECT COUNT(*) FROM $table_name WHERE session_id = %s",
                    $session_id
                ));
            }
            ?>
            <a href="<?php echo site_url('/wt-webtoffee-wishlist/'); ?>" class="favorite-cart">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heart-like.svg" alt="Favorite">
                <span class="wishlist-count"><?php echo intval($count); ?></span>
            </a>

            <a href="/cart" class="shopping-cart">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping.svg" alt="Cart">
                <div class="count__cart"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
            </a>
            <button class="navbar__toggle" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</div>

<body <?php body_class(); ?> >
