<?php
/*
  * Template name: Blogs Template
  * */

get_header();
?>

<section class="blogs mg-100">
    <div class="container">
        <div class="breadcrumb_sec">
            <?php if (function_exists('custom_breadcrumbs')) {
                custom_breadcrumbs();
            } ?>
        </div>
        <div class="blogs_content">
            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 5,
                'post_status'    => 'publish',
            );

            $blog_query = new WP_Query($args);

            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post();
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // sau 'full'
                    ?>
                    <div class="blog_item">
                        <?php if ($thumbnail_url): ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
                            </a>
                        <?php endif; ?>
                        <div class="blog_text">
                            <a href="<?php the_permalink(); ?>">
                                <h4 class="fw-bold text-black"><?php the_title(); ?></h4>
                            </a>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <div class="d-flex">
                                <a class="read_more" href="<?php the_permalink(); ?>">Vezi mai mult</a>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Nu există articole de blog disponibile.</p>';
            endif;
            ?>
        </div>

</section>

<?php get_footer(); ?>
