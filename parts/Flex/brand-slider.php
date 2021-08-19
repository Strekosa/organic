<section class="brand-slider-section">
    <div class="grid-container">
        <?php if ( have_rows( 'brand_slider' ) ):?>
            <div class="brand-slider">
                <?php while ( have_rows( 'brand_slider' ) ): the_row();
                    $image   = get_sub_field( 'brand_image' );
                    $link   = get_sub_field( 'brand_link' );
                        if ( $image):
                            if ( $link ):?>
                                <div class="brand-slide">
                                    <div class="brand-slide__item matchHeight">
                                        <a target="_blank" href="<?php echo $link ?>">
                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                                        </a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                            <?php endif; ?>
                        <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>


