
<?php $slides = get_sub_field( 'format' ) ?>

<script type="text/javascript">

    jQuery( document ).ready(function() {
      jQuery('.cpt-slide').not('.slick-initialized').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 500,
        // autoplay: true,
        slidesToShow: <?php echo $slides; ?>,
        slidesToScroll: 1,
          responsive: [
              {
                  breakpoint: 600,
                  settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                  }
              },
          ]
    });

   } );
</script>

<section class="cpt-slider">
    <div class="grid-container">
        <?php if ( $field = get_sub_field( 'title' ) ): ?>
            <h3><?php echo $field; ?></h3>
        <?php endif; ?>
        <?php
        $featured_posts = get_sub_field('slider');
        if( $featured_posts ): ?>
            <div class="cpt-slide slick-slider">
                <?php foreach( $featured_posts as $post ):
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>
                    <div class="cpt-slide__inner">
                        <?php get_template_part( 'parts/loop', 'post' ); // Post item ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>
