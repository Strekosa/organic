<?php
$background = get_sub_field('bg_image');
if( $background):
?>
    <div class="image-bg bg-cover" <?php bg( $background, 'full_hd' ) ; ?>>
        <div class="grid-container">
            <div class=" grid-x" >
                <?php if ( $field = get_sub_field( 'text' ) ): ?>
                    <div class="image-bg__text cell medium-7 ">
                        <div class="main-block__text-text">
                            <?php echo $field; ?>
                            <?php
                            $link = get_sub_field('button');
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>