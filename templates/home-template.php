<?php
/*
  * Template name: Home Template
  * */
get_header();
?>

<div class="home_slider swiper">
    <?php if (have_rows('home_slider')): ?>
        <?php while (have_rows('home_slider')): the_row(); ?>
            <div class="swiper-wrapper">
                <?php if (have_rows('item')): ?>
                    <?php while (have_rows('item')): the_row(); ?>
                        <div class="swiper-slide">
                            <img src="<?php the_sub_field('image'); ?>" alt="">
                            <div class="slider_content">
                                <h2><?php the_sub_field('title'); ?></h2>
                                <p><?php the_sub_field('description'); ?></p>
                                <?php if (have_rows('button_slide')): ?>
                                    <?php while (have_rows('button_slide')): the_row(); ?>
                                        <a href="<?php the_sub_field('link'); ?>"
                                           class="btn main_button"><?php the_sub_field('title'); ?></a>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <div class="home__arrows position-relative">
        <div class="home-pagination swiper-pagination"></div>
    </div>
</div>

<section class="delivery_section mg-100">
    <div class="container">
        <div class="delivery_content">
            <div class="delivery_item">
                <div class="img_delivery">
                    <img src="/wp-content/uploads/2025/04/free-delivery-300x300-1.png" alt="">
                </div>
                <div class="description">
                    <h5 class="fw-bold">Livrare rapidă</h5>
                    <p>în Chișinău</p>
                </div>
            </div>
            <div class="delivery_item">
                <div class="img_delivery">
                    <img src="/wp-content/uploads/2025/04/free-delivery-300x300-1.png" alt="">
                </div>
                <div class="description">
                    <h5 class="fw-bold">Achitarea</h5>
                    <p>la livrare</p>
                </div>
            </div>
            <div class="delivery_item">
                <div class="img_delivery">
                    <img src="/wp-content/uploads/2025/04/free-delivery-300x300-1.png" alt="">
                </div>
                <div class="description">
                    <h5 class="fw-bold">Reduceri</h5>
                    <p>de volum</p>
                </div>
            </div>
            <div class="delivery_item">
                <div class="img_delivery">
                    <img src="/wp-content/uploads/2025/04/free-delivery-300x300-1.png" alt="">
                </div>
                <div class="description">
                    <h5 class="fw-bold">Program</h5>
                    <p>24 / 7 / 365</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="all_products">
    <div class="block_title">
        <h2 class="text-center">Cele mai populare</h2>
        <p class="text-center">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
            unknown printer took a galley<br> of type and scrambled it to make a type specimen book.</p>
    </div>
    <div class="container">
        <div class="products_content">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 8,
                'post_status' => 'publish'
            );

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
                            <a href="<?php the_permalink(); ?>">
                                <div class="overlay">
                                    <span>Vezi mai mult</span>
                                </div>
                            </a>
                        </div>
                        <h5 class="text-center">
                            <a class="text-decoration-none text-black fw-bold"
                               href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h5>
                        <div class="price_list d-flex justify-content-center align-items-center">
                            <a href="?add-to-cart=<?php echo esc_attr($product->get_id()); ?>"
                               data-product_id="<?php echo esc_attr($product->get_id()); ?>"
                               data-product_sku="<?php echo esc_attr($product->get_sku()); ?>"
                               class="button product_type_simple add_to_cart_button ajax_add_to_cart"
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
</section>

<section class="about_home mg-100">
    <div class="container">
        <div class="row gy-0 gx-0">
            <div class="col-md-3">
                <img class="left_image"
                     src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                     alt="">
            </div>
            <div class="col-md-6 content">
                <h2>Bine ați venit pe pagina noastră!</h2>
                <p>Hydra-Prim este un site dedicat pasionaților de flori, unde veți găsi o gamă variată de culori, forme
                    și
                    specii de flori proaspete și de cea mai înaltă calitate. Suntem mândri să vă prezentăm un asortiment
                    larg de Hortensii Tăiate, Hortensii de Grădină, Pioni și Hypericum, aduse cu grijă și dedicare în
                    inima
                    Republicii Moldova.</p>
                <a class="btn main_button" href="#">Comandă acum</a>
            </div>
            <div class="col-md-3">
                <div class="video__about">
                    <img class="image_1"
                         src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                         alt="">
                    <a class="play_video" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <g clip-path="url(#clip0_135_4056)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M34.256 14.7048L11.4332 0.812495C7.61223 -1.5119 2.85742 1.42888 2.85742 6.10825V33.8915C2.85742 38.5769 7.61223 41.5116 11.4332 39.1872L34.256 25.3019C38.1056 22.9592 38.1056 17.0475 34.256 14.7048Z"
                                      fill="#6E71BD" fill-opacity="0.55"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_135_4056">
                                    <rect width="40" height="40" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
                <img class="image_2"
                     src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                     alt="">
            </div>
        </div>
    </div>
