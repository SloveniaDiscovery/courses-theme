<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class FAQblocks extends Block {
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'FAQ custom post type';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Custom post type content';

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
            'faq_section' => $this->faq_section(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields() {
        
        $content_faq = new FieldsBuilder('post_content');
        $content_faq
            ->setLocation('post_type', '==', 'faq')
            ->addText('faq_product_category')
            ->addFlexibleContent('question_answer')
                ->addLayout('question_&_answer')
                    ->addText('faq_question')
                    ->addWysiwyg('faq_answer');

                   
                    

        return $content_faq->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function faq_section() {
        return get_field('faq_section') ?: [];
    }
}