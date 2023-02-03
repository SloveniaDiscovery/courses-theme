<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (!file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
	wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

try {
	\Roots\bootloader();
} catch (Throwable $e) {
	wp_die(
		__('You need to install Acorn to use this theme.', 'sage'),
		'',
		[
			'link_url' => 'https://docs.roots.io/acorn/2.x/installation/',
			'link_text' => __('Acorn Docs: Installation', 'sage'),
		]
	);
}

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/
function my_theme_enqueue_styles() {

    wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

collect(['setup', 'filters'])
	->each(function ($file) {
		if (!locate_template($file = "app/{$file}.php", true, true)) {
			wp_die(
				/* translators: %s is replaced with the relative file path */
				sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
			);
		}
	});

/*
|--------------------------------------------------------------------------
| Enable Sage Theme Support
|--------------------------------------------------------------------------
|
| Once our theme files are registered and available for use, we are almost
| ready to boot our application. But first, we need to signal to Acorn
| that we will need to initialize the necessary service providers built in
| for Sage when booting.
|
*/

add_theme_support('sage');

add_action('customize_register', 'customizer_settings');

function customizer_settings($wp_customize)
{
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
	$wp_customize->add_section('fonts', array(
		'title' => 'Fonts',
		'priority' => 30,
	));

	$wp_customize->add_setting('font_size', array(

		'default'   => '18px',
		'transport' => 'refresh',

	));
	$wp_customize->add_control('font_size', array(
		'label'        => 'Default Font Size',
		'section'    => 'fonts',
		'settings'   => 'font_size',
	));
	$wp_customize->add_setting('default_h1_size', array(
		'default'     => '40px',
		'transport'   => 'refresh',
	));

	$wp_customize->add_control('default_h1_size', array(
		'label'        => 'h1',
		'section'    => 'fonts',
		'settings'   => 'default_h1_size',
	));

	$wp_customize->add_setting('default_h2_size', array(
		'default'     => '40px',
		'transport'   => 'refresh',
	));

	$wp_customize->add_control('default_h2_size', array(
		'label'        => 'h2',
		'section'    => 'fonts',
		'settings'   => 'default_h2_size',
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
			--hover: <?php echo get_theme_mod('hover_color', '#e08107'); ?>;
			--hoverOrange: <?php echo get_theme_mod('hover_orange_color', '#e08107'); ?>;
			--default-font-size: <?php echo get_theme_mod('font_size', '20px'); ?>;
			--default-font-family: <?php echo get_theme_mod('font_family', 'barlow'); ?>;
			--default-h1-size: <?php echo get_theme_mod('default_h1_size', '40px'); ?>;
			--default-h2-size: <?php echo get_theme_mod('default_h2_size', '40px'); ?>;
			--border-radius: <?php echo get_theme_mod('border_radius', '2px'); ?>;
			--border-width: <?php echo get_theme_mod('border_width', '1px'); ?>;
			--border-color: <?php echo get_theme_mod('border_color', '#f2f2f2'); ?>;
			--box-shadow: <?php echo get_theme_mod('h_offset', '0px') . ' ' . get_theme_mod('v_offset', '8px') . ' ' . get_theme_mod('blur', '16px') . ' ' . get_theme_mod('spread', '0px') . ' ' . get_theme_mod('shadow_color', 'rgb(0 0 0 / 8%)'); ?>;
		}
	</style>
<?php
}

function cptui_register_my_cpts_testimonial() {

	/**
	 * Post Type: Testimonials.
	 */

	$labels = [
		"name" => __("Testimonials"),
		"singular_name" => __("Testimonial"),
	];

	$args = [
		"label" => __("Testimonials"),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => true,
		"rewrite" => ["slug" => "testimonials", "with_front" => false],
		"query_var" => true,
		"supports" => ["title", "editor", "thumbnail"],
		"show_in_graphql" => false,
		'taxonomies'  => array('category'),
	];

	register_post_type("testimonials", $args);
}

add_action('init', 'cptui_register_my_cpts_testimonial');


function cptui_register_my_cpts_bonuses() {

	/**
	 * Post Type: Bonuses.
	 */

	$labels = [
		"name" => __("Bonuses"),
		"singular_name" => __("Bonus"),
	];

	$args = [
		"label" => __("Bonuses"),
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => true,
		"rewrite" => ["slug" => "bonuses", "with_front" => false],
		"query_var" => true,
		"supports" => ["title", "editor", "thumbnail"],
		"show_in_graphql" => false,
		'taxonomies'  => array('category'),
		"menu-icon" => "dashicons-book-alt"
	];

	register_post_type("bonuses", $args);
}

add_action('init', 'cptui_register_my_cpts_bonuses');



function cptui_register_my_cpts_faq() {

	/**
	 * Post Type: Faq.
	 */

	$labels = [
		"name" => __("FAQ"),
		"singular_name" => __("FAQ"),
	];

	$args = [
		"label" => __("FAQ"),
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => true,
		"rewrite" => ["slug" => "faq", "with_front" => false],
		"query_var" => true,
		"supports" => ["title", "editor", "thumbnail"],
		"show_in_graphql" => false,
		'taxonomies'  => array('category'),
	];

	register_post_type("FAQ", $args);
}

add_action('init', 'cptui_register_my_cpts_faq');

function my_acf_add_local_field_groups() {
	acf_add_local_field_group(array(
		'key' => 'group_1',
		'title' => 'Sales Pages',
		'fields' => array(
			array(
                'key' => 'field_1',
                'label' => 'Display/hide Top Heading',
                'name' => 'toggle_top_heading',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => 'Display',
                'ui_off_text' => 'Hide',
            ),
			array(
				'key' => 'field_1_1_0_1',
				'label' => 'Top Heading',
				'name' => 'top_heading',
				'type' => 'text',
			),
			array(
                'key' => 'field_1_1',
                'label' => 'Display/hide Heading',
                'name' => 'toggle_headline_h1',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => 'Display',
                'ui_off_text' => 'Hide',
            ),
			array(
				'key' => 'field_1_1_0',
				'label' => 'Heading',
				'name' => 'main_heading',
				'type' => 'wysiwyg',
			),
			array(
                'key' => 'field_1_2_0',
                'label' => 'Display/hide Subheading',
                'name' => 'toggle_headline_h2',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => 'Display',
                'ui_off_text' => 'Hide',
            ),
			array(
				'key' => 'field_1_2',
				'label' => 'Subheading',
				'name' => 'subheading',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_1_3_0',
				'label' => 'Product main image',
				'name' => 'product_main_image',
				'type' => 'image',
			),
			array(
				'key' => 'field_1_7',
				'label' => 'Product title',
				'name' => 'product_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_1_7_1',
				'label' => 'Badge text',
				'name' => 'badge_text',
				'type' => 'text',
			),
			array(
				'key' => 'field_1_8',
				'label' => 'Product includes',
				'name' => 'product_includes',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_1_9',
				'label' => 'Selected product',
				'name' => 'selected_product',
				'type' => 'post_object',
				'post_type' => 'product',
				'return_format' => 'object',
			),

			array(
				'key' => 'field_1_12',
				'label' => 'Form shortcode',
				'name' => 'form_shortcode',
				'type' => 'text',
			),
			array(
				'key' => 'field_1_12_1',
				'label' => 'Form shortcode modal',
				'name' => 'form_shortcode_modal',
				'type' => 'text',
			),
			array(
				'key' => 'field_1_12_2',
				'label' => 'Modal text',
				'name' => 'modal_text',
				'type' => 'text',
			),
			array(
                'key' => 'field_1_3_1',
                'label' => 'Display/hide Before First content',
                'name' => 'toggle_before_first_content',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => 'Display',
                'ui_off_text' => 'Hide',
            ),
			array(
				'key' => 'field_1_13_0',
				'label' => 'Before First content',
				'name' => 'before_first_content',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_1_13_0_2',
				'label' => 'Testimonials',
				'name' => 'testimonials_no_heading',
				'type' => 'post_object',
				'multiple' => True,
				'post_type' => 'testimonials',
			),
			array(
				'key' => 'field_1_13_0_3',
				'label' => 'After Testimonials',
				'name' => 'after_testimonials',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_1_13',
				'label' => 'First content',
				'name' => 'first_content',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_1_13_1',
				'label' => 'Second content',
				'name' => 'second_content',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_1_13_11',
				'label' => 'Display yellow box 1',
				'name' => 'display_yellow_1',
				'type' => 'true_false',
				'default_value' => 1,
				'ui' => 1,
				'ui_on_text' => 'Display',
				'ui_off_text' => 'Hide',
			),
			array(
				'key' => 'field_1_13_12',
				'label' => 'Display yellow box 2',
				'name' => 'display_yellow_2',
				'type' => 'true_false',
				'default_value' => 0,
				'ui' => 1,
				'ui_on_text' => 'Display',
				'ui_off_text' => 'Hide',
			),
			array(
				'key' => 'field_1_13_13',
				'label' => 'Display yellow box 3',
				'name' => 'display_yellow_3',
				'type' => 'true_false',
				'default_value' => 0,
				'ui' => 1,
				'ui_on_text' => 'Display',
				'ui_off_text' => 'Hide',
			),
			// array(
			// 	'key' => 'field_1_13_15',
			// 	'label' => 'Display yellow box 4',
			// 	'name' => 'display_yellow_4_1',
			// 	'type' => 'true_false',
			// 	'default_value' => 0,
			// 	'ui' => 1,
			// 	'ui_on_text' => 'Display',
			// 	'ui_off_text' => 'Hide',
			// ),
			array(
				'key' => 'field_1_14',
				'label' => 'Title yellow box',
				'name' => 'title_yellow_box',
				'type' => 'text',
			),
			array(
				'key' => 'field_1_16',
				'label' => 'Subtitle yellow box',
				'name' => 'subtitle_yellow_box',
				'type' => 'text',
			),
			array(
				'key' => 'field_1_16_1',
				'label' => 'Red text yellow box',
				'name' => 'red_text_yellow_box',
				'type' => 'text',
			),
			array(
				'key' => 'field_1_18',
				'label' => 'Image yellow box',
				'name' => 'image_yellow_box',
				'type' => 'image',
			),
			array(
				'key' => 'field_1_19',
				'label' => 'Text yellow box',
				'name' => 'text_yellow_box',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_1_19_1',
				'label' => 'Bonuses',
				'name' => 'product_bonus',
				'type' => 'repeater',
				'sub_fields' => array(
					array(
						'key' => 'field_1_19_1_1',
						'label' => 'Product Bonus Image',
						'name' => 'product_bonus_image',
						'type' => 'image',
					),
					array(
						'key' => 'field_1_19_1_2',
						'label' => 'Product Bonus Title',
						'name' => 'product_bonus_title',
						'type' => 'text',
					),
					array(
						'key' => 'field_1_19_1_3',
						'label' => 'Product Bonus Content',
						'name' => 'product_bonus_content',
						'type' => 'text',
					),
					array(
						'key' => 'field_1_19_1_4',
						'label' => 'Product Bonus Value',
						'name' => 'product_bonus_value',
						'type' => 'text',
					),
				),
			),
			array(
				'key' => 'field_1_19_10',
				'label' => 'Bonuses',
				'name' => 'bonuses',
				'type' => 'post_object',
				'multiple' => True,
				'post_type' => 'bonuses',
			),
			array(
				'key' => 'field_1_19_2',
				'label' => 'Moving button text',
				'name' => 'moving_button_text',
				'type' => 'text',
			),
			array(
				'key' => 'field_1_19_3',
				'label' => 'Personal assistance headline',
				'name' => 'personal_assistance_headline',
				'type' => 'text',
			),
			array(
				'key' => 'field_1_19_4',
				'label' => 'Personal assistance text',
				'name' => 'personal_assistance_text',
				'type' => 'text',
			),
			array(
				'key' => 'field_1_20',
				'label' => 'Money back guarantee headline',
				'name' => 'money_back_guarantee_headline',
				'type' => 'text',
			),
			array(
				'key' => 'field_1_20_1',
				'label' => 'Money back guarantee text',
				'name' => 'money_back_guarantee_text',
				'type' => 'text',
			),
			array(
				'key' => 'field_1_21',
				'label' => 'Testimonial content',
				'name' => 'testimonial_content',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_1_22',
				'label' => 'Testimonials',
				'name' => 'testimonials',
				'type' => 'post_object',
				'multiple' => True,
				'post_type' => 'testimonials',
			),
			array(
				'key' => 'field_1_22_1',
				'label' => 'Video testimonials',
				'name' => 'video_testimonials',
				'type' => 'post_object',
				'multiple' => True,
				'post_type' => 'testimonials',
			),
			array(
				'key' => 'field_1_24',
				'label' => 'Who is for',
				'name' => 'who_is_for',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_1_26',
				'label' => 'Money back',
				'name' => 'money_back',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_1_26_1',
				'label' => 'Money back image',
				'name' => 'money_back_image',
				'type' => 'image',
			),
			array(
				'key' => 'field_1_28',
				'label' => 'Limited offer',
				'name' => 'limited_offer',
				'type' => 'wysiwyg',
			),

			array(
				'key' => 'field_1_29',
				'label' => 'What you get title',
				'name' => 'what_you_get_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_1_30',
				'label' => 'What you get subtitle',
				'name' => 'what_you_get_subtitle',
				'type' => 'text',
			),

			array(
				'key' => 'field_1_32',
				'label' => 'What you get image',
				'name' => 'what_you_get_image',
				'type' => 'image',
			),
			array(
				'key' => 'field_1_33',
				'label' => 'What you get text',
				'name' => 'what_you_get_text',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_1_34',
				'label' => 'FAQ',
				'name' => 'product_faq',
				'type' => 'repeater',
				'sub_fields' => array(
					array(
						'key' => 'field_1_34_1',
						'label' => 'Product FAQ Question',
						'name' => 'product_faq_question',
						'type' => 'text',
					),
					array(
						'key' => 'field_1_34_2',
						'label' => 'Product FAQ Anwser',
						'name' => 'product_faq_anwser',
						'type' => 'wysiwyg',
					),
				),
			),
			array(
				'key' => 'field_1_1_1',
				'label' => 'Timer',
				'name' => 'timer',
				'type' => 'date_picker',
				'date_format' => 'dd/mm/yy',
				'display_format' => 'dd/mm/yy',
			),
			array(
				'key' => 'field_33',
				'label' => 'Site description',
				'name' => 'site_description',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_35',
				'label' => 'Top bar text',
				'name' => 'top_bar_text',
				'type' => 'text',
			),
			array(
				'key' => 'field_36',
				'label' => 'Top bar button text',
				'name' => 'top_bar_button_text',
				'type' => 'text',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'wffn_landing',
				),
			),
		),
	));
}
add_action('acf/init', 'my_acf_add_local_field_groups');

function my_acf_add_local_field_groups2()
{

	acf_add_local_field_group(
		array(
			'key' => 'group_2',
			'title' => 'Options page',
			'fields' => array(
				array(
					'key' => 'field_2_1',
					'label' => 'phone',
					'name' => 'phone',
					'type' => 'text',
				),
				array(
					'key' => 'field_2_2',
					'label' => 'email',
					'name' => 'email',
					'type' => 'text',
				),
				array(
					'key' => 'field_2_3',
					'label' => 'site logo color',
					'name' => 'site_logo_color',
					'type' => 'image',
				),
				array(
					'key' => 'field_2_4',
					'label' => 'site logo white',
					'name' => 'site_logo_white',
					'type' => 'image',
				),
				array(
					'key' => 'field_2_1_3',
					'label' => 'Expert main photo',
					'name' => 'expert_main_photo',
					'type' => 'image',
				),
				array(
					'key' => 'field_2_1_4',
					'label' => 'Expert name',
					'name' => 'expert_name',
					'type' => 'text',
				),
				array(
					'key' => 'field_2_1_5',
					'label' => 'Expert job',
					'name' => 'expert_job',
					'type' => 'text',
				),
				array(
					'key' => 'field_2_1_5_1',
					'label' => 'Expert salespage description',
					'name' => 'expert_salespage_description',
					'type' => 'text',
				),
				array(
					'key' => 'field_2_1_6',
					'label' => 'Expert profile photo',
					'name' => 'expert_profile_photo',
					'type' => 'image',
				),
				array(
					'key' => 'field_2_1_7',
					'label' => 'Best selling author badge',
					'name' => 'author_badge',
					'type' => 'image',
				),
				array(
					'key' => 'field_2_1_8',
					'label' => 'Satisfied customers number',
					'name' => 'satisfied_customers_number',
					'type' => 'text',
				),

			),
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'options',
					),
				),
			),
		),
	);
}

