<?php get_header(); ?>

<div class="container py-5">

    <h1 class="mb-5">
        <?php the_archive_title(); ?>
    </h1>

    <div class="row">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <div class="col-md-6 mb-4">
                    <div class="card h-100">

                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                        <?php endif; ?>

                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h4>

                            <p class="card-text">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>
                        </div>

                    </div>
                </div>

            <?php endwhile; ?>

        <?php else : ?>

            <p>No posts found.</p>

        <?php endif; ?>

    </div>

</div>

<?php get_footer(); ?>