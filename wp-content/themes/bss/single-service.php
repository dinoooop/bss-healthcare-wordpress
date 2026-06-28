<?php
get_header();

if (have_posts()):
    while (have_posts()):
        the_post();
        ?>

        <style>
            .page-header-service {
                background:
                    linear-gradient(rgba(4, 36, 66, .7), rgba(4, 36, 66, .7)),
                    url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>') center center no-repeat;
                background-size: cover;
            }
        </style>

        <!-- Page Header Start -->
        <div class="container-fluid page-header page-header-service py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">
                    <?php echo bss_get_service_category_title(); ?>
                </h1>

                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb text-uppercase mb-0">
                        <li class="breadcrumb-item">
                            <a class="text-white" href="<?php echo home_url(); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-white" href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>">
                                Services
                            </a>
                        </li>
                        <li class="breadcrumb-item text-primary active" aria-current="page">
                            <?php the_title(); ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Service Detail Start -->
        <?php the_content(); ?>
        <!-- Service Detail End -->
        <?php
    endwhile;
endif;

get_footer();
