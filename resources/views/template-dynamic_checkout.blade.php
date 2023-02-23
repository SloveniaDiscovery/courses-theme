{{--
  Template Name: Dynamic checkout
  Template Post Type: wfacp_checkout
--}}

@extends('layouts.app')
@include('sections.top-bar-checkout-black')
<div class="bg-[#F3F3F3] dynamic-checkout">
<section class="max-w-pageWidth m-auto md:pt-10 bg-[#F3F3F3]">
    <div class="flex flex-wrap">
        <div id="div-included" class="w-full md:!w-1/2 p-2">
            <div class="product-checkout-choose desktop relative"></div>
            <div id="shortcode-checkout" >
            <div class="product-checkout-choose mobile relative sm:p-0"></div>
                @php(the_content())
            </div>
            <div id="fast-delivery" class="flex items-stretch mb-4">
                <!-- <div class="h-10">
                    @include('icons.clock')
                </div>
                <div class="text-xs ml-2">Choose to pay via credit card or Paypal for instant access to content without complications with the mail.</div>  -->
            </div>
            <div id="below-button z-40">
                <div id="money-back">
                    <div class="flex pt-4 flex-col justify-center" >
                        <img class="object-contain" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/security-logos-checkout.svg' ) ); ?>"></img>
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
        <div class="md:!w-1/2 w-full p-2 ">
       
            <div class="rounded p-4" id="product-perks">
            @layouts('checkout_section')
            @layout('product_info')
                <img class="mb-4 mt-4" src="@sub('product_image', 'url')"></img>
                <h3 id="product-title" class="!text-[20px] !font-medium">
                    @sub('product_title')
                </h3>
                <div id="what-you-get-checkout" class="product-perks mt-8">
                    @sub('product_perks')
                </div>
            @endlayout
            @endlayouts
            </div>
            <div id="shortcode-mini-cart" class="-mt-2 md:mt-0 p-0 md:p-4 relative md:!block">
                <?php $form_shortcode = "[wfacp_mini_cart]"; echo do_shortcode($form_shortcode)?>
            </div>
        </div>
        <div class="full-width my-12 ">
        @layouts('checkout_section')
            @layout('testimonials')
            <div id="testimonial" class="checkout-testimonials mt-0 sm:mt-4 p-2">
                @include('partials.testimonials')
            @endlayout
            </div>
            @layout('review_images')
            <div id="image-reviews" class="max-w-contentwidth m-auto p-2">
                <div class="bg-white my-1 md:my-12 flex items-center p-2 rounded-md shadow flex items-center justify-center flex-col md:flex-row">
                    @layouts('image_box')
                        @layout('award_image')
                            <img class=" h-12 mr-4 ml-2" src="@sub('image', 'url')"></img>
                        @endlayout
                        @layout('satisfied_customers')
                            @include('partials.satisfied-customers')
                        @endlayout
                    
                        @layout('review_image')
                            <img class=" h-10 ml-4" src="@sub('image', 'url')"></img>
                        @endlayout
                    @endlayouts
                </div>
            </div>
            @endlayout
        @endlayouts
        </div>
    </div>

<div id="faq" class=" w-full md:w-3/5 m-auto mt-20 mb-20 p-4">
    @include('blocks.faq-blocks')   
</div>
</section>
</div>
<script>

