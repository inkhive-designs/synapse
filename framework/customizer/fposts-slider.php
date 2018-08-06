<?php
//FEATURED POSTS SLIDER
function synapse_customize_fposts_slider( $wp_customize ) {
$wp_customize->add_section(
    'synapse_feat_post_slider_section',
    array(
        'title'     => __('Featured Posts Slider','synapse'),
        'description'	=> __('<i>Set up a <b>Featured Area</b> showcasing Posts from a <b>Post Category</b><i>', 'synapse'),
        'priority'  => 35,
    )
);


$wp_customize->add_setting(
    'synapse_feat_post_slider_enable',
    array(
        'sanitize_callback' => 'synapse_sanitize_checkbox',
        'transport'     => 'postMessage',
    )
);

$wp_customize->add_control(
    'synapse_feat_post_slider_enable', array(
        'settings' => 'synapse_feat_post_slider_enable',
        'label'    => __( 'Enable for Home Page', 'synapse' ),
        'section'  => 'synapse_feat_post_slider_section',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'synapse_feat_post_slider_cat',
    array( 'sanitize_callback' => 'synapse_sanitize_category' )
);


$wp_customize->add_control(
    new Synapse_WP_Customize_Category_Control(
        $wp_customize,
        'synapse_feat_post_slider_cat',
        array(
            'label'    => __('Select Posts Category for the Featured Area','synapse'),
            'settings' => 'synapse_feat_post_slider_cat',
            'section'  => 'synapse_feat_post_slider_section'
        )
    )
);

$wp_customize->add_setting(
    'synapse_feat_post_slider_pc',
    array(
	    'default'  => '0',
	    'sanitize_callback' => 'synapse_sanitize_positive_number'
	)
);

$wp_customize->add_control(
    'synapse_feat_post_slider_pc', array(
        'settings' => 'synapse_feat_post_slider_pc',
        'label'    => __( 'Max No. of Posts. Min: 4.', 'synapse' ),
        'section'  => 'synapse_feat_post_slider_section',
        'type'     => 'number',
    )
);
}
add_action( 'customize_register', 'synapse_customize_fposts_slider' );