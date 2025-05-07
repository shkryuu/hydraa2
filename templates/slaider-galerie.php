<?php
// Obține galeria de imagini din opțiuni
$gallery_images = get_field('gallery_images', 'option');

if( $gallery_images ): ?>
    <section class="gallery_home mg-100">
        <div class="container">
            <div class="footer_slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach( $gallery_images as $image ): ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url($image['url']); ?>"
                                 alt="<?php echo esc_attr($image['alt']); ?>"
                                 style="width: 345px; height: 340px; object-fit: cover;">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
