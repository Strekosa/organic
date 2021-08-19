<section class="team">
    <div class="grid-container">
        <?php if ( $field = get_sub_field( 'title' ) ): ?>
            <h3><?php echo $field; ?></h3>
        <?php endif; ?>
        <?php
        $featured_posts = get_sub_field('staff');
        if( $featured_posts ): ?>
            <div class="team__main grid-x grid-margin-x grid-margin-y  align-center ">
                <?php foreach( $featured_posts as $post ):
                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>

                    <div class="person cell  matchHeight">
                        <div class="grid-x align-middle">
                        <div class="person__image cell medium-2">
                            <a class="person__link" href="<?php echo get_the_permalink($person->ID); ?>">
                                <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>

                            </a>
                        </div>
                        <div class="person__content cell medium-10">
                            <h4><?php the_title(); ?></h4>
                            <?php if ( $field = get_field( 'position' ) ): ?>
                                <h6><?php echo $field; ?></h6>
                            <?php endif; ?>
                            <?php if ( $field = wp_trim_words( get_the_content(), 60, '…' )): ?>
                                <p> <?php echo $field; ?></p>
                            <?php endif; ?>
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