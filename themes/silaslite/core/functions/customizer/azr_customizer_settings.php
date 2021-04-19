<?php 
function silaslite_sanitize_default($value) {return $value;}
function silaslite_sanitize_checkbox( $checked ) {	
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

//radio box sanitization function
function silaslite_sanitize_radio( $input, $setting ){
  
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible radio box options 
    $choices = $setting->manager->get_control( $setting->id )->choices;
                      
    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
      
}

/** Customizer - Add Settings */
function silaslite_register_theme_customizer( $wp_customize )
{
	# Theme Options
    $wp_customize->add_panel('silaslite_panel', array('priority' => 1, 'capability'=> 'edit_theme_options', 'title' => esc_html__('Silaslite Theme Options', 'silaslite') ));

    # Sections
   
   	$wp_customize->add_section( 'silaslite_section_social_media', array( 'title' => esc_html__('Social Networks', 'silaslite'), 'panel' => 'silaslite_panel', 'priority' => 23 ) );
    $wp_customize->add_section( 'silaslite_section_footer', array('title' => esc_html__('Footer', 'silaslite'), 'panel' => 'silaslite_panel', 'priority' => 25 ));
    

    # Site Title - Tagline
    $wp_customize->add_setting('silaslite_hide_site_title', array('default' => false, 'sanitize_callback' => 'silaslite_sanitize_checkbox'));
    $wp_customize->add_setting('silaslite_hide_tagline', array('default' => false, 'sanitize_callback' => 'silaslite_sanitize_checkbox'));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'silaslite_hide_site_title',
            array(
                'label' => esc_html__('Hide Site Title?', 'silaslite'),
                'section' => 'title_tagline',
                'type' => 'checkbox'
            )
        )
    );
     $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'silaslite_hide_tagline',
            array(
                'label' => esc_html__('Hide Tagline?', 'silaslite'),
                'section' => 'title_tagline',
                'type' => 'checkbox'
            )
        )
    );

	/** Social Media */
    $wp_customize->add_setting('silaslite_facebook_url', array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_setting('silaslite_twitter_url', array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_setting('silaslite_instagram_url', array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_setting('silaslite_pinterest_url', array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_setting('silaslite_youtube_url', array('default' => '', 'sanitize_callback' => 'sanitize_text_field')); 
    $wp_customize->add_setting('silaslite_vimeo_url', array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'silaslite_facebook_url', array('label' => esc_html__('Facebook URL', 'silaslite'), 'section' => 'silaslite_section_social_media', 'settings' => 'silaslite_facebook_url', 'type' => 'text', 'priority' => 1)));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'silaslite_twitter_url', array('label' => esc_html__('Twitter URL', 'silaslite'), 'section' => 'silaslite_section_social_media', 'settings' => 'silaslite_twitter_url', 'type' => 'text', 'priority' => 2)));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'silaslite_instagram_url', array('label' => esc_html__('Instagram URL', 'silaslite'), 'section' => 'silaslite_section_social_media', 'settings' => 'silaslite_instagram_url', 'type' => 'text', 'priority' => 3)));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'silaslite_pinterest_url', array('label' => esc_html__('Pinterest URL', 'silaslite'), 'section' => 'silaslite_section_social_media', 'settings' => 'silaslite_pinterest_url', 'type' => 'text', 'priority' => 4)));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'silaslite_youtube_url', array('label' => esc_html__('Youtube URL', 'silaslite'), 'section' => 'silaslite_section_social_media', 'settings'  => 'silaslite_youtube_url', 'type' => 'text', 'priority' => 6)));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'silaslite_vimeo_url', array('label' => esc_html__('Vimeo URL', 'silaslite'), 'section' => 'silaslite_section_social_media', 'settings' => 'silaslite_vimeo_url', 'type' => 'text', 'priority' => 7)));


    /** Footer */
    $wp_customize->add_setting( 'silaslite_instagram_show', array( 'default' => false, 'sanitize_callback' => 'silaslite_sanitize_checkbox' ) );
    $wp_customize->add_setting( 'silaslite_social_footer_enable', array('default' => false,'sanitize_callback' => 'silaslite_sanitize_checkbox' ) );
    $wp_customize->add_setting( 'silaslite_footer_copyright_text', array( 'default' => esc_html__('2020 AzuraTheme', 'silaslite'), 'sanitize_callback' => 'sanitize_textarea_field') );
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'silaslite_instagram_show',
            array(
                'label' => 'Show Instagram Feed',
                'section' => 'silaslite_section_footer',
                'type'  => 'checkbox'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'silaslite_social_footer_enable',
            array(
                'label' => esc_html__('Show Social Network?', 'silaslite'),
                'section' => 'silaslite_section_footer',
                'type' => 'checkbox'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'silaslite_footer_copyright_text',
            array(
            'label' => esc_html__('Copyright Text', 'silaslite'), 
            'section' => 'silaslite_section_footer',
            'type' => 'textarea'
        )
    ));

    /** Colors */
    $wp_customize->add_setting('silaslite_body_color', array('default' => esc_attr('#1a1a1a'), 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_setting('silaslite_accent_color', array('default' => esc_attr('#b78e2d'), 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'silaslite_body_color', array('label' => esc_html__('Body Text Color', 'silaslite'), 'section' => 'colors', 'settings' => 'silaslite_body_color')));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'silaslite_accent_color', array('label' => esc_html__('Accent Color', 'silaslite'), 'section' => 'colors', 'settings' => 'silaslite_accent_color')));
    
}
add_action( 'customize_register', 'silaslite_register_theme_customizer' );
?>