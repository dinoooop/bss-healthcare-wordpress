<?php get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
?>

<!-- Page Header -->
<div class="container-fluid bg-primary py-5 mb-5">
    <div class="container text-center">
        <h1 class="display-4 text-white">
            <?php the_title(); ?>
        </h1>
    </div>
</div>

<!-- Page Content -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>