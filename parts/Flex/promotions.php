<section class="promotions">
    <div class="grid-container">
        <?php if ( $field = get_sub_field( 'title' ) ): ?>
            <h3><?php echo $field; ?></h3>
        <?php endif; ?>
        <?php
        $featured_posts = get_sub_field('promotions');
        if( $featured_posts ): ?>
            <div class="promotions__main grid-x grid-margin-y">
                <?php foreach( $featured_posts as $post ):
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>

                    <div class="promotion cell">
                        <div class="grid-x">
                            <div class="promotion__image cell medium-6 matchHeight bg-cover" <?php bg( $url, 'full_hd' ) ; ?>>

                            </div>
                            <div class="promotion__content cell medium-6 matchHeight">
                                <h4><?php the_title(); ?></h4>
                                <?php if ( $field = wp_trim_words( get_the_content(), 80, '…' )): ?>
                                    <p> <?php echo $field; ?></p>
                                <?php endif; ?>
                                <a class="button promotion__link"
                                   href="<?php the_permalink(); ?>">
                                    <?php _e( 'Read More' ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>
