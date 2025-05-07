<?php
/*
  * Template name: About Template
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

<section class="about_sec mg-50">
    <div class="container">
    <div class="row gy-0 gx-0">
        <div class="col-md-8">
            <img class="w-100" src="https://hydraprim.md/wp-content/uploads/2022/02/Component-1-%E2%80%93-1.jpg" alt="">
        </div>
        <div class="col-md-4">
            <h2 class="mb-3">Despre noi</h2>
            <p>Hydra-Prim este unica companie din Republica Moldova care vă propune un asortiment larg de culori, forme
                de Hortensii Tăiate, Hortensii de Grădină, Pioni și Hypericum.
                Cele mai frumoase flori sunt crescute cu mare drag și pasiune în serile noastre.

                Ne bucurăm că sunteți interesați de compania noastră Hydra-Prim este o companie tânără cu angajați
                pasionați de hortensie.</p>
            <div class="d-flex gap-4 mt-5">
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

<section class="description">
    <div class="container">
    <p>În calitate de cultivator de Hortensiei tăiate creștem cu mândrie cele mai frumoase Hortenziei și recoltăm florile la momentul potrivit pentru decoratori, florării, evenimente.
        Hortensia este o floare elegantă care a fost descoperită demult ca o floare tăiată ca parte a unui pachet frumos. Floarea este utilizată pe scară largă în cele mai frumoase aranjamente florale.
        Vă propunem un asortiment larg de Hortensie pentru grădină care se caracterizează prin rezistență diversitate de culori forme originale cu frunziș fierb și creștere stabilă.
    </p>
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
