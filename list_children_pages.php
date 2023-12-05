<?php
/* 
* Plugin Name: List Children Pages
* Description: Lists children pages to a parent page. Use short code [list_children_pages title="My Children Pages" type=[list|card] exclude_pages="120,121"] to display the list in pages.
* Author: Biniyam AH
* Version: 1.0
*/
include(plugin_dir_path(__FILE__) . 'includes/list_view.php');
include(plugin_dir_path(__FILE__) . 'includes/card_view.php');

if(!defined('ABSPATH')) {
    die('stop!');
}

function add_style() {
    wp_enqueue_style('style', plugins_url().'/list_children_pages/css/style.css');
}
add_action('wp_enqueue_scripts', 'add_style');

function list_children_pages_content($attributes) {
    $excluded_pages = null;
    $output = '';
    $children = get_children([
        'post_type' => 'page',
        'post_parent' => get_the_ID()
    ]);

    $atts = shortcode_atts(
        array(
            'title' => null, 
            'type' => 'list', 
            'excluded_pages' => array()
        ),
        $attributes
    );
    
    if($atts["excluded_pages"] != null) {
        $excluded_pages = explode(',', $atts["excluded_pages"]);
        $are_pages_excluded = true;
    }
    
    if(strtolower($atts["type"]) == 'card') {
        $output .= lcp_card_view($children, $excluded_pages, $atts["title"]);
    }
    else {   
        $output .= lcp_list_view($children, $excluded_pages, $atts["title"]);
    }
    return $output;
}

add_shortcode('list_children_pages', 'list_children_pages_content');