add_action('acf/init', 'my_acf_add_local_field_groups2');

function my_acf_add_local_field_groups3()
{

	acf_add_local_field_group(
		array(
			'key' => 'group_3',
			'title' => 'Checkout page',
			'fields' => array(
				array(
					'key' => 'field_3_1',
					'label' => 'Product name',
					'name' => 'product_name_checkout',
					'type' => 'text',
				),
				array(
					'key' => 'field_3_2',
					'label' => 'Product image',
					'name' => 'product_image_checkout',
					'type' => 'image',
				),
				array(
					'key' => 'field_3_3',
					'label' => 'What you get',
					'name' => 'what_you_get_checkout',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_3_4_1',
					'label' => 'Testimonials',
					'name' => 'testimonials',
					'type' => 'post_object',
					'multiple' => True,
					'post_type' => 'testimonials',
				),
				array(
					'key' => 'field_3_5',
					'label' => 'FAQ',
					'name' => 'product_faq',
					'type' => 'repeater',
					'sub_fields' => array(
						array(
							'key' => 'field_3_5_1',
							'label' => 'Product FAQ Question',
							'name' => 'product_faq_question',
							'type' => 'text',
						),
						array(
							'key' => 'field_3_5_2',
							'label' => 'Product FAQ Anwser',
							'name' => 'product_faq_anwser',
							'type' => 'text',
						),
					),
				),
				array(
					'key' => 'field_3_6',
					'label' => 'Money back guarantee headline checkout',
					'name' => 'money_back_guarantee_headline_checkout',
					'type' => 'text',
				),
				array(
					'key' => 'field_3_7',
					'label' => 'Money back guarantee text checkout',
					'name' => 'money_back_guarantee_text_checkout',
					'type' => 'text',
				),
				array(
					'key' => 'field_3_8',
					'label' => 'Personal assistance headline checkout',
					'name' => 'personal_assistance_headline_checkout',
					'type' => 'text',
				),
				array(
					'key' => 'field_3_9',
					'label' => 'Personal assistance text checkout',
					'name' => 'personal_assistance_text_checkout',
					'type' => 'text',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'wfacp_checkout',
					),
				),
			),
		),
	);
}

add_action('acf/init', 'my_acf_add_local_field_groups3');


