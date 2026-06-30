<?php
/*
Template Name: Team Page
*/
get_header();
?>
<!-- Page Header Start -->
<div class="container-fluid page-header page-header-about py-5 mb-5 wow fadeIn" 
    data-wow-delay="0.1s"
    style="background-image:url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');"
>
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Teams</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Teams</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
 <?php get_template_part('templates/home/team'); ?>
<?php get_template_part('templates/testimonial'); ?>
<?php get_footer(); ?>