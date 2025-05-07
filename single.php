<?php
get_header();
?>

<section class="single_blog">
    <div class="container mg-100">
        <? $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
        <img class="w-100" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title() ?>">
        <h2><?php the_title() ?></h2>
        <div class="content__single">
            <?php the_content() ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