function my_acf_add_local_field_groups4()
{

	acf_add_local_field_group(
		array(
			'key' => 'group_4',
			'title' => 'Upsell page',
			'fields' => array(
				array(
					'key' => 'field_4_1',
					'label' => 'Product',
					'name' => 'selected_product',
					'type' => 'post_object',
					'post_type' => 'product',
					'return_format' => 'object',
				),
				array(
					'key' => 'field_4_2',
					'label' => 'Headline',
					'name' => 'upsell_name',
					'type' => 'text',
				),
				array(
					'key' => 'field_4_3',
					'label' => 'Second upsell subject',
					'name' => 'first_headline',
					'type' => 'text',
				),
				array(
					'key' => 'field_4_4',
					'label' => 'Toggle bar 1',
					'name' => 'toggle_bar_1',
					'type' => 'true_false',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'Display',
					'ui_off_text' => 'Hide',
				),
				array(
					'key' => 'field_4_5',
					'label' => 'Toggle bar 2',
					'name' => 'toggle_bar_2',
					'type' => 'true_false',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => 'Display',
					'ui_off_text' => 'Hide',
				),
				array(
					'key' => 'field_4_6',
					'label' => 'Toggle bar 3',
					'name' => 'toggle_bar_3',
					'type' => 'true_false',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => 'Display',
					'ui_off_text' => 'Hide',
				),
				array(
					'key' => 'field_4_7',
					'label' => 'First content',
					'name' => 'first_content_upsell',
					'type' => 'wysiwyg',
				),

				array(
					'key' => 'field_4_7_1',
					'label' => 'Second content',
					'name' => 'second_content_upsell',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_4_8',
					'label' => 'Title yellow box',
					'name' => 'title_yellow_box',
					'type' => 'text',
				),
				array(
					'key' => 'field_4_9',
					'label' => 'Toggle title yellow box',
					'name' => 'toggle_title_yellow_box',
					'type' => 'true_false',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => 'Display',
					'ui_off_text' => 'Hide',
				),
				array(
					'key' => 'field_4_10',
					'label' => 'Subtitle yellow box',
					'name' => 'subtitle_yellow_box',
					'type' => 'text',
				),
				array(
					'key' => 'field_4_11',
					'label' => 'Toggle subtitle yellow box',
					'name' => 'toggle_subtitle_yellow_box',
					'type' => 'true_false',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => 'Display',
					'ui_off_text' => 'Hide',
				),
				array(
					'key' => 'field_4_12',
					'label' => 'Image yellow box',
					'name' => 'image_yellow_box',
					'type' => 'image',
				),
				array(
					'key' => 'field_4_13',
					'label' => 'Text yellow box',
					'name' => 'text_yellow_box',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_4_13_01',
					'label' => 'Testimonial content',
					'name' => 'testimonial_content',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_4_13_1',
					'label' => 'Testimonials',
					'name' => 'testimonials',
					'type' => 'post_object',
					'multiple' => True,
					'post_type' => 'testimonials',
				),
				array(
					'key' => 'field_4_14',
					'label' => 'Green box title',
					'name' => 'green_box_title',
					'type' => 'text',
				),
				array(
					'key' => 'field_4_15',
					'label' => 'Green box no thanks',
					'name' => 'green_box_no_thanks',
					'type' => 'text',
				),
				array(
					'key' => 'field_4_17',
					'label' => 'Price increase in',
					'name' => 'price_increase',
					'type' => 'text',
					'instructions' => 'Number of minutes',
				),
				array(
					'key' => 'field_4_17_0_0',
					'label' => 'Toggle box content',
					'name' => 'toggle_box_content',
					'type' => 'true_false',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => 'Display',
					'ui_off_text' => 'Hide',
				
				),
				array(
					'key' => 'field_4_17_0',
					'label' => 'Above boxes content',
					'name' => 'above_boxes_content',
					'type' => 'flexible_content',
					'button_label' => 'Add row',
					'layouts' => array (
						array(
							'key' => 'field_4_17_01',
							'name' => 'upsell_above_content',
							'label' => 'Above content', 
						)
					)
				),
				array(
					'key' => 'field_4_18',
					'label' => 'Flexible upsell essential box',
					'name' => 'upsell_self_sort_essential',
					'type' => 'flexible_content',
					'button_label' => 'Add row',
					'layouts' => array (
						array(
							'key' => 'field_4_18_0',
							'name' => 'essential_box',
							'label' => 'Essential box', 
						)
					)
				),
				array(
					'key' => 'field_4_19',
					'label' => 'Flexible upsell bundle box',
					'name' => 'upsell_self_sort_bundle',
					'type' => 'flexible_content',
					'button_label' => 'Add row',
					'layouts' => array (
						array(
							'key' => 'field_4_19_0',
							'name' => 'bundle_box',
							'label' => 'Bundle box', 
						)
					)
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'wfocu_offer',
					),
				),
			),
		),
	);

	acf_add_local_field(array(
		"key" => 'field_4_17_2',
		"label" => 'Title above box contents',
		'name' => 'title_above_box_contents',
		'type' => 'text',
		'parent' => 'field_4_17_0',
		'parent_layout' => 'field_4_17_01',
	));
	acf_add_local_field(array(
		"key" => 'field_4_17_3',
		"label" => 'Description above box contents',
		'name' => 'desc_above_box_contents',
		'type' => 'wysiwyg',
		'parent' => 'field_4_17_0',
		'parent_layout' => 'field_4_17_01',
	));

	acf_add_local_field(array(
		'key' => 'field_4_18_01',
		'label' => 'Product essential',
		'name' => 'upsell_essential_product',
		'type' => 'post_object',
		'post_type' => 'product',
		'return_format' => 'object',
		'parent' => 'field_4_18',
		'parent_layout' => 'field_4_18_0',
	));

	acf_add_local_field(array(
		"key" => 'field_4_18_1',
		"label" => 'Essential box title',
		'name' => 'upsell_essential_box_title',
		'type' => 'text',
		'parent' => 'field_4_18',
		'parent_layout' => 'field_4_18_0',
	));
	   
    acf_add_local_field(
		array (
		'key' => 'field_4_18_2',
		'label' => 'Essential box image',
		'name' => 'upsell_essential_box_image',
		'type' => 'image',
		'parent' => 'field_4_18',
		'parent_layout' => 'field_4_18_0',
		)
	);
  
	acf_add_local_field(array(
		"key" => 'field_4_18_3',
		"label" => 'Essential box content',
		'name' => 'upsell_essential_box_content',
		'type' => 'wysiwyg',
		'parent' => 'field_4_18',
		'parent_layout' => 'field_4_18_0',
	));
	   
	acf_add_local_field(array(
		"key" => 'field_4_18_4',
		"label" => 'Essential button text',
		'name' => 'upsell_essential_button',
		'type' => 'text',
		'parent' => 'field_4_18',
		'parent_layout' => 'field_4_18_0',
	));

	acf_add_local_field(array(
		'key' => 'field_4_19_01',
		'label' => 'Product bundle',
		'name' => 'upsell_bundle_product',
		'type' => 'post_object',
		'post_type' => 'product',
		'return_format' => 'object',
		'parent' => 'field_4_19',
		'parent_layout' => 'field_4_19_0',
	));

	acf_add_local_field(array(
		"key" => 'field_4_19_1',
		"label" => 'Bundle box promo text',
		'name' => 'upsell_bundle_box_promo',
		'type' => 'text',
		'parent' => 'field_4_19',
		'parent_layout' => 'field_4_19_0',
	));

	acf_add_local_field(array(
		"key" => 'field_4_19_2',
		"label" => 'Bundle box title',
		'name' => 'upsell_bundle_box_title',
		'type' => 'text',
		'parent' => 'field_4_19',
		'parent_layout' => 'field_4_19_0',
	));

	acf_add_local_field(array(
		"key" => 'field_4_19_3',
		"label" => 'Bundle box image',
		'name' => 'upsell_bundle_box_image',
		'type' => 'image',
		'parent' => 'field_4_19',
		'parent_layout' => 'field_4_19_0',
	));

	acf_add_local_field(array(
		"key" => 'field_4_19_4',
		"label" => 'Bundle box content',
		'name' => 'upsell_bundle_box_content',
		'type' => 'wysiwyg',
		'parent' => 'field_4_19',
		'parent_layout' => 'field_4_19_0',
	));
	   
	acf_add_local_field(array(
		"key" => 'field_4_19_5',
		"label" => 'Bundle button text',
		'name' => 'upsell_bundle_button',
		'type' => 'text',
		'parent' => 'field_4_19',
		'parent_layout' => 'field_4_19_0',
	));
	   
	acf_add_local_field(array(
		"key" => 'field_4_19_6',
		"label" => 'No thanks button',
		'name' => 'upsell_no_thanks',
		'type' => 'text',
		'parent' => 'field_4_19',
		'parent_layout' => 'field_4_19_0',
	));
	   
   
}

add_action('acf/init', 'my_acf_add_local_field_groups4');

function my_acf_add_local_field_groups5() {

	acf_add_local_field_group(
		array(
			'key' => 'group_5',
			'title' => 'Testimonials',
			'fields' => array(
				array(
					'key' => 'field_5_1',
					'label' => 'Testimonial name',
					'name' => 'testimonial_name',
					'type' => 'text',
				),
				array(
					'key' => 'field_5_2',
					'label' => 'Testimonial headline',
					'name' => 'testimonial_headline',
					'type' => 'text',
				),
				array(
					'key' => 'field_5_3',
					'label' => 'Testimonial text',
					'name' => 'testimonial_text',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_5_4',
					'label' => 'Testimonial image',
					'name' => 'testimonial_image',
					'type' => 'image',
				),
				array(
					'key' => 'field_5_5',
					'label' => 'Testimonial style',
					'name' => 'testimonial_style',
					'type' => 'radio',
					'return_format' => 'label',
					'choices' => array(
						'tripadvisor'	=> 'Tripadvisor',
						'facebook'	=> 'Facebook',
						'google'	=> 'Google',
					),
				),
				array(
					'key' => 'field_5_6',
					'label' => 'Testimonial link for logo image',
					'name' => 'testimonial_link',
					'type' => 'link',
				),
				array (
					'key' => 'field_5_6_2',
					'label' => 'Video iframe block',
					'name' => 'video_iframe_block',
					'type' => 'text',
				),
				array(
					'key' => 'field_5_7',
					'label' => 'Testimonial video image',
					'name' => 'testimonial_video_image',
					'type' => 'image',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'testimonials',
					),
				),
			),
		),
	);
}

add_action('acf/init', 'my_acf_add_local_field_groups5');

function my_acf_add_local_field_groups6() {

	acf_add_local_field_group(
		array(
			'key' => 'group_6',
			'title' => 'Thank you page',
			'fields' => array(
				array(
					'key' => 'field_6_1',
					'label' => 'First headline',
					'name' => 'first_headline_thank_you',
					'type' => 'text',
				),
				array(
					'key' => 'field_6_2',
					'label' => 'Fist content',
					'name' => 'first_content_thank_you',
					'type' => 'wysiwyg',
				),

				array(
					'key' => 'field_6_3',
					'label' => 'Button text',
					'name' => 'button_text_thank_you',
					'type' => 'text',
				),
				array(
					'key' => 'field_6_4',
					'label' => 'Button link',
					'name' => 'button_link_thank_you',
					'type' => 'link',
				),
				array(
					'key' => 'field_6_5',
					'label' => 'Second content',
					'name' => 'second_content_thank_you',
					'type' => 'text',
				),

			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'wffn_ty',
					),
				),
			),
		),
	);
}

add_action('acf/init', 'my_acf_add_local_field_groups6');

