<?php
//Fonts
function synapse_customize_register_fonts( $wp_customize ) {
$wp_customize->add_section(
    'synapse_typo_options',
    array(
        'title'     => __('Google Web Fonts','synapse'),
        'priority'  => 41,
        'description' => __('Defaults: Play, Lap.','synapse')
    )
);

$font_array = array('Play','Open Sans','Droid Sans','Lato','Droid Serif','Roboto');
$fonts = array_combine($font_array, $font_array);

$wp_customize->add_setting(
    'synapse_title_font',
    array(
        'default'=> 'Play',
        'sanitize_callback' => 'synapse_sanitize_gfont'
    )
);

function synapse_sanitize_gfont( $input ) {
    if ( in_array($input, array('Play','Open Sans','Droid Sans','Lato','Droid Serif','Roboto') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'synapse_title_font',array(
        'label' => __('Title','synapse'),
        'settings' => 'synapse_title_font',
        'section'  => 'synapse_typo_options',
        'type' => 'select',
        'choices' => $fonts,
    )
);

$wp_customize->add_setting(
    'synapse_body_font',
    array(	'default'=> 'Lato',
        'sanitize_callback' => 'synapse_sanitize_gfont' )
);

$wp_customize->add_control(
    'synapse_body_font',array(
        'label' => __('Body','synapse'),
        'settings' => 'synapse_body_font',
        'section'  => 'synapse_typo_options',
        'type' => 'select',
        'choices' => $fonts
    )
);
}
add_action( 'customize_register', 'synapse_customize_register_fonts' );