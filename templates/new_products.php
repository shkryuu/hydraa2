<section class="new_products">
    <div class="container">
        <div class="block_title">
            <h2>Produse noi</h2>
            <div class="d-flex justify-content-between align-items-end">
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                    unknown.</p>
                <div class="arrows_slider">
                    <div class="new-prev swiper-button-prev"></div>
                    <div class="new-next swiper-button-next"></div>
                </div>
            </div>
        </div>
        <div class="products_slider swiper">
            <div class="swiper-wrapper">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 10,
                    'post_status' => 'publish',
                );
                $loop = new WP_Query($args);
                if ($loop->have_posts()) :
                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;
                        $product_link = get_permalink();
                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        $title = get_the_title();
                        $price = $product->get_price();
                        ?>
                        <div class="product_item swiper-slide">
                            <div class="image_product">
                                <?php if ($image_url): ?>
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>">
                                <?php endif; ?>
                                <div class="overlay">
                                    <a href="<?php echo esc_url($product_link); ?>"><span>Vezi mai mult</span></a>
                                </div>
                            </div>
                            <h5 class="text-center"><?php echo esc_html($title); ?></h5>
                            <div class="price_list d-flex justify-content-center align-items-center">
                                <a href="?add-to-cart=<?php echo esc_attr($product->get_id()); ?>">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping.svg" alt="">
                                </a>
                                <a href="#" class="add-to-favorites" data-product-id="<?php echo get_the_ID(); ?>">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heart1.svg" alt="">
                                </a>
                                <span><?php echo esc_html($price); ?> MDL</span>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>


    </div>
</section>