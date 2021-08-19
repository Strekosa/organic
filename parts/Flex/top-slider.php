<?php  $height = get_sub_field( 'slider_height' );?>
<?php if ( have_rows( 'slider' ) ):?>
    <div class="top-slider slick-slider">
        <?php while ( have_rows( 'slider' ) ): the_row();
            $text      = get_sub_field( 'slide_text' );
            $image     = get_sub_field( 'slide_img' );
            $video     = get_sub_field( 'slide_video' );
            ?>
        <div class="top-slide slick-slide <?php echo $height; ?>">

            <div class="top-slide__inner" <?php bg( $image, 'full_hd' ) ; ?>>
                <?php if ( $video ): ?>

                    <div class="videoHolder show-for-large" >
                        <?php
                        $allowed_video_format = array(
                            'webm' => 'video/webm',
                            'mp4' => 'video/mp4',
                            'ogv' => 'video/ogg',
                        );
                         ?>
                            <div class="video video--embed responsive-embed widescreen">
                                <?php echo $video; ?>
                            </div>

                    </div>

                <?php endif ?>




                <div class="grid-container top-slide__caption">
                    <div class="grid-x grid-margin-x">
                        <div class="cell">
                            <?php echo $text; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
