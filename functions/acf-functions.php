<?php
/** ACF field on sales page */
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

/** ACF field on optin/sales page */
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

/** ACF field on options page */
function my_acf_add_local_field_groups2() {

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

/** ACF field on checkout page */
function my_acf_add_local_field_groups3() {

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

/** ACF field on upsell page */
function my_acf_add_local_field_groups4() {

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

/** ACF field in testimonials custom post type */
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

/** ACF field in bonuses custom post type */
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

/** Options page settings */
if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}


