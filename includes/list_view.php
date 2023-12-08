<?php
function lcp_list_view($children, $excluded_pages, $title) {
    $output = '<div class="lcp-container">';
    $output .= '<h4>'.$title.'</h4>';
    $output .= '<ul>';

    foreach($children as $child) {
        if(!in_array($child->ID, $excluded_pages) ) {
            $output .= '<li><a href="'.$child->guid.'">'.$child->post_title.'</a></li>';
        }
    }

    $output .= '</ul>';
    $output.= '</div>';

    return $output;
}