function my_acf_add_local_field_groups7()
{

	acf_add_local_field_group(
		array(
			'key' => 'group_7',
			'title' => 'Home page',
			'fields' => array(
				array(
					'key' => 'field_7_001',
					'label' => 'E-book top bar text',
					'name' => 'ebook_top_bar',
					'type' => 'text',
				),
				array(
					'key' => 'field_7_01',
					'label' => 'E-book top bar button text',
					'name' => 'ebook_top_bar_button',
					'type' => 'text',
				),
				array(
					'key' => 'field_7_011',
					'label' => 'E-book top bar button link',
					'name' => 'ebook_top_bar_button_link',
					'type' => 'link',
				),
				array(
					'key' => 'field_7_1',
					'label' => 'Main image home',
					'name' => 'main_image_home',
					'type' => 'image',
				),
				array(
					'key' => 'field_7_02',
					'label' => 'Reviews logos',
					'name' => 'review_logos_hp',
					'type' => 'image',
				),

				array(
					'key' => 'field_7_2',
					'label' => 'First text',
					'name' => 'first_text_home',
					'type' => 'text',
				),

				array(
					'key' => 'field_7_3',
					'label' => 'Second text',
					'name' => 'second_text_home',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_7_3_1',
					'label' => 'Third text',
					'name' => 'third_text_home',
					'type' => 'text',
				),
				array(
					'key' => 'field_7_4',
					'label' => 'Form shortcode',
					'name' => 'form_shortcode_home',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_7_5',
					'label' => 'Headline main section',
					'name' => 'headline_second_sections_home',
					'type' => 'text',
				),
				array(
					'key' => 'field_7_5_1',
					'label' => 'Products',
					'name' => 'products',
					'type' => 'post_object',
					'multiple' => True,
					'post_type' => 'product',
				),
				array(
					'key' => 'field_7_5_2',
					'label' => 'Product card button text',
					'name' => 'product_card_button_text',
					'type' => 'text',
				),
				array(
					'key' => 'field_7_6',
					'label' => 'Courses',
					'name' => 'courses',
					'type' => 'repeater',
					'sub_fields' => array(
						array(
							'key' => 'field_7_6_1',
							'label' => 'Course image',
							'name' => 'course_image',
							'type' => 'image',
						),
						array(
							'key' => 'field_7_6_2',
							'label' => 'Course headline',
							'name' => 'course_headline',
							'type' => 'text',
						),
						array(
							'key' => 'field_7_6_3',
							'label' => 'Course text',
							'name' => 'course_text',
							'type' => 'wysiwyg',
						),
					),
				),
				array(
					'key' => 'field_7_7',
					'label' => 'Name section',
					'name' => 'headline_third_section_home',
					'type' => 'text',
				),
				array(
					'key' => 'field_7_7_1',
					'label' => 'Round photo section',
					'name' => 'image_third_section_home',
					'type' => 'image',
				),
				array(
					'key' => 'field_7_8',
					'label' => 'Content 1',
					'name' => 'content_third_section_home',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_7_14',
					'label' => 'Homepage button',
					'name' => 'homepageButton_link',
					'type' => 'link',
				),
				array(
					'key' => 'field_7_15',
					'label' => 'Homepage button text',
					'name' => 'homepageButton_text',
					'type' => 'text',
				),
				array(
					'key' => 'field_7_9',
					'label' => 'Headline fourth Section',
					'name' => 'headline_fourth_section_home',
					'type' => 'text',
				),
				array(
					'key' => 'field_7_10',
					'label' => 'Content fourth section',
					'name' => 'content_fourth_section_home',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_7_11',
					'label' => 'Testimonials',
					'name' => 'testimonials',
					'type' => 'post_object',
					'multiple' => True,
					'post_type' => 'testimonials',
				),

				array(
					'key' => 'field_7_12',
					'label' => 'Headline fifth Section',
					'name' => 'headline_fifth_section_home',
					'type' => 'text',
				),
				array(
					'key' => 'field_7_13',
					'label' => 'Content fifth section',
					'name' => 'content_fifth_section_home',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_7_16',
					'label' => 'Newsletter form image',
					'name' => 'newsletter_form_image',
					'type' => 'image',
				),
				array(
					'key' => 'field_7_17',
					'label' => 'Newsletter form text',
					'name' => 'newsletter_form_text',
					'type' => 'text',
				),
				array(
					'key' => 'field_7_18',
					'label' => 'Newsletter form shortcode',
					'name' => 'newsletter_shortcode_home',
					'type' => 'text',
				),


			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'page',
					),
				),
			),
		),
	);
}

add_action('acf/init', 'my_acf_add_local_field_groups7');

function my_acf_add_local_field_groups8()
{

	acf_add_local_field_group(
		array(
			'key' => 'group_8',
			'title' => 'Author page',
			'fields' => array(
				array(
					'key' => 'field_8_1',
					'label' => 'Author intro text',
					'name' => 'author_intro_text',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_8_2',
					'label' => 'Author content',
					'name' => 'author_content_text',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_8_3',
					'label' => 'Author e-book image',
					'name' => 'author_ebook_img',
					'type' => 'image',
				),
				array(
					'key' => 'field_8_4',
					'label' => 'Author e-book content',
					'name' => 'author_ebook_content',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_8_5',
					'label' => 'Author signature',
					'name' => 'author_signature',
					'type' => 'image',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_template',
						'operator' => '==',
						'value' => 'template-author.blade.php',
					),
				),
			),
		),
	);
}

add_action('acf/init', 'my_acf_add_local_field_groups8');

function my_acf_add_local_field_groups9()
{

	acf_add_local_field_group(
		array(
			'key' => 'group_9',
			'title' => 'Upsell page - Steps Template',
			'fields' => array(
				array(
					'key' => 'field_9_4',
					'label' => 'Content in box',
					'name' => 'box_content',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_9_5_1',
					'label' => 'Moving button text',
					'name' => 'moving_button_text',
					'type' => 'text',
				),
				array(
					'key' => 'field_9_6',
					'label' => 'After button text',
					'name' => 'after_button_upsell',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_9_7',
					'label' => 'No thanks button text',
					'name' => 'no_thanks_text',
					'type' => 'text',
				),
				array(
					'key' => 'field_9_5',
					'label' => 'Guarantee text',
					'name' => 'guarantee_text_upsell',
					'type' => 'wysiwyg',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_template',
						'operator' => '==',
						'value' => 'template-upsell_steps.blade.php',
					),
				),
			),
		),
	);
}

add_action('acf/init', 'my_acf_add_local_field_groups9');

function my_acf_add_local_field_groups10() {

	acf_add_local_field_group(
		array(
			'key' => 'group_10',
			'title' => 'Reusable Blocks page',
			'fields' => array(
				array(
					'key' => 'field_10',
					'label' => 'About me section',
					'name' => 'about_me_section',
					'type' => 'wysiwyg',
				),

			),
		
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'reusable-blocks',
					),
				),
			),
		),
	);
}

add_action('acf/init', 'my_acf_add_local_field_groups10');

function my_acf_add_local_field_groups11() {

	acf_add_local_field_group(
		array(
			'key' => 'group_11',
			'title' => 'Bonuses',
			'fields' => array(
				array(
					'key' => 'field_11',
					'label' => 'Product bonus image',
					'name' => 'product_bonus_image',
					'type' => 'image',
				),
				array(
					'key' => 'field_11_0',
					'label' => 'Product Bonus Title',
					'name' => 'product_bonus_title',
					'type' => 'text',
				),
				array(
					'key' => 'field_11_1',
					'label' => 'Product Bonus Content',
					'name' => 'product_bonus_content',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_11_2',
					'label' => 'Product Bonus Value',
					'name' => 'product_bonus_value',
					'type' => 'text',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'bonuses',
					),
				),
			),
		),
	);
}

add_action('acf/init', 'my_acf_add_local_field_groups11');



if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Reusable Template Blocks',
		'menu_title'	=> 'Reusable Blocks',
		'menu_slug' 	=> 'reusable-blocks',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}





function frontend_scripts_and_styles()
{

	if ($GLOBALS['pagenow'] !== 'wp-login.php' && !is_admin()) {

		// Deregister WordPress jQuery
		wp_deregister_script('jquery');
		// Load CDN
		wp_register_script('jquery', '//code.jquery.com/jquery-3.6.0.min.js', null, '3.6.0', false);
		wp_enqueue_script('jquery');
	}
}

add_action('wp_enqueue_scripts', 'frontend_scripts_and_styles');

/* FUNNELKIT CHECKOUT EDITOR - SCRIPT AND CSS */

