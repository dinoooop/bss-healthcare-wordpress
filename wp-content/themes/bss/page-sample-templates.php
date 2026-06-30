<?php
/*
Template Name: Sample Templates Page
*/
get_header();
?>
<!-- Page Header Start -->
<div class="container-fluid page-header page-header-about py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"
    style="background-image:url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Test</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Test</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<!-- Page Content Start -->
<?php 
get_template_part('sample-templates/malachite'); 
get_template_part('sample-templates/peridot'); 
get_template_part('sample-templates/aquamarine'); 
get_template_part('sample-templates/diamond-left'); 
get_template_part('sample-templates/emarald'); 
get_template_part('sample-templates/faq'); 
get_template_part('sample-templates/garnet'); 
get_template_part('sample-templates/morganite'); 
get_template_part('sample-templates/opal'); 
get_template_part('sample-templates/ruby'); 
get_template_part('sample-templates/sapphire'); 
get_template_part('sample-templates/tanzanite'); 
get_template_part('sample-templates/tourmaline-left'); 
get_template_part('sample-templates/tourmaline-right'); 
?>

<!-- Page Content End -->
<?php get_footer(); ?>