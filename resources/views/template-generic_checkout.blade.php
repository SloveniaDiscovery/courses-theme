{{--
  Template Name: Generic checkout
  Template Post Type: wfacp_checkout
--}}

@extends('layouts.app')
@include('sections.top-bar-sales-white')
<section class="max-w-pageWidth m-auto md:mt-10">
    <div class="flex flex-wrap">
        <div id="div-included" class="w-full md:!w-1/2 p-2">
            <!-- <div class="shadow rounded p-4 bg-white">
                <h1 id="product-name"class="!text-3xl">{{$productNameCheckout}}</h1>
                <img class="mb-4 mt-4" src="{{$productImageCheckout}}"></img>
                <div class="flex justify-center text-base">
                    @include('partials.expert-informations')
                </div>
                <div id="what-you-get-checkout bg-white" class="product-perks mt-8">{!! $whatYouGetCheckout !!}</div>
            </div> -->
            <div class="product-checkout-choose mobile p-4 sm:p-0 bg-white"></div>
            <div id="shortcode-mini-cart" class="p-4 sm:p-0 bg-white relative shadow md:!block rounded">
                <?php $form_shortcode = "[wfacp_mini_cart]"; echo do_shortcode($form_shortcode)?>
            </div>
            <div id="testimonial" class="checkout-testimonials mt-4">
            @layouts('checkout_section')
            @layout('testimonials')
                @include('partials.testimonials')
            @endlayout
            @endlayouts
            </div>
            @layouts('checkout_section')
            @layout('review_images')
            <div id="image-reviews">
                @include('blocks.flexible-checkout')
            </div>
            @endlayout
            @endlayouts
        </div>
        <div class="md:!w-1/2 w-full p-2 ">
            <div id="checkout-timer" class="bg-black text-white p-4 flex items-center mb-4 mt-4 sm:mt-0 ">Your order is reserved for: @include('partials.countdown-checkout')
            </div>
            <div class="product-checkout-choose desktop mt-4 py-4 bg-white"></div>
            <div id="shortcode-checkout">
                @php(the_content())
            </div>
            <div id="fast-delivery" class="flex items-stretch mb-4">
                <!-- <div class="h-10">
                    @include('icons.clock')
                </div>
                <div class="text-xs ml-2">Choose to pay via credit card or Paypal for instant access to content without complications with the mail.</div>  -->
            </div>
            <div id="below-button">
                <div id="money-back">
                    <div class="flex p-4 flex-col justify-center" >
                        <img class="h-4 md:h-6 object-contain" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/verified.png' ) ); ?>"></img>
                        <img class="h-14 object-contain" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/security.jpg' ) ); ?>"></img>
                    </div>
                    <div class="font-semibold md:text-xl text-lg mt-4 text-black flex justify-center w-full mx-auto">
                        <img class="h-20 mr-1" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/guaranteed-money-back.png' ) ); ?>"></img>
                        <div>
                            <div class="text-left font-bold text-base ml-4">{!! $moneyBackGuaranteeHeadlineCheckout !!}</div>
                            <div class="text-left font-normal !text-sm ml-4">{!! $moneyBackGuaranteeTextCheckout !!}</div>
                        </div>
                    </div>
                </div>
                <div id="personal-assistance">
                    <div class="font-semibold md:text-xl text-lg mt-4 text-black flex justify-center mx-auto">
                        <img class="h-20 mr-1" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/personal-assistance.png' ) ); ?>"></img>
                        <div>
                            <div class="text-left font-bold text-base ml-4">{!! $personalAssistanceHeadlineCheckout !!}</div>
                            <div class="text-left font-normal !text-sm ml-4">{!! $personalAssistanceTextCheckout !!}</div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>

<div id="faq" class=" w-full md:w-3/5 m-auto mt-20 mb-20 p-4">
    @include('blocks.faq-blocks')   
</div>
</section>
<script>
$(document).ready(function() {
    $("#fast-delivery").insertBefore("#payment");

    $("#wfacp_mini_cart_reviews_wfacp_form_summary_shortcode").insertAfter("#wfacp_mini_cart_items_wfacp_form_summary_shortcode");
    $(".wfacp-order-summary-label").text("Order Summary");
    // $(".wfob_bump_wrapper.woocommerce_checkout_order_review_below_payment_gateway").insertBefore("#wc-stripe-payment-request-wrapper");
    //$(".wfob_bump_wrapper.woocommerce_checkout_order_review_below_payment_gateway").insertAfter("#shortcode-mini-cart");
    $(".product-checkout-choose").hide();
    if ($(window).width() < 768) {
        if($('.wfacp_product_switcher_container').length) {
            $(".product-checkout-choose.mobile").show();
            $(".product-checkout-choose.mobile").html($(".wfacp_product_switcher.wfacp_product_switcher"));
        } else {
            $(".product-checkout-choose").hide();
        }
    } else if ($(window).width() > 768) {
        if($('.wfacp_product_switcher_container').length) {
            $(".product-checkout-choose.desktop").show();
            $(".product-checkout-choose.desktop").html($(".wfacp_product_switcher.wfacp_product_switcher"));
        } else {
            $(".product-checkout-choose").hide();
        }
    }
})
$(document.body).on('updated_checkout', function () {
    $(".wfacp_internal_form_wrap.wfacp-comm-title.none.margin-top h2").text("Order Summary");
    $(".wfacp-order-summary-label").text("Order Summary");
  
});
if ($(window).width() < 768) {
        $("#checkout-timer").insertBefore(".product-checkout-choose.mobile");
        $("#testimonial").insertBefore("#faq");
    
		/* PRESTAVI GOOGLE/APPLE PAY POD MINI CART < 768PX */
        $("#wc-stripe-payment-request-wrapper").insertAfter(".wfob_bump_wrapper woocommerce_before_checkout_form");
        $("#wc-stripe-payment-request-button-separator").insertAfter("#wc-stripe-payment-request-wrapper");
	    /* PRESTAVI BUMPE NAD MINI CART < 768PX */
        // $(".wfob_bump_wrapper.woocommerce_checkout_order_review_below_payment_gateway").insertAfter(".wfacp_form_cart");
        $(".wfob_bump_wrapper woocommerce_before_checkout_form").insertAfter("#shortcode-mini-cart");
        $(".wfob_bump_wrapper.woocommerce_checkout_order_review_below_payment_gateway").insertAfter("#shortcode-mini-cart");
	 
	 	/* ODSTRANI VSE BUMP WRAPPERJE RAZEN ENEGA - DA SE NE PODVAJAJO */
        $('.wfob_bump_wrapper.woocommerce_checkout_order_review_below_payment_gateway').slice(1).remove();
	    
           /** IMAGE REVIEWS, LOGOS ON MOBILE BEFORE ORDER SUMMARY */
        $("#image-reviews").insertBefore("#testimonial");
 
  
	}
	
