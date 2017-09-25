<?php
/**
 * Enqueue scripts and styles.
 */
function synapse_scripts() {
    wp_enqueue_style( 'synapse-style', get_stylesheet_uri() );

    wp_enqueue_style('synapse-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('synapse_title_font', 'Play') ) ).':100,300,400,700' );

    if (get_theme_mod('synapse_body_font') != get_theme_mod('synapse_title_font')) {
        wp_enqueue_style('synapse-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html( get_theme_mod('synapse_body_font', 'Lato') ) ).':100,300,400,700' );
    }

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );

    wp_enqueue_style( 'hover-css', get_template_directory_uri() . '/assets/css/hover.min.css' );

    wp_enqueue_style( 'flex-images', get_template_directory_uri() . '/assets/css/jquery.flex-images.css' );

    wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.css' );

    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper.min.css' );

    wp_enqueue_style( 'synapse-main-theme-style', get_template_directory_uri() . '/assets/theme-styles/css/'.get_theme_mod('synapse_skin', 'default').'.css' );

    wp_enqueue_script( 'synapse-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'synapse-externaljs', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

    wp_enqueue_script( 'synapse-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'synapse-custom-js', get_template_directory_uri() . '/js/custom.js', array('synapse-externaljs') );
}
add_action( 'wp_enqueue_scripts', 'synapse_scripts' );