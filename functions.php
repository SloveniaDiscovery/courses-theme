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
				'key' => 'field_1_9',
				'label' => 'Selected product',
				'name' => 'selected_product',
				'type' => 'post_object',
				'post_type' => 'product',
				'return_format' => 'object',
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


function my_acf_add_local_field_groups1() {
	acf_add_local_field_group(array(
		'key' => 'group_0',
		'title' => 'Optin/Sales Pages',
		'fields' => array(
			array(
				'key' => 'field_1_9',
				'label' => 'Selected product',
				'name' => 'selected_product',
				'type' => 'post_object',
				'post_type' => 'product',
				'return_format' => 'object',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'wffn_optin',
				),
			),
		),
	));
}
add_action('acf/init', 'my_acf_add_local_field_groups1');

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
		body #wfacp-e-form .wfacp_main_form {
			background-color: transparent !important;
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
		.dynamic-checkout .wfacp-order-place-btn-wrap  #place_order {
			display: none !important;
		}
		body.wfacp_checkout-template-default .new_order_button {
			display: none !important;
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
			font-family: 'barlow' !important;
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
			background-color: white;
			box-shadow: 0px 8px 16px rgb(0 0 0 / 8%);
		}
		.dynamic-checkout .wfacp-left-panel.wfacp_page.embed_form.single_step.wfacp_last_page,.dynamic-checkout #wfacp-e-form #wfacp_checkout_form{
			background-color: transparent !important;;
			box-shadow: none;
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
			background-color: transparent !important;
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
			body .wfacp_form_cart table.shop_table tbody tr.cart_item td span:not(.wfacp-pro-count) {
				padding-bottom: 8px;
			}

			body .wfacp_form_cart {
				padding: 0px !important;
			}
		}

		@media (max-width:744px) {
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
		.dynamic-checkout .wfacp_form_cart {
			padding: 0px !important;
		}
		.dynamic-checkout .woocommerce-info {
			float: right !important;
			margin: 20px 0 30px 0;
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
			display: none;
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
		.dynamic-checkout .wfacp_form_cart .wfacp-order-summary-label, .dynamic-checkout  #wfacp-e-form .wfacp_main_form .wfacp_section_title {
			font-size: 20px !important;
			font-weight: 500 !important;
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
			background-color: white;
		}


		/**DYNAMIC CHECKOUT STYLES */

		body.wfacp_checkout-template-template-dynamic_checkout {
			background-color: #F3F3F3;
		}
		body .dynamic-checkout #wfacp-e-form .wfacp_main_form .woocommerce-checkout .button.button#place_order {
			border-radius: 5px !important;
			padding: 30px;
			margin-right: 20px;
		}
		@media(max-width: 768px) {
			body .dynamic-checkout #wfacp-e-form .wfacp_main_form .woocommerce-checkout .button.button#place_order {
				font-size: 24px !important;
			}
		}
		body .dynamic-checkout #wfacp-e-form .wfacp_main_form .woocommerce-checkout .button.button#place_order:after {
			display: inline-block;
			content: "";
			background-image: url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/buy-button-icon.svg')); ?>);
			width: 30px;
			height: 30px;
			background-size: contain;
			background-repeat: no-repeat;
			margin-right: 20px;
		}
		body .dynamic-checkout #wfacp-e-form .wfacp_main_form .woocommerce-checkout .button.button#place_order:before {
			width: 0;
			height: 0;
			background-image: none;
		}
		.dynamic-checkout .wfacp-section.wfacp-hg-by-box.step_0.form_section_single_step_0_embed_forms_2, .dynamic-checkout #wfacp-e-form .wfacp-section.wfacp_payment {
			padding: 0px;
		}
		
		.dynamic-checkout .woocommerce-checkout {
			padding-right: 20px;
		}
		.dynamic-checkout .product-checkout-choose {
			margin-top: 20px;
		}
		.dynamic-checkout .wfacp_product_switcher {
			padding: 0px !important;
			display: block !important;
		}
		.dynamic-checkout .wfacp_product_switcher .wfacp-row{
			margin-left: 0px !important;
			margin-right: 0px !important;
		}
		.dynamic-product #wfacp-e-form .wfacp_main_form .woocommerce-cart-form__cart-item.cart_item.wfacp-selected-product {
			border:	1px solid #04C100 !important;
			background-color: transparent !important;
		}
		.dynamic-checkoutdy .wfacp-product-switch-panel {
			margin-bottom: 0px !important;
			padding: 0px !important;
		}

		.dynamic-checkout .wfacp_product_switcher_description .product_name {
			height: 40px !important;
			color: #333333 !important;
		}
		.dynamic-checkout  .wfacp_product_switcher_item  {
			display: flex !important;
			align-items: center;
			justify-content: flex-start;
		}
		@media(max-width: 768px) {
			.dynamic-checkout  .wfacp_product_switcher_item  {
				padding-right: 25%;
			}
			.dynamic-checkout .wfacp_ps_div_row {
				width: 25% !important;
			}
		}
		
		.dynamic-checkout #product_switching_field.wfacp-product-switch-panel .woocommerce-cart-form__cart-item.cart_item {
    		padding: 0;
			position: relative;
			background: white ;
			border-radius: 3px !important;
			margin-top: 7px !important;
		}
		.dynamic-checkout #product_switching_field.wfacp-product-switch-panel .wfacp-selected-product {
			border: 1px solid #00AB30 !important;
			background: #F7F7F7 !important;
		}
		.dynamic-checkout .woocommerce-cart-form__cart-item.cart_item {
			border: 1px solid #ddd;
		}
		.dynamic-checkout .woocommerce-cart-form__cart-item.cart_item .wfacp_row_wrap {
			position: relative;
			display: flex;
		}
		.dynamic-checkout #product_switching_field.wfacp_not_force_all .wfacp_ps_title_wrap {
			display: flex;
		}
		.dynamic-checkout .wfacp-product-switch-title .product-remove {
			font-size: 20px !important;
			color: #131313 !important;
			padding-left: 0px !important;
			display: flex !important;;
			align-items: center !important;
		}
		.dynamic-checkout .wfacp-product-switch-title .product-remove:before {
			content:  url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/option-checkout.svg')); ?>);
			width: 25px;
			height: 25px;
			background-size: contain;
			background-repeat: no-repeat;
			margin-right: 10px;
		}
		.dynamic-checkout .wfacp_product_switcher_col.wfacp_product_switcher_col_1  {
			display: flex;
			align-items: center;
		}
		.dynamic-checkout #wfacp-e-form .wfacp_form .woocommerce-checkout #payment {
			background-color: transparent !important;
		}
		.dynamic-checkout #wfacp-e-form .wfacp_main_form .wfacp-comm-title {
			margin-bottom: 0px !important;
		}
		.dynamic-checkout #wfacp-e-form .wfacp-section.wfacp_payment {
			margin-top: 20px !important;
		}
		body .dynamic-checkout .wfacp-hg-by-box.billing-title .wfacp-comm-title, body .dynamic-checkout .wfacp-hg-by-box.wfacp_payment .wfacp-comm-title,
		body .dynamic-checkout #product-title, body .dynamic-checkout .wfacp_form_cart .wfacp-order-summary-label, body .dynamic-checkout .wfacp-hg-by-box.step_0 .wfacp_internal_form_wrap{
			display: flex !important;
			align-items: center !important;
		}
		body .dynamic-checkout .wfacp-hg-by-box.step_0 .wfacp_internal_form_wrap:before {
			content:  url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/user-checkout.svg')); ?>);
			width: 25px;
			height: 25px;
			background-size: contain;
			background-repeat: no-repeat;
			margin-right: 10px;
		}
	
		body .dynamic-checkout .wfacp-hg-by-box.wfacp_payment .wfacp-comm-title:before {
			content:  url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/billing-info-checkout.svg')); ?>);
			width: 25px;
			height: 25px;
			background-size: contain;
			background-repeat: no-repeat;
			margin-right: 10px;
		}
		body .dynamic-checkout .wfacp-hg-by-box.wfacp_payment #payment .wfacp-comm-title {
			display: none !important;
		}
		
		body .dynamic-checkout #product-title:before {
			content:  url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/order-checkout.svg')); ?>);
			width: 25px;
			height: 31px;
			background-size: contain;
			background-repeat: no-repeat;
			margin-right: 5px;
		}
		body .dynamic-checkout .wfacp_form_cart .wfacp-order-summary-label:before {
			content:  url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/order-summ-checkout.svg')); ?>);
			width: 25px;
			height: 25px;
			background-size: contain;
			background-repeat: no-repeat;
			margin-right: 5px;
		}
		.dynamic-checkout  .woocommerce.wfacp_single_step_form.wfacp_three_step .woocommerce-info {
			display: none !important;
		}
		.dynamic-checkout .wfob_bump_wrapper.woocommerce_before_checkout_form {
			margin-top: 40px;
		}
		.dynamic-checkout .payment_box.payment_method_stripe {
			background: transparent !important;
		}

		/**BUMP LAYOUT-3 STYLE - BUTTON ONLY, DYNAMIC CHECKOUT */
		.dynamic-checkout .wfob_bump_wrapper .wfob_wrap_start {
			margin-bottom: 40px !important;
		}
		.dynamic-checkout .wfob_bump_r_outer_wrap.wfob_layout_3 {
			padding: 15px 10px !important;
		}
		.dynamic-checkout .wfob_l3_wrap {
			position: relative;
			padding-bottom: 30px !important;

		}
		.dynamic-checkout .wfob_l3_s_data {
			position: absolute;
			padding: 10px;
			top: 0;
			left: 0;
			width: 80%;
			background-color: #FEF9E9;
			height: 100px;
			display: flex;
			align-items: center;
		}
		.dynamic-checkout .wfob_l3_c_head {
			font-size: 16px !important;
			font-weight: 600 !important;
			line-height: 20px !important;
		}
		.dynamic-checkout .wfob_l3_s_btn .wfob_price {
			position: absolute;
			right: 0;
			top: 0;
			height: 100px;
			display: flex;
			align-items: flex-end;
			background: #fef9e9;
			padding: 10px;
			width: 20%;
			display: flex;
    		flex-direction: column-reverse;
			justify-content: center;
		}
		.dynamic-checkout .wfob_l3_s_btn .wfob_price .woocommerce-Price-amount bdi {
			font-size: 32px !important;
			font-weight: 600 !important;
		}
		@media(max-width: 767px) {
			.dynamic-checkout .wfob_l3_s_btn .wfob_price .woocommerce-Price-amount bdi {
				font-size: 23px !important;
			}
		}
		.dynamic-checkout .wfob_l3_s_btn .wfob_price del .woocommerce-Price-amount bdi {
			font-size: 14px !important;
			font-weight: 400 !important;
		}
		.dynamic-checkout .wfob_bump_r_outer_wrap.wfob_layout_3 .wfob_l3_s_img {
			margin-top: 115px;
		}
		.dynamic-checkout .wfob_bump_r_outer_wrap.wfob_layout_3 .wfob_l3_s_desc {
			margin-top: -170px;
			width: 68% !important;
			margin-left: auto;
		}
		@media(max-width: 992px) {
			.dynamic-checkout .wfob_bump_r_outer_wrap.wfob_layout_3 .wfob_l3_s_desc {
				margin-top: 260px !important;
				padding: 0px 20px !important;
				width: 100% !important;
			}
			.dynamic-checkout .wfob_bump_r_outer_wrap.wfob_layout_3 .wfob_l3_s_img {
				margin-top: 100px;
				position: absolute;
				top: 0;
				left: 0;
				width: 100% !important;
			}
			.dynamic-checkout .wfob_bump_r_outer_wrap.wfob_layout_3 .wfob_l3_s_img img {
				width: 160px;
			}
		}
		.dynamic-checkout .wfob_bump_r_outer_wrap.wfob_layout_3 p {
			font-size: 14px !important;
			font-weight: 400 !important;
		}
		.dynamic-checkout #wfob_main_wrapper_start .wfob_l3_wrap .wfob_l3_s_btn .wfob_l3_f_btn.wfob_btn_add.wfob_bump_product {
			position: absolute;
			display: flex;
			justify-content: center;
			bottom: 0;
			padding: 10px 30px !important;
			width: auto !important;
			border-radius: 5px;
			font-size: 24px !important;
			background-color: #D20000 !important;
			border: none !important;
			color: white !important;
			font-weight: 600 !important;
			bottom: -36px !important;
			left: 50%;
			transform: translate(-50%, 0%);
			margin-right: -50%;
			line-height: 24px !important;
		}
		@media(max-width: 767px) {
			.dynamic-checkout #wfob_main_wrapper_start .wfob_l3_wrap .wfob_l3_s_btn .wfob_l3_f_btn.wfob_btn_add.wfob_bump_product,
			.dynamic-checkout #wfob_main_wrapper_start .wfob_l3_wrap .wfob_l3_s_btn .wfob_l3_f_btn.wfob_btn_add.wfob_btn_remove.wfob_item_present {
				font-size: 20px !important;
			}
		}
		.dynamic-checkout #wfob_wrap .wfob_bump_r_outer_wrap.wfob_layout_3 a.wfob_l3_f_btn.wfob_btn_remove.wfob_item_present,
		.dynamic-checkout .wfob_bump_r_outer_wrap.wfob_layout_3[data-wfob-id='20744'] a.wfob_l3_f_btn.wfob_btn_remove.wfob_item_present {
			position: absolute;
			bottom: 0;
			padding: 10px 30px !important;
			width: 270px !important;
			border-radius: 5px;
			font-size: 24px !important;
			background-color: black !important;
			border: none !important;
			color: white !important;
			display: flex;
			justify-content: center;
			font-weight: 600 !important;
			bottom: -36px !important;
			line-height: 24px !important;
			left: 50%;
			transform: translate(-50%, 0%);
			margin-right: -50%;
		}
		.dynamic-checkout #wfob_main_wrapper_start .wfob_l3_wrap .wfob_l3_s_btn .wfob_l3_f_btn.wfob_btn_add.wfob_btn_remove.wfob_item_present .wfob_btn_text_added:after {
			content:  url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/added_to_order_bump.svg')); ?>);
			width: 25px;
			height: 25px;
			background-size: contain;
			background-repeat: no-repeat;
			margin-right: 0px;
			margin-top: 2px;
		}
		.dynamic-checkout #wfob_main_wrapper_start .wfob_l3_wrap .wfob_l3_s_btn .wfob_l3_f_btn.wfob_btn_add.wfob_btn_remove.wfob_item_present .wfob_btn_text_added {
			display: inline-flex;
		}
		.dynamic-checkout #wfob_main_wrapper_start .wfob_l3_wrap .wfob_l3_s_btn .wfob_l3_f_btn.wfob_btn_add.wfob_bump_product:after {
			content:  url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/add_to_order_bump.svg')); ?>);
			width: 25px;
			height: 25px;
			background-size: contain;
			background-repeat: no-repeat;
			margin-right: 0px;
		}
		@media(max-width: 767px) {
			.dynamic-checkout #wc-stripe-payment-request-button-separator {
				height: 15px !important;
				display: block !important;
			}
		}
		.dynamic-checkout a.wfacp_main_showcoupon:hover {
			color: #E08107 !important;
		}
		.dynamic-checkout #wfob_wrap .wfob_wrapper .wfob_bump {
			border: 3px dashed #FF0000 !important;
		}
		.dynamic-checkout .woocommerce-invalid input {
			background-color: #FFF6F6 !important;
			border: 1px solid #D20000 !important;
		}
		.dynamic-checkout #wfacp-e-form .wfacp-inside .form-row.woocommerce-invalid  > label.wfacp-form-control-label:not(.checkbox) {
			background-color: #FFF6F6 !important;
			width: 90% !important;
		}
		.dynamic-checkout ul.woocommerce-error {
			display: none !important;
		}
		
		.dynamic-checkout #wfacp-e-form .wfacp_main_form .form-row.woocommerce-invalid input, .dynamic-checkout #wfacp-e-form .wfacp_main_form .form-row.woocommerce-invalid input#billing_first_name{
			background: url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/invalid-field.png')); ?>) no-repeat scroll 0 1px transparent;
			display: block;
			background-position: right 8px bottom 9px;
			background-size: 24px;
			width: 100%;
		}
		
		.dynamic-checkout #wfacp-e-form .woocommerce-checkout #payment ul.payment_methods li{
			margin-bottom: 0px !important;
		}
		.dynamic-checkout #wfob_wrap .wfob_wrapper .wfob_bump.active-bump {
			border: 3px dashed #04c100 !important;
		}
		.dynamic-checkout .wfob_bump .active-bump-header > .wfob_l3_s_data , .dynamic-checkout .wfob_bump .active-bump-header > .wfob_l3_s_btn > .wfob_price {
			background-color: #F5F5F5 !important;
		}
		body .form-row#shipping_state_field {
			width: 100% !important;
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
			'title' => 'Bullets dot - orange',
			'block' => 'span',
			'classes' => 'bullets-sales-page',
			'wrapper' => true,
		),
		array(
			'title' => 'Bullets dot - black',
			'block' => 'span',
			'classes' => 'black-bullets',
			'wrapper' => true,
		),
		array(
			'title' => 'Bullets check - green',
			'block' => 'span',
			'classes' => 'check-sales-page',
			'wrapper' => true,
		),
		array(
			'title' => 'Bullets check - orange',
			'block' => 'span',
			'classes' => 'check-sales-page-orange',
			'wrapper' => true,
		),
		array(
			'title' => 'Highlight text - yellow background',
			'block' => 'span',
			'classes' => 'highlight-text',
			'wrapper' => true,
		),

		array(
			'title' => 'Ordered list - orange (div wrapper)',
			'block' => 'div',
			'classes' => 'list-numbers',
			'wrapper' => true,
		),
		array(
			'title' => 'Bullets arrow - orange',
			'block' => 'span',
			'classes' => 'arrow-r-author',
			'wrapper' => true,
		),
		array(
			'title' => 'Infinity bullet',
			'block' => 'span',
			'classes' => 'infinity-bullet',
			'wrapper' => true,
		),
		array(
			'title' => 'Gift bullet',
			'block' => 'span',
			'classes' => 'gift-bullet',
			'wrapper' => true,
		),
		array(
			'title' => 'Red Background',
			'block' => 'span',
			'classes' => 'red-background',
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
	register_taxonomy_for_object_type('category', 'wffn_optin');
	register_taxonomy_for_object_type('category', 'wfacp_checkout');
}
add_action('init', 'myplugin_settings');


