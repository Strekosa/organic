<div class="post cell medium-6 large-4 matchHeight">
    <div class="post-one ">

        <div class="post-one__image ">
            <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
        </div>
        <h6><?php the_title(); ?></h6>

        <div class="post-one__info grid-x">
            <div class="post-one__date ">
                <?php echo get_the_date(); ?>
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
        <?php the_content() ?>
    </div>
</div>

