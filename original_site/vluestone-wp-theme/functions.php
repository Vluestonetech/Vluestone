<?php
// Enqueue theme styles and scripts
function vluestone_enqueue_assets() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/css/style.css');
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), null, true );
}

add_action('wp_enqueue_scripts', 'vluestone_enqueue_assets');

// Register theme menus
function vluestone_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'vluestone'),
        'footer'  => __('Footer Menu', 'vluestone'),
    ));
}
add_action('after_setup_theme', 'vluestone_register_menus');

// Register logo
function mytheme_setup() {
    add_theme_support( 'custom-logo', array(
        'height'      => 120,
        'width'       => 500,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
}
add_action( 'after_setup_theme', 'mytheme_setup', 0 );
?>
