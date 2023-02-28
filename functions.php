<?php
/** CSS styles for checkout */
include get_template_directory() . '/functions/style-functions.php'; 
/** ACF functions */
include get_template_directory() . '/functions/acf-functions.php'; 
/** Theme customizer */
include get_template_directory() . '/functions/theme-customizer.php'; 
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

// REMOVE CHECKOUT FIELDS
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
add_filter('wfacp_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields) {

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

function processing_to_completed($order_id) {

	$order = new WC_Order($order_id);
	$order->update_status('completed');
}
//DISPLAY PRODUCT NAMES IN ORDER
add_action('manage_shop_order_posts_custom_column', 'custom_orders_list_column_content', 20, 2);
function custom_orders_list_column_content($column, $post_id) {
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
function dw_add_span_tags($button, $form) {
	return $button .= "<span aria-hidden='true'></span>";
}

/** CHANGE ORDER BUTTON TEXT ON CHECKOUT*/
add_filter('woocommerce_order_button_text', 'change_button_text', 999999);
function change_button_text($button_text) {
	$img = "./resources/assets/images/guaranteed-money-back.png";
	$button_text = 'GET INSTANT ACCESS';
	return  $button_text;
}
add_filter('woocommerce_order_button_text', 'dynamic_checkout_order_button', 999999);
function dynamic_checkout_order_button($btn_text) {	
	if (get_page_template() == (get_stylesheet_directory() . '/resources/views/template-dynamic_checkout.blade.php')) {
		$btn_text = 'CLICK TO CONTINUE';
	}
	
	return  $btn_text;
}

// /** CHANGE ORDER BUTTON ON DYNAMIC CHECKOUT TEMPLATE */
// add_action( 'woocommerce_checkout_after_customer_details', 'second_place_order_button', 5 );
// function second_place_order_button() {
//     echo '<button type="submit" class="button alt new_order_button" 
// 	name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">CLICK TO CONTINUE</button>';
// }

// rename the "Have a Coupon?" message on the checkout page
function woocommerce_rename_coupon_message_on_checkout() {
	return '<span style="color: #131313; font-size: 15px">Do you have a coupon? </span>' . ' <a href="#" style="color:#FF8F00; border-bottom: 1px solid #ff8f00" class="wfacp_main_showcoupon">' . __('Click here to enter your code', 'woocommerce') . '</a>';
}
add_filter('woocommerce_checkout_coupon_message', 'woocommerce_rename_coupon_message_on_checkout');

/** UPSELLS CUSTOM TEMPLATE -> Steps template */
add_filter('theme_wfocu_offer_templates', 'wpse_288589_add_template_to_select', 999, 4);
function wpse_288589_add_template_to_select($post_templates, $wp_theme, $post, $post_type) {
	// Add custom template named template-custom.php to select dropdown
	$post_templates['template-upsell_steps.blade.php'] = __('Steps template');
	return $post_templates;
}

add_filter('template_include', 'wpse_2885899_add_template', 999, 1);
function wpse_2885899_add_template($template) {
	global $post;
	if (class_exists('WFOCU_Common') && !is_null($post) && $post->post_type === WFOCU_Common::get_offer_post_type_slug()) {
		$page_template = apply_filters('bwf_page_template', get_post_meta($post->ID, '_wp_page_template', true), $post->ID);
		if ('Steps template' === $page_template) {
			$template = (get_template_directory() . '/resources/views/template-upsell_steps.blade.php');
		}
	}
	return $template;
}
/** CHECKOUT TEMPLATE -> Generic template */
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

/** CHECKOUT TEMPLATE -> Dynamic template */
add_filter('template_include', 'wp_add_checkout_template_1', 1001, 1);
function wp_add_checkout_template_1($template) {
	global $post;
	if (class_exists('WFACP_Common') && !is_null($post) && $post->post_type === WFACP_Common::get_post_type_slug()) {
		$page_template = apply_filters('bwf_page_template', get_post_meta($post->ID, '_wp_page_template', true), $post->ID);
		if ('Dynamic checkout' === $page_template) {
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

function add_credit_card_gateway_icons( $icon_string, $gateway_id ) {
	if ( 'stripe' === $gateway_id ) {
		$icon_string  = '<img src="' .  esc_url(get_theme_file_uri('/resources/assets/images/PaymentMethods_Card.svg')) . '" class="stripe-visa-icon stripe-icon" alt="Visa" />';
	}
	return $icon_string;
}

add_filter( 'woocommerce_gateway_icon', 'add_credit_card_gateway_icons', 10, 2 );
