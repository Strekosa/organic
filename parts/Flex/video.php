<?php
$video = get_sub_field( 'video' );
?>

<section class="video-section">
    <div class="grid-container">
        <div class="grid-x grid-margin-x justify-content-center">
            <?php if ( $field = get_sub_field( 'title' ) ): ?>
                <h3><?php echo $field; ?></h3>
            <?php endif; ?>
            <div class="cell small-12">

                <div class="video-section__image">
                    <?php if ( $video ): ?>
                        <div class="video__content">
                            <div class="responsive-embed widescreen">
                                <?php echo $video; ?>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>

        </div>
    </div>
</section>
