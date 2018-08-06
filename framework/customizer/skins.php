<?php
//Select the Default Theme Skin
function synapse_customize_register_skins( $wp_customize ) {
    $wp_customize->get_section('colors')->title = __('Theme Skins & Colors', 'synapse');
    $wp_customize->get_section('colors')->panel = 'syanpse_design_panel';
    $wp_customize->remove_setting('header_textcolor');
    $wp_customize->get_setting('background_color')->transport = 'postMessage';

    //Select the Default Theme Skin
    $wp_customize->add_section(
        'synapse_skin_options',
        array(
            'title'     => __('Theme Skin & Colors','synapse'),
            'priority'  => 39,
            'panel'     => 'synapse_design_panel'
        )
    );

    //colors
    $wp_customize->add_setting('synapse_site_titlecolor', array(
        'default'     => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'     => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'synapse_site_titlecolor', array(
            'label' => __('Site Title Color','synapse'),
            'section' => 'synapse_skin_options',
            'settings' => 'synapse_site_titlecolor',
            'type' => 'color'
        ) )
    );

    $wp_customize->add_setting('synapse_header_desccolor', array(
        'default'     => '#aaa',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'     => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'synapse_header_desccolor', array(
            'label' => __('Site Tagline Color','synapse'),
            'section' => 'synapse_skin_options',
            'settings' => 'synapse_header_desccolor',
            'type' => 'color'
        ) )
    );

//    //skins
//    $wp_customize->add_setting('synapse_skin',
//        array(
//            'default'=> 'default',
//            'sanitize_callback' => 'synapse_sanitize_skin'
//        )
//    );
//
//    $skins = array(
//        'default' => __('Default (Red/Yellow/Blue)','synapse'),
//        'brown' =>  __('Dark Red/Dark Green/Brown','synapse'),
//        'green' => __('Green/Yellow/Orange','synapse'),
//        'red'   => __('Sea Green/Red/Purple','synapse')
//    );
//
//
//    $wp_customize->add_control(
//        'synapse_skin',array(
//            'settings' => 'synapse_skin',
//            'section'  => 'synapse_skin_options',
//            'type' => 'select',
//            'choices' => $skins,
//        )
//    );
//
//    function synapse_sanitize_skin( $input ) {
//        if ( in_array($input, array('default','brown','green','red') ) )
//            return $input;
//        else
//            return '';
//    }

    //Skins
    $wp_customize->add_setting(
        'synapse_skins',
        array(
            'default'	=> 'default',
            'sanitize_callback' => 'synapse_sanitize_skin',
            'transport'	=> 'refresh'
        )
    );

    if(!function_exists('synapse_skin_array')){
        function synapse_skin_array(){
            return array(
                'ryb' => 'default',
                'rgb' => 'brown',
                'gyo' => 'green',
                'grp' => 'red',
            );
        }
    }

    $synapse_skin_array = synapse_skin_array();

    function synapse_sanitize_skin($input)
    {
        if (in_array($input, array('default', 'red', 'brown','green')))
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        new Synapse_Skin_Chooser(
            $wp_customize,
            'synapse_skins',
            array(
                'settings'		=> 'synapse_skins',
                'section'		=> 'synapse_skin_options',
                'label'			=> __( 'Select Skins', 'synapse' ),
                'type'          => 'skins',
                'choices'		=> array(
                    'ryb' => 'default',
                    'rgb' => 'brown',
                    'gyo' => 'green',
                    'grp' => 'red',
                ),
            )
        )
    );
}
add_action( 'customize_register', 'synapse_customize_register_skins' );