<?php
//Select the Default Theme Skin
function synapse_customize_register_skins( $wp_customize ) {
$wp_customize->add_section(
    'synapse_skin_options',
    array(
        'title'     => __('Choose Skin','synapse'),
        'priority'  => 39,
    )
);

$wp_customize->add_setting(
    'synapse_skin',
    array(
        'default'=> 'default',
        'sanitize_callback' => 'synapse_sanitize_skin'
    )
);

$skins = array( 'default' => __('Default (Red/Yellow/Blue)','synapse'),
    'brown' =>  __('Dark Red/Dark Green/Brown','synapse'),
    'green' => __('Green/Yellow/Orange','synapse'),
    'red'   => __('Sea Green/Red/Purple'));


$wp_customize->add_control(
    'synapse_skin',array(
        'settings' => 'synapse_skin',
        'section'  => 'synapse_skin_options',
        'type' => 'select',
        'choices' => $skins,
    )
);

function synapse_sanitize_skin( $input ) {
    if ( in_array($input, array('default','orange','brown','green','grayscale','red') ) )
        return $input;
    else
        return '';
}
}
add_action( 'customize_register', 'synapse_customize_register_skins' );