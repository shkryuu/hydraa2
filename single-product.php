<?php
defined('ABSPATH') || exit;
get_header('shop');
?>

    <section class="breadcrumb_sec">
        <div class="container">
            <?php woocommerce_breadcrumb(); ?>
        </div>
    </section>

    <section class="single_product mg-50">
        <div class="container">
            <?php while ( have_posts() ) : the_post(); global $product; ?>
            <div class="row gy-0 gx-0">
                <div class="col-md-6 product_left">
                    <?php
                    global $product;
                    $product_id = $product->get_id();
                    $featured_image = get_the_post_thumbnail_url($product_id, 'full');
                    $gallery_images = $product->get_gallery_image_ids();

                    // Dacă nu există imagini, folosim un placeholder
                    if (empty($featured_image) && empty($gallery_images)) {
                        $featured_image = wc_placeholder_img_src('full');
                    }
                    ?>

                    <!-- Main Slider -->
                    <div class="product_slider mt-0 swiper main-slider">
                        <div class="swiper-wrapper">
                            <?php if ($featured_image): ?>
                                <div class="swiper-slide">
                                    <a href="<?php echo esc_url($featured_image); ?>" data-fancybox="gallery">
                                        <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr(get_the_title($product_id)); ?>">
                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php foreach ($gallery_images as $image_id): ?>
                                <?php $image_url = wp_get_attachment_image_url($image_id, 'full'); ?>
                                <div class="swiper-slide">
                                    <a href="<?php echo esc_url($image_url); ?>" data-fancybox="gallery">
                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title($product_id)); ?>">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Thumbnail Slider -->
                    <div class="pd_slide">
                        <div class="discover_slider thumbnail-slider swiper">
                            <div class="swiper-wrapper">
                                <?php if ($featured_image): ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr(get_the_title($product_id)); ?>">
                                    </div>
                                <?php endif; ?>

                                <?php foreach ($gallery_images as $image_id): ?>
                                    <?php $image_url = wp_get_attachment_image_url($image_id, 'thumbnail'); ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title($product_id)); ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 product_right">
                    <h1><?php the_title(); ?></h1>
                    <div class="product-price">
                        <?php echo $product->get_price_html(); ?>
                    </div>
                    <div class="product-short-description">
                        <?php echo apply_filters('woocommerce_short_description', $post->post_excerpt); ?>
                    </div>
                    <div class="cards_product">
                        <div class="card_item">
                            <p>40 cm / 15+</p>
                        </div>
                        <div class="card_item">
                            <p>40 cm / 15+</p>
                        </div>
                        <div class="card_item">
                            <p>40 cm / 15+</p>
                        </div>
                    </div>
                    <div class="precomanda">
                        <h5>80 MDL</h5>
                        <p>Disponibil pentru precomandă</p>
                    </div>
                    <div class="cart">
                        <div class="eveniment_number_input">
                            <button type="button" class="minus">-</button>
                            <input type="number" class="eveniment_input" name="persoane" value="1" min="1" max="99">
                            <button type="button" class="plus">+</button>
                        </div>
                        <a href="#" class="btn single_add-to-cart-btn"
                           data-product_id="<?php echo esc_attr($product->get_id()); ?>">
                            Adaugă în coș
                        </a>
                        <div class="wishlist__button">
                            <?php echo do_shortcode('[wishlist_button id="' . get_the_ID() . '"]'); ?>
                        </div>
                    </div>


                    <div class="mt-5">
                        <p class="fw-bold" id="total-price-single"></p>
                    </div>

                    <div class="question">
                        <div class="row gy-0 gx-0">
                            <div class="col-sm-12 col-12 col-lg-12 faq-accordion">
                                <div class="accordion-dental">
                                    <div class="accordion-item">
                                        <div class="accordion-header">
                                            <div class="quest d-flex gap-3">
                                                <img src="/wp-content/uploads/2025/04/soil-temperature-field-svgrepo-com-1.svg" alt="">
                                                <h4>Selectarea locului</h4>
                                            </div>
                                            <span class="toggle-icon"><img
                                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-tabs.svg"
                                                        alt=""></span>
                                        </div>
                                        <div class="accordion-content">
                                            <p>
                                                Selectarea locului pentru plantare Hortensia nu este o planta foarte
                                                pretentioasa, comparativ cu alte plante de gradina sau apartament.
                                                Insa are nevoie de anumite conditii de clima pentru a creste
                                                viguroasa si a inflori frumos. Primul pas in acest sens este gasirea
                                                locului ideal pentru a o planta. Arbustul de hortensie iubeste
                                                lumina soarelui, insa numai dimineata, cand nu arde cu toata
                                                puterea.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header">
                                            <div class="quest d-flex gap-3">
                                                <img src="/wp-content/uploads/2025/04/watering-svgrepo-com-1.svg" alt="">
                                                <h4>Udarea</h4>
                                            </div>
                                            <span class="toggle-icon"><img
                                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-tabs.svg"
                                                        alt=""></span>
                                        </div>
                                        <div class="accordion-content">
                                            <p>
                                                Selectarea locului pentru plantare Hortensia nu este o planta foarte
                                                pretentioasa, comparativ cu alte plante de gradina sau apartament.
                                                Insa are nevoie de anumite conditii de clima pentru a creste
                                                viguroasa si a inflori frumos. Primul pas in acest sens este gasirea
                                                locului ideal pentru a o planta. Arbustul de hortensie iubeste
                                                lumina soarelui, insa numai dimineata, cand nu arde cu toata
                                                puterea.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header">
                                            <div class="quest d-flex gap-3">
                                                <img src="/wp-content/uploads/2025/04/earth-farm-farming-svgrepo-com-1.svg" alt="">
                                                <h4>Udarea</h4>
                                            </div>
                                            <span class="toggle-icon"><img
                                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-tabs.svg"
                                                        alt=""></span>
                                        </div>
                                        <div class="accordion-content">
                                            <p>
                                                Selectarea locului pentru plantare Hortensia nu este o planta foarte
                                                pretentioasa, comparativ cu alte plante de gradina sau apartament.
                                                Insa are nevoie de anumite conditii de clima pentru a creste
                                                viguroasa si a inflori frumos. Primul pas in acest sens este gasirea
                                                locului ideal pentru a o planta. Arbustul de hortensie iubeste
                                                lumina soarelui, insa numai dimineata, cand nu arde cu toata
                                                puterea.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </section>

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
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping.svg"
                                     alt="">
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
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping.svg"
                                     alt="">
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
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping.svg"
                                     alt="">
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
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping.svg"
                                     alt="">
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
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping.svg"
                                     alt="">
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
                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer
                        took a galley of type and scrambled it to make.</p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex gap-4 justify-content-end">
                        <a class="btn main_button whatupp" href="#"><img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.svg" alt="">
                            Whatupp</a>
                        <a class="btn main_button phone" href="#"><img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/phone2.svg" alt="">
                            Phone
                            call</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery_home mg-100">
        <div class="container">
            <div class="footer_slider swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                             alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                             alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                             alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                             alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                             alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                             alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                             alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                             alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                             alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/wp-content/uploads/2025/04/85ac7a1f22e0573d9303ed2f1ce507b5e2e05304-scaled.jpg"
                             alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const minusBtn = document.querySelector(".minus");
            const plusBtn = document.querySelector(".plus");
            const input = document.querySelector(".eveniment_input");
            const addToCartBtn = document.querySelector(".single_add-to-cart-btn");

            // Plus / Minus funcționalitate
            plusBtn.addEventListener("click", () => {
                let val = parseInt(input.value) || 1;
                if (val < parseInt(input.max)) input.value = val + 1;
            });

            minusBtn.addEventListener("click", () => {
                let val = parseInt(input.value) || 1;
                if (val > parseInt(input.min)) input.value = val - 1;
            });

            addToCartBtn.addEventListener("click", function (e) {
                e.preventDefault();

                const productId = this.dataset.product_id;
                const quantity = parseInt(input.value) || 1;

                const formData = new FormData();
                formData.append('action', 'add_to_cart_redirect');
                formData.append('product_id', productId);
                formData.append('quantity', quantity);

                fetch('/wp-admin/admin-ajax.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success && data.data.redirect_url) {
                            window.location.href = data.data.redirect_url;
                        } else {
                            alert(data.message || 'Eroare necunoscută.');
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Eroare de rețea.');
                    });
            });
        });

    </script>

<?php
get_footer('shop');
?>