<?php
/** ADD STYLES TO THEME CUSTOMIZER 
 * /wp-admin in APPEAREANCE/CUSTOMIZE 
 */
add_action('customize_register', 'customizer_settings');

function customizer_settings($wp_customize) {
	$wp_customize->add_section('colors', array(
		'title' => 'Colors',
		'priority' => 30,
	));

	$wp_customize->add_setting('primary_color', array(

		'default'   => '#FDA843',
		'transport' => 'refresh',

	));

	$wp_customize->add_setting('secondary_color', array(

		'default'   => '#fdeed980',
		'transport' => 'refresh',

	));
	$wp_customize->add_setting('third_color', array(

		'default'   => '#fdeed980',
		'transport' => 'refresh',

	));

	$wp_customize->add_setting('hover_color', array(

		'default'   => '#e08107',
		'transport' => 'refresh',

	));

	$wp_customize->add_setting('hover_orange_color', array(

		'default'   => '#e08107',
		'transport' => 'refresh',

	));
	$wp_customize->add_setting('green_color', array(

		'default'   => '#04C100',
		'transport' => 'refresh',

	));
	$wp_customize->add_setting('red_color', array(

		'default'   => '#DF1400',
		'transport' => 'refresh',

	));
	$wp_customize->add_setting('light_yellow_color', array(

		'default'   => '#FFFAF2',
		'transport' => 'refresh',

	));
	$wp_customize->add_setting('light_orange_color', array(

		'default'   => '#fff9f4',
		'transport' => 'refresh',

	));
	$wp_customize->add_setting('dark_orange_color', array(

		'default'   => '#ff8f00',
		'transport' => 'refresh',

	));
	$wp_customize->add_setting('dark_red_color', array(

		'default'   => '#d20000',
		'transport' => 'refresh',

	));
	$wp_customize->add_setting('dark_blue_color', array(

		'default'   => '#004580',
		'transport' => 'refresh',

	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(

		'label'      => 'Primary Color',
		'section'    => 'colors',
		'settings'   => 'primary_color',

	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(

		'label'      => 'Secondary Color',
		'section'    => 'colors',
		'settings'   => 'secondary_color',

	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'third_color', array(

		'label'      => 'Third Color',
		'section'    => 'colors',
		'settings'   => 'third_color',

	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hover_color', array(

		'label'      => 'Hover Color',
		'section'    => 'colors',
		'settings'   => 'hover_color',

	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hover_orange_color', array(

		'label'      => 'Hover Orange Color',
		'section'    => 'colors',
		'settings'   => 'hover_orange_color',

	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'green_color', array(

		'label'      => 'Green Color',
		'section'    => 'colors',
		'settings'   => 'green_color',

	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'red_color', array(

		'label'      => 'Red Color',
		'section'    => 'colors',
		'settings'   => 'red_color',

	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'light_yellow_color', array(

		'label'      => 'Light Yellow Color',
		'section'    => 'colors',
		'settings'   => 'light_yellow_color',

	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'light_orange_color', array(

		'label'      => 'Light Orange Color',
		'section'    => 'colors',
		'settings'   => 'light_orange_color',

	)));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dark_orange_color', array(

		'label'      => 'Dark Orange Color',
		'section'    => 'colors',
		'settings'   => 'dark_orange_color',

	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dark_red_color', array(

		'label'      => 'Dark Red Color',
		'section'    => 'colors',
		'settings'   => 'dark_red_color',

	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dark_blue_color', array(

		'label'      => 'Dark Blue Color',
		'section'    => 'colors',
		'settings'   => 'dark_blue_color',

	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'light_gray_color', array(

		'label'      => 'Light Gray Color',
		'section'    => 'colors',
		'settings'   => 'light_gray_color',

	)));
	$wp_customize->add_section('fonts', array(
		'title' => 'Fonts',
		'priority' => 30,
	));
	$wp_customize->add_setting('paragraph_small_font', array(
		'default'     => '16px',
		'transport'   => 'refresh',
	));

	$wp_customize->add_control('paragraph_small_font', array(
		'label'        => 'Paragraph small - Desktop',
		'section'    => 'fonts',
		'settings'   => 'paragraph_small_font',
	));

	$wp_customize->add_setting('font_size', array(
		'default'   => '20px',
		'transport' => 'refresh',

	));
	$wp_customize->add_control('font_size', array(
		'label'        => 'Default Font Size',
		'section'    => 'fonts',
		'settings'   => 'font_size',
	));
	
	$wp_customize->add_setting('default_h1_size', array(
		'default'     => '48px',
		'transport'   => 'refresh',
	));

	$wp_customize->add_control('default_h1_size', array(
		'label'        => 'Heading 1 - Desktop',
		'section'    => 'fonts',
		'settings'   => 'default_h1_size',
	));

	$wp_customize->add_setting('default_h2_size', array(
		'default'     => '40px',
		'transport'   => 'refresh',
	));

	$wp_customize->add_control('default_h2_size', array(
		'label'        => 'H2 - Desktop',
		'section'    => 'fonts',
		'settings'   => 'default_h2_size',
	));
	$wp_customize->add_control('default_h2_size', array(
		'label'        => 'H2 - Small screen',
		'section'    => 'fonts',
		'settings'   => 'default_h2_mob_size',
	));
	$wp_customize->add_setting('default_subheadingh2_size', array(
		'default'     => '24px',
		'transport'   => 'refresh',
	));

	$wp_customize->add_setting('default_h3_size', array(
		'default'     => '32px',
		'transport'   => 'refresh',
	));

	$wp_customize->add_control('default_h3_size', array(
		'label'        => 'H3 - Desktop',
		'section'    => 'fonts',
		'settings'   => 'default_h3_size',
	));

	$wp_customize->add_setting('mob_paragraph_small_font', array(
		'default'     => '14px',
		'transport'   => 'refresh',
	));

	$wp_customize->add_control('mob_paragraph_small_font', array(
		'label'        => 'Paragraph small - Small screen',
		'section'    => 'fonts',
		'settings'   => 'mob_paragraph_small_font',
	));
	$wp_customize->add_setting('mob_default_font_size', array(
		'default'   => '16px',
		'transport' => 'refresh',

	));
	$wp_customize->add_control('mob_default_font_size', array(
		'label'        => 'Default Font Size - Small screen',
		'section'    => 'fonts',
		'settings'   => 'mob_default_font_size',
	));
	
	$wp_customize->add_setting('default_h1_mob_size', array(
		'default'     => '32px',
		'transport'   => 'refresh',
	));

	$wp_customize->add_control('default_h1_mob_size', array(
		'label'        => 'H1 - Small screen',
		'section'    => 'fonts',
		'settings'   => 'default_h1_mob_size',
	));

	$wp_customize->add_setting('default_h2_mob_size', array(
		'default'     => '24px',
		'transport'   => 'refresh',
	));

	$wp_customize->add_control('default_h2_mob_size', array(
		'label'        => 'H2 - Small screen',
		'section'    => 'fonts',
		'settings'   => 'default_h2_mob_size',
	));
	$wp_customize->add_setting('default_subheadingh2_mob_size', array(
		'default'     => '20px',
		'transport'   => 'refresh',
	));

	$wp_customize->add_control('default_subheadingh2_mob_size', array(
		'label'        => 'Subheading H2 - Small screen',
		'section'    => 'fonts',
		'settings'   => 'default_subheadingh2_mob_size',
	));
	$wp_customize->add_setting('default_h3_mob_size', array(
		'default'     => '20px',
		'transport'   => 'refresh',
	));

	$wp_customize->add_control('default_h3_mob_size', array(
		'label'        => 'H3 - Small screen',
		'section'    => 'fonts',
		'settings'   => 'default_h3_mob_size',
	));
	$wp_customize->add_setting('font_family', array(

		'default'   => 'Barlow',
		'transport' => 'refresh',

	));
	$wp_customize->add_control('font_family', array(
		'label'        => 'Default Font',
		'section'    => 'fonts',
		'settings'   => 'font_family',
	));

	$wp_customize->add_section('border_shadow', array(
		'title' => 'Borders and Shadows',
		'priority' => 30,
	));

	$wp_customize->add_setting('border_radius', array(

		'default'   => '10px',
		'transport' => 'refresh',

	));

	$wp_customize->add_control('border_radius', array(
		'label'        => 'Default border radius',
		'section'    => 'border_shadow',
		'settings'   => 'border_radius',
	));

	$wp_customize->add_setting('border_color', array(

		'default'   => '#000000',
		'transport' => 'refresh',

	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'border_color', array(

		'label'      => 'Default Border Color',
		'section'    => 'border_shadow',
		'settings'   => 'border_color',

	)));
	$wp_customize->add_setting('border_width', array(

		'default'   => '1px',
		'transport' => 'refresh',

	));
	$wp_customize->add_control('border_width', array(
		'label'        => 'Default border width',
		'section'    => 'border_shadow',
		'settings'   => 'border_width',
	));
}
add_action('wp_head', 'cd_customizer_css');
function cd_customizer_css()
{
?>
	<style type="text/css">
		body {
			--primary: <?php echo get_theme_mod('primary_color', '#FDA843'); ?>;
			--secondary: <?php echo get_theme_mod('--secondary_color', '#fff5d2'); ?>;
			--third: <?php echo get_theme_mod('--third', '#fdeed980'); ?>;
			--red: <?php echo get_theme_mod('--red', '#DF1400'); ?>;
			--green: <?php echo get_theme_mod('--green', '#04C100'); ?>;
			--lightYellow: <?php echo get_theme_mod('light_yellow', '#FFFAF2'); ?>;
			--lightOrange: <?php echo get_theme_mod('light_orange', '#fff9f4'); ?>;
			--darkOrange: <?php echo get_theme_mod('dark_orange', '#ff8f00'); ?>;
			--darkerRed: <?php echo get_theme_mod('dark_red', '#d20000'); ?>;
			--darkerBlue: <?php echo get_theme_mod('dark_blue_color', '#004580'); ?>;
			--lightGray: <?php echo get_theme_mod('light_gray_color', '#E5E5E5'); ?>;
			--hover: <?php echo get_theme_mod('hover_color', '#e08107'); ?>;
			--hoverOrange: <?php echo get_theme_mod('hover_orange_color', '#e08107'); ?>;
			--default-small-p-size: <?php echo get_theme_mod('paragraph_small_font', '16px'); ?>;
			--default-font-size: <?php echo get_theme_mod('font_size', '20px'); ?>;
			--default-font-family: <?php echo get_theme_mod('font_family', 'barlow'); ?>;
			--default-h1-size: <?php echo get_theme_mod('default_h1_size', '48px'); ?>;
			--default-h2-size: <?php echo get_theme_mod('default_h2_size', '40px'); ?>;
			--default-subheadingh2-size: <?php echo get_theme_mod('default_subheadingh2_size', '24px'); ?>;
			--default-h3-size: <?php echo get_theme_mod('default_h3_size', '32px'); ?>;
			--mob-small-p-size: <?php echo get_theme_mod('mob_paragraph_small_font', '14px'); ?>;
			--mob-default-font-size: <?php echo get_theme_mod('mob_default_font_size', '16px'); ?>;
			--h1-mob-size: <?php echo get_theme_mod('default_h1_mob_size', '32px'); ?>;
			--h2-mob-size: <?php echo get_theme_mod('default_h2_mob_size', '24px'); ?>;
			--subheadingh2-mob-size: <?php echo get_theme_mod('default_subheadingh2_mob_size', '20px'); ?>;
			--h3-mob-size: <?php echo get_theme_mod('default_h3_mob_size', '20px'); ?>;
			--border-radius: <?php echo get_theme_mod('border_radius', '2px'); ?>;
			--border-width: <?php echo get_theme_mod('border_width', '1px'); ?>;
			--border-color: <?php echo get_theme_mod('border_color', '#f2f2f2'); ?>;
			--box-shadow: <?php echo get_theme_mod('h_offset', '0px') . ' ' . get_theme_mod('v_offset', '8px') . ' ' . get_theme_mod('blur', '16px') . ' ' . get_theme_mod('spread', '0px') . ' ' . get_theme_mod('shadow_color', 'rgb(0 0 0 / 8%)'); ?>;
		}
	</style>
<?php
}


/**
 * Removes buttons from the first row of the tiny mce editor
 *
 * @link     http://thestizmedia.com/remove-buttons-items-wordpress-tinymce-editor/
 *
 * @param    array    $buttons    The default array of buttons
 * @return   array                The updated array of buttons that exludes some items
 */
add_filter( 'mce_buttons', 'jivedig_remove_tiny_mce_buttons_from_editor');
function jivedig_remove_tiny_mce_buttons_from_editor( $buttons ) {

    $remove_buttons = array(
		'readmore',
        'spellchecker',
        'dfw', // distraction free writing mode
        'wp_adv', // kitchen sink toggle (if removed, kitchen sink will always display)
    );
    foreach ( $buttons as $button_key => $button_value ) {
        if ( in_array( $button_value, $remove_buttons ) ) {
            unset( $buttons[ $button_key ] );
        }
    }
    return $buttons;
}

/**
 * Removes buttons from the second row (kitchen sink) of the tiny mce editor
 *
 * @link     http://thestizmedia.com/remove-buttons-items-wordpress-tinymce-editor/
 *
 * @param    array    $buttons    The default array of buttons in the kitchen sink
 * @return   array                The updated array of buttons that exludes some items
 */
add_filter( 'mce_buttons_2', 'jivedig_remove_tiny_mce_buttons_from_kitchen_sink');
function jivedig_remove_tiny_mce_buttons_from_kitchen_sink( $buttons ) {

    $remove_buttons = array(
        'formatselect', // format dropdown menu for <p>, headings, etc
        'pastetext', // paste as text
        'removeformat', // clear formatting
        'charmap', // special characters
        'outdent',
        'indent',
        'undo',
        'redo',
        'wp_help', // keyboard shortcuts
		'hr'
    );
    foreach ( $buttons as $button_key => $button_value ) {
        if ( in_array( $button_value, $remove_buttons ) ) {
            unset( $buttons[ $button_key ] );
        }
    }
    return $buttons;
}
/**
 * Remove the Color Picker plugin from tinyMCE. This will
 * prevent users from adding custom colors. Note, the default color
 * palette is still available (and customizable by developers) via
 * textcolor_map using the tiny_mce_before_init hook.
 * 
 * @param array $plugins An array of default TinyMCE plugins.
 */
add_filter( 'tiny_mce_plugins', 'wpse_tiny_mce_remove_custom_colors' );
function wpse_tiny_mce_remove_custom_colors( $plugins ) {       

    foreach ( $plugins as $key => $plugin_name ) {
        if ( 'colorpicker' === $plugin_name ) {
            unset( $plugins[ $key ] );
            return $plugins;            
        }
    }

    return $plugins;            
}
function my_mce4_options($init) {

    $custom_colours = '
        "131313", "Dark Gray",
        "D20000", "Dark Red",
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$custom_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');

/** ADD CUSTOM TEXT FORMATS TO WYSIWYG EDITOR */
add_filter('tiny_mce_before_init', function($init_array) {
    $init_array['formats'] = json_encode([
        // add new format to formats
        'paragraphSmall' => [
            'selector' => 'p',
            'block'    => 'p',
            'classes'  => 'small-paragraph',
        ],
		'subHeading' => [
            'selector' => 'h2',
            'block'    => 'h2',
            'classes'  => 'sub-heading',
        ],
    ], JSON_THROW_ON_ERROR);

    // remove from that array not needed formats
    $block_formats = [
        'Paragraph=p',
		'Paragraph small=paragraphSmall',    // use the new format in select
        'Heading 1=h1',
        'Heading 2=h2',
		'Sub Heading 2=subHeading',
        'Heading 3=h3',
        'Heading 4=h4',
        'Heading 5=h5',
        'Heading 6=h6',
        'Preformatted=pre',
    ];
    $init_array['block_formats'] = implode(';', $block_formats);

    return $init_array;
});
