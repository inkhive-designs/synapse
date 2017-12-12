<?php
//Select the Default Theme Skin
function synapse_customize_register_skins( $wp_customize ) {
    $wp_customize->get_section('colors')->title = __('Theme Skins & Colors', 'synapse');
    $wp_customize->get_section('colors')->panel = 'syanpse_design_panel';
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
    'red'   => __('Sea Green/Red/Purple','synapse'));


$wp_customize->add_control(
    'synapse_skin',array(
        'settings' => 'synapse_skin',
        'section'  => 'colors',
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