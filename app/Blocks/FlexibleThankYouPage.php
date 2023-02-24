<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class FlexibleThankYouPage extends Block {
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Flexible thank you type';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Thank you page content';

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
            'thankyou_section' => $this->thankyou_section(),
        ];
    }

    /**
     * The function `fields()` returns flexible content layout on thankyou pages => wffn_ty
     *
     * @return array
     */
    public function fields() {
        
        $content_thankyou = new FieldsBuilder('content_thankyou');
        $content_thankyou
            ->setLocation('post_type', '==', 'wffn_ty')
            ->addFlexibleContent('thankyou_sections')
                ->addLayout('heading')
                    ->addWysiwyg('heading')
                ->addLayout('content')
                    ->addWysiwyg('text')
                ->addLayout('button')
                    ->addText('button_text')
                    ->addLink('button_link')
                ->addLayout('image')
                    ->addImage('image')
            ->endFlexibleContent();

                   
                    

        return $content_thankyou->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function thankyou_section() {
        return get_field('thankyou_section') ?: [];
    }
}