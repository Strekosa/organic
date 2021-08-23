<?php
$form_object           = get_sub_field( 'contact_form' );
?>

<section class="contact-form">
    <div class="grid-container">
        <div class="grid-x ">

            <?php if ( $form_object ) : ?>
                <div class="cell small-12 medium-6 contact-form__form ">
                    <?php echo do_shortcode( '[gravityform id="' . $form_object['id'] . '" title="true" description="true" ajax="true"]' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