add_action('wp_footer', function () {
?>
	<script>
		(function($) {
			$(document).ready(function() {

				function add_active_class() {
					var paymentLi = '#payment ul.wc_payment_methods li';
					$(paymentLi).each(function() {
						$this = $(this);

						if ($this.hasClass('payment_li_active')) {
							$this.removeClass("payment_li_active");
						}
						if ($(this).children("input[type=radio]").is(':checked')) {
							$this.addClass("payment_li_active");
						}

					});
				}
				$(document.body).on('updated_checkout', function() {
					setTimeout(function() {

						add_active_class();
					}, 100);
				});

				$(document.body).on('change', '#payment ul.wc_payment_methods li > input[type="radio"]', function() {
					add_active_class();
				});
			});

		})(jQuery);
	</script>
<?php

});
add_action('wp_head', function () {
?>
	<style>
		body .wfacp_mini_cart_start_h:not(.oxy) table.shop_table tr.order-total:not(.recurring-total) th span:not(.woocommerce-Price-currencySymbol) {
			color: #000;
		}

		body .wfacp_mini_cart_start_h:not(.oxy) table.shop_table tr.order-total:not(.recurring-total) td span * {
			color: #000;
		}

		.wc_payment_method.payment_method_bacs {
			border: 1px solid #DADADA !important;
			margin-bottom: 20px !important;
			border-radius: 2px !important;
		}

		.wc_payment_method.payment_method_stripe {
			border: 1px solid #DADADA !important;
			margin-bottom: 20px !important;
			border-radius: 2px !important;

		}
		.wfacp-section.wfacp_payment {
			padding-top: 0px !important;
		}
		.wc_payment_method.payment_method_ppcp-gateway {
			border: 1px solid #DADADA !important;
			margin-bottom: 20px !important;
			border-radius: 2px !important;

		}
		.payment_box.payment_method_stripe  input {
			    /* iOS Safari */
				-webkit-touch-callout: auto;
			/* Safari */
			-webkit-user-select: auto;
			/* Konqueror HTML */
			-khtml-user-select: auto;
			/* Firefox */
			-moz-user-select: auto;
			/* Internet Explorer/Edge */
			-ms-user-select: auto;
			/* Non-prefixed version, currently supported by Chrome and Opera */
			user-select: auto;
		}
		@media(max-width: 767px) {
			#wc-stripe-payment-request-button-separator {
				height: 70px;
			}
		}
		.wc_payment_methods.payment_methods.methods {
			text-indent: 0px !important;
		}

		body .select2-results__options {
			text-indent: 0px !important;
		}

		body #billing_last_name_field {
			display: none !important;
		}

		body #billing_address_1_field {
			display: none !important;
		}

		body #billing_city_field {
			display: none !important;
		}

		body #billing_postcode_field {
			display: none !important;
		}

		body #billing_phone_field {
			display: none !important;
		}

		body #billing_state_field {
			display: none !important;
		}

		body #billing_country_field {
			width: 100% !important;
		}

		body #billing_first_name_field {
			width: 100% !important;
		}

		body #shipping_country_field {
			width: 100% !important;
		}

		body .select2-results__option {
			font-size: 14px !important;
		}

		body .woocommerce-privacy-policy-text {
			display: none;
		}

		body .wfacp-payment-dec {
			display: none;
		}

		body .woocommerce-notices-wrapper {
			display: none;
		}

		/*body .wfacp-coupon-section.wfacp_custom_row_wrap.clearfix {
display:none;
}*/
		body .wfacp-notices-wrapper {
			display: none;
		}

		body #wfacp-e-form .wfacp_main_form .wfacp-comm-title {
			margin-bottom: 20px !important;
		}

		body .wfacp_main_form .woocommerce-checkout #payment ul.payment_methods li.payment_method_paypal a.about_paypal {
			display: none;
		}

		body #place_order {
			border-radius: 10px !important;
		}

		body #wfacp-e-form .wfacp_main_form .woocommerce-checkout .wfacp-order-place-btn-wrap {
			margin-top: 20px;
		}

		body #wfacp-e-form .wfacp_main_form .woocommerce-checkout .button.button#place_order {
			background-color: #04C100 !important;
			line-height: 1;
			font-size: 32px !important;
			display: flex;
			justify-content: center;
			font-family: Open Sans;
			align-items: center;
		}

		@media(max-width:467px) {
			body #wfacp-e-form .wfacp_main_form .woocommerce-checkout .button.button#place_order {
				font-size: 30px !important;
				line-height: 1 !important;
				padding: 14px 25px !important;
			}
		}

		body #wfacp-e-form .wfacp_main_form .woocommerce-checkout .button.button#place_order:hover {
			background-color: #289f25 !important;
		}

		body #wfacp-e-form .wfacp_main_form .woocommerce-checkout .button.button#place_order:before {
			display: inline-block;
			content: "";
			background-image: url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/buy-now.svg')); ?>);
			width: 47px;
			height: 40px;
			background-size: contain;
			background-repeat: no-repeat;
			margin-right: 20px;
		}
		/*hide default payment options images*/

		body #wfacp-e-form .wfacp_main_form.woocommerce #payment ul.payment_methods li label img {
			display: none;
		}

		body .wfacp_internal_form_wrap.wfacp-comm-title.none.margin-top {
			display: none !important;
		}


		/*order summary above buy button*/

		/*@media only screen and (min-width: 768px) {
  body #wfacp_order_summary_in_payment {
    display:none;
  }
  body .wfacp-order-summary-label {
  display:none!Important;
}
}*/

		/*mini cart*/

		body #wfacp-e-form .wfacp_desktop .wfacp_mb_mini_cart_wrap {
			display: none;
		}

		body .wfacp_mini_cart_start_h tr.cart_item.wfacp_delete_active td.product-total {
			padding-bottom: 0px !important;
		}

		body .wfacp_mini_cart_start_h table.shop_table tr td {
			padding: 0px !important;
		}

		body .product-image {
			display: none !important;
		}

		body .product-quantity {
			display: none !important;
		}

		body .wfacp_cart_product_name_h {
			display: none !important;
		}

		body .wfacp_mini_cart_start_h .wfacp_order_sum td.product-name-area .product-name.wfacp_summary_img_true {
			padding-left: 0px !important;
		}

		body .green-price {
			padding-bottom: 8px !important;
			padding-top: 8px !important;
		}



		body .green-discount bdi:first-of-type {
			color: #FF0000 !important;
			font-weight: 600;
			font-size: 16px !important;
		}

		body .green-discount span:first-of-type {
			color: #FF0000 !important;
			font-size: 16px !important;
		}


		body table.shop_table tr.order-total td strong>span {
			font-size: 24px !important;
		}

		body .wfob_pro_img_wrap {
			border: none !important;
		}

		body #wfacp-e-form .woocommerce-checkout #payment ul.payment_methods label[for="payment_method_stripe"]:before {
			content: "Popular Choice";
			display: inline-flex;
			background-color: #00AB30;
			color: #fff;
			font-size: 12px;
			padding: 4px;
			font-weight: 600;
			float: right;
			position: absolute;
			right: 14px;
			border-radius: 2px;
			top: 16px;
		}

		body #wfacp-e-form .woocommerce-checkout #payment ul.payment_methods {
			border: 0px !important;
		}

		body .wfacp_main_form .woocommerce-checkout #payment ul.payment_methods li.payment_li_active {
			border: 1px solid #00AB30 !important;
		}

		body #wfacp-e-form .woocommerce-checkout #payment input#payment_method_stripe:first-child::after {
			content: url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/credit-card.png')); ?>);
			display: inline-block;
			margin-left: 93px;
			margin-top: -16px;
			position: absolute;
			transform: scale(0.5);
		}

		body #wfacp-e-form .woocommerce-checkout #payment input#payment_method_ppcp-gateway:first-child::after {
			content: url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/paypal.png')); ?>);
			display: inline-block;
			margin-left: 55px;
			margin-top: -7px;
			position: absolute;
			transform: scale(0.5);
		}

		body .wfob_wrap_start .wfob_checkbox:checked:before {
			content: "\f147";
			margin: -3px 0px 0px -2px !important;
			color: transparent;
			float: left;
			display: inline-block;
			vertical-align: middle;
			width: 18px;
			height: 20px;
			font: normal 78px/1 dashicons;
			speak: none;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			background: url(<?php echo esc_url(get_theme_file_uri('./resources/assets/images/icon-check-green.png')); ?>) center center !important;
			margin-top: -3px;
			margin-left: -2px;
			background-size: contain !important;
			top: 30%;
		}

		body .woocommerce-checkout #payment ul.payment_methods li .stripe-credit-card-brand {
			display: none;
		}

		body #wfacp-e-form .wfacp_main_form .wfacp_section_title {
			font-size: 32px !important;
			font-weight: 400 !important;
			color: #131313 !important;
			margin-bottom: 0px !important;;
		}

		body .wfacp_form_cart table.shop_table tbody tr.cart_item td span:not(.wfacp-pro-count) {
			color: #131313 !important;
			font-size: 16px;
			font-weight: 400;
		}

		body .wfacp_form_cart table.shop_table tr.order-total th {
			font-size: 25px;
			font-weight: 600;
		}

		body .wfacp_mini_cart_start_h table.shop_table tr.order-total th {
			padding-top: 0px !important;
		}

		body .wfacp-left-panel.wfacp_page.embed_form.single_step.wfacp_last_page {
			background-color: transparent;
			box-shadow: 0px 8px 16px rgb(0 0 0 / 8%);
		}

		body .wfacp_main_form.woocommerce .wfacp-section.wfacp_payment {
			margin-bottom: 0;
			margin-top: 0px;
			padding: 20px;
			/* box-shadow: 0px 8px 16px rgb(0 0 0 / 8%); */
			width: 100%;

		}

		body .wfacp-section.wfacp-hg-by-box.step_0.form_section_single_step_0_embed_forms_2 {
			/* box-shadow: 0px 8px 16px rgb(0 0 0 / 8%); */
			padding: 20px;
			margin-bottom: 0px;
		}

		body #wfacp-e-form .wfacp_form .wfacp-inner-form-detail-wrap {
			padding: 0px !important;
			background-color: transparent;
		}

		body .wfacp_main_form.woocommerce input[type=checkbox]:checked:before {
			filter: grayscale(100%) brightness(80%) sepia(300%) hue-rotate(50deg) saturate(500%);
		}

		body .wfacp-section.wfacp-hg-by-box.step_1.form_section_single_step_1_embed_forms_2.wfacp_shipping_method.wfacp_shipping_method {
			display: none !important;
		}

		body .wfacp-section.wfacp-hg-by-box.step_3.form_section_single_step_3_embed_forms_2.wfacp_order_summary_box {
			display: none !important;
		}

		body .wfacp-section.wfacp-hg-by-box.step_2.form_section_single_step_2_embed_forms_2.wfacp_product_switcher.wfacp_order_coupon_box.wfacp_order_coupon_box {
			display: none !important;
		}

		body .wfacp_form_cart table.shop_table tbody tr.cart_item td bdi {
			color: #131313;
		}

		body .woocommerce-form-login-toggle {
			display: none;
		}

		body .select2-container--default .select2-results__option[data-selected=true] {
			background: #6799b2 !important;
		}

		body ins {
			text-decoration: none !important;
		}

		body .wfacp_form_cart table.shop_table tbody tr.cart_item td {
			color: #131313 !important;
			padding-top: 12px !important;
			padding-bottom: 12px !important;
		}

		body label[for="stripe-cvc-element"]::after {
			content: url("/wp-content/uploads/hIO6HL.tif.png");
			transform: scale(0.20);
			display: inline-block;
			margin-left: -30px;
			position: absolute;
			margin-top: -33px;
		}


		@media (max-width:479px) {
			body #wfacp-e-form .wfacp_main_form .wfacp_section_title {
				font-size: 25px !important;
			}

			body .wfacp_form_cart table.shop_table tbody tr.cart_item td span:not(.wfacp-pro-count) {
				padding-bottom: 8px;
			}

			body .wfacp_form_cart {
				padding: 0px !important;
			}
		}

		@media (max-width:744px) {
			body #wfacp-e-form .wfacp_main_form .wfacp_section_title {
				font-size: 25px !important;
			}

			body .wfacp_form_cart table.shop_table tbody tr.cart_item td span:not(.wfacp-pro-count) {
				padding-bottom: 8px;
			}

			body .wfacp_form_cart {
				padding: 0px !important;
			}

			body .wfacp-section.wfacp-hg-by-box.step_0.form_section_single_step_0_embed_forms_2 {
				margin-top: -42px !important;
			}
		}

		@media (max-width:991px) {
			body #wfacp-e-form .wfacp_main_form .wfacp_section_title {
				font-size: 28px !important;
			}
		}

		@media (min-width:768px) and (max-width:991px) {
			.wfob_contentBox.wfob_clear {
				display: flex !important;
				flex-direction: column !important;
				align-items: center !important;
			}

			.wfob_text_inner {
				margin-top: 8px !important;
			}
		}

		#shipping_same_as_billing_field {
			display: none !important;
		}

		#wfacp_order_summary_in_payment {
			display: none;
		}

		.wfacp-payment-dec {
			display: none;
		}

		/*.wfacp_woocommerce_form_coupon{
display: none;
}*/
		.cart-subtotal {
			display: none;
		}

		body.wfacpef_page #wfacp-e-form .wfacp_main_form.woocommerce .wfacp-section.wfacp_order_coupon_box {
			display: none;
		}

		.wfacp_order_summary_box {
			display: none;
		}

		.wfacp_shipping_method {
			display: none;
		}

		body #wfob_wrap .wfob_bgBox_table.no_table {
			padding: 2px !important;
		}

		body .wfob_bump_wrapper.wfacp_below_mini_cart_items {
			display: none !important;
		}

		body #wfacp-e-form .wfacp_main_form.woocommerce .wfacp-form-control-wrapper {
			margin-bottom: 14px !important;
		}

		body .wfacp_main_form.woocommerce input[type=checkbox]:checked:before {
			margin-top: -4px !important;
			margin-left: -2px !important;
		}

		body .wfob_bump .wfob_contentBox ul li {
			margin-top: 6px !important;
		}

		body #wfob_wrap .wfob_bgBox_table.no_table {
			background: #FEF9E9 !important;
		}

		body .wfacp_main_form .wfob_bump_wrapper {
			padding: 0px;
		}

		body #wfacp-e-form .wfacp_main_form p {
			font-size: 14px !important;
		}


		body .wfacp_showcoupon {
			color: var(--primary) !important;
			text-decoration: underline;
			font-weight: 700;
		}

		.gform_wrapper.gravity-theme .gfield textarea.large {
			border: 1px solid #ddd;
			border-radius: 10px
		}

		.wp-caption-text {
			text-align: center;
			margin-bottom: 12px;
		}

		@media only screen and (max-width: 600px) {
			figure {
				width: auto !important;
			}
		}

		body #wfacp-e-form .wfacp_main_form p {
			font-size: 14px !important;
		}

		body .wfacp_form_cart {
			margin-bottom: 24px;
			padding-top: 8px !important;
		}
		

		.aligncenter {
			margin: auto;
		}

		/*Bump offers*/
		.wfob_text_inner>p {
			font-size: 14px !important;
		}

		.wfob_wrap_start .wfob_outer .wfob_Box .wfob_contentBox .wfob_pro_txt_wrap ul li {
			font-size: 14px !important;
			padding-left: 12px !important;
		}

		body .wfacp_main_form.woocommerce input[type="checkbox"]:checked:before {
			top: 30% !important;
			width: 18px !important;
		}

		body .wfacp_main_form.woocommerce input[type="radio"]:checked:before {
			background-color: #00ab30 !important;
		}

		
		body .wfob_bump_wrapper.woocommerce_checkout_order_review_below_payment_gateway {
			display: none !important;
			margin-top: 0px !important;
		} 

		body .wfacp-e-form .clearfix:before {
			display: none !important;
		}

		body .wfacp_main_form .wfob_bump_wrapper {
			margin-bottom: 0px !important;
		}

		body #wfacp-e-form .wfacp_main_form ul li {
			line-height: 1.5 !important;
			margin-top: 0px !important;
		}

		body .wfob_bump.wfob_clear.wfob_img_position_left {
			border: 3px dashed #FF0000 !important;
		}

		body #wfob_wrap .wfob_bgBox_table .wfob_bgBox_cell span {
			font-size: 14px !important;
		}

		body .wfob_bump .wfob_bgBox_table .wfob_title {
			font-size: 14px !important;
		}

		body #wfacp-e-form .wfob_order_wrap.wfob_content_bottom_wrap * {
			line-height: 1.5;
		}

		body #wfacp-e-form,
		body #wfacp-e-form p {
			font-family: 'barlow' !important;
		}

		@media(max-width:767px) {
			#payment .wfob_bump_wrapper.woocommerce_checkout_order_review_above_payment_gateway {
				display: none !important;
			}
		}

		@media(min-width:768px) {
			#div-included .wfob_bump_wrapper.woocommerce_checkout_order_review_above_payment_gateway {
				display: none !important;
			}
		}
		
		/**PRODUCTS YOU SAVE */
		body .wfacp_product_sec_start {
			display: none !important;
		}
		body .wfacp_ps_title_wrap {
			max-width: 100% !important;
			flex: 0 0 100% !important;
		}
		body #product_switching_field .wfacp_product_switcher_col_2 .wfacp_product_switcher_description {
			display: flex;
			flex-direction: row;
			align-items: center;
	
		}
		body .product-checkout-choose {
			box-shadow: 0px 8px 16px rgb(0 0 0 / 8%);
			background-color: white;
			z-index: 5;
			position: relative;
		}
	
		@media(max-width: 767px) {
			body .product-checkout-choose.desktop {
				display: none;
			}
		}
	
		body .product-checkout-choose .wfacp_product_switcher {
			display: flex;
		}
	
		body .wfacp-comm-form-detail {
			width: 100%;
		}
		body .wfacp_product_switcher_description .wfacp_ps_div_row {
			max-width: max-content;
    		width: -webkit-fill-available;
			margin-left: auto;
		}
		body .wfacp_you_save_text {
			margin: 0px !important;
			color: black !important;
			font-size: 14px !important;
		}
		body .wfacp_product_switcher_container .woocommerce-cart-form__cart-item:nth-child(2) .wfacp_you_save_text {
			font-weight: 700;
		}
		body .woocommerce-checkout {
			box-shadow: none;
			background-color: white;
		}
		@media(max-width: 767px) {
			body .woocommerce-checkout {
				margin-top: 20px !important;
			}
		}
		body .wfacp-product-switch-panel {
			margin-bottom: 0px !important;
			padding: 0px !important;
		}
		body .wfacp-product-switch-panel .wfacp-product-switch-title {
   			color: #737373;
			padding: 0 10px 10px 0;
			font-size: 14px !important;
			display: inline-flex;
			width: 100%;
		}
		body .wfacp-product-switch-title .product-remove {
			padding-right: 10px;
			width: 100% !important;
			padding-left: 10px;
		}
		body .wfacp-product-switch-title .wfacp_qty_price_wrap {
			display: none;
		}
		body .wfacp_qty_price_wrap .product-name {
			text-align: right;
			width: 100%;
		}
		body #product_switching_field.wfacp-product-switch-panel .cart_item:first-child {
			margin-top: 0px;
		} 
		body .wfacp_product_switcher_description .product_name {
			padding-left: 10px;
			width: 70%;
			height: 50px;
			display: flex;
			align-items: center;
		}
		body .wfacp_product_sec, body .wfacp_product_name_inner, body .wfacp_product_choosen_label_wrap, body .wfacp_product_choosen_label,  body .wfacp_product_switcher_item {
			width: 100%;
			height: 100%;
			display: flex;
			align-items: center;
		}
		body  .wfacp_product_switcher_item  {
			position: absolute;
			left: 0;
			right: 0;
			width: 100%;
			padding-left: 25px;
			padding-right: 30%;
			display: contents;
		}
		body #product_switching_field.wfacp-product-switch-panel .cart_item {
			margin-top: 15px;
			position: absolute;
			padding: 8px  !important;
		}
		body .wfacp-selected-product {
			background-color: #f7f7f7;
			border-color: #e6e6e6;
		}
		body #product_switching_field.wfacp-product-switch-panel .woocommerce-cart-form__cart-item.cart_item {
    		padding: 10px;
			position: relative;
		}
		body #product_switching_field.wfacp-product-switch-panel .wfacp-selected-product {
			border: 1px solid #00AB30;
		}
		body .woocommerce-cart-form__cart-item.cart_item {
			border: 1px solid #ddd;
		}
		body .woocommerce-cart-form__cart-item.cart_item .wfacp_row_wrap {
			position: relative;
			display: flex;
		}
		body #product_switching_field.wfacp_not_force_all .wfacp_ps_title_wrap {
			display: flex;
		}
		body .wfacp_product_switcher_col_2 {
			 padding-left: 0; 
			padding-right: 0;
			width: 100%;
		}
	
		body .wfacp_ps_title_wrap .wfacp_product_switcher_col_1 input[type="radio"] {
			cursor: pointer;
			display: inline-block;
			left: 0;
			width: 16px;
			min-width: 16px;
			height: 16px;
		}
		@media(min-width:540px) {
			body .wfacp_product_switcher {
				padding: 1px 15px;
			}
		}
		body .wfacp_product_switcher_col.wfacp_product_switcher_col_1  {
			display: flex;
			align-items: center;
		}
		body .wfacp_form_cart .wfacp-order-summary-label {
			font-weight: 500;
			font-size: 32px;
		}
		body #wfacp-e-form .wfacp_main_form .wfacp_section_title {
			font-family: 'barlow' !important;
		}
		body #wfacp-e-form .wfacp_main_form .form-row input[type=email], body #wfacp-e-form .wfacp_main_form .form-row input[type=email]:focus,
		body #wfacp-e-form .wfacp_main_form .form-row input[type=email]:active {
			background: url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/email.png')); ?>)
				no-repeat scroll 0 1px transparent;
			display: block;
			background-position: right 12px bottom 12px;
			background-size: 24px;
			width: 100%;
		}
		body #wfacp-e-form .wfacp_main_form .form-row input#billing_first_name, body #wfacp-e-form .wfacp_main_form .form-row input#billing_first_name:focus,
		body #wfacp-e-form .wfacp_main_form .form-row input#billing_first_name:active {
			background: url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/user-name.svg')); ?>)
				no-repeat scroll 0 1px transparent;
			display: block;
			background-position: right 12px bottom 12px;
			background-size: 24px;
			width: 100%;
		}
	</style>
	<?php
});



