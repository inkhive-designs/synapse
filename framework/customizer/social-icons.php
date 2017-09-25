<?php
// Social Icons
function synapse_customize_register_social( $wp_customize ) {
$wp_customize->add_section('synapse_social_section', array(
    'title' => __('Social Icons','synapse'),
    'priority' => 44 ,
));

$social_networks = array( //Redefinied in Sanitization Function.
    'none' => __('-','synapse'),
    'facebook' => __('Facebook','synapse'),
    'twitter' => __('Twitter','synapse'),
    'google-plus' => __('Google Plus','synapse'),
    'instagram' => __('Instagram','synapse'),
    'rss' => __('RSS Feeds','synapse'),
    'vine' => __('Vine','synapse'),
    'vimeo-square' => __('Vimeo','synapse'),
    'youtube' => __('Youtube','synapse'),
    'flickr' => __('Flickr','synapse'),
);

$social_count = count($social_networks);

for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

    $wp_customize->add_setting(
        'synapse_social_'.$x, array(
        'sanitize_callback' => 'synapse_sanitize_social',
        'default' => 'none'
    ));

    $wp_customize->add_control( 'synapse_social_'.$x, array(
        'settings' => 'synapse_social_'.$x,
        'label' => __('Icon ','synapse').$x,
        'section' => 'synapse_social_section',
        'type' => 'select',
        'choices' => $social_networks,
    ));

    $wp_customize->add_setting(
        'synapse_social_url'.$x, array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'synapse_social_url'.$x, array(
        'settings' => 'synapse_social_url'.$x,
        'description' => __('Icon ','synapse').$x.__(' Url','synapse'),
        'section' => 'synapse_social_section',
        'type' => 'url',
        'choices' => $social_networks,
    ));

endfor;

function synapse_sanitize_social( $input ) {
    $social_networks = array(
        'none' ,
        'facebook',
        'twitter',
        'google-plus',
        'instagram',
        'rss',
        'vine',
        'vimeo-square',
        'youtube',
        'flickr'
    );
    if ( in_array($input, $social_networks) )
        return $input;
    else
        return '';
}
}
add_action( 'customize_register', 'synapse_customize_register_social' );