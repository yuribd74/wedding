<?php
add_action( 'wp_enqueue_scripts', 'veda_child_enqueue_styles' );
function veda_child_enqueue_styles() {
    wp_enqueue_style( 'veda-style', get_template_directory_uri() . '/style.css' );
 
}
?>