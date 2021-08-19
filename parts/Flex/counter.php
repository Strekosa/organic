
    <section class="score bg-cover <?php echo $background;?>"<?php bg( $background_img = get_sub_field('background_img'), 'full_hd' ) ; ?>>
        <div class="count grid-container">
            <?php if ( $field = get_sub_field( 'title' ) ): ?>
                <h3><?php echo $field; ?></h3>
            <?php endif; ?>
            <?php if ( $field = get_sub_field( 'subtitle' ) ): ?>
                <p><?php echo $field; ?></p>
            <?php endif; ?>
            <?php if (have_rows('counter')) : ?>
                <div class="count__main grid-x grid-margin-y align-center">
                    <?php while (have_rows('counter')) : the_row(); ?>
                        <div class="count__one cell small-6 large-3">
                            <?php if($count_value = get_sub_field('count_value')) : ?>
                                <h3 class="count__value"><span><?php echo $count_value; ?></span><?php if($symbol = get_sub_field('symbol')) : ?><span><?php echo $symbol; ?></span><?php endif; ?></h3>
                            <?php endif; ?>
                            <?php if($count_title = get_sub_field('count_title')) : ?>
                                <h5 class="count__title"><?php echo $count_title; ?></h5>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
