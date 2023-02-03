<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class FlexibleCheckout extends Block {
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Flexible checkout type';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Checkout page content';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'common';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'star-half';

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'checkout_section' => $this->checkout_section(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields() {
        
        $content_checkout = new FieldsBuilder('content_checkout');
        $content_checkout
            ->setLocation('post_type', '==', 'wfacp_checkout')
            ->addFlexibleContent('checkout_section')
                ->addLayout('product_info')
                    ->addText('product_title')
                    ->addImage('product_image')
                    ->addWysiwyg('product_perks')
                ->addLayout('testimonials')
                    ->addPostObject('testimonials', [
                        'post_type' => 'testimonials',
                        'multiple' => 1,
                        'return_format' => 'object',
                        'ui' => 1,
                    ])
                ->addLayout('review_images')
                    ->addFlexibleContent('image_box')
                        ->addLayout('review_image')
                            ->addImage('image')
                        ->addLayout('award_image')
                            ->addImage('image')
                        ->addLayout('satisfied_customers')
                            ->addImage('customers_image')
                    ->endFlexibleContent();

                   
                    

        return $content_checkout->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function checkout_section() {
        return get_field('checkout_section') ?: [];
    }
}