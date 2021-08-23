<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>


	<!--HOME PAGE SLIDER-->
<?php home_slider_template(); ?>
	<!--END of HOME PAGE SLIDER-->

	<!-- BEGIN of main content -->
<?php get_template_part('parts/flex-modul');?>
	<!-- END of main content -->
    <a href="#" id="toTop" style=" "><span></span></a>
<?php get_footer(); ?>