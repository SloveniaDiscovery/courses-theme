<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class CustomFields extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'logoColor' => $this->logoColor(),
            'logoWhite' => $this->logoWhite(),
            'siteDescription' => $this->siteDescription(),
            'phoneNumber' => $this->phoneNumber(),   
            'expertMainPhoto' => $this->expertMainPhoto(),   
            'expertName' => $this->expertName(),   
            'expertJob' => $this->expertJob(),   
            'expertProfilePhoto' => $this->expertProfilePhoto(),   
            'email' => $this->email(),   
            'satisfiedCustomersNumber' => $this->satisfiedCustomersNumber(),   
            'bestSellingAuthorBadge' => $this->bestSellingAuthorBadge(),  
            'expertSalespageDescription' => $this->expertSalespageDescription(),  
  
            
            /* CHECKOUT PAGE */
            'productNameCheckout' => $this->productNameCheckout(),  
            'productImageCheckout' => $this->productImageCheckout(),  
            'whatYouGetCheckout' => $this->whatYouGetCheckout(),  
            'moneyBackGuaranteeHeadlineCheckout' => $this->moneyBackGuaranteeHeadlineCheckout(),  
            'moneyBackGuaranteeTextCheckout' => $this->moneyBackGuaranteeTextCheckout(),  
            'personalAssistanceHeadlineCheckout' => $this->personalAssistanceHeadlineCheckout(),  
            'personalAssistanceTextCheckout' => $this->personalAssistanceTextCheckout(),  
           
            /* UPSELL PAGE */
            'toggleBar1' => $this->toggleBar1(),  
            'toggleBar2' => $this->toggleBar2(),  
            'toggleBar3' => $this->toggleBar3(),  
          
            'priceIncreaseIn' => $this->priceIncreaseIn(),
            
            /* TESTIMONIALS */
            'testimonialName' => $this->testimonialName(),
            'testimonialText' => $this->testimonialText(),
            'testimonialImage' => $this->testimonialImage(),
            'testimonialHeadline' => $this->testimonialHeadline(),
            'testimonialLink' => $this->testimonialLink(),
            'testimonialVideoImage' => $this->testimonialVideoImage(),
            'videoIframeBlock' => $this->videoIframeBlock(),


            /* HOME PAGE */
        
            'ebookTopBar' => $this->ebookTopBar(),
            'ebookTopBarButton' => $this->ebookTopBarButton(),
            'ebookPageUrl' => $this->ebookPageUrl(),

            /** AUTHOR PAGE */
       
            'authorEbookImage' => $this->authorEbookImage(),
            'authorEbookContent' => $this->authorEbookContent(),
            'authorSignature' => $this->authorSignature(),

           
        ];
    }
    /* SALES PAGE */
  
    public function selectedProduct(){
        return get_field("selected_product");
    }
   
    public function formShortcode(){
        return get_field("form_shortcode");
    }
    public function formShortcodeModal(){
        return get_field("form_shortcode_modal");
    }
   
    
    public function timer(){
        return get_field("timer");
    }
    public function logoColor(){
        return get_field("site_logo_color", 'options')['url'];
    }
    public function logoWhite(){
        return get_field("site_logo_white", 'options')['url'];
    }
    public function siteDescription(){
        return get_field("site_description");
    }
    public function phoneNumber(){
        return get_field("phone", 'options');
    }
    public function email(){
        return get_field("email", 'options');
    }
   
    public function expertMainPhoto(){
        if(get_field("expert_main_photo" , "options")){
            return get_field("expert_main_photo" , "options") ['url'];
        }    
    }
    public function expertName(){
        return get_field("expert_name" , "options");
    }
    public function expertJob(){
        return get_field("expert_job" , "options");
    }
    public function expertProfilePhoto(){
        if(get_field("expert_profile_photo" , "options")){
            return get_field("expert_profile_photo" , "options") ['url'];
        }
    }
    public function expertBestSellingPhoto(){
        if(get_field("expert_best_selling_photo" , "options")){
            return get_field("expert_best_selling_photo" , "options") ['url'];
        }
    }
  
    public function satisfiedCustomersNumber(){
        return get_field("satisfied_customers_number", "options");
    }
    public function bestSellingAuthorBadge(){
        if(get_field("author_badge", "options")){
            return get_field("author_badge", "options")['url'];
        }
    }
  
    public function expertSalespageDescription(){
        return get_field("expert_salespage_description");
    }
   
   


    /* CHECKOUT PAGE */
    public function productNameCheckout(){
        return get_field("product_name_checkout");
    }
    public function productImageCheckout(){
        if(get_field("product_image_checkout")){
            return get_field("product_image_checkout")['url'];
        }
    }
    public function whatYouGetCheckout(){
        return get_field("what_you_get_checkout");
    }
    public function moneyBackGuaranteeHeadlineCheckout(){
        return get_field("money_back_guarantee_headline_checkout");
    }
    public function moneyBackGuaranteeTextCheckout(){
        return get_field("money_back_guarantee_text_checkout");
    }
    public function personalAssistanceHeadlineCheckout(){
        return get_field("personal_assistance_headline_checkout");
    }
    public function personalAssistanceTextCheckout(){
        return get_field("personal_assistance_text_checkout");
    }
   



    /* UPSELL PAGE */
    public function productUpsell(){
        return get_field("product_upsell");
    }
    public function toggleBar1(){
        return get_field("toggle_bar_1");
    }
    public function toggleBar2(){
        return get_field("toggle_bar_2");
    }
    public function toggleBar3(){
        return get_field("toggle_bar_3");
    }

    public function priceIncreaseIn(){
        return get_field("price_increase");
    }

    /* TESTIMONIALS */
    public function testimonialName(){
        return get_field("testimonial_name");
    }
    public function testimonialText(){
        return get_field("testimonial_text");
    }
    public function testimonialHeadline(){
        return get_field("testimonial_headline");
    }
    public function testimonialImage(){
        return get_field("testimonial_image");
    }

    public function testimonialLink(){
        if(get_field("testimonial_link")){
            return get_field("testimonial_link")['url'];
        }
    }

    public function videoIframeBlock(){
        return get_field("video_iframe_block");
    }

    public function testimonialVideoImage(){
        return get_field("testimonial_video_image");
    }


    /* HOME PAGE */
    public function ebookTopBar(){
        return get_field("ebook_top_bar");
    }
    public function ebookTopBarButton(){
        return get_field("ebook_top_bar_button");
    }

    public function ebookPageUrl(){
        return get_field("ebook_top_bar_button_link");
    }


    public function reviewLogosHp(){
        if(get_field("review_logos_hp")){
            return get_field("review_logos_hp")['url'];
        }
    }


    public function authorIntroText(){
        return get_field("author_intro_text");
    }
    public function authorContentText(){
        return get_field("author_content_text");
    }

    public function authorEbookImage() {
        if(get_field("author_ebook_img")){
            return get_field("author_ebook_img")['url'];
        }
    }
    public function authorEbookContent(){
        return get_field("author_ebook_content");
    }
    public function authorSignature() {
        if(get_field("author_signature")){
            return get_field("author_signature")['url'];
        }
    }

}