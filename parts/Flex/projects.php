
<section class="project-section">
    <div class="grid-container">
        <?php if ( $field = get_sub_field( 'title' ) ): ?>
            <h3><?php echo $field; ?></h3>
        <?php endif; ?>

        <?php
        $featured_posts = get_sub_field('projects');
        if( $featured_posts ): ?>
            <div  class="projects grid-x grid-margin-x grid-margin-y align-center">
                <?php foreach( $featured_posts as $post ):
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>

                    <div class="project cell medium-6 large-4">

                            <div class="project__card bg-cover" <?php bg( $url, 'full_hd' ) ; ?>>
                                <div class="project__content">
                                    <h4><?php the_title(); ?></h4>
                                    <?php if ( $field = wp_trim_words( get_the_content(), 10, '…' )): ?>
                                        <p> <?php echo $field; ?></p>
                                    <?php endif; ?>
                                    <a class="project__link" href="<?php echo get_the_permalink($projects->ID); ?>">
                                    <button class="button">Learn more   </button>
                                    </a>

                                </div>
                            </div>

                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>
