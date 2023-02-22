<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class FlexibleUpsell extends Block {
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Flexible upsell type';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Upsell page content';

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
            'upsell_section' => $this->upsell_section(),
        ];
    }
   

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields() {
        
        $content_upsell = new FieldsBuilder('content_upsell');
        $content_upsell
            ->setLocation('post_type', '==', 'wfocu_offer')
            ->addFlexibleContent('upsell_section')
                ->addLayout('toggle_bar_2_headline')
                    ->addText('headline')
                ->addLayout('heading')
                    ->addWysiwyg('heading')
                ->addLayout('product_name')
                    ->addText('product_name')
                ->addLayout('text_content')
                    ->addWysiwyg('text')
                ->addLayout('image')
                    ->addImage('image')
                ->addLayout('dashed_box')
                    ->addFlexibleContent('box_section')
                        ->addLayout('heading')
                            ->addWysiwyg('heading')
                        ->addLayout('box_image')
                            ->addImage('image')
                        ->addLayout('box_text')
                            ->addWysiwyg('text')
                        ->addLayout('moving_button')
                            ->addText('moving_button_text')
                    ->endFlexibleContent()
                ->addLayout('no_thanks_button')
                    ->addText('no_thanks_button')
                ->addLayout('yellow_box')
                    ->addFlexibleContent('yellow_box_flexible')
                        ->addLayout('heading')
                            ->addWysiwyg('heading')
                        ->addLayout('text_with_background')
                            ->addText('text_with_background_color')
                        ->addLayout('text_content')
                            ->addWysiwyg('text')
                        ->addLayout('image')
                            ->addImage('image')
                        ->addLayout('bonuses')
                            ->addPostObject('choose_bonuses', [
                                'label' => 'Choose bonuses',
                                'post_type' => 'bonuses',
                                'multiple' => 1,
                                'return_format' => 'object',
                                'ui' => 1,
                            ])
                        ->addLayout('moving_button')
                            ->addText('moving_button_text')
                        ->addLayout('moving_button_#2')
                            ->addText('moving_button_text')
                        ->addLayout('guarantee')
                            ->addText('guarantee_headline')
                            ->addText('guarantee_text')
                        ->addLayout('personal_assistance')
                            ->addText('personal_assistance_headline')
                            ->addText('personal_assistance_text')
                    ->endFlexibleContent()
                ->addLayout('guarantee_section')
                    ->addText('guarantee_text')
                ->addLayout('green_box')
                     ->addLayout('heading')
                        ->addWysiwyg('heading')
                    ->addText('no_thanks_green_box')
                ->addLayout('testimonials')
                    ->addPostObject('testimonials', [
                        'post_type' => 'testimonials',
                        'multiple' => 1,
                        'return_format' => 'object',
                        'ui' => 1,
                    ])
                ->addLayout('product_self_sort')
                    ->addFlexibleContent('card_section')
                        ->addLayout('heading')
                            ->addWysiwyg('heading')
                        ->addLayout('text_block')
                            ->addWysiwyg('text_block_wysiwyg')
                        ->addLayout('products_cards')
                            ->addGroup('left_upsell_card_section', [
                                'layout' => 'block',
                            ])
                                ->addPostObject('select_product', [
                                    'post_type' => 'product',
                                    'multiple' => 0,
                                    'return_format' => 'object',
                                    'ui' => 1,
                                ])
                                ->addText('promo_text')
                                ->addText('title')
                                ->addImage('image')
                                ->addWysiwyg('text')
                                ->addText('button_text')
                            ->endGroup()
                            ->addGroup('right_upsell_card_section', [
                                'layout' => 'block',
                            ])
                                ->addPostObject('select_product', [
                                    'post_type' => 'product',
                                    'multiple' => 0,
                                    'return_format' => 'object',
                                    'ui' => 1,
                                ])
                                ->addText('promo_text')
                                ->addText('title')
                                ->addImage('image')
                                ->addWysiwyg('text')
                                ->addText('button_text')
                            ->endGroup();
                            
                        

        return $content_upsell->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function upsell_section() {
        return get_field('upsell_section') ?: [];
    }
}