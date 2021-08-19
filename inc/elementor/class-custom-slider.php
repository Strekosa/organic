<?php

use Elementor\Controls_Manager;
use Elementor\Utils;

class Custom_Slider extends \Elementor\Widget_Base {
    /**
     * Get widget name.
     *
     * Retrieve widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name() {
        return 'custom_slider';
    }

    /**
     * Get widget title.
     *
     * Retrieve widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title() {
        return __( 'Custom Slider', 'default' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon() {
        return 'fas fa-dice-d20';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories() {
        return [ 'general' ];
    }

    /**
     * Register widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @see https://code.elementor.com/classes/elementor-controls_manager/
     * @see https://developers.elementor.com/elementor-controls/
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls() {

        $this->start_controls_section( 'section_nav', [
            'label' => __( 'Settings', 'default' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'setting_name', [
            'label'        => __( 'Setting Name', 'default' ),
            'type'         => \Elementor\Controls_Manager::TEXT,
            'default'      => '',

        ] );

        $this->add_control( 'wysiwyg', [
            'type'       => Controls_Manager::WYSIWYG,
            'label'      => __( 'WYSIWYG control', 'default' ),
            'default'=>'<h1>Default H1</h1>',
        ] );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings       = $this->get_settings();
        $custom_setting = $settings['setting_name']; ?>
        <div class="custom-widget">


            <?php
            $arg = array(
                'post_type' => 'slider',
                'order' => 'ASC',
                'orderby' => 'menu_order',
                'posts_per_page' => - 1
            );
            $the_query = new WP_Query( $arg );
            if ( $the_query->have_posts() ) : ?>

                <div  class="center">
                    <?php while ( $the_query->have_posts() ) :
                        $the_query->the_post();
                        ?>


                        <div class="slick-slide center-slide">

                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail(); ?>
                            <?php endif; ?>

                            <div class="grid-container center-slide__caption">
                                <div class="grid-x ">
                                    <div class="cell">
                                        <h3><?php the_title(); ?></h3>
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div><!-- END of  #home-slider-->
                <?php endif;
                wp_reset_query(); ?>
        </div>
            <?php
        }
    }
?>