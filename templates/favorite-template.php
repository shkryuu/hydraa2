<?php
/*
  * Template name: Favorite Template
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

<div class="favorite-list">
    <div class="container">
    <div class="block_title">
        <h2>Favoritele mele</h2>
    </div>
    <div id="favorite-container">
        <div class="skeleton-item"></div>
        <div class="skeleton-item"></div>
        <div class="skeleton-item"></div>
    </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        const container = document.getElementById('favorite-container');

        if (favorites.length === 0) {
            container.innerHTML = '<p>Nu ai adăugat niciun produs la favorite.</p>';
            return;
        }

        // Adaugă un delay artificial pentru demo (elimină în producție)
        setTimeout(() => {
            fetch('<?php echo admin_url('admin-ajax.php'); ?>?action=load_favorites&ids=' + favorites.join(','))
                .then(response => response.text())
                .then(html => {
                    container.innerHTML = html;
                });
        }, 800); // Delay pentru a vedea efectul schelet
    });
</script>


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
