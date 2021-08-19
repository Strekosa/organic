<!-- BEGIN of Post -->
<div class="cell medium-6 ">
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'preview preview--' . get_post_type() ); ?>>
        <div class="grid-x grid-margin-x">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="small-12 cell text-center medium-text-left">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail( 'medium', array( 'class' => 'preview__thumb' ) ); ?>
                    </a>
                </div>
            <?php endif; ?>
            <div class="cell auto">
                <h5 class="preview__title matchHeight">
                    <a href="<?php the_permalink(); ?>"
                       title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'default' ), the_title_attribute( 'echo=0' ) ) ); ?>"
                       rel="bookmark"><?php echo get_the_title() ?: __( 'No title', 'default' ); ?>
                    </a>
                </h5>
                <?php if ( is_sticky() ) : ?>
                    <span class="secondary label preview__sticky"><?php _e( 'Sticky', 'default' ); ?></span>
                <?php endif; ?>
                <div class="preview__excerpt">
                    <?php if ( $field = wp_trim_words( get_the_content(), 40, '…' )): ?>
                        <p > <?php echo $field; ?></p>
                    <?php endif; ?>
                </div>
<!--                <p class="preview__meta">--><?php //echo sprintf( __( 'Written by %s on %s', 'default' ), get_the_author_posts_link(), get_the_time( get_option( 'date_format' ) ) ); ?><!--</p>-->
                <div class="post-one__info grid-x">
                    <div class="post-one__date ">
                        <?php echo get_the_date($format = 'j F Y'); ?>
                    </div>
                    <div class="post-one__comments ">
                        <?php $num_comments = get_comments_number($post->ID);

                        if ( comments_open() ) {
                            if ( $num_comments == 0 ) {
                                $comments = ('No Comments');
                            } elseif ( $num_comments >= 1 ) {
                                $comments = '&#40;' .$num_comments . '&#41;' . (' Comments');
                            }
                            $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
                        } else {
                            $write_comments =  ('Comments are off for this post.');
                        } ?>

                        <?php echo $write_comments ?>
                    </div>
                </div>
                <div class="posts-slider__item-link">
                    <a class="button button--full-gray"
                       href="<?php the_permalink(); ?>">
                        <?php _e( 'Read More' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </article>
</div>
<!-- END of Post -->
