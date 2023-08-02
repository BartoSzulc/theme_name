<?php

namespace App\Fields\Partials\Home;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class References extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $references = new FieldsBuilder('references');

        $references
            ->addGroup('references', ['label' => "Referencje", 'wrapper' => ['width' => '50%']])
                ->addWysiwyg('badge', ['label' => 'Nagłowek'])
                ->addWysiwyg('content', ['label' => 'Treść'])
                ->addGallery('gallery', [
                    'preview_size' => 'medium',
                    'insert' => 'append',
                    'library' => 'all',
                    'return_format' => 'id',
                    'label' => '',
                ])
            ->endGroup()
            ->addGroup('testimonials', ['label' => 'Opinie', 'wrapper' => ['width' => '50%']])
                ->addWysiwyg('badge', ['label' => 'Nagłowek'])
                ->addWysiwyg('content', ['label' => 'Treść'])
                ->addMessage('message_field', '<a target="_blank" href="/wp-admin/edit.php?post_type=places">Dodaj opinie</a>', [
                    'label' => 'Opinie, wpisy poniżej',
                ])
            ->endGroup();

        return $references;
    }
}
