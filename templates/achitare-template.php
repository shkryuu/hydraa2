<?php
/*
  * Template name: Achitare Template
  * */

get_header();
?>
<section class="breadcrumb_sec">
    <div class="container">
        <?php if (function_exists('custom_breadcrumbs')) {
            custom_breadcrumbs();
        } ?>
    </div>
</section>

<section class="hero_achitare">
    <div class="container">
        <div class="img_container">
            <img src="https://cdn.pixabay.com/photo/2016/07/21/20/56/anemone-1533515_1280.jpg" alt="">
            <div class="overlay_img">
                <h2>Achitare</h2>
            </div>
        </div>
        <p>
            Pentru confortul dumneavoastră, HydraPrim oferă următoarele opțiuni de achitare:
        </p>
        <ul>
            <li>Achitare online cu cardul – Puteți achita comanda online cu cardul Visa sau Mastercard.</li>
            <li>Numerar (cash) – Puteți achita comanda în numerar (cash), atunci când curierul vă aduce comanda.</li>
        </ul>
        <p>După verificarea coletului, achitați suma comenzii.</p>
    </div>
</section>

<section class="question_achitare">
    <div class="container">
        <div class="row gy-0 gx-0 align-items-center">
            <div class="col-md-8 achitare_left">
                <p>Au apărut întrebări?</p>
                <h2>Contactează-ne</h2>
            </div>
            <div class="col-md-4 achitare_right">
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

<section class="gallery_home mg-100">
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


<?php get_footer(); ?>
