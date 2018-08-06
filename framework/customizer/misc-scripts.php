<?php
//upgrade
function synapse_customize_register_misc( $wp_customize ) {
    $wp_customize->add_section(
        'synapse_sec_upgrade',
        array(
            'title'     => __('Important Links','synapse'),
            'priority'  => 1,
        )
    );

    $wp_customize->add_setting(
        'synapse_important_links',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new WP_Customize_Upgrade_Control(
            $wp_customize,
            'synapse_important_links',
            array(
                'settings'		=> 'synapse_important_links',
                'section'		=> 'synapse_sec_upgrade',
                'description'	=> '<a class="synapse-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'synapse').'</a>
                                    <a class="synapse-important-links" href="https://demo.inkhive.com/synapse-pro/" target="_blank">'.__('Revive Live Demo', 'synapse').'</a>
                                    <a class="synapse-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'synapse').'</a>
                                    <a class="synapse-important-links" href="https://wordpress.org/support/theme/synapse/reviews" target="_blank">'.__('Review Us', 'synapse').'</a>'
            )
        )
    );

    $wp_customize->add_section('synapse_ads', array(
        'title' => __('Advertisement','synapse'),
        'priority' => 44 ,
    ));

    $wp_customize->add_setting(
        'synapse_topad',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'synapse_sanitize_ads'
        )
    );

    $wp_customize->add_control(
        new synapse_Custom_Ads_Control(
            $wp_customize,
            'synapse_topad',
            array(
                'section' => 'synapse_ads',
                'settings' => 'synapse_topad',
                'label'   => __('Top Ad','synapse'),
                'description' => __('Enter your Responsive Adsense Code. For Other Ads use 468x60px Banner.','synapse')
            )
        )
    );

    function synapse_sanitize_ads( $input ) {
        global $allowedposttags;
        $custom_allowedtags["script"] = array();
        $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
        $output = wp_kses( $input, $custom_allowedtags);
        return $output;
    }

}
add_action( 'customize_register', 'synapse_customize_register_misc' );