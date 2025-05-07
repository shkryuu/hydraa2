<?php
$title = get_field('contacte-title', 'option');
$description = get_field('contacte-description', 'option');
$whatsapp = get_field('contacte-whatsapp', 'option');
$phone = get_field('contacte-phone', 'option');

?>
<section class="contact_sec mg-100">
    <div class="container">
        <div class="row gy-0 gx-0 justify-content-between align-items-center">
            <div class="col-md-6">

                <?php if ($title): ?>
                    <h2 class="fw-bold"><?= esc_html($title); ?></h2>
                <?php endif; ?>
                <?php if ($description): ?>

                <p> <?= $description; ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <div class="d-flex gap-4 justify-content-end">
                    <?php if ($whatsapp): ?>
                        <a class="btn main_button whatupp" href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $whatsapp); ?>" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.svg" alt="">
                            WhatsApp
                        </a>
                    <?php endif; ?>

                    <?php if ($phone): ?>
                        <a class="btn main_button phone" href="tel:<?php echo preg_replace('/[^0-9\+]/', '', $phone); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone2.svg" alt="">
                            Phone call
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
