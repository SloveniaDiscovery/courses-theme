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