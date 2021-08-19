<?php
$text_position = get_sub_field('text_position');
$background = get_sub_field('background');
$background_position = get_sub_field('bg_position');
?>

<div class="image-text <?php echo $background_position;?>">
   <div class="image-text__background bg-cover" <?php bg( $background, 'full_hd' ) ; ?>></div>
    <div class="image-text__main grid-container">
        <?php if ( $field = get_sub_field( 'title' ) ): ?>
            <h3><?php echo $field; ?></h3>
        <?php endif; ?>
        <div class=" grid-x" >
            <div class="image-text__img cell medium-6 matchHeight">
                <?php
                $image = get_sub_field( 'image' );
                if ( ! empty( $image ) ): ?>
                    <?php echo wp_get_attachment_image($image['id'], 'large'); ?>
                <?php endif; ?>
            </div>
            <?php if ( $field = get_sub_field( 'text' ) ): ?>
                <div class="image-text__text cell medium-6 <?php echo $text_position ;?> ">
                    <div class="main-block__text-text">
                        <?php echo $field; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