/* CUSTOM FORMATING FOR WYSIWYG EDITOR*/

function add_style_select_buttons($buttons)
{
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'add_style_select_buttons');

//add custom styles to the WordPress editor
function my_custom_styles($init_array)
{

	$style_formats = array(
		// These are the custom styles
		array(
			'title' => 'Headline h2 - sales page',
			'block' => 'span',
			'classes' => 'headline-h2-sales-page',
			'wrapper' => true,
		),
		array(
			'title' => 'Headline h1 - sales page',
			'block' => 'span',
			'classes' => 'headline-h1-sales-page',
			'wrapper' => true,
		),
		array(
			'title' => 'Subheading h2 - sales page',
			'block' => 'span',
			'classes' => 'subheading-h2-sales-page',
			'wrapper' => true,
		),
		array(
			'title' => 'Headline h2 - sales page - no margin top',
			'block' => 'span',
			'classes' => 'headline-h2-sales-page-no-margin-top',
			'wrapper' => true,
		),
		array(
			'title' => 'Headline h3 - sales page - subheadline',
			'block' => 'span',
			'classes' => 'headline-h3-sales-page-subheadline',
			'wrapper' => true,
		),
		array(
			'title' => 'Headline h3 - sales page - align left',
			'block' => 'span',
			'classes' => 'headline-h3-sales-page-align-left',
			'wrapper' => true,
		), array(
			'title' => 'Headline h2 - sales page - no margin top',
			'block' => 'span',
			'classes' => 'headline-h2-sales-page-no-margin-top',
			'wrapper' => true,
		),
		array(
			'title' => 'Headline h3 - sales page',
			'block' => 'span',
			'classes' => 'headline-h3-sales-page',
			'wrapper' => true,
		),
		array(
			'title' => 'Paragraph - sales page ',
			'block' => 'span',
			'classes' => 'paragraph-sales-page',
			'wrapper' => true,
		),
		array(
			'title' => 'Bullets - sales page ',
			'block' => 'span',
			'classes' => 'bullets-sales-page',
			'wrapper' => true,
		),
		array(
			'title' => 'Black bullets',
			'block' => 'div',
			'classes' => 'black-bullets',
			'wrapper' => true,
		),
		array(
			'title' => 'Green check - upsell page ',
			'block' => 'span',
			'classes' => 'check-upsell-page-green',
			'wrapper' => true,
		),
		array(
			'title' => 'Check - sales page ',
			'block' => 'span',
			'classes' => 'check-sales-page',
			'wrapper' => true,
		),
		array(
			'title' => 'Check - sales page green ',
			'block' => 'span',
			'classes' => 'check-sales-page-green',
			'wrapper' => true,
		),
		array(
			'title' => 'Check - sales page orange ',
			'block' => 'span',
			'classes' => 'check-sales-page-orange',
			'wrapper' => true,
		),
		array(
			'title' => 'Highlight text ',
			'block' => 'span',
			'classes' => 'highlight-text',
			'wrapper' => true,
		),
		array(
			'title' => 'List numbers',
			'block' => 'div',
			'classes' => 'list-numbers',
			'wrapper' => true,
		),
		array(
			'title' => 'Arrow right - author page',
			'block' => 'span',
			'classes' => 'arrow-r-author',
			'wrapper' => true,
		),
		array(
			'title' => 'Headline h2 - author page',
			'block' => 'span',
			'classes' => 'headline-h2-author-page',
			'wrapper' => true,
		),
		array(
			'title' => 'Headline h2 red - upsell',
			'block' => 'span',
			'classes' => 'headline-red',
			'wrapper' => true,
		),
		array(
			'title' => 'Paragraph red - upsell',
			'block' => 'span',
			'classes' => 'paragraph-red',
			'wrapper' => true,
		),
		array(
			'title' => 'Italic bold - Upsell',
			'block' => 'span',
			'classes' => 'italic-bold',
			'wrapper' => true,
		),
		array(
			'title' => 'Infinity bullet ',
			'block' => 'span',
			'classes' => 'infinity-bullet',
			'wrapper' => true,
		),
		array(
			'title' => 'Gift bullet ',
			'block' => 'span',
			'classes' => 'gift-bullet',
			'wrapper' => true,
		),
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode($style_formats);

	return $init_array;
}
// Attach callback to 'tiny_mce_before_init' 
add_filter('tiny_mce_before_init', 'my_custom_styles');



//MINI CART PRICE ON CHECKOUT

function show_sale_price_at_checkout($subtotal, $cart_item, $cart_item_key)
{


	$product = $cart_item['data'];
	$quantity = $cart_item['quantity'];
	if (!$product) {
		return $subtotal;
	}
	$regular_price = '';
	$sale_price = '';
	$suffix = '';
	if ($product->is_taxable()) {
		if ('excl' === WC()->cart->tax_display_cart) {
			$regular_price = wc_get_price_excluding_tax($product, array('price' => $product->get_regular_price(), 'qty' => $quantity));
			$sale_price    = wc_get_price_excluding_tax($product, array('price' => $product->get_sale_price(), 'qty' => $quantity));
			if (WC()->cart->prices_include_tax && WC()->cart->tax_total > 0) {
				$suffix .= ' ' . WC()->countries->ex_tax_or_vat() . '';
			}
		} else {
			$regular_price = wc_get_price_including_tax($product, array('price' => $product->get_regular_price(), 'qty' => $quantity));
			$sale_price = wc_get_price_including_tax($product, array('price' => $product->get_sale_price(), 'qty' => $quantity));
			if (!WC()->cart->prices_include_tax && WC()->cart->tax_total > 0) {
				$suffix .= ' ' . WC()->countries->inc_tax_or_vat() . '';
			}
		}
	} else {
		$pr_pr   = $product->get_price();
		$sale_pr = $product->get_sale_price();
		if ($sale_pr > 0) {
			$sale_price = $sale_pr * $quantity;
		}
		if ($pr_pr > 0) {
			$regular_price = $pr_pr * $quantity;
		}
	}

	$rg_price = $product->get_regular_price();
	if ($product->is_on_sale() && !empty($sale_price) && (round($rg_price, 2) !== round($sale_price, 2))) {
		$price = wc_format_sale_price(wc_get_price_to_display($product, array(
			'price' => $product->get_regular_price(),
			'qty'   => $quantity
		)), wc_get_price_to_display($product, array('qty' => $quantity))) . $product->get_price_suffix();
	} else {
		$price = wc_price($regular_price) . $product->get_price_suffix();
	}

	$price = $price . $suffix;
	return $price;
}
add_filter('woocommerce_cart_item_subtotal', 'show_sale_price_at_checkout', 10, 3);

//DISPLAY YOU SAVE PRICE IN MINI CART
class WFACP_TempDisplay_Discount
{

	public $discount_price = 0;

	public function __construct()
	{
		add_filter('wfacp_woocommerce_cart_item_subtotal_except_subscription', '__return_false');
		add_action('wfacp_woocommerce_cart_item_subtotal_except_subscription_placeholder', [$this, 'display_cut_price'], 10, 3);

		add_action('woocommerce_review_order_before_order_total', [$this, 'add_discount_row']);
		add_filter('woocommerce_cart_subtotal', [$this, 'cart_content_subtotal'], 10, 3);
	}

	public function display_cut_price($_product, $cart_item, $cart_item_key)
	{

		$quantity              = $cart_item['quantity'];
		$product_id            = $_product->get_id();
		$product               = wc_get_product($product_id);
		$product_regular_price = $product->get_regular_price();
		$product_regular_price *= $quantity;
		$subtotal              = WFACP_Common::get_product_subtotal($_product, $cart_item, true);


		if ($subtotal > 0 && $product_regular_price > 0 && (round($subtotal, 2) !== round($product_regular_price, 2))) {
			if ($subtotal > $product_regular_price) {
				echo wc_price($subtotal);
			} else {
				echo wc_format_sale_price($product_regular_price, $subtotal);
			}
		}
	}

	public function add_discount_row()
	{
		$cart_contents = WC()->cart->get_cart_contents();
		$regular_price = 0;

		foreach ($cart_contents as $content) {
			$product = $content['data'];

			if ($product instanceof WC_Product) {

				//	$product=wc_get_product($product->get_id());
				//This line show discount base on the regular price of the price
				$quantity = $content['quantity'];
				if (wp_doing_ajax() && isset($content['_wfacp_options'])) {
					$org_qty  = $content['_wfacp_options']['org_quantity'];
					$quantity = $quantity / $org_qty;
				}

				$regular_price = $regular_price + ($quantity * $product->get_regular_price());

				// if you want discount base on subtotal and coupon then comment above line of code and uncomment below line of code
				//$regular_price = $regular_price + ( $content['line_subtotal']  );
			}
		}

		$tax = WC()->cart->get_subtotal_tax();
		$total = WC()->cart->get_cart_contents_total();
		if ($regular_price > $total) {
	?>
			<tr class="order-total">
				<th class="green-price"><?php _e('<span style=font-size:16px;font-weight:600;color:#FF0000;>You Save:</span>', 'woocommerce'); ?></th>
				<td class="green-discount"><?php echo wc_price(- ($regular_price - $total - ($tax))); ?></td>
			</tr>
	<?php
		}
	}

	function cart_content_subtotal($cart_subtotal, $compound, $cart)
	{
		$regular_price = 0;

		$aelia = WFACP_Plugin_Compatibilities::get_compatibility_class('aelia_cs');
		foreach ($cart->cart_contents as $content) {
			$product = $content['data'];

			if ($product instanceof WC_Product) {

				//This line show discount base on the regular price of the price
				$quantity = $content['quantity'];

				if (wp_doing_ajax() && isset($content['_wfacp_options'])) {
					$org_qty  = $content['_wfacp_options']['org_quantity'];
					$quantity = $quantity / $org_qty;
				}

				$regular_price = $regular_price + ($quantity * $product->get_regular_price());
				//$regular_price = $regular_price + ( $quantity * $product->get_price() );
			}
		}

		//$regular_price=$aelia->get_price_in_currency($regular_price);

		/**
		 * If the cart has compound tax, we want to show the subtotal as cart + shipping + non-compound taxes (after discount).
		 */
		if ($compound) {
			$cart_subtotal = wc_price($regular_price + $cart->get_shipping_total() + $cart->get_taxes_total(false, false));
		} elseif ($cart->display_prices_including_tax()) {
			$cart_subtotal = wc_price($regular_price + $cart->get_subtotal_tax());

			if ($cart->get_subtotal_tax() > 0 && !wc_prices_include_tax()) {
				$cart_subtotal .= ' <small class="tax_label">' . WC()->countries->inc_tax_or_vat() . '</small>';
			}
		} else {
			$cart_subtotal = wc_price($regular_price);

			if ($cart->get_subtotal_tax() > 0 && wc_prices_include_tax()) {
				$cart_subtotal .= ' <small class="tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
			}
		}

		return $cart_subtotal;
	}
}

new WFACP_TempDisplay_Discount();


/*change_text_on_order_summary*/
function title_html()
{
	?>
	<div class="wfacp_internal_form_wrap wfacp-comm-title none margin-top">
		<h2 class="wfacp_section_heading wfacp_section_title wfacp-normal wfacp-text-left">
			<?php echo __('SUMMARY OF YOUR ORDER', 'woofunnels-aero-checkout') ?></h2>
	</div>
<?php
}
?>
<?php
add_action('wfacp_checkout_page_found', 'order_summary_position');
add_action('wfacp_before_process_checkout_template_loader', 'order_summary_position');

function order_summary_position()
{
	/* Add data in variables */
	add_action('process_wfacp_html', 'layout_order_summary_1', 10, 4);

	/* display order summary below payment gateway  */
	add_action('woocommerce_before_template_part', 'below_payment_sec', 99999, 2);

	add_action('wfacp_internal_css', 'internal_css_order_summary');
}

add_filter('wfacp_html_fields_order_summary', function ($val) {
	WFACP_Common::remove_actions('process_wfacp_html', 'WFACP_Common', 'order_summary_html');

	return false;
}, 5);

add_filter('wfacp_html_fields_order_coupon', function ($val) {
	WFACP_Common::remove_actions('process_wfacp_html', 'WFACP_Common', 'order_summary_html');

	return false;
}, 10);

function layout_order_summary_1($field, $key, $args, $value)
{

	if ('order_summary' === $key) {
		WC()->session->set('wfacp_order_summary_' . WFACP_Common::get_id(), $args);
	} elseif ('order_coupon' === $key) {

		WC()->session->set('wfacp_order_coupon_' . WFACP_Common::get_id(), $args);
	}
}

function internal_css_order_summary()
{
	echo ' <style>';
	printf(' body .wfacp_order_summary{padding: 0;}');
	printf(' body #order_coupon_field{padding: 0;}');
	printf(' body #order_coupon_field .wfacp_custom_row_wrap{text-align: left;}');
	printf(' body #wfacp_order_summary_in_payment {clear:both;}');
	printf(' body .margin-top { margin-top: 20px;}');
	echo ' </style>';
}

function below_payment_sec($template_name, $template_path)
{
	if ('checkout/terms.php' === $template_name) {
		title_html();
		$args1 = WC()->session->get('wfacp_order_summary_' . WFACP_Common::get_id());

		$instance = WFACP_Core()->template_loader->get_template_ins();

		echo "<div id=wfacp_order_summary_in_payment>";
		include WFACP_TEMPLATE_COMMON . '/order-coupon.php';
		WFACP_Common::order_summary_html('');
		echo "</div>";
	}
}

//TERMS AND CONDITIONS CHECKED BY DEFAULT
function patricks_wc_terms($terms_is_checked)
{
	return true;
}
add_filter('woocommerce_terms_is_checked_default', '__return_true');

//CHECKOUT FIELDS 
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
add_filter('wfacp_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields)
{

	unset($fields['billing']['billing_address_1']['required']);
	unset($fields['billing']['select2-billing_state-container']['required']);
	unset($fields['billing']['billing_city']['required']);
	unset($fields['billing']['billing_postcode']['required']);
	//unset( $fields['billing']['billing_country']['required'] );
	unset($fields['billing']['billing_last_name']['required']);

	return $fields;
}


//CHANGE ORDER TO COMPLETED
add_action('woocommerce_order_status_processing', 'processing_to_completed');

function processing_to_completed($order_id)
{

	$order = new WC_Order($order_id);
	$order->update_status('completed');
}
//DISPLAY PRODUCT NAMES IN ORDER
add_action('manage_shop_order_posts_custom_column', 'custom_orders_list_column_content', 20, 2);
function custom_orders_list_column_content($column, $post_id)
{
	global $the_order, $post;

	if ('order_status' === $column) {
		$products_names = []; // Initializing

		// Loop through order items
		foreach ($the_order->get_items() as $item) {
			$product = $item->get_product(); // Get the WC_Product object
			$products_names[]  = $item->get_name(); // Store in an array
		}
		// Display
		echo '<ul style="list-style: none;"><li>' . implode('</li><li>', $products_names) . '</li></ul>';
	}
}

//FILTER BY PAYMENT METHOD
defined('ABSPATH') or exit;

// fire it up!
add_action('plugins_loaded', 'wc_filter_orders_by_payment');


/** 
 * Main plugin class
 *
 * @since 1.0.0
 */
class WC_Filter_Orders_By_Payment
{


	const VERSION = '1.0.0';

	/** @var WC_Filter_Orders_By_Payment single instance of this plugin */
	protected static $instance;

	/**
	 * Main plugin class constructor
	 *
	 * @since 1.0.0
	 */
	public function __construct()
	{

		if (is_admin()) {

			// add bulk order filter for exported / non-exported orders
			add_action('restrict_manage_posts', array($this, 'filter_orders_by_payment_method'), 20);
			add_filter('request',               array($this, 'filter_orders_by_payment_method_query'));
		}
	}


	/** Plugin methods ***************************************/


	/**
	 * Add bulk filter for orders by payment method
	 *
	 * @since 1.0.0
	 */
	public function filter_orders_by_payment_method()
	{
		global $typenow;

		if ('shop_order' === $typenow) {

			// get all payment methods, even inactive ones
			$gateways = WC()->payment_gateways->payment_gateways();

?>
			<select name="_shop_order_payment_method" id="dropdown_shop_order_payment_method">
				<option value="">
					<?php esc_html_e('All Payment Methods', 'wc-filter-orders-by-payment'); ?>
				</option>

				<?php foreach ($gateways as $id => $gateway) : ?>
					<option value="<?php echo esc_attr($id); ?>" <?php echo esc_attr(isset($_GET['_shop_order_payment_method']) ? selected($id, $_GET['_shop_order_payment_method'], false) : ''); ?>>
						<?php echo esc_html($gateway->get_method_title()); ?>
					</option>
				<?php endforeach; ?>
			</select>
	<?php
		}
	}


	/**
	 * Process bulk filter order payment method
	 *
	 * @since 1.0.0
	 *
	 * @param array $vars query vars without filtering
	 * @return array $vars query vars with (maybe) filtering
	 */
	public function filter_orders_by_payment_method_query($vars)
	{
		global $typenow;

		if ('shop_order' === $typenow && isset($_GET['_shop_order_payment_method']) && !empty($_GET['_shop_order_payment_method'])) {

			$vars['meta_key']   = '_payment_method';
			$vars['meta_value'] = wc_clean($_GET['_shop_order_payment_method']);
		}

		return $vars;
	}


	/** Helper methods ***************************************/


	/**
	 * Main WC_Filter_Orders_By_Payment Instance, ensures only one instance is/can be loaded
	 *
	 * @since 1.0.0
	 * @see wc_filter_orders_by_payment()
	 * @return WC_Filter_Orders_By_Payment
	 */
	public static function instance()
	{

		if (is_null(self::$instance)) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}


/**
 * Returns the One True Instance of WC_Filter_Orders_By_Payment
 *
 * @since 1.0.0
 * @return WC_Filter_Orders_By_Payment
 */
function wc_filter_orders_by_payment()
{
	return WC_Filter_Orders_By_Payment::instance();
}

//PRICE DOESN'T CHANGE BASED ON TAX
add_filter('woocommerce_adjust_non_base_location_prices', '__return_false');

//Show Bump on load page and disable Css printing in ajax call

add_filter('wfob_show_on_load', function ($url) {
	if (wp_doing_ajax()) {
		return false;
	}

	return true;
}, 10);

/*add_filter( 'wfacp_disabled_order_bump_css_printing', function ($status) {
	if(wp_doing_ajax()){
		return true;
	}
	return $status;
} );*/


//REMOVE PRODUCT LINK IN EMAIL
//add_filter( 'woocommerce_order_item_permalink', '__return_false' );

//REDIRECT HOME PAGE TO CUSTOM PAGE
// add_action('template_redirect', 'default_page');
// function default_page(){
//     if(is_home() or is_front_page()){
//        exit( wp_redirect("https://strategicparenting.com/28-day-no-yelling-parenting-challenge/"));
//     }
// }

//ADD PREVEIW TO CART ABANDONMENT EMAIL
add_filter('bwfan_email_enable_pre_header_preview_only', function () {
	return true;
});

//ADD TAXONOMY TO PAGES
function myplugin_settings()
{
	register_taxonomy_for_object_type('category', 'page');
	register_taxonomy_for_object_type('category', 'wffn_landing');
	register_taxonomy_for_object_type('category', 'wfacp_checkout');
}
add_action('init', 'myplugin_settings');


/* CHANGE COUPON TEXT */
/*add_filter( 'woocommerce_checkout_coupon_message', function () {
	$html = ' <span class="text-black text-base">' . 'Do you have a coupon?' . '</span> ' . '<span class="wfacp_showcoupon">' .  __( 'Click here ', 'woocommerce' ) . '</span>';
	return $html;
} );*/
add_filter('woocommerce_checkout_coupon_message', function () {
	$html = ' <span  class="wfacp_main_showcoupon">' . __('Do you have a coupon?', 'woocommerce') . ' ' . __('Click here', 'woocommerce') . '</span>';
	return $html;
});

/* GRAVITY FORMS SUBMIT BUTTON */
add_filter('gform_confirmation_anchor', '__return_false');


add_filter('gform_submit_button', 'dw_add_span_tags', 10, 2);
function dw_add_span_tags($button, $form)
{

	return $button .= "<span aria-hidden='true'></span>";
}

add_filter('woocommerce_order_button_text', 'change_button_text', 999999);

function change_button_text($button_text)
{
	$img = "./resources/assets/images/guaranteed-money-back.png";
	$button_text = 'GET INSTANT ACCESS';
	return  $button_text;
}

/** HEADING IN 2 COLORS */
function headingColors()
{ ?>
	<script>
		$(document).ready(function() {
			let homepageHeading = $("#hp-heading").text();
			let text = homepageHeading.split(" ");
			$("#hp-heading").html("<span class='text-darkOrange'>" + text[0] + "</span> <span class='text-black'>" + text[1]);
		});
	</script>
<?php }
add_action('wp_footer', 'headingColors');

// add_filter('gform_submit_button_21', 'form_submit_button21', 15, 2);
// function form_submit_button21($button, $form)
// {
// 	return "<button class='gform_button button' id='gform_submit_button_{$form["id"]}'>YES! I want my kids to listen to me without yelling! 
// 	<span class='sales-form-button'>Try the challenge risk-free: 100% 90-day money-back guarantee</span></button>";
// }

// add_filter('gform_submit_button_26', 'form_submit_button26', 16, 2);
// function form_submit_button26($button, $form)
// {
// 	return "<button class='gform_button button' id='gform_submit_button_{$form["id"]}'>YES! I WANT TO FAST-TRACK MY WAY TO A HAPPIER FAMILY
// 	<span class='sales-form-button'>Try the Checklist Bundle risk-free: 100% 90-day money-back guarantee</span></button>";
// }


add_action('wp_head', function () {
?>
	<style>
		/* SALES FORM BUTTON*/
		.salespage-form_wrapper .gform_button {
			display: flex;
			justify-content: center;
			flex-wrap: wrap;
			height: auto;
			width: 100%;
		}

		/* .salespage-form_wrapper FORM .gform_footer SPAN {
			color: white !important;
			font-size: 13px !important;
			display: inline-grid !important; 
			text-transform: none !important;
		}

		.salespage-form_wrapper FORM .gform_footer SPAN:after  {
			display: none !important;
		} */
	</style>
<?php
});
// rename the "Have a Coupon?" message on the checkout page
function woocommerce_rename_coupon_message_on_checkout()
{
	return '<span style="color: #131313; font-size: 15px">Do you have a coupon? </span>' . ' <a href="#" style="color:#FF8F00; border-bottom: 1px solid #ff8f00" class="wfacp_main_showcoupon">' . __('Click here to enter your code', 'woocommerce') . '</a>';
}
add_filter('woocommerce_checkout_coupon_message', 'woocommerce_rename_coupon_message_on_checkout');


add_filter('theme_wfocu_offer_templates', 'wpse_288589_add_template_to_select', 999, 4);
function wpse_288589_add_template_to_select($post_templates, $wp_theme, $post, $post_type)
{

	// Add custom template named template-custom.php to select dropdown
	$post_templates['template-upsell_steps.blade.php'] = __('Steps template');

	return $post_templates;
}

add_filter('template_include', 'wpse_2885899_add_template', 999, 1);

function wpse_2885899_add_template($template)
{
	global $post;
	if (class_exists('WFOCU_Common') && !is_null($post) && $post->post_type === WFOCU_Common::get_offer_post_type_slug()) {
		$page_template = apply_filters('bwf_page_template', get_post_meta($post->ID, '_wp_page_template', true), $post->ID);
		if ('Steps template' === $page_template) {
			$template = (get_template_directory() . '/resources/views/template-upsell_steps.blade.php');
		}
	}

	return $template;
}
