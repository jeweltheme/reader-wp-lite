<?php
/**
 * Reader Theme Customizer.
 *
 * @package Reader-Wp-Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */



function reader_wp_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';


    //Social Icons
    $wp_customize->add_section( 'social_section' , array(
    	'title'      => esc_html__( 'Social Settings', 'reader-wp-lite' ),
    	'priority'   => 30,
	) );


	$wp_customize->add_setting( 'twitter',array('sanitize_callback'		=> 'sanitize_text_field'));
	$wp_customize->add_setting( 'skype',array('sanitize_callback'		=> 'sanitize_text_field'));
	$wp_customize->add_setting( 'instagram',array('sanitize_callback'	=> 'sanitize_text_field'));
	$wp_customize->add_setting( 'dribble',array('sanitize_callback'		=> 'sanitize_text_field'));
	$wp_customize->add_setting( 'vimeo',array('sanitize_callback'		=> 'sanitize_text_field'));
	$wp_customize->add_setting( 'facebook',array('sanitize_callback'	=> 'sanitize_text_field'));


    $wp_customize->add_control(	'twitter',
		array(
			'label'    => esc_html__( 'Twitter Username', 'reader-wp-lite' ),
			'section'  => 'social_section',
			'settings' => 'twitter',
			'type'     => 'text'
		)
	);

	$wp_customize->add_control(	'skype',
		array(
			'label'    => esc_html__( 'Skype Username', 'reader-wp-lite' ),
			'section'  => 'social_section',
			'settings' => 'skype',
			'type'     => 'text'
		)
	);

	$wp_customize->add_control(	'instagram',
		array(
			'label'    => esc_html__( 'Instagram Username', 'reader-wp-lite' ),
			'section'  => 'social_section',
			'settings' => 'instagram',
			'type'     => 'text'
		)
	);

	$wp_customize->add_control(	'dribble',
		array(
			'label'    => esc_html__( 'Dribble Username', 'reader-wp-lite' ),
			'section'  => 'social_section',
			'settings' => 'dribble',
			'type'     => 'text'
		)
	);

	$wp_customize->add_control(	'vimeo',
		array(
			'label'    => esc_html__( 'Vimeo Username', 'reader-wp-lite' ),
			'section'  => 'social_section',
			'settings' => 'vimeo',
			'type'     => 'text'
		)
	);


	$wp_customize->add_control(	'facebook',
		array(
			'label'    => esc_html__( 'Facebook Username', 'reader-wp-lite' ),
			'section'  => 'social_section',
			'settings' => 'facebook',
			'type'     => 'text'
		)
	);


	//Footer Settings

	$wp_customize->add_section( 'footer_section' , array(
	    	'title'      => esc_html__( 'Footer Settings', 'reader-wp-lite' ),
	    	'priority'   => 30,
		) );
	$wp_customize->add_setting( 'footer_user',array('sanitize_callback'	=> 'sanitize_text_field'));
	$wp_customize->add_setting( 'footer_url',array('sanitize_callback'	=> 'esc_url_raw'));

	$wp_customize->add_control(	'footer_user',
			array(
				'label'    => esc_html__( 'Name of Company', 'reader-wp-lite' ),
				'description' => esc_html__( 'Company name for Footer Credit', 'reader-wp-lite' ),
				'section'  => 'footer_section',
				'settings' => 'footer_user',
				'type'     => 'text'
			)
		);

	  $wp_customize->add_control(	'footer_url',
			array(
				'label'    => esc_html__( 'URL of Company', 'reader-wp-lite' ),
				'description' => esc_html__( 'Full Company URL with http or https', 'reader-wp-lite' ),
				'section'  => 'footer_section',
				'settings' => 'footer_url',
				'type'     => 'url'
			)
		);


}

add_action( 'customize_register', 'reader_wp_lite_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function reader_wp_lite_customize_preview_js() {
	wp_enqueue_script( 'reader_wp_lite_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'reader_wp_lite_customize_preview_js' );