$(document).ready(function() {
 
    $("#wc-stripe-payment-request-wrapper").insertBefore("#wc-stripe-payment-request-button-separator");
    $("#wc-stripe-payment-request-button-separator").insertBefore(".wfacp-section.wfacp_payment");
    $(".wfacp-order-summary-label").text("Order Summary");
    $("#wfacp_mini_cart_reviews_wfacp_form_summary_shortcode").insertAfter("#wfacp_mini_cart_items_wfacp_form_summary_shortcode");

    if ($(window).width() < 768) {
        $(".checkout-desktop").hide();

        if($('.wfacp_product_switcher_container').length) {
            $(".product-checkout-choose.mobile").show();
            $(".product-checkout-choose.mobile").html($(".wfacp_product_switcher.wfacp_product_switcher"));
        } else {
            $(".product-checkout-choose").hide();
        }

        $("#wc-stripe-payment-request-wrapper").insertAfter("#shortcode-mini-cart");
        $("#wc-stripe-payment-request-button-separator").insertAfter("#wc-stripe-payment-request-wrapper");

    } else if ($(window).width() > 768) {
        $(".checkout-mob").hide();

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
    $('.wfob_btn_remove').each(function() {
        if ($(this).hasClass('wfob_item_present')) {
        $(this).closest('.wfob_bump').addClass('active-bump');
        $(this).closest('.wfob_l3_s_c').addClass('active-bump-header');
    }
    })
    
  
});
if ($(window).width() < 768) {
        $("#checkout-timer").insertBefore("#shortcode-checkout");
        $("#product-perks").insertAfter(".product-checkout-choose.mobile");

        $(".wfob_bump_wrapper.woocommerce_before_checkout_form").insertAfter("#product-perks");
        $("#shortcode-mini-cart").insertAfter(".wfob_bump_wrapper.woocommerce_before_checkout_form");
		/* PRESTAVI GOOGLE/APPLE PAY POD MINI CART < 768PX */
        $("#wc-stripe-payment-request-wrapper").insertAfter("#shortcode-mini-cart");
        $("#wc-stripe-payment-request-button-separator").insertAfter("#wc-stripe-payment-request-wrapper");
	}
	
else if ($(window).width() > 767) {
        $(".product-checkout-choose.desktop").insertAfter(".wfacp-hg-by-box.step_0");
        $(".wfob_bump_wrapper.woocommerce_before_checkout_form").insertAfter("#shortcode-mini-cart");
        /* PRESTAVI GOOGLE/APPLE PAY POD BUY BUTTON > 767PX */
		$("#wc-stripe-payment-request-wrapper").insertBefore(".wfacp-section.wfacp_payment");
        $("#wc-stripe-payment-request-button-separator").insertAfter("#wc-stripe-payment-request-wrapper");
       
	}
    $(document).ready(function() {
        $(window).resize(function() {
    if ($(window).width() < 768) {
        $(".checkout-mob").hide();
        
        $("#checkout-timer").insertBefore("#shortcode-checkout");
        $("#product-perks").insertAfter(".product-checkout-choose.mobile");
    
        $(".wfob_bump_wrapper.woocommerce_before_checkout_form").insertAfter("#product-perks");
        $("#shortcode-mini-cart").insertAfter(".wfob_bump_wrapper.woocommerce_before_checkout_form");
      
		/* PRESTAVI GOOGLE/APPLE PAY POD MINI CART < 768PX */
        $("#wc-stripe-payment-request-wrapper").insertAfter("#shortcode-mini-cart");
        $("#wc-stripe-payment-request-button-separator").insertAfter("#wc-stripe-payment-request-wrapper");

        $("#testimonial").insertBefore("#faq");
       
         if($('.wfacp_product_switcher_container').length) {
                $(".product-checkout-choose.mobile").show();
                $(".product-checkout-choose.mobile").html($(".wfacp_product_switcher.wfacp_product_switcher"));
            } else {
                $(".product-checkout-choose").hide();
            }
	}
	
	else if ($(window).width() > 767) {

        $(".checkout-mob").hide();
        $(".product-checkout-choose.desktop").insertAfter(".wfacp-hg-by-box.step_0");

        $("#checkout-timer").insertAfter("#head-logo");
        $("#product-perks").insertBefore("#shortcode-mini-cart");
		/* PRESTAVI GOOGLE/APPLE PAY POD BUY BUTTON > 767PX */
        $("#wc-stripe-payment-request-wrapper").insertBefore(".wfacp-section.wfacp_payment");
        $("#wc-stripe-payment-request-button-separator").insertAfter("#wc-stripe-payment-request-wrapper");

        $(".wfob_bump_wrapper.woocommerce_before_checkout_form").insertAfter("#shortcode-mini-cart");
		
		/* PRESTAVI BUMPE POD TIMER > 767PX */
        $(".product-checkout-choose.desktop").insertAfter(".wfacp-hg-by-box.step_0");
            if($('.wfacp_product_switcher_container').length) {
                $(".product-checkout-choose.desktop").show();
                $(".product-checkout-choose.desktop").html($(".wfacp_product_switcher.wfacp_product_switcher"));
            } else {
                $(".product-checkout-choose").hide();
            }
	}
  });
})
$(document).ready(function() {

    if ($('.wfob_btn_remove').hasClass('wfob_item_present')) {
        $('.wfob_btn_remove').closest('.wfob_bump').addClass('newClass');


    }
})
</script>

@include('sections.before-footer')
@include('sections.bottom-footer')