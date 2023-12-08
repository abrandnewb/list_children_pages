<?php
function lcp_card_view($children, $excluded_pages, $title) {

    $output = '<h4>'.$title.'</h4>';
    $output .= '<div class="lcp-card-container">';

    foreach($children as $child) {
        if(!in_array($child->ID, $excluded_pages) ) {
            $output .= '<div class="lcp-card">
                            <img src="'.get_the_post_thumbnail_url($child->ID).'">
                                <a href="'.$child->guid.'">
                                    <h5>'.$child->post_title.'</h5>
                                </a>
                            <p>'.$child->post_excerpt.'</p>
                        </div>';
        }
    }

    $output .= '</div>';

    return $output;
}