/* CHANGE COUPON TEXT */
/*add_filter( 'woocommerce_checkout_coupon_message', function () {
	$html = ' <span class="text-black text-base">' . 'Do you have a coupon?' . '</span> ' . '<span class="wfacp_showcoupon">' .  __( 'Click here ', 'woocommerce' ) . '</span>';
	return $html;
} );*/


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
add_action( 'woocommerce_checkout_after_customer_details', 'second_place_order_button', 5 );
function second_place_order_button() {
    echo '<button type="submit" class="button alt new_order_button" 
	name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">CLICK TO CONTINUE</button>';
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
add_filter('template_include', 'wp_add_checkout_template', 1000, 1);

function wp_add_checkout_template($template) {
	global $post;
	if (class_exists('WFACP_Common') && !is_null($post) && $post->post_type === WFACP_Common::get_post_type_slug()) {
		$page_template = apply_filters('bwf_page_template', get_post_meta($post->ID, '_wp_page_template', true), $post->ID);
		if ('Generic checkout' === $page_template) {
			$template = (get_template_directory() . '/resources/views/template-generic_checkout.blade.php');
		}
	}

	return $template;
}


add_filter('template_include', 'wp_add_checkout_template_1', 1001, 1);

function wp_add_checkout_template_1($template) {
	global $post;
	if (class_exists('WFACP_Common') && !is_null($post) && $post->post_type === WFACP_Common::get_post_type_slug()) {
		$page_template = apply_filters('bwf_page_template', get_post_meta($post->ID, '_wp_page_template', true), $post->ID);
		if ('Generic checkout' === $page_template) {
			$template = (get_template_directory() . '/resources/views/template-dynamic_checkout.blade.php');
		}
	}

	return $template;
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

