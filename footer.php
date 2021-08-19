<?php
/**
 * Footer
 */
?>

<!-- BEGIN of footer -->
<footer class="footer">
	<div class="grid-container">
        <div class="footer__main grid-x align-justify">
            <div class="footer__logo cell  medium-4">
                <?php if ( $footer_logo = get_field( 'footer_logo', 'options' ) ):
                    echo wp_get_attachment_image( $footer_logo['id'], 'medium' );
                else:
                    show_custom_logo();
                endif; ?>

                <?php if ( $field = get_field( 'footer_text', 'options' ) ): ?>
                    <?php echo $field; ?>
                <?php endif; ?>

                <?php get_template_part('parts/socials'); // Social profiles ?>

            </div>

            <div class="footer__menu cell medium-4">
                <?php
                if ( has_nav_menu( 'footer-menu' ) ) {
                    wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'footer-menu', 'depth' => 1 ) );
                }
                ?>
            </div>

            <div class="footer__contact-us cell medium-4">
                <?php
                $text = get_field( 'contact_us', 'options' );
                if ( $text ): ?>
                    <h5> <?php echo $text; ?></h5>
                <?php endif; ?>
                <span class="icon fa fa-envelope">
                    <?php
                    $link = get_field( 'email', 'options' );
                    if ( $link ): ?>
                        <a class="email-btn" href="mailto:<?php echo $link; ?>"><?php echo $link; ?></a>
                    <?php endif; ?>
                 </span>
                <span class="icon fa fa-phone">
                    <?php if ( $field = get_field( 'phone', 'options' ) ): ?>
                        <a  href="tel:<?php echo sanitize_number( $field ) ?>"><?php echo $field ?></a>
                    <?php endif; ?>
                </span>
                <span class="icon fa fa-home">
                    <?php if ( $field = get_field( 'address', 'options' ) ): ?>
                        <?php echo $field; ?>
                    <?php endif; ?>
                </span>

            </div>

        </div>
		<div class="footer__copy grid-x grid-margin-x align-justify align-middle">


            <?php if ( $copyright = get_field( 'copyright', 'options' ) ): ?>
            <div class="cell  medium-shrink">
                <?php echo $copyright; ?>
            </div>
            <?php endif; ?>
		</div>
	</div>


</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
