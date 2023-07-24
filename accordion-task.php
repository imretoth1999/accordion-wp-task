<?php
/*
Plugin Name: Accordion Task
Description: Custom plugin that renders an accordion
Version: 1.0
Author: Imre Toth
*/

require_once(plugin_dir_path(__FILE__) . 'admin-template.php');
require_once(plugin_dir_path(__FILE__) . 'frontend-accordion.php');

add_action('wp_enqueue_scripts', 'accordion_enqueue_styles');
function accordion_enqueue_styles() {
    // Enqueue your CSS file
    wp_enqueue_style('accordion-plugin-styles', plugins_url('accordion-style.css', __FILE__));
}

