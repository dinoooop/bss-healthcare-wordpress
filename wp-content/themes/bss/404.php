
<?php get_header(); ?>

<div class="container py-5 text-center">

    <h1 class="display-1 fw-bold text-primary">
        404
    </h1>

    <h2 class="mb-4">
        Page Not Found
    </h2>

    <p class="mb-4">
        Sorry, the page you are looking for does not exist.
    </p>

    <a href="<?php echo esc_url(home_url('/')); ?>"
       class="btn btn-primary">
        Back to Home
    </a>

</div>

<?php get_footer(); ?>