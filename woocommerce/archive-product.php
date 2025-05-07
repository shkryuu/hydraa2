<?php
defined('ABSPATH') || exit;

get_header('shop');
?>

<main id="primary" class="site-main woocommerce-custom-layout container">

    <div class="woocommerce-header-top">
        <div class="woocommerce-breadcrumbs">
            <div class="breadcrumb_sec">
            <?php woocommerce_breadcrumb(); ?>
            </div>
        </div>
        <div class="woocommerce-sorting">
            <div class="sortare__sec d-flex align-items-center gap-4">
                <p>Sortare după:</p>
                <?php woocommerce_catalog_ordering(); ?>
            </div>
        </div>
    </div>

    <div class="woocommerce-container">
        <aside class="woocommerce-sidebar">
            <div class="filter-widget">
                <div class="title_filter">
                    <h2>Catalog</h2>
                    <div class="border__woo"></div>
                </div>
                <ul class="product-categories">
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => false,
                    ));

                    $current_category_id = get_queried_object_id();

                    foreach ($categories as $category) {
                        $term_id = $category->term_id;
                        $term_name = $category->name;
                        $term_count = $category->count;
                        $term_link = get_term_link($term_id);
                        $thumb_id = get_term_meta($term_id, 'thumbnail_id', true);
                        $thumb_url = wp_get_attachment_url($thumb_id);

                        $is_active = ($term_id === $current_category_id) ? 'active-category' : '';

                        echo '<div class="custom-category-item ' . $is_active . '">';
                        echo '  <a href="' . esc_url($term_link) . '">';
                        echo '    <div class="image-wrapper">';
                        echo '      <img src="' . esc_url($thumb_url) . '" alt="' . esc_attr($term_name) . '">';
                        echo '    </div>';
                        echo '    <div class="text-wrapper">';
                        echo '      <h4>' . esc_html($term_name) . '</h4>';
                        echo '      <span>[' . intval($term_count) . ']</span>';
                        echo '    </div>';
                        echo '  </a>';
                        echo '</div>';
                    }
                    ?>
                </ul>
            </div>
        </aside>

        <div class="products_content-produse">
            <?php
            $current_term = get_queried_object();

            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 8,
                'post_status' => 'publish',
            );

            if (is_product_category() && $current_term instanceof WP_Term) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $current_term->term_id,
                    ),
                );
            }

            $products = new WP_Query($args);


            if ($products->have_posts()) :
                while ($products->have_posts()) : $products->the_post();
                    global $product;
                    ?>
                    <div class="product_item">
                        <div class="image_product">
                            <?php
                            if (has_post_thumbnail()) {
                                echo '<a href="' . get_permalink() . '">';
                                the_post_thumbnail('full');
                                echo '</a>';
                            }
                            ?>
                            <div class="overlay">
                                <a href="<?php the_permalink(); ?>">
                                    <span>Vezi mai mult</span>
                                </a>
                            </div>
                        </div>
                        <h5 class="text-center">
                            <a class="text-decoration-none text-black fw-bold"
                               href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h5>
                        <div class="price_list d-flex justify-content-center align-items-center">
                            <a href="?add-to-cart=<?php echo esc_attr($product->get_id()); ?>"
                               data-product_id="<?php echo esc_attr($product->get_id()); ?>"
                               data-product_sku="<?php echo esc_attr($product->get_sku()); ?>"
                               class="product_type_simple add_to_cart_button ajax_add_to_cart"
                               rel="nofollow">
                                <img class="cart_product_img"
                                     src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping.svg"
                                     alt="Adaugă în coș">
                            </a>
                            <?php echo do_shortcode('[wishlist_button id="' . get_the_ID() . '"]'); ?>
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
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Nu au fost găsite produse.</p>';
            endif;
            ?>
        </div>
    </div>
</main>

<?php get_template_part('template-parts/gallery-template'); ?>

<?php get_footer() ?>