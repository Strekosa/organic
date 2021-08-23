<?php

// Check value exists.
if( have_rows('flexible_content') ):

    // Loop through rows.
    while ( have_rows('flexible_content') ) : the_row();

        // Case: Paragraph layout.
        if( get_row_layout() == 'hero_slider' ):
            get_template_part('parts/flex/hero-slider');

        // Case: Download layout.
        elseif( get_row_layout() == 'top_slider' ):
            get_template_part('parts/flex/top-slider');

        elseif( get_row_layout() == 'image_section' ):
            get_template_part('parts/flex/image-section');

        elseif( get_row_layout() == 'brand_slider' ):
            get_template_part('parts/flex/brand-slider');


        elseif( get_row_layout() == 'image-text' ):
            get_template_part('parts/flex/image-text');

        elseif( get_row_layout() == 'counter' ):
            get_template_part('parts/flex/counter');


        elseif( get_row_layout() == 'testimonials' ):
            get_template_part('parts/flex/testimonials');

        elseif( get_row_layout() == 'video' ):
            get_template_part('parts/flex/video');

        elseif( get_row_layout() == 'projects' ):
            get_template_part('parts/flex/projects');

        elseif( get_row_layout() == 'gallery' ):
            get_template_part('parts/flex/gallery');

        elseif( get_row_layout() == 'accordion' ):
            get_template_part('parts/flex/accordion');

        elseif( get_row_layout() == 'services' ):
            get_template_part('parts/flex/services');

        elseif( get_row_layout() == 'team' ):
            get_template_part('parts/flex/team');

        elseif( get_row_layout() == 'news' ):
            get_template_part('parts/flex/news');

        elseif( get_row_layout() == 'gallery_slider' ):
            get_template_part('parts/flex/gallery-slider');

        elseif( get_row_layout() == 'promotions' ):
            get_template_part('parts/flex/promotions');

        elseif( get_row_layout() == 'image_background' ):
            get_template_part('parts/flex/image-bg');

        elseif( get_row_layout() == 'cpt_slider' ):
            get_template_part('parts/flex/cpt-slider');

        elseif( get_row_layout() == 'double_slider' ):
            get_template_part('parts/flex/double-slider');

        elseif( get_row_layout() == 'contact_form' ):
            get_template_part('parts/flex/contact-form');

        endif;

        // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>


