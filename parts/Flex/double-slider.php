
<script type="text/javascript">

    jQuery( document ).ready(function() {
        jQuery('.slider-for').slick({
                 // centerMode: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                // centerPadding: '22%',
                arrows: true,
                // fade: true,
                asNavFor: '.slider-nav',
            });
        jQuery('.slider-nav').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: false,
                centerPadding: '0',
                centerMode: true,
                focusOnSelect: true,
                arrows: false,

            });

   } );


</script>


<section class="double-slider">
    <div class="grid-container">
        <?php if ( $field = get_sub_field( 'title' ) ): ?>
            <h3><?php echo $field; ?></h3>
        <?php endif; ?>
        <?php
        $featured_posts = get_sub_field('double_sl');
        if( $featured_posts): ?>
        <div class="double-slider__main rel-wrap">
            <div class="slider-for slick-slider">
                <?php foreach( $featured_posts as $post ):
                    $url = $post ['url'];
                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>
                    <div class="slider-for__inner">
                        <div class="slider-for__item bg-cover" <?php bg( $url, 'full_hd' ) ; ?>>

                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
            <div class="slider-nav text-center">
                <?php foreach( $featured_posts as $post ):
                    $url = $post ['url'];
                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>
                    <div class="slider-nav__inner">
                        <div class="slider-nav__item bg-cover"<?php bg( $url, 'full_hd' ) ; ?>>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


            <?php
            wp_reset_postdata(); ?>
        <?php endif; ?>


    </div>
</section>
