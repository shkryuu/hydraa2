<?php
$numar = get_field('contacte-numar', 'option');
$email = get_field('contacte-email', 'option');
$adresa = get_field('contacte-adresa', 'option');
$contacte_description_footer = get_field('contacte-description-footer', 'option');
$contacte_derepturi_autor = get_field('contacte-derepturi-autor', 'option');

?>
<footer class="footer">
    <div class="container">
        <div class="row gy-0 gx-0 justify-content-end">
            <div class="col-md-6 main__footer">
                <div class="footer__logo">
                    <a href="<?php echo bloginfo('url'); ?>">
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                        ?>
                        <img class="header_logo" src="<?php echo $image[0]; ?>" alt="">
                    </a>
                </div>
                <?php if ($contacte_description_footer): ?>
                    <p> <?= $contacte_description_footer; ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <div class="row gy-0 gx-0">
                    <div class="col-md-6 footer__info">
                        <ul>
                            <?php if ($adresa): ?>
                                <li><a href="#" target="_blank"><?php echo esc_html($adresa); ?></a></li>
                            <?php endif; ?>

                            <?php if ($email): ?>
                                <li><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if ($numar): ?>
                                <li>
                                    <a href="tel:<?php echo preg_replace('/[^0-9\+]/', '', $numar); ?>"><?php echo esc_html($numar); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-md-6 footer__info1">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu',
                            'menu_class' => 'pages_footer',
                            'container' => false,
                            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                        ));
                        ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="category_footer">
            <ul class="d-flex">
                <li>
                    <a href="#">Hortensia de grădină</a>
                </li>
                <li>
                    <a href="#">Buchete</a>
                </li>
                <li>
                    <a href="#">Achitare</a>
                </li>
                <li>
                    <a href="#">Livrare</a>
                </li>
                <li>
                    <a href="#">Accesorii</a>
                </li>
                <li>
                    <a href="#">Abonament</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <?php if ($contacte_derepturi_autor): ?>
                    <div class="text-white"><?= $contacte_derepturi_autor; ?></div>
                <?php endif; ?>


                <div class="cards">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="98"
                         height="29" viewBox="0 0 98 29" fill="none">
                        <path d="M98 0H0V29H98V0Z" fill="url(#pattern0_141_1102)"/>
                        <defs>
                            <pattern id="pattern0_141_1102" patternContentUnits="objectBoundingBox" width="1"
                                     height="1">
                                <use xlink:href="#image0_141_1102" transform="scale(0.00362319 0.0125)"/>
                            </pattern>
                            <image id="image0_141_1102" width="276" height="80" preserveAspectRatio="none"
                                   xlink:href="data:image/png;base64,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"/>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</footer>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<script>
    jQuery(document).ready(function ($) {
        $('[data-fancybox="gallery"]').fancybox({
            type: 'image',
            buttons: ["zoom", "close"]
        });

        $('[data-fancybox="video-group"]').fancybox({
            iframe: {
                css: {
                    width: '80%',
                    height: '80%'
                },
            },
            buttons: ['close'],
            responsive: true,
        });
    });

    Fancybox.bind('[data-fancybox="single-gallery"]', {
        Toolbar: true,
        Thumbs: {
            autoStart: true,
        },
        animationEffect: "zoom",
    });
</script>

<?php wp_footer(); ?>

</body>
</html>