<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class FlexibleSalesPage extends Block {
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Flexible sales page';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Flexible sales page content';

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
            'salespage_sections' => $this->salespage_sections(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields() {
        
        $content = new FieldsBuilder('salespage_content');
        $content
            ->setLocation('post_type', '==', 'wffn_landing')
            ->addFlexibleContent('salespage_sections')
                ->addLayout('top_bar_to_midnight')
                    ->addText('top_bar_text')
                    ->addText('top_bar_button_text')
                ->addLayout('top_bar_to_date')
                    ->addDateTimePicker('timer', [
                        'label' => 'Choose date for top bar timer',
                        'date_format' => 'd/m/y',
                        'display_format' => 'd/m/y',
                    ])
                    ->addText('top_bar_text')
                    ->addText('top_bar_button_text')
                ->addLayout('text_with_background')
                    ->addText('text_with_background_color')
                ->addLayout('headline')
                    ->addWysiwyg('main_heading_h1')
                ->addLayout('subheading')
                    ->addWysiwyg('sub_heading')
                ->addLayout('product_preview')
                    ->addImage('product_image')
                    ->addText('promo_badge_text')
                    ->addText('product_title')
                    ->addWysiwyg('product_includes')
                    ->addText('main_form_shortcode')
                ->addLayout('logos_badges')
                    ->addGallery('logo_badge', [
                        'label' => 'Logos reviews',
                        'description'=> '',
                        'wrapper' => [
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ],
                        'return_format' => 'array',
                        'insert' => 'append',
                        'library' => 'all',
                        'min_width' => '',
                        'min_size' => '',
                        'max_width' => '',
                    ])
                ->addLayout('logo_reviews')
                    ->addGallery('logo_review', [
                        'label' => 'Logos reviews',
                        'description'=> '',
                        'wrapper' => [
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ],
                        'return_format' => 'array',
                        'insert' => 'append',
                        'library' => 'all',
                        'min_width' => '',
                        'min_size' => '',
                        'max_width' => '',
                    ])
                ->addLayout('text_content')
                    ->addWysiwyg('text')
                ->addLayout('image')
                    ->addImage('image')
                ->addLayout('testimonials')
                    ->addPostObject('testimonials', [
                        'post_type' => 'testimonials',
                        'multiple' => 1,
                        'return_format' => 'object',
                        'ui' => 1,
                    ])
                ->addLayout('video_testimonials')
                    ->addPostObject('video_testimonials', [
                        'post_type' => 'testimonials',
                        'multiple' => 1,
                        'return_format' => 'object',
                        'ui' => 1,
                    ])
                ->addLayout('yellow_box')
                    ->addFlexibleContent('yellow_box_flexible')
                        ->addLayout('headline')
                            ->addText('main_heading')
                        ->addLayout('subheading')
                            ->addWysiwyg('sub_heading')
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
                        ->addLayout('guarantee')
                            ->addText('guarantee_headline')
                            ->addText('guarantee_text')
                        ->addLayout('personal_assistance')
                            ->addText('personal_assistance_headline')
                            ->addText('personal_assistance_text')
                    ->endFlexibleContent()
                ->addLayout('modal_form')
                    ->addText('modal_form_text')
                    ->addText('modal_form_shortcode')
                ->addLayout('limited_offer')
                    ->addFlexibleContent('limited_offer_box')
                        ->addLayout('headline')
                            ->addText('main_heading')
                        ->addLayout('subheading')
                            ->addWysiwyg('sub_heading')
                        ->addLayout('text_content')
                            ->addWysiwyg('text')
                        ->addLayout('image')
                            ->addImage('image')
                    ->endFlexibleContent();
             
                   
                    

        return $content->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function salespage_sections() {
        return get_field('salespage_sections') ?: [];
    }
}