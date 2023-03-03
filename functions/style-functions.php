<?php 
add_action('wp_head', function () {
?>
	<style>
        /** CHECKOUT STYLES  */
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
		/* .dynamic-checkout .wfacp-order-place-btn-wrap  #place_order {
			display: none !important;
		} */
		body.wfacp_checkout-template-default .new_order_button, body.wfacp_checkout-template-template-generic_checkout .new_order_button {
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

		/* .wfacp_woocommerce_form_coupon{
			display: none;
		} */
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
			margin-left: -2px;
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
			width: 18px;
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
			padding: 32px;
			margin-right: 20px;
		}
		
		@media(max-width: 767px) {
			body .dynamic-checkout #wfacp-e-form .wfacp_main_form .woocommerce-checkout .button.button#place_order {
				font-size: 24px !important;
				padding: 24px !important;
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
			margin-left: 13px;
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
			padding-left: 30px;
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
		/* .dynamic-checkout .woocommerce-cart-form__cart-item.cart_item .wfacp_switcher_checkbox {
			height: 25px !important;
			width: 25px !important;
			position: relative !important;
			top: 0 !important;
			margin-top: 0px !important;
		}
	
		.dynamic-checkout .woocommerce-cart-form__cart-item.cart_item .wfacp_switcher_checkbox:before {
			width: 28px !important;
			height: 25px !important;
			font-size: 19px !important;
			margin-left: 2px !important;
		} */
		.dynamic-checkout .wfacp_product_switcher_col.wfacp_product_switcher_col_1  {
			position: absolute;
			left: 0;
			display: flex !important;
			justify-content: flex-start;
			align-items: center !important;
			width: 40px !important;
			max-width: 40px !important;
			height: 100%;
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
	
		.dynamic-checkout #wfacp-e-form .wfacp_form .woocommerce-checkout #payment {
			background-color: transparent !important;
		}
		.dynamic-checkout #wfacp-e-form .wfacp_main_form .wfacp-comm-title {
			margin-bottom: 10px !important;
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
		/* .dynamic-checkout  .woocommerce.wfacp_single_step_form.wfacp_three_step .woocommerce-info {
			display: none !important;
		} */
	
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
		@media(max-width: 1024px) {
			.dynamic-checkout .wfob_bump_r_outer_wrap.wfob_layout_3 .wfob_l3_s_desc {
				margin-top: 270px !important;
				padding: 0px 20px !important;
				width: 100% !important;
			}
			.dynamic-checkout .wfob_bump_r_outer_wrap.wfob_layout_3 .wfob_l3_s_img {
				margin-top: 110px;
				position: absolute;
				top: 0;
				left: 0;
				width: 100% !important;
			}
			.dynamic-checkout .wfob_bump_r_outer_wrap.wfob_layout_3 .wfob_l3_s_img img {
				width: 160px;
			}
		}
		.dynamic-checkout .wfob_bump_r_outer_wrap.wfob_layout_3 li {
			list-style-type: disc !important;
			text-indent: 0px !important;
		}
		.dynamic-checkout .wfacp_main_form #product_switching_field .wfacp_best_value {
			text-transform: capitalize;
			font-weight: 400;
			color: #fff;
			background-color: #b22323;
			font-size: 12px;
			line-height: 12px;
			display: inline-block;
			padding: 3px 5px;
			border-radius: 3px;
		}
		.dynamic-checkout #wfacp-e-form .wfacp_main_form .shop_table.wfacp-product-switch-panel .woocommerce-cart-form__cart-item.cart_item.wfacp_best_val_wrap {
			border-color: #b22323;
		}
		.dynamic-checkout .wfob_bump_r_outer_wrap.wfob_layout_3 p, .dynamic-checkout .wfob_bump_r_outer_wrap.wfob_layout_3 li {
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
		@media(max-width: 1024px) {
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
		@media(max-width: 1024px) {
			.dynamic-checkout #wc-stripe-payment-request-button-separator {
				height: 25px !important;
				display: block !important;
			}
		}
		.dynamic-checkout a.wfacp_main_showcoupon:hover {
			color: #E08107 !important;
		}
		.dynamic-checkout #wfob_wrap .wfob_wrapper .wfob_bump {
			border: 3px dashed #FF0000 !important;
		}
		.dynamic-checkout .woocommerce-invalid input#billing_first_name, .dynamic-checkout .woocommerce-invalid input#billing_email  {
			background-color: #FFF6F6 !important;
			border: 1px solid #D20000 !important;
		}
		.dynamic-checkout #wfacp-e-form .wfacp-inside .form-row.woocommerce-invalid  > label.wfacp-form-control-label:not(.checkbox) {
			background-color: transparent !important;
			width: 90% !important;
		}
		.dynamic-checkout .woocommerce-validated input#billing_first_name,  .dynamic-checkout .woocommerce-validated input#billing_email  {
			border: 1px solid #04c100 !important;
		}
		.dynamic-checkout #wfacp-e-form .wfacp_main_form .form-row.woocommerce-validated input, 
		.dynamic-checkout #wfacp-e-form .wfacp_main_form .form-row.woocommerce-validated input#billing_first_name {
			background: url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/valid-field.png')); ?>) no-repeat scroll 0 1px white;
			display: block;
			background-position: right 8px bottom 9px;
			background-size: 24px;
			width: 100%;
		}
		
		.dynamic-checkout ul.woocommerce-error {
			display: none !important;
		}
		
		.dynamic-checkout #wfacp-e-form .wfacp_main_form .form-row.woocommerce-invalid input, 
		.dynamic-checkout #wfacp-e-form .wfacp_main_form .form-row.woocommerce-invalid input#billing_first_name{
			background: url(<?php echo esc_url(get_theme_file_uri('/resources/assets/images/invalid-field.png')); ?>) no-repeat scroll 0 1px white;
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
		.dynamic-checkout .wfacp_coupon_row .form-row {
			padding-right: 0px !important;
		}
		body .dynamic-checkout #wfacp-e-form .wfacp_main_form.woocommerce .wfacp_coupon_row .wfacp_coupon_button {
			margin: 0px !important;
			margin-top: 0px !important;
		} 
		.dynamic-checkout #wfacp-e-form form.checkout_coupon.woocommerce-form-coupon { 
			margin: 40px 0px 0px 0px !important;
		}
		.dynamic-checkout .wfacp_coupon_row .form-row .wfacp_coupon_button {
			margin-top: 10px !important;
		}
		
		body #wfacp-e-form .wfacp_main_form.woocommerce #payment ul.payment_methods li.payment_method_stripe label[for="payment_method_stripe"] img {
			float: right !important;
			display: inline-flex !important;
			padding-top: 10px !important
		}
		.dynamic-checkout #wfacp-e-form .wfacp_form {
			width: 100%; 
			max-width: 100%;
		}
		
		.dynamic-checkout .wc_payment_method {
			border: 0px !important;
		}
		/** desktop mini cart style */
		.dynamic-checkout .wfacp_order_summary_container table {
			table-layout: fixed;
			margin: 0;
			width: 100%;
			border-collapse: collapse !important;
			border-spacing: 0 !important;
			background-color: transparent;
		}
		.dynamic-checkout table.shop_table tr.order-total {
			border-color: #dddddd !important;
			border-top: 1px solid #dddddd !important;
		}
		.dynamic-checkout table.shop_table .cart_item .wfacp_mini_cart_item_title, .dynamic-checkout table.shop_table .cart_item .product-total bdi {
			font-size: 16px !important;
		}
		.dynamic-checkout table.shop_table .green-price, .dynamic-checkout table.shop_table td.green-discount {
			font-size: 25px !important;
			font-weight: 600 !important;
			padding: 8px 0px !important;
		}
		.dynamic-checkout table.shop_table td.green-discount {
			display: inline-block !important;
			float: right !important;
		}
		.dynamic-checkout table.shop_table .order-total:nth-child(3) span, .dynamic-checkout table.shop_table .order-total:nth-child(3) bdi {
			color: black !important;
			font-size: 20px !important;
		}
		.dynamic-checkout table.shop_table .order-total:nth-child(3) td {
			float: right !important;
			text-align: right !important;
		}
		.dynamic-checkout .wfacp_single_step_form > .wfacp_custom_row_wrap {
			display: none !important;
		}
		body .select2-selection__placeholder {
			display: none;
		}
	</style>
	<?php
});