else if ($(window).width() > 767) {
        
        /* PRESTAVI GOOGLE/APPLE PAY POD BUY BUTTON > 767PX */
		$("#wc-stripe-payment-request-wrapper").insertAfter(".wfob_bump_wrapper.woocommerce_before_checkout_form");
        $("#wc-stripe-payment-request-button-separator").insertAfter("#wc-stripe-payment-request-wrapper");
        $(".wfob_bump_wrapper.woocommerce_checkout_order_review_below_payment_gateway").insertAfter(".wc_payment_methods");
        $('.wfob_bump_wrapper.woocommerce_checkout_order_review_below_payment_gateway').slice(1).remove();
	}
    $(document).ready(function() {
        $(window).resize(function() {
    if ($(window).width() < 768) {
        $("#checkout-timer").insertBefore("#product-name");
        $("#testimonial").insertBefore("#faq");
		/* PRESTAVI GOOGLE/APPLE PAY POD MINI CART < 768PX */
        $("#wc-stripe-payment-request-wrapper").insertAfter(".wfob_bump_wrapper woocommerce_before_checkout_form");
        $("#wc-stripe-payment-request-button-separator").insertAfter("#wc-stripe-payment-request-wrapper");
		/* PRESTAVI BUMPE NAD MINI CART < 768PX */
        // $(".wfob_bump_wrapper.woocommerce_checkout_order_review_below_payment_gateway").insertAfter(".wfacp_form_cart");
        $(".wfob_bump_wrapper woocommerce_before_checkout_form").insertAfter("#shortcode-mini-cart");
        	 	/* ODSTRANI VSE BUMP WRAPPERJE RAZEN ENEGA - DA SE NE PODVAJAJO */
        $(".wfob_bump_wrapper.woocommerce_checkout_order_review_below_payment_gateway").insertAfter("#shortcode-mini-cart");
	 	/* ODSTRANI VSE BUMP WRAPPERJE RAZEN ENEGA - DA SE NE PODVAJAJO */
        $('.wfob_bump_wrapper.woocommerce_checkout_order_review_below_payment_gateway').slice(1).remove();
         /** IMAGE REVIEWS, LOGOS ON MOBILE BEFORE ORDER SUMMARY */
         $("#image-reviews").insertBefore("#testimonial");
            if($('.wfacp_product_switcher_container').length) {
                $(".product-checkout-choose.mobile").show();
                $(".product-checkout-choose.mobile").html($(".wfacp_product_switcher.wfacp_product_switcher"));
            } else {
                $(".product-checkout-choose").hide();
            }
	}
	
	else if ($(window).width() > 767) {
        $("#checkout-timer").insertBefore(".product-checkout-choose.desktop");
        $("#testimonial").insertAfter("#shortcode-mini-cart");
		/* PRESTAVI GOOGLE/APPLE PAY POD BUY BUTTON > 767PX */
		$("#wc-stripe-payment-request-wrapper").insertAfter(".wfob_bump_wrapper woocommerce_before_checkout_form");
        $("#wc-stripe-payment-request-button-separator").insertAfter("#wc-stripe-payment-request-wrapper");
		
		/* PRESTAVI BUMPE POD TIMER > 767PX */
        $(".wfob_bump_wrapper.woocommerce_checkout_order_review_below_payment_gateway").insertAfter(".wc_payment_methods");
       // $(".wfob_bump_wrapper.woocommerce_checkout_order_review_below_payment_gateway").insertAfter("#shortcode-mini-cart");
		
		/* ODSTRANI VSE BUMP WRAPPERJE RAZEN ENEGA - DA SE NE PODVAJAJO */
		$('.wfob_bump_wrapper.woocommerce_checkout_order_review_below_payment_gateway').slice(1).remove();
           
            if($('.wfacp_product_switcher_container').length) {
                $(".product-checkout-choose.desktop").show();
                $(".product-checkout-choose.desktop").html($(".wfacp_product_switcher.wfacp_product_switcher"));
            } else {
                $(".product-checkout-choose").hide();
            }
	}
  });
})
</script>
@include('sections.before-footer')
@include('sections.bottom-footer')
