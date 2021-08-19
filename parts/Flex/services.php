<?php
$image_position = get_sub_field('image_position');
$image = get_sub_field('image');
$type = get_sub_field('type');
?>

<section class="services">
    <div class="grid-container">

        <?php if ( $field = get_sub_field( 'title' ) ): ?>
            <h3><?php echo $field; ?></h3>
        <?php endif; ?>
        <div class="services__main grid-x">

            <div class="services__img cell show-for-large large-4 matchHeight bg-cover <?php echo $image_position ;?>" <?php bg( $image, 'full_hd' ) ; ?>>
<!--                --><?php //echo wp_get_attachment_image($image ['id'], 'large'); ?>
            </div>

            <div class="services__content cell  medium-12 large-7 matchHeight">
                <div class="grid-x grid-margin-x grid-margin-y">
                    <?php

                    $arg = array(
                        'post_type'      => 'services',
                        'order'          => 'ASC',
                        'orderby'        => 'menu_order',
                        'posts_per_page' => -1,
                    );
                     if ($type){
                         $arg['tax_query'][] = array(
                             'taxonomy' => 'type_of_service',
                             'terms' => $type,
                             'field' => 'term_id',
                         );}

                    $the_query = new WP_Query( $arg );
                    if ( $the_query->have_posts() ) : ?>

                        <?php while ( $the_query->have_posts() ) :
                        $the_query->the_post();
                        $icon = get_field('icon');
                        $description = get_field('desc');
                        $do_not_duplicate = $post->ID; ?><!-- BEGIN of Post -->

                        <div class="service-one cell medium-6">
                            <a class="post-thumbnail" href="<?php the_permalink( $post->ID ) ?>">
                                <div class="service">
                                    <?php echo wp_get_attachment_image($icon['id'], 'large'); ?>
                                    <div class="service-one__content ">
                                        <h6><?php the_title(); ?></h6>
                                        <?php echo $description; ?>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php endwhile; ?><!-- END of Post -->
                    </div><!-- END of .post-type -->

                <?php endif;
                wp_reset_query();
                ?>
            </div>
        </div>
    </div>
</section>
