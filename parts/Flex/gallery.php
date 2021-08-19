<section class="gallery-section">
    <div class="grid-container">
        <?php if ( $field = get_sub_field( 'title' ) ): ?>
            <h3><?php echo $field; ?></h3>
        <?php endif; ?>
        <?php if ( $images = get_sub_field( 'gallery' ) ): ?>
            <div class="gallery grid-x grid-margin-x grid-margin-y">
                <?php
                $i = 1;
                ?>
                <?php foreach ( $images as $image ): ?>
                    <div class="cell <?php  if ( $i > 2 ){ echo 'medium-4'; } else{echo 'medium-6';} ?>">
                        <a href="<?php echo $image['url']; ?>">
                            <div class="gallery__item bg-cover" data-fancybox="gallery" <?php bg( $image, 'large' ) ?>>
                            </div>
                        </a>
                    </div>
                <?php
                $i++;
                if ( $i > 5 ) { break; }
                endforeach; ?>
            </div
        <?php endif; ?>
    </div>
</section>