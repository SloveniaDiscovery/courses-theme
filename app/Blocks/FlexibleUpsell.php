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
                ->addLayout('main_headline')
                    ->addWysiwyg('heading')
                ->addLayout('subheading')
                    ->addWysiwyg('subheading')
                ->addLayout('text_content')
                    ->addWysiwyg('text')
                ->addLayout('image')
                    ->addImage('image')
                ->addLayout('dashed_box')
                    ->addFlexibleContent('box_section')
                        ->addLayout('main_headline')
                            ->addWysiwyg('heading')
                        ->addLayout('subheading')
                            ->addWysiwyg('subheading')
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
                ->addLayout('guarantee_section')
                    ->addText('guarantee_text')
                ->addLayout('green_box')
                    ->addText('no_thanks_green_box')
                ->addLayout('testimonials')
                    ->addPostObject('testimonials', [
                        'post_type' => 'testimonials',
                        'multiple' => 1,
                        'return_format' => 'object',
                        'ui' => 1,
                    ]);
                    

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