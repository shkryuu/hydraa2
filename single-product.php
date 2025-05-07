<?php
defined('ABSPATH') || exit;
get_header('shop');
?>
<?php
// Acestea sunt câmpurile ACF pentru produs
$descriere = get_field('descriere_produs');
$loc = get_field('selectarea_locului');
$udare = get_field('udarea');
$sol = get_field('selectarea_solului');
?>


    <section class="breadcrumb_sec">
        <div class="container">
            <?php woocommerce_breadcrumb(); ?>
        </div>
    </section>

    <section class="single_product mg-50">
        <div class="container">
            <?php while (have_posts()) :
            the_post();
            global $product; ?>
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
                                        <img src="<?php echo esc_url($featured_image); ?>"
                                             alt="<?php echo esc_attr(get_the_title($product_id)); ?>">
                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php foreach ($gallery_images as $image_id): ?>
                                <?php $image_url = wp_get_attachment_image_url($image_id, 'full'); ?>
                                <div class="swiper-slide">
                                    <a href="<?php echo esc_url($image_url); ?>" data-fancybox="gallery">
                                        <img src="<?php echo esc_url($image_url); ?>"
                                             alt="<?php echo esc_attr(get_the_title($product_id)); ?>">
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
                                        <img src="<?php echo esc_url($featured_image); ?>"
                                             alt="<?php echo esc_attr(get_the_title($product_id)); ?>">
                                    </div>
                                <?php endif; ?>

                                <?php foreach ($gallery_images as $image_id): ?>
                                    <?php $image_url = wp_get_attachment_image_url($image_id, 'thumbnail'); ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($image_url); ?>"
                                             alt="<?php echo esc_attr(get_the_title($product_id)); ?>">
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
                    <?php if ($descriere): ?>
                        <div class="acf-content">
                            <?php echo $descriere; ?>
                        </div>
                    <?php endif; ?>
                    <div class="product-short-description">
                        <?php echo apply_filters('woocommerce_short_description', $post->post_excerpt); ?>
                    </div>
                    <?php
                    $precomanda = get_field('afiseaza_precomanda');

                    if ($precomanda === 'da') : ?>
                        <div class="precomanda-box">
                            <p class="precomanda-title">Precomandă la număr:</p>
                            <a href="tel:+37378363555" class="precomanda-phone">+373 78 363 555</a>
                            <br><br>
                            <a href="https://t.me/+37378363555" target="_blank" class="precomanda-telegram">
    <span class="telegram-icon">
        <!-- SVG-ul Telegram -->
        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g>
                <path d="M15 28.125C22.2487 28.125 28.125 22.2487 28.125 15C28.125 7.75126 22.2487 1.875 15 1.875C7.75126 1.875 1.875 7.75126 1.875 15C1.875 22.2487 7.75126 28.125 15 28.125Z"
                      fill="url(#paint0_linear_199_3572)"/>
                <path d="M21.5499 9.57075C21.6667 8.81561 20.9488 8.21958 20.2774 8.51437L6.90452 14.3857C6.42303 14.5972 6.45825 15.3265 6.95763 15.4855L9.7154 16.3638C10.2418 16.5314 10.8117 16.4447 11.2714 16.1272L17.4891 11.8315C17.6766 11.702 17.8809 11.9686 17.7207 12.1337L13.2451 16.7481C12.8109 17.1957 12.8971 17.9542 13.4194 18.2817L18.4303 21.424C18.9923 21.7764 19.7153 21.4224 19.8204 20.7432L21.5499 9.57075Z"
                      fill="white"/>
            </g>
            <defs>
                <linearGradient id="paint0_linear_199_3572" x1="15" y1="1.875" x2="15" y2="28.125"
                                gradientUnits="userSpaceOnUse">
                    <stop stop-color="#37BBFE"/>
                    <stop offset="1" stop-color="#007DBB"/>
                </linearGradient>
            </defs>
        </svg>
    </span>
                                <span class="telegram-label">Scrie-ne pe Telegram</span>
                            </a>


                        </div>
                    <?php endif; ?>


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

                    <?php if ($loc || $udare || $sol): ?>
                        <div class="question">
                            <div class="row gy-0 gx-0">
                                <div class="col-sm-12 col-12 col-lg-12 faq-accordion">
                                    <div class="accordion-dental">

                                        <?php if ($loc): ?>
                                            <div class="accordion-item">
                                                <div class="accordion-header">
                                                    <div class="quest d-flex gap-3">
                                                        <img src="/wp-content/uploads/2025/04/soil-temperature-field-svgrepo-com-1.svg"
                                                             alt="">
                                                        <h4>Selectarea locului</h4>
                                                    </div>
                                                    <span class="toggle-icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-tabs.svg"
                                         alt="">
                                </span>
                                                </div>
                                                <div class="accordion-content">
                                                    <?php echo $loc; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($udare): ?>
                                            <div class="accordion-item">
                                                <div class="accordion-header">
                                                    <div class="quest d-flex gap-3">
                                                        <img src="/wp-content/uploads/2025/04/watering-svgrepo-com-1.svg"
                                                             alt="">
                                                        <h4>Udarea</h4>
                                                    </div>
                                                    <span class="toggle-icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-tabs.svg"
                                         alt="">
                                </span>
                                                </div>
                                                <div class="accordion-content">
                                                    <?php echo $udare; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($sol): ?>
                                            <div class="accordion-item">
                                                <div class="accordion-header">
                                                    <div class="quest d-flex gap-3">
                                                        <img src="/wp-content/uploads/2025/04/earth-farm-farming-svgrepo-com-1.svg"
                                                             alt="">
                                                        <h4>Selectarea solului</h4>
                                                    </div>
                                                    <span class="toggle-icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-tabs.svg"
                                         alt="">
                                </span>
                                                </div>
                                                <div class="accordion-content">
                                                    <?php echo $sol; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </section>
<?php get_template_part('templates/new_products'); ?>
<?php get_template_part('templates/contact-block'); ?>
<?php get_template_part('templates/slaider-galerie'); ?>
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