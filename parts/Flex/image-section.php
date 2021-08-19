<?php
$text      = get_sub_field( 'text' );
$image     = get_sub_field( 'bg_image' );
$background = get_sub_field('bg_position');
?>
<div class="image-section bg-cover <?php echo $background ;?>" <?php bg( $image, 'full_hd' ) ; ?> >
    <div class="image-section__text position-center">
        <?php echo $text; ?>
    </div>
</div>