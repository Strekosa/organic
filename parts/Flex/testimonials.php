<script type="text/javascript">
    jQuery( document ).ready(function() {
        jQuery('.testimonial').slick({
        infinite: true,
        slidesToShow: 1,
        // fade: true,
        dots: false,
        arrows: true,
            responsive: [
                {
                    breakpoint: 650,
                        settings: {
                        arrows: false,
                    }
                },
            ]
        });
    } );
</script>


<section class="testimonials-section">
    <div class="grid-container align-center">
        <?php if ( $field = get_sub_field( 'title' ) ): ?>
            <h3><?php echo $field; ?></h3>
        <?php endif; ?>

            <?php
            $featured_posts = get_sub_field('testimonials');
            if( $featured_posts ): ?>
                <div  class="slick-slider testimonial ">
                    <?php foreach( $featured_posts as $post ):

                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata($post); ?>

                            <div class="testimonial__main rel-wrap" >
                                <div class=" grid-container testimonial__inner position-center">
                                    <div class="grid-x">
                                        <div class="cell">
                                        <div class="">
                                           <blockquote>
                                               <p>  </p>
                                           </blockquote>
                                        </div>
                                        <div class="">
                                            <?php if ( $field = get_field( 'testimonial' ) ): ?>
                                                <p><?php echo $field; ?></p>
                                            <?php endif; ?>
                                            <?php if ( $field = get_field( 'author' ) ): ?>
                                                <h5><?php echo $field; ?></h5>
                                            <?php endif; ?>
                                            <?php if ( $field = get_field( 'position' ) ): ?>
                                                <h6><?php echo $field; ?></h6>
                                            <?php endif; ?>
                                        </div>
                                        </div>
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




