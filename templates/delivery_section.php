<section class="delivery_section mg-100">
    <div class="container">
        <div class="delivery_content">
            <?php if (have_rows('delivery_items')): ?>
                <?php while (have_rows('delivery_items')): the_row();
                    $image = get_sub_field('image');
                    $title = get_sub_field('title');
                    $text  = get_sub_field('text');
                    ?>
                    <div class="delivery_item">
                        <div class="img_delivery">
                            <?php if ($image): ?>
                                <img src="<?php echo esc_url($image); ?>" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="description">
                            <?php if ($title): ?>
                                <h5 class="fw-bold"><?php echo esc_html($title); ?></h5>
                            <?php endif; ?>
                            <?php if ($text): ?>
                                <p><?php echo esc_html($text); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
