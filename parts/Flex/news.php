<section class="news">
    <div class="grid-container">
        <?php if ( $field = get_sub_field( 'title' ) ): ?>
            <h3><?php echo $field; ?></h3>
        <?php endif; ?>
        <?php
        $featured_posts = get_sub_field('news');
        if( $featured_posts ): ?>
            <div class="news__main grid-x grid-margin-x grid-margin-y">
                <?php foreach( $featured_posts as $post ):
                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>

                    <div class="news__item cell medium-6 large-4 ">
                        <?php get_template_part( 'parts/loop', 'post' ); // Post item ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>
