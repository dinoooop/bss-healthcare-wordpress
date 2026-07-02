<?php
/*
Template Name: Test All Page
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
// get_template_part('templates/advanced');
// get_template_part('templates/multi-speciality-clinic');
// get_template_part('templates/stoma-care');
get_template_part('templates/home-care');
// get_template_part('templates/podiatry');
// get_template_part('templates/education-research');
// get_template_part('templates/diabetic-foot-ulcer');
// get_template_part('templates/venous-leg-ulcer');
// get_template_part('templates/burn-wound');
// get_template_part('templates/surgical-wound');
// get_template_part('templates/pressure-injury');
// get_template_part('templates/patient-centered');
// get_template_part('templates/about-all-sections');
?>

<!-- Page Content End -->
<?php get_footer(); ?>