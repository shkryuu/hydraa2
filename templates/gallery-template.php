<?php
/*
  * Template name: Gallery Template
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

<section class="mg-50">
    <div class="container">
        <div class="gallery_content">
                <a class="gallery_item" data-fancybox="gallery" href="https://hydraprim.md/wp-content/uploads/2022/03/gallery1.jpg">
                    <img src="https://hydraprim.md/wp-content/uploads/2022/03/gallery1.jpg" alt="">
                </a>
            <a class="gallery_item" data-fancybox="gallery" href="https://hydraprim.md/wp-content/uploads/2022/03/gallery1.jpg">
                <img src="https://hydraprim.md/wp-content/uploads/2022/03/gallery1.jpg" alt="">
            </a>
            <a class="gallery_item" data-fancybox="gallery" href="https://hydraprim.md/wp-content/uploads/2022/03/gallery1.jpg">
                <img src="https://hydraprim.md/wp-content/uploads/2022/03/gallery1.jpg" alt="">
            </a>
            <a class="gallery_item" data-fancybox="gallery" href="https://hydraprim.md/wp-content/uploads/2022/03/gallery1.jpg">
                <img src="https://hydraprim.md/wp-content/uploads/2022/03/gallery1.jpg" alt="">
            </a>
            <a class="gallery_item" data-fancybox="gallery" href="https://hydraprim.md/wp-content/uploads/2022/03/gallery1.jpg">
                <img src="https://hydraprim.md/wp-content/uploads/2022/03/gallery1.jpg" alt="">
            </a>
            <a class="gallery_item" data-fancybox="gallery" href="https://hydraprim.md/wp-content/uploads/2022/03/gallery1.jpg">
                <img src="https://hydraprim.md/wp-content/uploads/2022/03/gallery1.jpg" alt="">
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