</section>

<section class="new_products">
    <div class="container">
        <div class="block_title">
            <h2>Produse noi</h2>
            <div class="d-flex justify-content-between align-items-end">
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown.</p>
                <div class="arrows_slider">
                    <div class="new-prev swiper-button-prev"></div>
                    <div class="new-next swiper-button-next"></div>
                </div>
            </div>
        </div>
        <div class="products_slider swiper">
            <div class="swiper-wrapper">
                <div class="product_item swiper-slide">
                    <div class="image_product">
                        <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                             alt="">
                        <div class="overlay">
                            <span>Vezi mai mult</span>
                        </div>
                    </div>
                    <h5 class="text-center">Paeonia Catharina Fontyn</h5>
                    <div class="price_list d-flex justify-content-center align-items-center">
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping.svg" alt="">
                        </a>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heart1.svg" alt="">
                        </a>
                        <span>700 MDL</span>
                    </div>
                </div>
                <div class="product_item swiper-slide">
                    <div class="image_product">
                        <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                             alt="">
                        <div class="overlay">
                            <span>Vezi mai mult</span>
                        </div>
                    </div>
                    <h5 class="text-center">Paeonia Catharina Fontyn</h5>
                    <div class="price_list d-flex justify-content-center align-items-center">
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping.svg" alt="">
                        </a>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heart1.svg" alt="">
                        </a>
                        <span>700 MDL</span>
                    </div>
                </div>
                <div class="product_item swiper-slide">
                    <div class="image_product">
                        <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                             alt="">
                        <div class="overlay">
                            <span>Vezi mai mult</span>
                        </div>
                    </div>
                    <h5 class="text-center">Paeonia Catharina Fontyn</h5>
                    <div class="price_list d-flex justify-content-center align-items-center">
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping.svg" alt="">
                        </a>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heart1.svg" alt="">
                        </a>
                        <span>700 MDL</span>
                    </div>
                </div>
                <div class="product_item swiper-slide">
                    <div class="image_product">
                        <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                             alt="">
                        <div class="overlay">
                            <span>Vezi mai mult</span>
                        </div>
                    </div>
                    <h5 class="text-center">Paeonia Catharina Fontyn</h5>
                    <div class="price_list d-flex justify-content-center align-items-center">
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping.svg" alt="">
                        </a>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heart1.svg" alt="">
                        </a>
                        <span>700 MDL</span>
                    </div>
                </div>
                <div class="product_item swiper-slide">
                    <div class="image_product">
                        <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                             alt="">
                        <div class="overlay">
                            <span>Vezi mai mult</span>
                        </div>
                    </div>
                    <h5 class="text-center">Paeonia Catharina Fontyn</h5>
                    <div class="price_list d-flex justify-content-center align-items-center">
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping.svg" alt="">
                        </a>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heart1.svg" alt="">
                        </a>
                        <span>700 MDL</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact_sec mg-100">
    <div class="container">
        <div class="row gy-0 gx-0 justify-content-between align-items-center">
            <div class="col-md-6">
                <h2 class="fw-bold">Lorem Ipsum has been the industry's standard</h2>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                    took a galley of type and scrambled it to make.</p>
            </div>
            <div class="col-md-6">
                <div class="d-flex gap-4 justify-content-end">
                    <a class="btn main_button whatupp" href="#"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.svg" alt="">
                        Whatupp</a>
                    <a class="btn main_button phone" href="#"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/phone2.svg" alt=""> Phone
                        call</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="gallery_home">
    <div class="container">
        <div class="footer_slider swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mg-100"></section>

<?php
get_footer();
?>
