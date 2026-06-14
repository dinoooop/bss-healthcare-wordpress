<?php get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <h1 class="mb-3"><?php the_title(); ?></h1>

            <p class="text-muted mb-4">
                Posted on <?php echo get_the_date(); ?>
            </p>

            <?php if (has_post_thumbnail()) : ?>
                <div class="mb-4">
                    <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded']); ?>
                </div>
            <?php endif; ?>

            <div class="post-content">
                <?php the_content(); ?>
            </div>

        </div>
    </div>
</div>

<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>