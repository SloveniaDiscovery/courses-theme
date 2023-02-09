<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class FlexiblePage extends Block {
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
            'page_section' => $this->page_section(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields() {
        
        $content_page = new FieldsBuilder('content_page');
        $content_page
            ->setLocation('post_type', '==', 'page')
            ->addFlexibleContent('page_section')
                ->addLayout('text_block')
                    ->addWysiwyg('text_content')
                ->addLayout('image')
                    ->addImage('image')
                ->addLayout('ebook-form')
                        ->addWysiwyg('headline')
                        ->addImage('image')
                        ->addImage('signature')
                        ->addText('form_shortcode');

                   
                    

        return $content_page->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function page_section() {
        return get_field('page_section') ?: [];
    }
}